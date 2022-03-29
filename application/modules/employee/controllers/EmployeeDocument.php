<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeDocument extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->employer_id = $this->login_data['employer_id'];
        $this->employee_id = $this->login_data['userId'];
	} 
	 
	
    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function docList(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Doc List";
        $data['page_heading']="Doc List";
         $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
       
        if(!empty($res)){
            $data['res'] = $res;
        }else{
            $data['res'] = array();
        }
        /* echo"<pre>11";
        print_r($res);
        echo'</pre>';
        die;*/
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/list', $data);
    }

    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function docList1(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Doc List";
        $data['page_heading']="Doc List";
         $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
       
        if(!empty($res)){
            $data['res'] = $res;
        }else{
            $data['res'] = array();
        }
        /* echo"<pre>11";
        print_r($res);
        echo'</pre>';
        die;*/
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/list1', $data);
    }

    /**
    * Sort Description.
    * function name: resumeDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function resumeDoc(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Resume";
        $data['page_heading']="Resume";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id), 'doc_id,employee_id,employer_id,resume_doc,resume_status');
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/add_resume', $data);
    }

    /**
    * Sort Description.
    * function name: uploadresumeDoc  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadresumeDoc(){

            $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id), 'doc_id,employee_id,employer_id,resume_doc,resume_status');

            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['resume_doc']['name'])) {
                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('resume_doc', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    
                }else{
                    $error_text = "Need file type should be pdf|doc|docx";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employee/employee/add_resume'));
                }

                if(!empty($res)){
                    $updateData = array(
                    'resume_doc'    => trim($docurl),
                    'resume_status' => 'Completed',
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employee_id'   => $this->employee_id,
                    'employer_id'   => $this->employer_id,
                    'resume_doc'    => trim($docurl),
                    'resume_status' => 'Completed',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
                }
                

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }
    }

    /**
    * Sort Description.
    * function name: offerLetterDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function offerLetterDoc(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Offer Letter";
        $data['page_heading']="Offer Letter";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/offer_letter_acceptance', $data);
    }

    /**
    * Sort Description.
    * function name: uploadOfferLetterDoc  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadOfferLetterDoc(){

            $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id), 'doc_id,employee_id,employer_id,offer_letter_doc,offer_letter_doc2,offer_letter_doc3');

            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['offer_letter_doc']['name']) || !empty($_FILES['offer_letter_doc2']['name']) || !empty($_FILES['offer_letter_doc3']['name'])) {
                $dirPathThumb =  '';

                /* Offer letter 1*/
                if(!empty($_FILES['offer_letter_doc']['name'])){
                    $doc_url = $this->Mod_Common->docFilePpload('offer_letter_doc', 'uploads/employee/others','DOC',$dirPathThumb);
                    if(!empty($doc_url)){
                        $docurl = $doc_url;
                    }else{
                        $error_text = "Offer letter 1 Need file type should be pdf, jpg";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        redirect(base_url('employee/employee/doc-list'));
                    }
                }

                /* Offer letter 2*/
                if(!empty($_FILES['offer_letter_doc2']['name'])){
                    $doc_url2 = $this->Mod_Common->docFilePpload('offer_letter_doc2', 'uploads/employee/others','DOC',$dirPathThumb);
                    if(!empty($doc_url2)){
                        $docurl2 = $doc_url2;
                    }else{
                        $error_text = "Offer letter 2 Need file type should be pdf, jpg";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        redirect(base_url('employee/employee/doc-list'));
                    }
                }

                /* Offer letter 3*/
                if(!empty($_FILES['offer_letter_doc3']['name'])){
                    $doc_url3 = $this->Mod_Common->docFilePpload('offer_letter_doc3', 'uploads/employee/others','DOC',$dirPathThumb);
                    if(!empty($doc_url3)){
                        $docurl3 = $doc_url3;
                    }else{
                        $error_text = "Offer letter 3 Need file type should be pdf, jpg";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        redirect(base_url('employee/employee/doc-list'));
                    }
                }
                /*$doc_url = $this->Mod_Common->docFilePpload('offer_letter_doc', 'uploads/employee/others','DOC',$dirPathThumb);*/

                

                if(!empty($res)){
                    $updateData = array(
                    'employee_id'            => $this->employee_id,
                    'employer_id'             => $this->employer_id,
                    'offer_letter_status' => 'Completed',
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    if(!empty($docurl)){
                        $updateData['offer_letter_doc'] = trim($docurl);
                    }
                    if(!empty($docurl2)){
                        $updateData['offer_letter_doc2'] = trim($docurl2);
                    }
                    if(!empty($docurl3)){
                        $updateData['offer_letter_doc3'] = trim($docurl3);
                    }

                    $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employee_id'   => $this->employee_id,
                    'employer_id'   => $this->employer_id,
                    'offer_letter_status' => 'Completed',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    if(!empty($docurl)){
                        $addData['offer_letter_doc'] = trim($docurl);
                    }
                    if(!empty($docurl2)){
                        $addData['offer_letter_doc2'] = trim($docurl2);
                    }
                    if(!empty($docurl3)){
                        $addData['offer_letter_doc3'] = trim($docurl3);
                    }
                    $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
                }
                

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }
    }

    /* Offer letter */
    /**
    * Sort Description.
    * function name: passPortSizePhoto  
    * Details: Load view
    * @return: 
    * 
    */
    public function passPortSizePhoto(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Passport Photo";
        $data['page_heading']="Passport Photo";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/passport_size_photo', $data);
    }

    /**
    * Sort Description.
    * function name: uploadPassPortSizePhoto  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadPassPortSizePhoto(){

            $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
            extract($this->input->post());
            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['passport_size_photo']['name'])) {
                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('passport_size_photo', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                     if(!empty($passport_size_photo_old)){
                        $file1 = './uploads/employee/others/'.$passport_size_photo_old;
                        unlink($file1);
                        
                    }
                    
                }else{
                    $error_text = "Need file type should be png|jpg|jpeg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employee/employee/passport_photo'));
                }

                if(!empty($res)){
                    $updateData = array(
                    'passport_size_photo'    => trim($docurl),
                    'passport_size_photo_status' => 'Completed',
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                    $errors = $this->lang->line('msg_updated_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('employee/employee/doc-list'));
                }else{
                    $addData = array(
                    'employee_id'   => $this->employee_id,
                    'employer_id'   => $this->employer_id,
                    'passport_size_photo'    => trim($docurl),
                    'passport_size_photo_status' => 'Completed',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
                    $errors = $this->lang->line('msg_updated_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('employee/employee/doc-list'));
                }
                
            }else if(!empty($passport_size_photo_old)){
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }else{
                $errors = 'File is not valid please try correct file type.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employee/employee/doc-list'));
            }
    }

    /* Identity Proof */
    /**
    * Sort Description.
    * function name: identityProof  
    * Details: Load view
    * @return: 
    * 
    */
    public function identityProof(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Identity Proof";
        $data['page_heading']="Identity Proof";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/identity_proof', $data);
    }

    /**
    * Sort Description.
    * function name: uploadPassPortSizePhoto  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadIdentityProof(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        $dirPathThumb =  '';
        $docurl1 = ''; $docurl2 = '';

        extract($this->input->post());

        if(!empty($_FILES['identity_proof_1']['name']) || !empty($_FILES['identity_proof_2']['name'])){
            if(!empty($_FILES['identity_proof_1']['name']) && !empty($_FILES['identity_proof_2']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('identity_proof_1', 'uploads/employee/others','DOC',$dirPathThumb);
                $doc_url2 = $this->Mod_Common->docFilePpload('identity_proof_2', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1) && !empty($doc_url2)){
                    $docurl1 = $doc_url1;
                    $docurl2 = $doc_url2;
                    if(!empty($identity_proof_1_old) && !empty($identity_proof_2_old)){
                        $file1 = './uploads/employee/others/'.$identity_proof_1_old;
                        unlink($file1);
                        $file2 = './uploads/employee/others/'.$identity_proof_2_old;
                        unlink($file2); 
                    }
                   
                }
            }else if(!empty($_FILES['identity_proof_1']['name']) && empty($_FILES['identity_proof_2']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('identity_proof_1', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1)){
                    $docurl1 = $doc_url1;   
                }
                if(!empty($identity_proof_1_old)){
                    $file1 = './uploads/employee/others/'.$identity_proof_1_old;
                    unlink($file1);
                }
            }else if(!empty($_FILES['identity_proof_2']['name']) && empty($_FILES['identity_proof_1']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('identity_proof_2', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;   
                }
                if(!empty($identity_proof_2_old)){
                    $file2 = './uploads/employee/others/'.$identity_proof_2_old;
                    unlink($file2); 
                }
            }else{
                $error_text = "Need file type should be png|jpg|jpeg";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/identity_proof'));
            }

        }else if(!empty($identity_proof_1_old) || !empty($identity_proof_2_old)){
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));

        }else{
            $errors = 'File is not valid please try correct file type.';
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/employee/identity_proof'));
        }
        if($res){
            if(!empty($docurl1) && !empty($docurl2)){
                 $updateData = array(
                'identity_proof_1'    => trim($docurl1),
                'identity_proof_2'    => trim($docurl2),
                'identity_proof_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );
            }else if(!empty($docurl1) && empty($docurl2)){
                $updateData = array(
                'identity_proof_1'    => trim($docurl1),
                'identity_proof_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else if(!empty($docurl2) && empty($docurl1)){
                $updateData = array(
                'identity_proof_2'    => trim($docurl2),
                'identity_proof_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else{
                $updateData = array( 'identity_proof_status' => 'Completed' );
            }

            $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $addData = array(
            'employee_id'   => $this->employee_id,
            'employer_id'   => $this->employer_id,
            'identity_proof_1'    => trim($docurl1),
            'identity_proof_2'    => trim($docurl2),
            'identity_proof_status' => 'Completed',
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
            );
            $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Education Certificates */
    /**
    * Sort Description.
    * function name: educationCertificate  
    * Details: Load view
    * @return: 
    * 
    */
    public function educationCertificate(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Education Certificates";
        $data['page_heading']="Education Certificates";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        //$data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/education_certificate', $data);
    }

    /**
    * Sort Description.
    * function name: uploadEducationCertificate  
    * Details: add record as per doctype
    * @return: 
    * 
    */
    public function uploadEducationCertificate(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        $dirPathThumb =  '';
        $docurl1 = ''; $docurl2 = '';
        extract($this->input->post());
        if(!empty($_FILES['education_certificate_10']['name']) || !empty($_FILES['education_certificate_12']['name'])){
            if(!empty($_FILES['education_certificate_10']['name']) && !empty($_FILES['education_certificate_12']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('education_certificate_10', 'uploads/employee/others','DOC',$dirPathThumb);
                $doc_url2 = $this->Mod_Common->docFilePpload('education_certificate_12', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1) && !empty($doc_url2)){
                    $docurl1 = $doc_url1;
                    $docurl2 = $doc_url2;
                    if(!empty($education_certificate_10_old) && !empty($education_certificate_12_old)){
                        $file1 = './uploads/employee/others/'.$education_certificate_10_old;
                        unlink($file1);
                        $file2 = './uploads/employee/others/'.$education_certificate_12_old;
                        unlink($file2); 
                    }
                   
                }
            }else if(!empty($_FILES['education_certificate_10']['name']) && empty($_FILES['education_certificate_12']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('education_certificate_10', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1)){
                    $docurl1 = $doc_url1;   
                }
                if(!empty($education_certificate_10_old)){
                    $file1 = './uploads/employee/others/'.$education_certificate_10_old;
                    unlink($file1);
                }
            }else if(!empty($_FILES['education_certificate_12']['name']) && empty($_FILES['education_certificate_10']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('education_certificate_12', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;   
                }
                if(!empty($education_certificate_12_old)){
                    $file2 = './uploads/employee/others/'.$education_certificate_12_old;
                    unlink($file2); 
                }
            }else{
                $error_text = "Need file type should be png|jpg|jpeg|pdf";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/education_certificate'));
            }

        }else if(!empty($education_certificate_10_old) || !empty($education_certificate_12_old)){
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));

        }else{
            $errors = 'File is not valid please try correct file type.';
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/employee/education_certificate'));
        }
        if($res){
            if(!empty($docurl1) && !empty($docurl2)){
                 $updateData = array(
                'education_certificate_10'    => trim($docurl1),
                'education_certificate_12'    => trim($docurl2),
                'education_certificate_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );
            }else if(!empty($docurl1) && empty($docurl2)){
                $updateData = array(
                'education_certificate_10'    => trim($docurl1),
                'education_certificate_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else if(!empty($docurl2) && empty($docurl1)){
                $updateData = array(
                'education_certificate_12'    => trim($docurl2),
                'education_certificate_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else{
                $updateData = array( 'education_certificate_status' => 'Completed' );
            }

            $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $addData = array(
            'employee_id'   => $this->employee_id,
            'employer_id'   => $this->employer_id,
            'education_certificate_10'    => trim($docurl1),
            'education_certificate_12'    => trim($docurl2),
            'education_certificate_status' => 'Completed',
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
            );
            $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Profesional quilification */
    /**
    * Sort Description.
    * function name: professionalQualification  
    * Details: Load view
    * @return: 
    * 
    */
    public function professionalQualification(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Professional Qualification";
        $data['page_heading']="Professional Qualification";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        //$data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/professional_qualification', $data);
    }

    /**
    * Sort Description.
    * function name: uploadProfessionalQualification  
    * Details: add record as per doctype
    * @return: 
    * 
    */
    public function uploadProfessionalQualification(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        $dirPathThumb =  '';
        /*$docurl1 = ''; $docurl2 = ''; $docurl3 = ''; $docurl4 = '';*/
        extract($this->input->post());
        if(!empty($_FILES['professional_qualification_diploma']['name']) || !empty($_FILES['professional_qualification_graduation']['name']) || !empty($_FILES['professional_qualification_post_graduation']['name'])  || !empty($_FILES['professional_qualification_any_other']['name'])){

            /* First Section */
            if(!empty($_FILES['professional_qualification_diploma']['name'])){

                $doc_url1 = $this->Mod_Common->docFilePpload('professional_qualification_diploma', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1)){
                     $docurl1 = $doc_url1;

                }
                if(!empty($professional_qualification_diploma_old)){
                    $file1 = './uploads/employee/others/'.$professional_qualification_diploma_old;
                        unlink($file1);
                }
            }else{
                if(!empty($professional_qualification_diploma_old)){
                    $docurl1 = $professional_qualification_diploma_old;
                }
            }

             /* Second Section */
            if(!empty($_FILES['professional_qualification_graduation']['name'])){

                $doc_url2 = $this->Mod_Common->docFilePpload('professional_qualification_graduation', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                     $docurl2 = $doc_url2;

                }
                if(!empty($professional_qualification_graduation_old)){
                    $file2 = './uploads/employee/others/'.$professional_qualification_graduation_old;
                        unlink($file2);
                }
            }else{
                if(!empty($professional_qualification_graduation_old)){
                    $docurl2 = $professional_qualification_graduation_old;
                }
            }

            /* Thired Section */
            if(!empty($_FILES['professional_qualification_post_graduation']['name'])){

                $doc_url3 = $this->Mod_Common->docFilePpload('professional_qualification_post_graduation', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url3)){
                     $docurl3 = $doc_url3;

                }
                if(!empty($professional_qualification_post_graduation_old)){
                    $file3 = './uploads/employee/others/'.$professional_qualification_post_graduation_old;
                        unlink($file3);
                }
            }else{
                if(!empty($professional_qualification_post_graduation_old)){
                    $docurl3 = $professional_qualification_post_graduation_old;
                }
            }

            /* Fourth Section */
            if(!empty($_FILES['professional_qualification_any_other']['name'])){

                $doc_url4 = $this->Mod_Common->docFilePpload('professional_qualification_any_other', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url4)){
                     $docurl4 = $doc_url4;

                }
                if(!empty($professional_qualification_any_other_old)){
                    $file4 = './uploads/employee/others/'.$professional_qualification_any_other_old;
                    unlink($file4);
                }
            }else{
                if(!empty($professional_qualification_any_other_old)){
                    $docurl4 = $professional_qualification_any_other_old;
                }
            }

        }else{
            if(!empty($professional_qualification_diploma_old)){
                $docurl1 = $professional_qualification_diploma_old;
            }
            if(!empty($professional_qualification_graduation_old)){
                $docurl2 = $professional_qualification_graduation_old;
            }
            if(!empty($professional_qualification_post_graduation_old)){
                $docurl3 = $professional_qualification_post_graduation_old;
            }
            if(!empty($professional_qualification_any_other_old)){
                $docurl4 = $professional_qualification_any_other_old;
            }
        }

        /*echo "<pre>";
        print_r($this->input->post());
        echo'</pre>';

        die;*/
        if($res){
             $updateData = array(
            'professional_qualification_diploma'  => trim($docurl1),
            'professional_qualification_graduation' => trim($docurl2),
            'professional_qualification_post_graduation' => trim($docurl3),
            'professional_qualification_any_other' => trim($docurl4),
            'professional_qualification_status' => 'Completed',
            'updated_at'    => date('Y-m-d h:i:s'),
            );

            $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $addData = array(
            'employee_id'   => $this->employee_id,
            'employer_id'   => $this->employer_id,
            'professional_qualification_diploma'  => trim($docurl1),
            'professional_qualification_graduation' => trim($docurl2),
            'professional_qualification_post_graduation' => trim($docurl3),
            'professional_qualification_any_other' => trim($docurl4),
            'professional_qualification_status' => 'Completed',
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
            );
            $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Pen card */
    /**
    * Sort Description.
    * function name: penCardDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function penCardDoc(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="PAN Card";
        $data['page_heading']="PAN Card";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/pan_card', $data);
    }

    /**
    * Sort Description.
    * function name: uploadPenCardDoc  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadPenCardDoc(){

            $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['pan_card']['name'])) {
                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('pan_card', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    
                }else{
                    $error_text = "Need file type should be pdf|png|jpeg|jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employee/employee/pan_card'));
                }

                if(!empty($res)){
                    $updateData = array(
                    'pan_card'    => trim($docurl),
                    'pan_card_status' => 'Completed',
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employee_id'   => $this->employee_id,
                    'employer_id'   => $this->employer_id,
                    'pan_card'    => trim($docurl),
                    'pan_card_status' => 'Completed',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
                }
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }
    }

    /* Aadhar card */
    /**
    * Sort Description.
    * function name: aadhaarCardDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function aadhaarCardDoc(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Aadhar Card";
        $data['page_heading']="Aadhar Card";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/aadhaar_card', $data);
    }

    /**
    * Sort Description.
    * function name: uploadAadhaarCard  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadAadhaarCard(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['aadhaar_card']['name']) || !empty($_FILES['aadhaar_card2']['name'])) {
            $dirPathThumb =  ''; 
            
            if(!empty($_FILES['aadhaar_card']['name'])){
                $doc_url = $this->Mod_Common->docFilePpload('aadhaar_card', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url)){
                    $docurl = $doc_url;
                
                }else{
                    $error_text = "Need file type should be pdf,jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/aadhaar_card'));
                }
            }

            if(!empty($_FILES['aadhaar_card2']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('aadhaar_card2', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;
                
                }else{
                    $error_text = "Need file type should be pdf,jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/aadhaar_card'));
                }
            }
            
            

            if(!empty($res)){
                $updateData = array(
                'aadhaar_card_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if(!empty($docurl)){
                     $updateData['aadhaar_card'] = trim($docurl);
                }
                if(!empty($docurl2)){
                     $updateData['aadhaar_card2'] = trim($docurl2);
                }

                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'aadhaar_card_status' => 'Completed',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if(!empty($docurl)){
                     $addData['aadhaar_card'] = trim($docurl);
                }
                if(!empty($docurl2)){
                     $addData['aadhaar_card2'] = trim($docurl2);
                }

                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }
    
    /* Permanent Address */
    /**
    * Sort Description.
    * function name: permanentAddress  
    * Details: Load view
    * @return: 
    * 
    */
    public function permanentAddress(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Permanent Address Proof";
        $data['page_heading']="Permanent Address Proof";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/permanent_address_proof', $data);
    }

    /**
    * Sort Description.
    * function name: uploadPermanentAddressProof  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadPermanentAddress(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['permanent_address_proof']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('permanent_address_proof', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf|png|jpeg|jpg";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/permanent_address_proof'));
            }

            if(!empty($res)){
                $updateData = array(
                'permanent_address_proof'  => trim($docurl),
                'permanent_address_proof_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'permanent_address_proof'    => trim($docurl),
                'permanent_address_proof_status' => 'Completed',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Passport front and rear */
    /**
    * Sort Description.
    * function name: passportFrontRear  
    * Details: Load view
    * @return: 
    * 
    */
    public function passportFrontRear(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Passport (Front & Rear pages))";
        $data['page_heading']="Passport (Front & Rear pages))";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/passport_front_rear', $data);
    }

    /**
    * Sort Description.
    * function name: uploadPassportFrontRear  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadPassportFrontRear(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        $dirPathThumb =  '';
        $docurl1 = ''; $docurl2 = '';

        extract($this->input->post());

        if(!empty($_FILES['passport_front']['name']) || !empty($_FILES['passport_rear']['name'])){
            
            if(!empty($_FILES['passport_front']['name']) && !empty($_FILES['passport_rear']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('passport_front', 'uploads/employee/others','DOC',$dirPathThumb);
                $doc_url2 = $this->Mod_Common->docFilePpload('passport_rear', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1) && !empty($doc_url2)){
                    $docurl1 = $doc_url1;
                    $docurl2 = $doc_url2;
                    if(!empty($passport_front_old) && !empty($passport_rear_old)){

                        $file1 = './uploads/employee/others/'.$passport_front_old;
                        unlink($file1);
                        $file2 = './uploads/employee/others/'.$passport_rear_old;
                        unlink($file2); 
                    }
                   
                }
            }else if(!empty($_FILES['passport_front']['name']) && empty($_FILES['passport_rear']['name'])){
                $doc_url1 = $this->Mod_Common->docFilePpload('passport_front', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url1)){
                    $docurl1 = $doc_url1;   
                }
                if(!empty($passport_front_old)){
                    $file1 = './uploads/employee/others/'.$passport_front_old;
                    unlink($file1);
                }
            }else if(!empty($_FILES['passport_rear']['name']) && empty($_FILES['passport_front']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('passport_rear', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;   
                }
                if(!empty($passport_rear_old)){
                    $file2 = './uploads/employee/others/'.$passport_rear_old;
                    unlink($file2); 
                }
            }else{
                $error_text = "Need file type should be png|jpg|jpeg";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/passport_front_rear'));
            }

        }else if(!empty($passport_front_old) || !empty($passport_rear_old)){
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));

        }else{
            $errors = 'File is not valid please try correct file type.';
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/employee/passport_front_rear'));
        }
        if($res){
            if(!empty($docurl1) && !empty($docurl2)){
                 $updateData = array(
                'passport_front'    => trim($docurl1),
                'passport_rear'    => trim($docurl2),
                'passport_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );
            }else if(!empty($docurl1) && empty($docurl2)){
                $updateData = array(
                'passport_front'    => trim($docurl1),
                'passport_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else if(!empty($docurl2) && empty($docurl1)){
                $updateData = array(
                'passport_rear'    => trim($docurl2),
                'passport_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

            }else{
                $updateData = array( 'passport_status' => 'Completed' );
            }

            $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $addData = array(
            'employee_id'   => $this->employee_id,
            'employer_id'   => $this->employer_id,
            'passport_front'    => trim($docurl1),
            'passport_rear'    => trim($docurl2),
            'passport_status' => 'Completed',
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
            );
            $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* last SalarySlip */
    /**
    * Sort Description.
    * function name: lastSalarySlip  
    * Details: Load view
    * @return: 
    * 
    */
    public function lastSalarySlip(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Last salary slip";
        $data['page_heading']="Last salary slip ";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/last_3_salary_slip', $data);
    }

    /**
    * Sort Description.
    * function name: uploadLastSalarySlip  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadLastSalarySlip(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['experience_salary_slip']['name']) || !empty($_FILES['experience_salary_slip2']['name']) || !empty($_FILES['experience_salary_slip3']['name'])) {
            $dirPathThumb =  '';

            if(!empty($_FILES['experience_salary_slip']['name'])){
                $doc_url = $this->Mod_Common->docFilePpload('experience_salary_slip', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    
                }else{
                    $error_text = "Need file type should be pdf, jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }

            if(!empty($_FILES['experience_salary_slip2']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('experience_salary_slip2', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;
                    
                }else{
                    $error_text = "Need file type should be pdf, jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }

            if(!empty($_FILES['experience_salary_slip3']['name'])){
                $doc_url3 = $this->Mod_Common->docFilePpload('experience_salary_slip3', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url3)){
                    $docurl3 = $doc_url3;
                    
                }else{
                    $error_text = "Need file type should be pdf, jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }
            

            if(!empty($res)){
                $updateData = array(
                'experience_salary_slip_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if(!empty($docurl)){
                    $updateData['experience_salary_slip'] = trim($docurl);
                }
                if(!empty($docurl2)){
                    $updateData['experience_salary_slip2'] = trim($docurl2);
                }
                if(!empty($docurl3)){
                    $updateData['experience_salary_slip3'] = trim($docurl3);
                }

                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'experience_salary_slip_status' => 'Completed',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if(!empty($docurl)){
                    $addData['experience_salary_slip'] = trim($docurl);
                }
                if(!empty($docurl2)){
                    $addData['experience_salary_slip2'] = trim($docurl2);
                }
                if(!empty($docurl3)){
                    $addData['experience_salary_slip3'] = trim($docurl3);
                }

                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Bank Statement */
    /**
    * Sort Description.
    * function name: bankStatement  
    * Details: Load view
    * @return: 
    * 
    */
    public function bankStatement(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Bank statement";
        $data['page_heading']="Bank statement ";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/bank_statement', $data);
    }

    /**
    * Sort Description.
    * function name: uploadBankStatement  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadBankStatement(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['bank_statement']['name']) || !empty($_FILES['bank_statement2']['name']) || !empty($_FILES['bank_statement3']['name'])) {
            $dirPathThumb =  '';

            if(!empty($_FILES['bank_statement']['name'])){

                $doc_url = $this->Mod_Common->docFilePpload('bank_statement', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url)){
                    $docurl = $doc_url;
                }else{
                    $error_text = "Need file type should be pdf,jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }
            if(!empty($_FILES['bank_statement2']['name'])){

                $doc_url2 = $this->Mod_Common->docFilePpload('bank_statement2', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;
                }else{
                    $error_text = "Need file type should be pdf,jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }
            if(!empty($_FILES['bank_statement3']['name'])){

                $doc_url3 = $this->Mod_Common->docFilePpload('bank_statement3', 'uploads/employee/others','DOC',$dirPathThumb);
                if(!empty($doc_url3)){
                    $docurl3 = $doc_url3;
                }else{
                    $error_text = "Need file type should be pdf,jpg";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/last_salary_slip'));
                }
            }

            

            if(!empty($res)){
                $updateData = array(
                'bank_statement'  => trim($docurl),
                'bank_statement_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if(!empty($docurl)){
                    $updateData['bank_statement'] = trim($docurl);
                }
                if(!empty($docurl2)){
                    $updateData['bank_statement2'] = trim($docurl2);
                }
                if(!empty($docurl3)){
                    $updateData['bank_statement3'] = trim($docurl3);
                }
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'bank_statement'    => trim($docurl),
                'bank_statement_status' => 'Completed',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Relieving Letter */
    /**
    * Sort Description.
    * function name: bankStatement  
    * Details: Load view
    * @return: 
    * 
    */
    public function relievingLetter(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Relieving Letter";
        $data['page_heading']="Relieving Letter";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/relieving_letter', $data);
    }

    /**
    * Sort Description.
    * function name: uploadRelievingLetter  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadRelievingLetter(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['relieving_letter']['name']) || !empty($_FILES['relieving_letter2']['name']) || !empty($_FILES['relieving_letter2']['name'])) {
            $dirPathThumb =  '';

            if(!empty($_FILES['relieving_letter']['name'])){
                $doc_url = $this->Mod_Common->docFilePpload('relieving_letter', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    
                }else{
                    $error_text = "Need file type should be pdf|xlsx|doc|docx";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/relieving_letter'));
                }
            }
            if(!empty($_FILES['relieving_letter2']['name'])){
                $doc_url2 = $this->Mod_Common->docFilePpload('relieving_letter2', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url2)){
                    $docurl2 = $doc_url2;
                    
                }else{
                    $error_text = "Need file type should be pdf|xlsx|doc|docx";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/relieving_letter'));
                }
            }
            if(!empty($_FILES['relieving_letter3']['name'])){
                $doc_url3 = $this->Mod_Common->docFilePpload('relieving_letter3', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url3)){
                    $docurl3 = $doc_url3;
                    
                }else{
                    $error_text = "Need file type should be pdf|xlsx|doc|docx";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employee/employee/relieving_letter'));
                }
            }
            

            if(!empty($res)){
                $updateData = array(
                'relieving_letter_status' => 'Completed',
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                if($docurl){
                    $updateData['relieving_letter'] = trim($docurl);
                }
                if($docurl2){
                    $updateData['relieving_letter2'] = trim($docurl2);
                }
                if($docurl3){
                    $updateData['relieving_letter3'] = trim($docurl3);
                }
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'relieving_letter_status' => 'Completed',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );

                if($docurl){
                    $addData['relieving_letter'] = trim($docurl);
                }
                if($docurl2){
                    $addData['relieving_letter2'] = trim($docurl2);
                }
                if($docurl3){
                    $addData['relieving_letter3'] = trim($docurl3);
                }

                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* revision Letter */
    /**
    * Sort Description.
    * function name: revisionLetter  
    * Details: Load view
    * @return: 
    * 
    */
    public function revisionLetter(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Revision Letter ";
        $data['page_heading']="Revision Letter ";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/revision_letter', $data);
    }

    /**
    * Sort Description.
    * function name: uploadRelievingLetter  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadRevisionLetter(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['revision_letter']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('revision_letter', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf|xlsx|doc|docx";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/relieving_letter'));
            }

            if(!empty($res)){
                $updateData = array(
                'revision_letter'  => trim($docurl),
                'revision_letter_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'revision_letter'    => trim($docurl),
                'revision_letter_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* incentive Proof */
    /**
    * Sort Description.
    * function name: incentiveProof  
    * Details: Load view
    * @return: 
    * 
    */
    public function incentiveProof(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Incentive Proofs";
        $data['page_heading']="Incentive Proofs";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/incentive_proof', $data);
    }

    /**
    * Sort Description.
    * function name: uploadRelievingLetter  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadIncentiveProof(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['incentive_proof']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('incentive_proof', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf|xlsx|doc|docx";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/incentive_proof'));
            }

            if(!empty($res)){
                $updateData = array(
                'incentive_proof'  => trim($docurl),
                'incentive_proof_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'incentive_proof'    => trim($docurl),
                'incentive_proof_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

     /* Experience Certificate */
    /**
    * Sort Description.
    * function name: experienceCertificate  
    * Details: Load view
    * @return: 
    * 
    */
    public function experienceCertificate(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Experience Certificate";
        $data['page_heading']="Experience Certificate";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/experience_certificate', $data);
    }

    /**
    * Sort Description.
    * function name: uploadExperienceCertificate  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadExperienceCertificate(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['experience_certificate']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('experience_certificate', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf|xlsx|doc|docx";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/experience_certificate'));
            }

            if(!empty($res)){
                $updateData = array(
                'experience_certificate'  => trim($docurl),
                'experience_certificate_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'experience_certificate'    => trim($docurl),
                'experience_certificate_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* Form 16 */
    /**
    * Sort Description.
    * function name: form16  
    * Details: Load view
    * @return: 
    * 
    */
    public function form16(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Form 16";
        $data['page_heading']="Form 16";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/form_16', $data);
    }

    /**
    * Sort Description.
    * function name: uploadform16  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadform16(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['form_16']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('form_16', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf|xlsx|doc|docx";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/form_16'));
            }

            if(!empty($res)){
                $updateData = array(
                'form_16'  => trim($docurl),
                'form_16_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'form_16'    => trim($docurl),
                'form_16_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

    /* EPF UAN number */
    /**
    * Sort Description.
    * function name: epfUanNumber  
    * Details: Load view
    * @return: 
    * 
    */
    public function epfUanNumber(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="EPF Number/ UAN";
        $data['page_heading']="EPF Number/ UAN";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/EPF_UAN', $data);
    }

    /**
    * Sort Description.
    * function name: uploadEpfUanNumber  
    * Details: add record
    * @return: 
    * 
    */
    public function uploadEpfUanNumber(){

        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id));

        $docurl = '';
        $asset_type = "DOC";
        if (!empty($_FILES['EPF_UAN_number']['name'])) {
            $dirPathThumb =  ''; 
            $doc_url = $this->Mod_Common->docFilePpload('EPF_UAN_number', 'uploads/employee/others','DOC',$dirPathThumb);

            if(!empty($doc_url)){
                $docurl = $doc_url;
                
            }else{
                $error_text = "Need file type should be pdf | png | jpg | jpeg";
                $this->session->set_flashdata('errorclass', 'danger');
                $this->session->set_flashdata('error_message', $error_text);
                //$this->template->load('default', 'slider/add_slider', $this->data);
                redirect(base_url('employee/employee/EPF_UAN'));
            }

            if(!empty($res)){
                $updateData = array(
                'EPF_UAN_number'  => trim($docurl),
                'EPF_UAN_number_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->updateData('hs_employee_document', array('doc_id'=>$res->doc_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
            }else{
                $addData = array(
                'employee_id'   => $this->employee_id,
                'employer_id'   => $this->employer_id,
                'EPF_UAN_number'    => trim($docurl),
                'EPF_UAN_number_status' => (!empty($docurl) ? 'Completed' : 'Pending'),
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
                );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);
            }
            
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }else{
            $errors = $this->lang->line('msg_updated_record');
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'success');
            redirect(base_url('employee/employee/doc-list'));
        }
    }

}
?>