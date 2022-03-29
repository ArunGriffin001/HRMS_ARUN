<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Teammember extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        $this->load->model('Blog_model');
        $this->load->model('comman/Comman_model');
    }

    public function index(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Teammemeber";
        $this->superadmin_template->load('superadmin_template','superadmin/teammember/list', $data);
    }
function list()
{
     $data['header_title']="HRMS - Soylent Corp";
     $data['page_title_top']="Team Memeber";
      $data['page_heading']="Team Memeber List";
     $data["team_member"]=$this->Comman_model->get_all_record("team_member");
     $this->superadmin_template->load('superadmin_template','superadmin/teammember/list', $data);
}
/**********************   ADD BLOG TAG SECTION ************************/
    /**
    * Sort Description.
    * function name:  add Team Memeber  
    * Details: sload add form
    * @return: 
    * 
    */
    public function add(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Team Memeber";
        $data['page_heading']="Add Team Memeber";
        $this->form_validation->set_rules('name', 'title','trim|required');
        $this->form_validation->set_rules('role_name', 'Link name','trim|required');
        $this->form_validation->set_rules('facebook_link', 'Link name','trim|required');
        $this->form_validation->set_rules('twitter_link', 'Link name','trim|required');
        $this->form_validation->set_rules('youtube_link', 'Link name','trim|required');
        $this->form_validation->set_rules('linkedin_link', 'Link name','trim|required');
        
      //  $this->form_validation->set_rules('images', 'Images','required');        
        if ($this->form_validation->run() == FALSE) 
        {
        $this->superadmin_template->load('superadmin_template','superadmin/teammember/add', $data);
        }else{

           extract($this->input->post());
            //echo $slug; die;
        
            if(!empty($_FILES['picture'])){
             $product_image=$this->Comman_model->SingleImageUpload('picture','./uploads/images/team_member'); 
             $product_image = json_decode($product_image); 
             $file_name=  $product_image->file_name;
             }
             
             if(empty($file_name))
             {
                $errors = 'Image Not Uploads something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//team-member/add'));
             }
             $link=array("facebook_link"=>$facebook_link,"twitter_link"=>$twitter_link,"youtube_link"=>$youtube_link,"linkedin_link"=>$linkedin_link);

            $addedData = array(
                    'name'         => $name,
                    'role_name'         => $role_name,
                    'social_links'         => json_encode($link),
                    'picture'         => $file_name,
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $media_parners = $this->Comman_model->insert_data('team_member', $addedData);
            if($media_parners){
                $errors = 'Team Memeber added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin//team-member/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//team-member/list'));
            }   
        }
    }

    
    /**
    * Sort Description.
    * function name:  editTag  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function update($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Team Memeber";
        $data['page_heading']="Update Team Memeber";
        $record = rowData('media_parners', array('id'=>decode($id)));
        $data['record'] = $record;
         $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('link', 'Link name','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
        $this->superadmin_template->load('superadmin_template','superadmin/teammember/edit', $data);
         }else{
            extract($this->input->post());
            //echo $slug; die;
            $updatedData = array(
                    'title'         => $title,
                    'link'         => $link,
                    'updated_at'    => date('Y-m-d h:i:s'));
        
            if(!empty($_FILES['images'])){
             $product_image=$this->Comman_model->SingleImageUpload('images','./uploads/images/media_parners'); 
             $product_image = json_decode($product_image); 
             $file_name=  $product_image->file_name;
             }
             
             if(!empty($file_name))
             {
            $updatedData["images"]=$file_name;
             }
             $where["id"]=$id;

            $media_parners = $this->Comman_model->update_data('media_parners', $updatedData,$where);
            if($media_parners){
                $errors = 'Team Memeber Updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin//team-member/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//team-member/list'));
            } 
          }
    }

     public function delete($id) {
      $where=array('id'=>decode($id));
      $this->Comman_model->delete_data('team_member', $where); 
      $errors = 'Team Memeber deleted successfully';
      $this->session->set_flashdata('error_message', $errors);
      $this->session->set_flashdata('errorclass', 'success');
      redirect(base_url('superadmin//team-member/list'));
    }

       /**
    * Sort Description.
    * function name:  updateTag  
    * Details: update tag value
    * @return: true/false
    * 
    */
    
}