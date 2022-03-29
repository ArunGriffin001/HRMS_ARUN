<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
	} 
	 
	 /**
    * Sort Description.
    * function name: list  
    * Details: Load view
    * @return: 
    * 
    */
    public function list(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";

         $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
       /* echo $department_list[0]->dep_id;
        echo'<pre>';
        print_r($department_list);
        echo'<pre>';
        
        die;*/

        if(!empty($this->input->post('employee_department'))){

            extract($this->input->post());
           /* echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';*/

            $depatment_id = decode($employee_department);
            $data['current_detp'] = $depatment_id;
            $current_date = date('Y-m-d', strtotime($attendence_date));
            $data['current_date'] = $current_date;

            $custom_query = "SELECT attendence.*, employee.first_name, employee.last_name, emp_dept.dept_name FROM  hs_employee_attendance as attendence
            INNER JOIN hs_employer_department AS emp_dept ON emp_dept.dep_id = attendence.department_id
            INNER JOIN hs_users_employer AS employee ON employee.employee_id = attendence.employee_id
            WHERE attendence.employer_id = $this->employer_id
            AND attendence.attendance_date = '$current_date'
            AND attendence.department_id = $depatment_id
            ";
        }else{
            /*echo '<pre>';
            print_r($department_list);
            echo'<pre>';
            die;*/
            if(!empty($department_list)){
                $depatment_id = $department_list[0]->dep_id;
            }else{
                $depatment_id = 0;
            }
            
            $data['current_detp'] = $depatment_id;
            $current_date = date('Y-m-d');
            $data['current_date'] = $current_date;
           /* $employee_list = $this->Mod_Common->selectData(TABLE_USERS_EMPLOYER, array('status'=>'Active','employee_department'=>$department_list[0]->dep_id,'employer_id'=>$this->employer_id));*/

            $custom_query = "SELECT attendence.*, employee.first_name, employee.last_name, emp_dept.dept_name FROM  hs_employee_attendance as attendence
            INNER JOIN hs_employer_department AS emp_dept ON emp_dept.dep_id = attendence.department_id
            INNER JOIN hs_users_employer AS employee ON employee.employee_id = attendence.employee_id
            WHERE attendence.employer_id = $this->employer_id
            AND attendence.attendance_date = '$current_date'
            AND attendence.department_id = $depatment_id
            ";
        }

        $employee_list = $this->Mod_Common->customQuery($custom_query);

        /*echo'<pre>fgf';
        echo$this->db->last_query();
        print_r($employee_list);
        echo'</pre>';
        die;*/
        $data['departments'] = $department_list;
        $data['employee_list'] = $employee_list;

        $this->employer_template->load('employer_template','employer/employee_management/attendance/list', $data); 
    }


    /**
    * Sort Description.
    * function name:  attendenceStatus  
    * Details: change attendence status
    * @return: true/false
    * 
    */
    public function attendenceStatus() {

        $returnData = false;
        extract($this->input->post());
        $employer_id = $this->employer_id;
       /* echo'<pre>';
        print_r($this->input->post());
        echo'</pre>';
        die;*/
        $updateData = array('attendence_status' => $attendence_status);
        $upWhere = array('employee_id' => decode($employee_id), 'employer_id'=>$this->employer_id,'attendance_id'=>decode($attendance_id ));
        if (!empty($attendence_status)){
            $this->Mod_Common->updateDataFromTabel(TABLE_EMPLOYEE_ATTENDANCE, $updateData, $upWhere);
            
            $returnData = array('isSuccess' => true);
        }else{
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }

    /**
    * Sort Description.
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function add(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";
        $data['page_sub_heading'] = "Add Attendance";
        $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
       /* echo $department_list[0]->dep_id;
        echo'<pre>';
        print_r($department_list);
        echo'<pre>';
        
        die;*/

        if(!empty($this->input->post('employee_department'))){

            extract($this->input->post());
            $data['current_detp'] = $employee_department;
            $data['current_date'] = date('Y-m-d', strtotime($attendence_date));
            $employee_list = $this->Mod_Common->selectData(TABLE_USERS_EMPLOYER, array('status'=>'Active','employee_department'=>$employee_department,'employer_id'=>$this->employer_id));
        }else{
            $data['current_detp'] = $department_list[0]->dep_id;
            $data['current_date'] = date('Y-m-d');
            $employee_list = $this->Mod_Common->selectData(TABLE_USERS_EMPLOYER, array('status'=>'Active','employee_department'=>$department_list[0]->dep_id,'employer_id'=>$this->employer_id));

        }
        $data['departments'] = $department_list;
        $data['employee_list'] = $employee_list;
       /* echo'<pre>';
        print_r($employee_list);
        echo'</pre>';
        die;*/

        $this->employer_template->load('employer_template','employer/employee_management/attendance/add', $data); 
    }

     /**
    * Sort Description.
    * function name: addEmpAttendence  
    * Details: add attendence record
    * @return: 
    * 
    */
    public function addEmpAttendence(){
        
            extract($this->input->post());
            $attendanceDate = date('Y-m-d', strtotime($attendance_date));
            $check_entry = $this->Mod_Common->rowData(TABLE_EMPLOYEE_ATTENDANCE,array('employer_id' => $this->employer_id, 'department_id' => decode($dept_data), 'attendance_date' => $attendanceDate));

           /* echo '<pre>dd';
            echo $this->db->last_query();
            print_r($check_entry);
            echo'<pre>';*/
            // $emp_rec = array();
            // $empdata = decode($emp_data);
            // echo '<pre>dd';
            // print_r($empdata);
            // echo'<pre>';
            //die;
            $empdata = decode($emp_data);
            $emp_rec = array();
            if(empty($check_entry)){
                if(!empty($empdata)){
                    foreach ($empdata as $emp_id) {
                        $attendencestatus = $this->input->post('attendence_status_'.$emp_id);
                       $emp_rec[] = array( 'employee_id' => $emp_id,
                                            'employer_id' => $this->employer_id,
                                            'department_id' => decode($dept_data),
                                            'attendance_date' => $attendanceDate,
                                            'attendence_status' => $attendencestatus,
                                            'created_at'    => date('Y-m-d h:i:s'),
                                            'updated_at'    => date('Y-m-d h:i:s'),
                                          );
                    }
                }
            }

           /* echo '<pre>dd';
            print_r($emp_rec);
            echo'<pre>';
           die;*/
           if(empty($emp_rec)){
                $errors = 'Sorry, you already addede '.$attendanceDate.' date attendence for  same deparment';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/emp-management/attendance/add'));
           }

            $insert_id = $this->Mod_Common->insertbatchdata(TABLE_EMPLOYEE_ATTENDANCE, $emp_rec);
            if($insert_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/attendance'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/emp-management/attendance/add'));
            }
    }

}
?>