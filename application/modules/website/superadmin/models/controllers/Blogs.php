<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        $this->load->model('Blog_model');
    }

    public function index(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Blogs";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/list/list', $data);
    }

/**********************   ADD BLOG TAG SECTION ************************/
    /**
    * Sort Description.
    * function name:  addTag  
    * Details: sload add form
    * @return: 
    * 
    */
    public function addTag(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Tags";
        $data['page_heading']="Add Tag";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/tag_list/add', $data);
    }

    /**
    * Sort Description.
    * function name:  submmitTag  
    * Details: stro record in DB
    * @return: id
    * 
    */
    public function submmitTag(){
        
        $this->form_validation->set_rules('title', 'Tag name','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/blog-tag/add'));
        }
        else
        {
            extract($this->input->post());
            //echo $slug; die;
            $addedData = array(
                    'title'         => trim($title),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $tag_id = $this->Mod_Common->insertData('hs_blog_tag', $addedData);
            if($tag_id){
                $errors = 'Tag added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/blog-tag/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/blog-tag/add'));
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
    public function tagList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Tags";
        $data['page_sub_heading']="Tag List";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/tag_list/list', $data);
    }
    /**
    * Sort Description.
    * function name:  tagAjaxlist  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function tagAjaxlist(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='title';
            }else if($order[0]['column']==2){
                $column_name='status';
            }else if($order[0]['column']==3){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Blog_model->tagAjaxlist(true);
        $getRecordListing = $this->Blog_model->tagAjaxlist(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= $recordData->title;
                    $recordListing[$i][2] = date('Y-m-d', strtotime($recordData->created_at));;
                    $table = TABLE_BLOG_TAG;
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
                    $recordListing[$i][3]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'blog-tag/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][4] = $actionLink;
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
    * function name:  editTag  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function editTag($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Tags";
        $data['page_heading']="Edit Tag";
        $record = rowData(TABLE_BLOG_TAG, array('id'=>decode($id)));
        $data['record'] = $record;
        $this->superadmin_template->load('superadmin_template','superadmin/blog/tag_list/edit', $data);
    }

       /**
    * Sort Description.
    * function name:  updateTag  
    * Details: update tag value
    * @return: true/false
    * 
    */
    public function updateTag($id){
        
        $this->form_validation->set_rules('title', 'Tag name','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url(ADMIN_URL).'blog-tag/edit/'.$id);
        }
        else
        {
            extract($this->input->post());
            //echo $slug; die;
            $updatedData = array(
                    'title'         => trim($title),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $tag_id = $this->Mod_Common->updateData(TABLE_BLOG_TAG,array('id'=>decode($id)), $updatedData);
            if($tag_id){
                $errors = 'Tag name updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url(ADMIN_URL).'blog-tag/list/');
            }else{
                $errors = 'Record not update something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url(ADMIN_URL).'blog-tag/edit/'.$id);
            }
        }
    }


    /**********************   ADD BLOG CATEGORY SECTION ************************/
    /**
    * Sort Description.
    * function name:  addTag  
    * Details: sload add form
    * @return: 
    * 
    */
    public function addCat(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Category";
        $data['page_heading']="Add Category";
        $data['page_sub_heading']="Category List";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/category_list/add', $data);
    }

    /**
    * Sort Description.
    * function name:  submmitTag  
    * Details: store record in DB
    * @return: id
    * 
    */
    public function submitCat(){
        
        $this->form_validation->set_rules('title', 'category name','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/blog-cat/add'));
        }
        else
        {
            extract($this->input->post());
            //echo $slug; die;
            $addedData = array(
                    'title'         => trim($title),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $tag_id = $this->Mod_Common->insertData(TABLE_BLOG_CATEGORY, $addedData);
            if($tag_id){
                $errors = 'Category added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/blog-cat/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/blog-cat/add'));
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
    public function catList(){
        $data['header_title']       = "HRMS - Soylent Corp";
        $data['page_title_top']     = "Category";
        $data['page_heading']       = "Add Category";
        $data['page_sub_heading']   = "Category List";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/category_list/list', $data);
    }
    /**
    * Sort Description.
    * function name:  tagAjaxlist  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function catAjaxlist(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='title';
            }else if($order[0]['column']==2){
                $column_name='status';
            }else if($order[0]['column']==3){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Blog_model->catAjaxlist(true);
        $getRecordListing = $this->Blog_model->catAjaxlist(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= $recordData->title;
                    $recordListing[$i][2] = date('Y-m-d', strtotime($recordData->created_at));;
                    $table = TABLE_BLOG_CATEGORY;
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
                    $recordListing[$i][3]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'blog-cat/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][4] = $actionLink;
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
    * function name:  editTag  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function editCat($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Category";
        $data['page_heading']="Edit category";
        $record = rowData(TABLE_BLOG_CATEGORY, array('id'=>decode($id)));
        $data['record'] = $record;
        $this->superadmin_template->load('superadmin_template','superadmin/blog/category_list/edit', $data);
    }

    /**
    * Sort Description.
    * function name:  editTag  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function updateCat($id){
        
        $this->form_validation->set_rules('title', 'Category name','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url(ADMIN_URL).'blog-cat/edit/'.$id);
        }
        else
        {
            extract($this->input->post());
            //echo $slug; die;
            $updatedData = array(
                    'title'         => trim($title),
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $tag_id = $this->Mod_Common->updateData(TABLE_BLOG_CATEGORY,array('id'=>decode($id)), $updatedData);
            if($tag_id){
                $errors = 'Category updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url(ADMIN_URL).'blog-cat/list/');
            }else{
                $errors = 'Record not update something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url(ADMIN_URL).'blog-cat/edit/'.$id);
            }
        }
    }

    /**********************   ADD BLOG SECTION ************************/
    /**
    * Sort Description.
    * function name: addBlog  
    * Details: load add form
    * @return: 
    * 
    */
    public function addBlog(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Blogs";
        $data['page_heading']="Add Blog";
        $blog_cat_arr = $this->Mod_Common->selectData(TABLE_BLOG_CATEGORY,array('status'=>'Active'));
        $blog_tag_arr = $this->Mod_Common->selectData(TABLE_BLOG_TAG,array('status'=>'Active'));
        $data['blog_cat_arr'] = $blog_cat_arr;
        $data['blog_tag_arr'] = $blog_tag_arr;
        $this->superadmin_template->load('superadmin_template','superadmin/blog/list/add', $data);
    }

    /**
    * Sort Description.
    * function name:  submitBlog  
    * Details: stro record in DB
    * @return: id
    * 
    */
    public function submitBlog(){
        
        $this->form_validation->set_rules('title', 'title','trim|required'
        );
        $this->form_validation->set_rules('category_id[]', 'Category','trim|required'
        );
        $this->form_validation->set_rules('tag_id[]', 'Tag','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
           
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/blog/add'));
        }
        else
        {
            extract($this->input->post());
            //echo $ ; die;
                $blog_slug      = url_title($title, 'dash', true);
                $check_blog = $this->Mod_Common->rowData(TABLE_BLOG, array('blog_slug' => $blog_slug));
              /*  echo'<pre>';
                print_r($check_blog);
                echo'</pre>';
                die;*/
                $blogslug = $blog_slug;
                if(!empty($check_blog)){
                    $blogslug = $blog_slug.'-'.rand(10,200);
                }
                $asset_type = MEDIA_PICTURE;
                if (!empty($_FILES['blog_img']['name'])) {
                    $dirPathThumb =  './uploads/superadmin/blogs/blog_thumb/'; 
                    $blogimage = $this->Mod_Common->fileupload_resize('blog_img', 'uploads/superadmin/blogs/','Picture',$dirPathThumb,'320','100');

                    if(!empty($blogimage)){
                        $blog_image = $blogimage;
                    }else{
                        $error_text = "Need file type should be $asset_type";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        //$this->template->load('default', 'slider/add_slider', $this->data);
                        redirect(base_url(ADMIN_URL).'blog/add');
                    }
                }
                
                $blog_slug      = url_title($title, 'dash', true);
                $add_date       = date('Y-m-d h:i:s');
                $addedData      = array(
                    'title'         => $title,
                    'description'   => $editor1,
                    'blog_img'      => $blog_image,
                    'blog_slug'     => $blogslug,
                    'post_by'       => 1,
                    'category_id'   => json_encode($category_id),
                    'tag_id'         => json_encode($tag_id),
                    'created_at'    => $add_date,
                    'updated_at'    => $add_date,
                );
            
            $blog_id = $this->Mod_Common->insertData(TABLE_BLOG, $addedData);
           
            if($blog_id){

                /* Blog category option*/
                foreach ($category_id as $key => $blog_val) 
                {
                    $batch_cat_option_array[] = array('blog_id'=>$blog_id,'cat_id'=>$blog_val,'created_at'=>$add_date,'updated_at'=>$add_date);
                }
                if(!empty($batch_cat_option_array))
                {
                    $this->Mod_Common->insertbatchdata(TABLE_BLOG_CAT_OPTION, $batch_cat_option_array);
                }

                /* Blog tag option*/
                foreach ($tag_id as $key => $tag_val) 
                {
                    $batch_tag_option_array[] = array('blog_id'=>$blog_id,'blog_tag_id'=>$tag_val,'created_at'=>$add_date,'updated_at'=>$add_date);
                }

                if(!empty($batch_cat_option_array))
                {
                    $this->Mod_Common->insertbatchdata(TABLE_BLOG_TAG_OPTION ,$batch_tag_option_array);
                }

                $errors = 'Blog added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/blog/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/blog/add'));
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
    public function blogList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Blogs";
        $data['page_sub_heading']="Blog List";
        $this->superadmin_template->load('superadmin_template','superadmin/blog/list/list', $data);
    }

    /**
    * Sort Description.
    * function name:  blogAjaxList  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function blogAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_blog_management.title';
            }else if($order[0]['column']==3){
                $column_name='hs_blog_category.title';
            }else if($order[0]['column']==4){
                $column_name='hs_blog_tag.title';
            }else if($order[0]['column']==5){
                $column_name='hs_blog_management.status';
            }else if($order[0]['column']==6){
                $column_name='hs_blog_management.created_at';
            }else{
                $column_name='hs_blog_management.id';
            }
        }
        $totalRecord      = $this->Blog_model->blogAjaxList(true);
        $getRecordListing = $this->Blog_model->blogAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
        /*echo'<pre>';
        print_r($getRecordListing);
        echo'</pre>';
        die;  */    
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $img = $recordData->blog_img;
                    $recordListing[$i][2]= '<img src="'.base_url().'uploads/superadmin/blogs/'.$img.'" width=50>';
                     $recordListing[$i][1]= $recordData->blog_title;
                    $cate_id = implode(",", (json_decode($recordData->category_id)));
                    $query = "SELECT * FROM hs_blog_category WHERE `id` IN($cate_id)";
                    $cat_id_arr = $this->Mod_Common->customQuery($query);
                    $car_name = array_column($cat_id_arr, 'title');
                    $recordListing[$i][3]= implode(',', $car_name);

                    $tag_id = implode(",", (json_decode($recordData->tag_id)));
                    $query2 = "SELECT * FROM hs_blog_tag WHERE `id` IN($tag_id)";
                    $tag_id_arr = $this->Mod_Common->customQuery($query2);
                    $tag_name = array_column($tag_id_arr, 'title');
                    $recordListing[$i][4]= implode(',', $tag_name);
                    $recordListing[$i][5] = date('Y-m-d', strtotime($recordData->created_at));
                   
                    $table = TABLE_BLOG;
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
                    $recordListing[$i][6]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'blog/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][7] = $actionLink;
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
    public function editBlog($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Blog";
        $data['page_heading']="Edit Blog";
        $record = rowData(TABLE_BLOG, array('id'=>decode($id)));
        $blog_cat_arr = $this->Mod_Common->selectData(TABLE_BLOG_CATEGORY,array('status'=>'Active'));
        $blog_tag_arr = $this->Mod_Common->selectData(TABLE_BLOG_TAG,array('status'=>'Active'));
        $data['blog_cat_arr'] = $blog_cat_arr;
        $data['blog_tag_arr'] = $blog_tag_arr;
        $data['record'] = $record;

        $blog_cat_option_arr = $this->Mod_Common->selectData(TABLE_BLOG_CAT_OPTION, array('blog_id'=>decode($id)));
        $blog_tag_option_arr = $this->Mod_Common->selectData(TABLE_BLOG_TAG_OPTION, array('blog_id'=>decode($id)));

        /*echo'<pre>';
        print_r($blog_cat_option_arr);
        print_r($blog_tag_option_arr);
        echo'</pre>';
        die;*/

        $data['blog_cat_option'] = $blog_cat_option_arr;
        $data['blog_tag_option'] = $blog_tag_option_arr;

        $this->superadmin_template->load('superadmin_template','superadmin/blog/list/edit', $data);
    }

       /**
    * Sort Description.
    * function name:  updateBlog  
    * Details: update blog value
    * @return: true/false
    * 
    */
    public function updateBlog($id){
        
        $this->form_validation->set_rules('title', 'title','trim|required'
        );
        $this->form_validation->set_rules('category_id[]', 'Category','trim|required'
        );
        $this->form_validation->set_rules('tag_id[]', 'Tag','trim|required'
        );
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
           
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/blog/edit/'.$id));
        }
        else
        {
            extract($this->input->post());
            //echo $ ; die;
               
              /*  echo'<pre>';
                print_r($check_blog);
                echo'</pre>';
                die;*/
               
                $asset_type = MEDIA_PICTURE;
                if (!empty($_FILES['blog_img']['name'])) {
                    $dirPathThumb =  './uploads/superadmin/blogs/blog_thumb/'; 
                    $blogimage = $this->Mod_Common->fileupload_resize('blog_img', 'uploads/superadmin/blogs/','Picture',$dirPathThumb,'320','100');

                    if(!empty($blogimage)){
                        $blog_image = $blogimage;

                        $path = './uploads/superadmin/blogs/'.$old_img;
                        unlink($path);
                        $path_thumb = './uploads/superadmin/testimonial/blog_thumb/'.$old_img;
                        unlink($path_thumb);
                    }else{
                        $error_text = "Need file type should be $asset_type";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        //$this->template->load('default', 'slider/add_slider', $this->data);
                        redirect(base_url(ADMIN_URL).'blog/edit/'.$id);
                    }
                }else{
                    $blog_image = $old_img;
                }
                
                $add_date       = date('Y-m-d h:i:s');
                $updateData      = array(
                    'title'         => $title,
                    'description'   => $editor1,
                    'blog_img'      => $blog_image,
                    'post_by'       => 1,
                    'category_id'   => json_encode($category_id),
                    'tag_id'        => json_encode($tag_id),
                    'updated_at'    => $add_date,
                );
            
            $update_id = $this->Mod_Common->updateData(TABLE_BLOG, array('id' =>decode($id)), $updateData);
            if($update_id){
                $cat_opt_id = $this->Mod_Common->deleteData(TABLE_BLOG_CAT_OPTION, array('blog_id' => decode($id)));
                $cat_opt_id = $this->Mod_Common->deleteData(TABLE_BLOG_TAG_OPTION, array('blog_id' => decode($id)));
                /* Blog category option*/
                foreach ($category_id as $key => $blog_val) 
                {
                    $batch_cat_option_array[] = array('blog_id'=>decode($id),'cat_id'=>$blog_val,'created_at'=>$add_date,'updated_at'=>$add_date);
                }
                if(!empty($batch_cat_option_array))
                {
                    $this->Mod_Common->insertbatchdata(TABLE_BLOG_CAT_OPTION, $batch_cat_option_array);
                }

                /* Blog tag option*/
                foreach ($tag_id as $key => $tag_val) 
                {
                    $batch_tag_option_array[] = array('blog_id'=>decode($id),'blog_tag_id'=>$tag_val,'created_at'=>$add_date,'updated_at'=>$add_date);
                }

                if(!empty($batch_cat_option_array))
                {
                    $this->Mod_Common->insertbatchdata(TABLE_BLOG_TAG_OPTION ,$batch_tag_option_array);
                }

                $errors = 'Blog updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/blog/list/'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/blog/edit/'.$id));
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