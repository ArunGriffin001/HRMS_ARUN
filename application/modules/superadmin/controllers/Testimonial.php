<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('LoginDetails',base_url('/login'));
        $this->load->model('Testimonial_model');
    }

    public function index(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Testimonial";
        $this->superadmin_template->load('superadmin_template','superadmin/testimonial/list', $data);
    }

    /**********************   ADD BLOG SECTION ************************/
    /**
    * Sort Description.
    * function name: addPlan  
    * Details: load add form
    * @return: 
    * 
    */
    public function addTestimonial(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Testimonial";
        $data['page_heading']="Add Testimonial";
        $this->superadmin_template->load('superadmin_template','superadmin/testimonial/add', $data);
    }

    /**
    * Sort Description.
    * function name:  submitBlog  
    * Details: store record in DB
    * @return: id
    * 
    */
    public function submitTestimonial(){
        
        $this->form_validation->set_rules('name', 'Name','trim|required');
        $this->form_validation->set_rules('role_name', 'Role name','trim|required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
           
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/testimonial/add'));
        }
        else
        {
            extract($this->input->post());
              /*  echo'<pre>';
                print_r($check_blog);
                echo'</pre>';
                die;*/
                $asset_type = MEDIA_PICTURE;
                if (!empty($_FILES['picture']['name'])) {
                    $dirPathThumb =  './uploads/superadmin/testimonial/testimonial_thumb/'; 
                    $pictureimage = $this->Mod_Common->fileupload_resize('picture', 'uploads/superadmin/testimonial/','Picture',$dirPathThumb,'320','100');

                    if(!empty($pictureimage)){
                        $picture = $pictureimage;
                    }else{
                        $error_text = "Need file type should be $asset_type";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        //$this->template->load('default', 'slider/add_slider', $this->data);
                        redirect(base_url(ADMIN_URL).'testimonial/add');
                    }
                }
                $add_date       = date('Y-m-d h:i:s');
                $addedData      = array(
                    'name'          => trim($name),
                    'description'   => $editor1,
                    'role_name'     => trim($role_name),
                    'picture'       => $picture,
                    'created_at'    => $add_date,
                    'updated_at'    => $add_date,
                );
            
            $plan_id = $this->Mod_Common->insertData(TABLE_TESTIMONIAL, $addedData);
            if($plan_id){
                $errors = 'Testimonial added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/testimonial/add'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/testimonial/add'));
            }
        }
    }

    /**
    * Sort Description.
    * function name:  tagList  
    * Details: load tag list page
    * @return: array
    * 
    */
    public function testimonialList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Testimonial";
        $data['page_heading']="Testimonial List";
        $this->superadmin_template->load('superadmin_template','superadmin/testimonial/list', $data);
    }

    /**
    * Sort Description.
    * function name:  blogAjaxList  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function testimonialAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='name';
            }else if($order[0]['column']==2){
                $column_name='role_name';
            }else if($order[0]['column']==3){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Testimonial_model->testimonialAjaxList(true);
        $getRecordListing = $this->Testimonial_model->testimonialAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
        /*echo'<pre>';
        print_r($getRecordListing);
        echo'</pre>';
        die; */     
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->name;
                    $img = $recordData->picture;
                    $recordListing[$i][2]= '<img src="'.base_url().'uploads/superadmin/testimonial/'.$img.'" width=50>';
                    $recordListing[$i][3]= $recordData->role_name;
                    $recordListing[$i][4] = dateTime($recordData->created_at);
                    /*$table = TABLE_TESTIMONIAL;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url(ADMIN_URL).'blog/updateStatus'; //base_url('admin/users/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][4]= $actionStatus;*/
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'testimonial/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][5] = $actionLink;
                    $i++;
                    $srNumber++;
                }
          
            $content .= ']';
            $final_data = json_encode($recordListing);
        } else {
            $final_data = '[]';
        }   
                
        echo '{"draw":'.$draw.',"recordsTotal":'.$totalRecord.',"recordsFiltered":'.$totalRecord.',"data":'.$final_data.'}';
    }
    
    /**
    * Sort Description.
    * function name:  editBlog  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function editTestimonial($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Testimonial";
        $data['page_heading']="Edit Testimonial";
        $record = rowData(TABLE_TESTIMONIAL, array('id'=>decode($id)));
        
        $data['record'] = $record;

       /* echo'<pre>';
        print_r($record);
        print_r($blog_tag_option_arr);
        echo'</pre>';
        die;*/


        $this->superadmin_template->load('superadmin_template','superadmin/testimonial/edit', $data);
    }

       /**
    * Sort Description.
    * function name:  updateBlog  
    * Details: update blog value
    * @return: true/false
    * 
    */
    public function updateTestimonial($id){
        
       $this->form_validation->set_rules('name', 'Name','trim|required');
    $this->form_validation->set_rules('role_name', 'Role name','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
           
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/testimonial/edit/'.$id));
        }
        else
        {
            extract($this->input->post());
            $asset_type = MEDIA_PICTURE;
            if (!empty($_FILES['picture']['name'])) {
                $dirPathThumb =  './uploads/superadmin/testimonial/testimonial_thumb/'; 
                $pictureimage = $this->Mod_Common->fileupload_resize('picture', 'uploads/superadmin/testimonial/','Picture',$dirPathThumb,'320','100');

                if(!empty($pictureimage)){
                    $picture = $pictureimage;
                    $path = './uploads/superadmin/testimonial/'.$old_img;
                    unlink($path);
                    $path_thumb = './uploads/superadmin/testimonial/testimonial_thumb/'.$old_img;
                    unlink($path_thumb);
                   
                }else{
                    $error_text = "Need file type should be $asset_type";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url(ADMIN_URL).'testimonial/edit/'.$id);
                }
            }else{
                $picture = $old_img;
            }
            
            $add_date       = date('Y-m-d h:i:s');
            $updateData      = array(
                    'name'          => trim($name),
                    'description'   => $editor1,
                    'role_name'     => trim($role_name),
                    'picture'       => $picture,
                    'updated_at'    => $add_date,
                );
            
            $update_id = $this->Mod_Common->updateData(TABLE_TESTIMONIAL,array('id' =>decode($id)), $updateData);
           
            if($update_id){

                /* Blog category option*/

                $errors = 'Testimonial updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/testimonial/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/testimonial/edit/'.$id));
            }
        }
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function updateStatus() {

        $returnData = false;
        $fieldId = $this->input->post('ids');
        $IdField = $this->input->post('idField') ? $this->input->post('idField') : "id";
        $userStatus = $this->input->post('status');
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        
        if($userStatus == '1'){
            if($IdField == 'id'){
                $userStatus2 = 'Active';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                
                $updateData = array($field => $userStatus);
            }
            
        }else if($userStatus == '0'){
            if($IdField == 'id'){
                $userStatus2 = 'Deactive';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                $updateData = array($field => $userStatus);
            }
            
        }else{
            $updateData = array($field => $userStatus);
        }
        if ((!empty($fieldId)) && (!empty($table))) {
            $upWhere = array($IdField => $fieldId);
            $this->Mod_Common->updateDataFromTabel($table, $updateData, $upWhere);

            $returnData = array('isSuccess' => true);
        } else {
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }

}