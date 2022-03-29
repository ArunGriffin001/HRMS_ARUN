<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mediaparners extends MX_Controller  {
 
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
        $data['page_title_top']="Blogs";
        $this->superadmin_template->load('superadmin_template','superadmin/mediaparners/list', $data);
    }
function list()
{
     $data['header_title']="HRMS - Soylent Corp";
     $data['page_title_top']="Media Partner";
      $data['page_heading']="Media Partner List";
     $data["media_parners"]=$this->Comman_model->get_all_record("media_parners");
     $this->superadmin_template->load('superadmin_template','superadmin/mediaparners/list', $data);
}
/**********************   ADD BLOG TAG SECTION ************************/
    /**
    * Sort Description.
    * function name:  add Media Parners  
    * Details: sload add form
    * @return: 
    * 
    */
    public function add(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Media Partner";
        $data['page_heading']="Add Media Partner";
        $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('link', 'Link name','trim|required');
      //  $this->form_validation->set_rules('images', 'Images','required');        
        if ($this->form_validation->run() == FALSE) 
        {
        $this->superadmin_template->load('superadmin_template','superadmin/mediaparners/add', $data);
        }else{
           extract($this->input->post());
            //echo $slug; die;
        
            if(!empty($_FILES['images'])){
             $product_image=$this->Comman_model->SingleImageUpload('images','./uploads/images/media_parners'); 
             $product_image = json_decode($product_image); 
             $file_name=  $product_image->file_name;
             }
             
             if(empty($file_name))
             {
                $errors = 'Image Not Uploads something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//media-parners/add'));
             }

            $addedData = array(
                    'title'         => $title,
                    'link'         => $link,
                    'images'         => $file_name,
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $media_parners = $this->Comman_model->insert_data('media_parners', $addedData);
            if($media_parners){
                $errors = 'Media Partner added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin//media-parners/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//media-parners/list'));
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
        $data['page_title_top']="Media Partner";
        $data['page_heading']="Update Media Partner";
        $record = rowData('media_parners', array('id'=>decode($id)));
        $data['record'] = $record;
         $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('link', 'Link name','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
        $this->superadmin_template->load('superadmin_template','superadmin/mediaparners/edit', $data);
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
                $errors = 'Media Partner Updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin//media-parners/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin//media-parners/list'));
            }   

         }
    }

     public function delete($id) {
      $where=array('id'=>decode($id));
      $this->Comman_model->delete_data('media_parners', $where); 
      $errors = 'Media Partner deleted successfully';
      $this->session->set_flashdata('error_message', $errors);
      $this->session->set_flashdata('errorclass', 'success');
      redirect(base_url('superadmin//media-parners/list'));
    }

       /**
    * Sort Description.
    * function name:  updateTag  
    * Details: update tag value
    * @return: true/false
    * 
    */
    
}