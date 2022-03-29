<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Comman_model extends CI_Model {	
	  public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
  
 function query($q)
  {
    $query = $this->db->query($q);   
    if($query->num_rows()>0){
      $result=$query->result_array();
      return $result;
    }
    else{
      return false; 
    }
  }    

  function insert_data($table,$data)
	{
        $this->db->insert($table,$data);
        if($this->db->affected_rows()>0){
		return $this->db->insert_id();
		}else{
			return false;
		}
	}
    function insert_batch($table,$data)
    {
        $this->db->insert_batch($table,$data);
        return $this->db->affected_rows();              
    }

	function update_data($table_name,$data,$where)
	{
       return $this->db->update($table_name, $data, $where);		
	}
	function get_all_record($table,$where=array()) {

       $this->db->select('*');
		   $this->db->from($table);
		   $this->db->where($where);
       $query = $this->db->get();   
		   return $query->result_array();
	}
	function delete_data($table,$where)
	{   
       if(!empty($where)){
		$this->db->where($where);
		$this->db->delete($table); 		
		return $this->db->affected_rows();		
		}else{
		return false;
		}
	}
    function get_record_array($table,$where=array()) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();   
        return $query->result_array();
    }

        function get_record_single($table,$where=array()) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();   
        return $query->row();
    }
    
	function set_upload_options()
	{   
    //upload an image options
    $config = array();
    $imagePrefix = time(); 
	   $imagename = $imagePrefix;
    $config['allowed_types'] = '*';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;
    $config['file_name'] = $imagename; // set the name here
    return $config;
}
function MultipleImageUpload($filefieldname,$uploadpath='/images/gallery/')
{
    

	$this->load->library('upload');
    $dataInfo = array();
    
    if(isset($_FILES[$filefieldname]['name']) && $_FILES[$filefieldname]['name']!='')
     {
        $files = $_FILES;
        $cpt = count($_FILES[$filefieldname]['name']);
        for($i=0; $i<$cpt; $i++)
        {           
        $_FILES[$filefieldname]['name']= $files[$filefieldname]['name'][$i];
        $_FILES[$filefieldname]['type']= $files[$filefieldname]['type'][$i];
        $_FILES[$filefieldname]['tmp_name']= $files[$filefieldname]['tmp_name'][$i];
        $_FILES[$filefieldname]['error']= $files[$filefieldname]['error'][$i];
        $_FILES[$filefieldname]['size']= $files[$filefieldname]['size'][$i];    

        $config=$this->set_upload_options();
        if(strpos(getcwd(),'V1')!==false){
              $dire=str_replace("V1",'resources',getcwd()).$uploadpath;
            }else{
                $dire=getcwd().'/resources'.$uploadpath;  
            }

        $config['upload_path'] = '../resources'.$uploadpath;
        
        $this->upload->initialize($config);
        if($this->upload->do_upload($filefieldname))
        {
        $dataInfo[] = $this->upload->data();
        }else{
            $dataInfo[] = $this->upload->display_errors();
            die($this->upload->display_errors());
        }
        }
        $data=array();
        for($i=0;$i<count($dataInfo);$i++){
      //  $this->resizeImage( $dataInfo[$i]['file_name'],'../resources'.$uploadpath."/");
       compress($dataInfo[$i]['file_name'],$dataInfo[$i]['file_name'],90,'../resources'.$uploadpath."/");   
        $data[$i]['file_name'] = $dataInfo[$i]['file_name'];
        }
        return json_encode($data);
    }
    else{
        return false;
    }    
    
}
function SingleImageUpload($filefieldname,$uploadpath='../resources/images/events/')
{
	$this->load->library('upload');
	$dataInfo = array();
 	$files = $_FILES;
    $config=$this->set_upload_options();
    $config['upload_path'] = $uploadpath;
    $this->upload->initialize($config);   	
    if(!$this->upload->do_upload($filefieldname))
    {
     //   print_r($this->upload->display_errors());
    //die;
        //return $this->upload->display_errors();    
        return FALSE;    
    }
    $dataInfo = $this->upload->data();
    
    //$this->resizeImage($dataInfo['file_name'],$uploadpath);
    return json_encode(array("file_name"=>$dataInfo['file_name']));
}

 public function resizeImage($filename,$uploadpath)
   {
      // $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
      // $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $source_path = $uploadpath . $filename;
      $target_path = $uploadpath;
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          "create_thumb"=>FALSE,
          "quality"=>'70%',
          'width' => 300,
          'height' => 300,
          'rotation_angle' => 'auto',
      );

   
      $this->load->library('image_lib');
      $this->image_lib->clear();
      $this->image_lib->initialize($config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
   
      $this->image_lib->clear();
   }	
}//close model