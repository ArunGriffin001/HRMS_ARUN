<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mod_Common extends CI_Model {

		function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL)
		{
			$checLang = $this->clean($string); 
		    $slug = url_title($string); 
		    if ($checLang!='') {
		    	$slug = strtolower($slug);
		    }
		    $i = 0;
		    $params = array ();
		    $params[$field] = $slug;
		 
		    if($key)$params["$key !="] = $value;
		 
		    while ($this->db->where($params)->get($table)->num_rows())
		    {  
		        if (!preg_match ('/-{1}[0-9]+$/', $slug ))
		            $slug .= '-' . ++$i;
		        else
		            $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
		         
		        $params [$field] = $slug;
		    }  
		    return $slug;  
		} 
		public function clean($string) {
		   return preg_replace('/[^A-Za-z\-]/', '', $string); // Removes special chars.
		}
		public function insertbatchdata($table,$data) 
		{
	        $res = $this->db->insert_batch($table,$data);
	        if($res)
	        {
	            return TRUE;
	        }
	        else
	        {
	            return FALSE;
	        }
	    }
		public function selectData($tableName, $condition=array(), $fields='*',$orderby = "", $ordertype = "")
		{
			$this->db->select($fields);

			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}

			/*Get Data form table*/
			$this->db->from($tableName);
			if($orderby != ''){
				$this->db->order_by($orderby, $ordertype);
			}

			$query = $this->db->get();	
			$result = $query->result();

			return $result;
		}
		public function rowData($tableName, $condition=array(), $fields='*')
		{
			$this->db->select($fields);

			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}

			/*Get Data form table*/
			$this->db->from($tableName);

			$query = $this->db->get();	
			$result = $query->row();

			return $result;
		}
		
		public function countRows($tableName, $condition=array(), $fields='*')
		{
			$this->db->select($fields);

			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}

			/*Get Data form table*/
			$this->db->from($tableName);

			$query = $this->db->get();	
			$result = $query->num_rows();

			return $result;
		}
		
		public function insertData($tableName, $data)
		{

			$this->db->insert($tableName, $data);
			
			return $this->db->insert_id();
		}
		
		public function updateData($tableName, $condition=array(), $data)
		{
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			$this->db->update($tableName, $data);
			return true;
		}
		
		public function customQuery($query)
		{
			$query = $this->db->query($query);
			$result = $query->result();
			
			return $result;
		}


		public function alterDbQuery($query)
		{
			$query = $this->db->query($query);
			return true;
		}
	
		public function deleteData($tableName, $condition=array())
		{
			if (!empty($condition) && $condition!='')  {
				$this->db->where($condition);
			}
			$this->db->delete($tableName);
			return true;
		}
		public function joinTwoTable($select, $fromTable, $fromTable2, $condition, $where1, $where2)
		{
			$this->db->select($select);
         	$this->db->from($fromTable);
         	$this->db->join($fromTable2, $condition);
         	$this->db->where($where1,$where2);
			$query = $this->db->get();

			$result = $query->result();

			return $result;
		}
		public function getConfigValueByKey($key)
		{
			$this->db->select('metaValue');
			$this->db->from('site_config');
			$this->db->where('metaKey', $key);
			$query = $this->db->get();	
			$result = $query->row();
			if (!empty($result)>0) {
				$result = explode(',', $result->metaValue);
			}
			return $result;
		}
		public function selectMaxData($tableName, $fields)
		{
			$this->db->select_max($fields);
			$result = $this->db->get($tableName)->row();  
			return $result->$fields;
		}
		public function selectDataOrderBy($tableName, $condition=array(),$sortBy,$orderBy, $fields='*')
		{
			$this->db->select($fields);
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			/*Get Data form table*/
			$this->db->from($tableName);
			$this->db->order_by($sortBy,$orderBy);
			$query = $this->db->get();	
			$result = $query->result();
			return $result;
		}
		public function selectAllDataOrderBy($tableName,$sortBy,$orderBy, $fields='*')
		{
			$this->db->select($fields);
			/*Get Data form table*/
			$this->db->from($tableName);
			$this->db->order_by($sortBy,$orderBy);
			$query = $this->db->get();	
			$result = $query->result();
			return $result;
		}

		public function getUserPageMeta($tableName, $condition=array())
		{	
			$data = new stdClass;
			$data->metaKeyword = '';
			$data->metaDescription = '';

			if ($tableName !='') {
				if (!empty($condition) || $condition!='') {
					$this->db->where($condition);
				}
				$this->db->from($tableName);
				$q = $this->db->get();
				
				$d = $q->row();
				if (!empty($d)) {
					$data->metaKeyword = $d->userName.', '.$d->firstName.' '.$d->lastName.', '.$d->currentLocation;
					$data->metaDescription = $d->bio;
				}
			}
			return $data;
		}
		public function getCategoryPageMeta($tableName, $condition=array())
		{
			$data = new stdClass;
			$data->metaKeyword = '';
			$data->metaDescription = '';

			if ($tableName !='') {
				if (!empty($condition) || $condition!='') {
					$this->db->where($condition);
				}
				$this->db->from($tableName);
				$q = $this->db->get();
				
				$d = $q->row();
				if (!empty($d)) {
					$data->metaKeyword = $d->catTags;
					$data->metaDescription = $d->catDescription;
				}
			}
			return $data;
		}
		public function getSinglePostPageMeta($tableName, $condition=array())
		{
			$data = new stdClass;
			$data->metaKeyword = '';
			$data->metaDescription = '';

			if ($tableName !='') {
				if (!empty($condition) || $condition!='') {
					$this->db->where($condition);
				}
				$this->db->from($tableName);
				$q = $this->db->get();
				
				$d = $q->row();
				if (!empty($d)) {
					$data->metaKeyword = ($d->metaKeyword=='') ? $d->tags : $d->metaKeyword;
					$data->metaDescription = ($d->metaDescription=='') ? $d->shortDescription : $d->metaDescription;
				}
			}
			return $data;
		}

		///////
		public function encryptPassword($password, $key='')
		{
			$buffer = $password; 
		    
		    // very simple ASCII key and IV
		    if ($key=='') {
		    	$key = $this->createRandomString(24);
		    }
		    // hex encode the return value
		  	$ciphertext_dec = password_hash($buffer.'$'.$key, PASSWORD_DEFAULT);
		  	$returnData = array(
		  			'cipherText'=>$ciphertext_dec,
		  			'HashKey'=>$key
		  		);
		  	return $returnData;
		}
		public function varifyPassword($password, $key, $hash)
		{
			return password_verify($password.'$'.$key, $hash);
		}
		public function createRandomString($length)
		{
			$str = 'QWERTYUIOPLKJHGFDSAZXCVBNM!@#$%^&*()_+-=qwertyuioplkjhgfdsazxcvbnm1234567890';
			$shuffledStr = str_shuffle($str);
			return substr($shuffledStr, 0, $length);
		}
		public function isAuthenticated($userType, $redirectURL='')
		{
			if ($this->session->userdata($userType)) {
				return true;
			}else{
				redirect($redirectURL,'refresh');
			}
		}
		public function sendEmail($from, $name, $to, $subject, $body)
		{
			$this->load->library('email'); // load email library
			//$config = array();

			/*$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'smtp.gmail.com';
			$config['smtp_user'] = 'testmail@consagous.com';
			$config['smtp_pass'] = '@consagous@123@';
			$config['smtp_port'] = 587;*/

			//SMTP & mail configuration
			$config = array(
			    'protocol'  => PROTOCOL,
			    'smtp_host' => SMTP_HOST,
			    'smtp_crypto'=> SMTP_CRYPTO,
			    'smtp_port' => SMTP_PORT,
			    'smtp_user' => SMTP_USER,
			    'smtp_pass' => SMTP_PASS,
			    'mailtype'  => 'html',
			    'charset'   => 'utf-8',
			    'wordwrap'  => TRUE
			);


			$this->email->initialize($config);
			$this->email->set_mailtype("text");
			$this->email->set_newline("\r\n");
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        	$this->email->set_header('Content-type', 'text/html');
			

			$this->email->from($from, $name);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($body);
			if ($this->email->send()){
				return true ;
			}else{
				return false ;
			}
		}

		public function only_imported_user_sendEmail($from, $name, $to, $subject, $body)
		{
			require APPPATH . 'libraries/mail/PHPMailerAutoload.php';
			
			$mail = new PHPMailer;
			$mail->isSMTP();               // Set mailer to use SMTP
			$mail->Host = SMTP_HOST;       // Specify main and backup SMTP servers
			//$mail->SMTPDebug = 3;
			$mail->SMTPAuth = true;        // Enable SMTP authentication
			$mail->Username = SMTP_USER;   // SMTP username
			$mail->Password = SMTP_PASS;   // SMTP password
			$mail->SMTPSecure = SMTP_CRYPTO; 

			/*$mail->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			);*/   // Enable TLS encryption, `ssl` also accepted

			$mail->Port = SMTP_PORT;   // TCP port to connect to
			$mail->setFrom($from,$name);

			//$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
			//$mail->addAddress('rob@greymatterpartners.com');
            //$mail->addAddress('text@gmail.com');      // Add a recipient
			//$mail->addReplyTo('rob@greymatterpartners.com');

			$mail->isHTML(true);   // Set email format to HTML
			$mail->Subject = $subject;
			//$mail->Body    = '';
			$mail->AltBody ='';

			$mail->addAddress($to);
            //$mail->addAddress('text@gmail.com');  // Add a recipient
		    $mail->addReplyTo($from);
			$mail->Body = $body;

			$mail->AltBody ='';
			if(!$mail->send()) 
			{
			   //echo 'Message could not be sent.';
			   //echo 'Mailer Error: ' . $mail->ErrorInfo;
			   //die;
			   return FALSE ;
			} 
			else 
			{
				//echo $mail->Body;
			    // echo 'Message has been sent';
			    return TRUE ;
			}
		}

		public function getOrWhere($tableName, $condition=array(), $or_where, $limit="", $offset="", $orderby='order_id')
		{	$fields='*';
			$this->db->select($fields);
			$this->db->order_by("$orderby", "DESC");	
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			if($limit != ''){

			$this->db->limit($limit, $offset);	

			}

			$this->db->or_where($or_where);
			/*Get Data form table*/
			$this->db->from($tableName);

			$query = $this->db->get();	
			$result = $query->result();

			return $result;
		}

		public function selectDataGroupBy($tableName, $condition=array(), $fields='*', $goup_by='post_code', $orderby='order_id')
		{
			$this->db->select($fields);
			$this->db->group_by($goup_by); 
			$this->db->order_by("$orderby", "DESC");	
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}

			/*Get Data form table*/
			$this->db->from($tableName);

			$query = $this->db->get();	
			$result = $query->result();

			return $result;
		}

		


		/*************** Get Table Data *******************/	

		public function getdatafromtable($tbnm, $condition = array(), $data = "*", $limit = "", $offset= "", $orderby = "", $ordertype = "DESC"){
			 
				$this->db->select($data);
				$this->db->from($tbnm);
				if(!empty($condition)){
					$this->db->where($condition);
				}
				
				if($limit != ''){
					$this->db->limit($limit, $offset);
				}
				if($orderby != ''){
					$this->db->order_by($orderby, $ordertype);
				}	
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					return $query->result_array();
				} else {				
					return false;
				}	 

		}

		/* Upload file */
		public function fileupload($filenm, $foldername, $asset_type = "", $height=300, $width=300){
			if(!empty($_FILES[$filenm]['name'])){
			
				if($asset_type == ''){
					$type = 'mpeg|jpg|jpeg|gif|JPEG|PNG|png|jpeg';
				} else if($asset_type == 'Picture'){
					$type = 'jpg|jpeg|gif|JPEG|PNG|png|jpeg';
				} else if($asset_type == 'Audio'){
					$type = MEDIA_AUDIO;
				} else if($asset_type == 'Video'){
					$type = MEDIA_VIDEO;
				}else if($asset_type == 'Pdf'){
					$type = MEDIA_PDF;
				}
			
				 $file_size = $_FILES[$filenm]['size'];

	        	  if($file_size > 3000141) {   //	3 MB
			         			 $this->session->set_flashdata('errorclass', 'danger');
                    			$this->session->set_flashdata('error_message', 'File size must not greater then 3 MB');
                    	redirect($_SERVER['HTTP_REFERER']);
			      } 
				
				$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES[$filenm]['name']);
			 	$config['upload_path'] = './'.$foldername.'/';
	            $config['allowed_types'] = $type;
	            $config['file_name'] = $new_image_name;
			    $config['overwrite'] = TRUE;
			    $config['max_size'] = '1000141';
			    $config['max_width']  = '0';
			    $config['max_height']  = '0';
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);
	            if($this->upload->do_upload($filenm)){
	                $uploadData = $this->upload->data();
	                $config['image_library'] = 'gd2'; 
	                $config['source_image'] = $uploadData['full_path'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']         = $height;
					$config['height']       = $width;
	                $this->load->library('image_lib', $config);
	                if (!$this->image_lib->resize()) {
	                }
	                $picture = $uploadData['file_name'];
	            }else{
	                $picture = '';
	            }
			} else {
			}
			return $picture;
		}

		/* Upload file */
		public function fileupload_resize($filenm, $foldername, $asset_type = "",$dirPathThumb,$width='',$height=''){
			if(!empty($_FILES[$filenm]['name'])){
			
				if($asset_type == ''){
					$type = 'mpeg|jpg|jpeg|gif|JPEG|PNG|png|jpeg';
				} else if($asset_type == 'Picture'){
					$type = 'jpg|jpeg|gif|png|JPEG|PNG|GIF|JPG';
				} else if($asset_type == 'Audio'){
					$type = MEDIA_AUDIO;
				} else if($asset_type == 'Video'){
					$type = MEDIA_VIDEO;
				}else if($asset_type == 'Pdf'){
					$type = MEDIA_PDF;
				}else if($asset_type == 'File'){
					$type = MEDIA_FILE;
				}else if($asset_type == 'DOC'){
					$type = "pdf|doc|docx|xls|xlsx|jpg|jpeg|png|gif";
				}
			
				 $file_size = $_FILES[$filenm]['size'];

	        	  if($file_size > 3000141) {   //	3 MB
			         			 $this->session->set_flashdata('errorclass', 'danger');
                    			$this->session->set_flashdata('error_message', 'File size must not greater then 3 MB');
                    	redirect($_SERVER['HTTP_REFERER']);
			      } 
				
				$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES[$filenm]['name']);
			 	$config['upload_path'] = './'.$foldername.'/';
	            $config['allowed_types'] = $type;
	            $config['file_name'] = $new_image_name;
			    $config['overwrite'] = TRUE;
			   /* $config['max_size'] = '1000141';
			    $config['max_width']  = '0';
			    $config['max_height']  = '0';*/
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);
	            if($this->upload->do_upload($filenm)){
	                $uploadData = $this->upload->data();
	               /* $config['image_library'] = 'gd2'; 
	                $config['source_image'] = $uploadData['full_path'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']         = $height;
					$config['height']       = $width;
	                $this->load->library('image_lib', $config);
	                if (!$this->image_lib->resize()) {
	                }
	                $picture = $uploadData['file_name'];*/
	                $res = $this->resize_images($uploadData['full_path'],$width,$height, $dirPathThumb);
	                if($res){
	                	$picture = $uploadData['file_name'];
	                }

	            }else{
	                $picture = '';
	            }
			} else {
			}
			return $picture;
		}

				/* Upload file */
		public function docFilePpload($filenm, $foldername, $asset_type = "",$dirPathThumb,$width='',$height=''){
			if(!empty($_FILES[$filenm]['name'])){
			
				if($asset_type == ''){
					$type = 'mpeg|jpg|jpeg|gif|JPEG|PNG|png|jpeg';
				}else if($asset_type == 'DOC'){
					$type = "pdf|doc|docx|xls|xlsx|jpg|jpeg|png|gif";
				}
			
				 $file_size = $_FILES[$filenm]['size'];

	        	  if($file_size > 5000141) {   //	3 MB
			         			 $this->session->set_flashdata('errorclass', 'danger');
                    			$this->session->set_flashdata('error_message', 'File size must not greater then 3 MB');
                    	redirect($_SERVER['HTTP_REFERER']);
			      } 
				$uniq_num = rand(100,1000);
				$new_image_name = $uniq_num.'_'.time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES[$filenm]['name']);
			 	$config['upload_path'] = './'.$foldername.'/';
	            $config['allowed_types'] = $type;
	            $config['file_name'] = $new_image_name;
			    $config['overwrite'] = TRUE;
			   /* $config['max_size'] = '1000141';
			    $config['max_width']  = '0';
			    $config['max_height']  = '0';*/
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);
	            if($this->upload->do_upload($filenm)){
	                $uploadData = $this->upload->data();
	                $picture = $uploadData['file_name'];
	            }else{
	                $picture = '';
	            }
			} else {
			}
			return $picture;
		}

		/* Upload file */
		function resize_images($path,$rs_width,$rs_height,$destinationFolder='') {

			$folder_path = dirname($path);
			$thumb_folder = $destinationFolder;
			$percent = 0.5;

			if (!is_dir($thumb_folder)) {

			   mkdir($thumb_folder, 0777, true);
			}

			$name = basename($path);

			$x = getimagesize($path);            

			$width  = $x['0'];

			$height = $x['1'];


			switch ($x['mime']){

			         case "image/gif":

			            $img = imagecreatefromgif($path);

			            break;

			         case "image/jpeg":

			            $img = imagecreatefromjpeg($path);

			            break;
			        case "image/jpg":

			            $img = imagecreatefromjpeg($path);

			            break;

			         case "image/png":

			            $img = imagecreatefrompng($path);

			            break;

			 }

			   $img_base = imagecreatetruecolor($rs_width, $rs_height);

			   $white = imagecolorallocate($img_base, 255, 255, 255);

			   imagefill($img_base, 0, 0, $white);
			   
			   imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

			   imagecopyresampled($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

			   $path_info = pathinfo($path);  

			   $dest = $thumb_folder.$name;

			          switch ($path_info['extension']) {

			             case "gif":

			                imagegif($img_base, $dest);  

			                break;

			             case "jpg":

			                return imagejpeg($img_base, $dest);  

			                break;
			             case "jpeg":

			                return imagejpeg($img_base, $dest);  

			                break;

			             case "png":

			               return imagepng($img_base, $dest);  

			                break;

			          }
					
			}

		/* Get all user details*/
		public function getAllUserInfo($table, $where, $filed, $userid ){
			
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_in($filed,$userid);
			$this->db->where($where);
	        $query=$this->db->get(); 
	        $returnData = $query->result(); 
	        return $returnData;	
		}

		/* Get all Record using where in condition */
		function getDataWhereIn($table='', $field='*',  $whereField='', $whereValue='', $orderBy='', $order='ASC', $whereNotIn=0){
		
			$table=$table;
			 $this->db->select($field);
			 $this->db->from($table);
			 
			if($whereNotIn > 0){
				$this->db->where_not_in($whereField, $whereValue);
			}else{
				$this->db->where_in($whereField, $whereValue);
			}
			
			if(is_array($orderBy) && count($orderBy)){
				/* $orderBy treat as where condition if $orderBy is array  */
				$this->db->where($orderBy);
			}
			elseif(!empty($orderBy)){  
				$this->db->order_by($orderBy, $order);
			}
			
			$query = $this->db->get();
			
			$result = $query->result_array();
			if(!empty($result)){
				return 	$result;
			}
			else{
				return FALSE;
			}
		}


		/* GET TWO TABLE DATA  */

		/****************************************/

		public function getTwoTableData($data,$table1,$table2,$on,$condition = '',$limit="", $offset= "", $orderby = "", $ordertype = "ASC", $join = "inner"){
	        $this->db->select($data);
	        $this->db->from($table1);
	        $this->db->join($table2,$on, $join);
	        if($limit != ''){
				$this->db->limit($limit, $offset);
			}
	        if(!empty($condition)){
	           $this->db->where($condition);
	        }
	        if($orderby != ''){
				$this->db->order_by($orderby, $ordertype);
			}
	        $query=$this->db->get();
	        return $query->result_array();
		}


		/* GET TREE TABLE DATA  */
		public function getThreeTableData($data,$table1,$table2,$table3,$on,$on2,$condition){

		        $this->db->select($data);
		        $this->db->from($table1);
		        $this->db->join($table2,$on);
		        $this->db->join($table3,$on2);
		        $this->db->where($condition);
		        $query=$this->db->get();
		        return $query->result_array();
		}

		/* Get single details Where not in */
		public function rowDataWhereNotIn($table, $filed, $userid ){
			
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_not_in($filed,$userid);
	       	$query = $this->db->get();	
			$result = $query->row();
	        return $result;	
		}


		/* Update record */
	    public function updateDataFromTabel($table = '', $data = array(), $field = '', $id = 0) {
	      if (empty($table) || !count($data)) {
	        return false;
	      } else {
	        if (is_array($field)) {
	          $this->db->where($field);
	        } else {
	          $this->db->where($field, $id);

	        }
	        return $this->db->update($table, $data);
	      }
	    }

	    /* Get all details Where not in */
		public function getAllDataWhereNotIn($table = '', $not_field = '', $userid_arr= '', $where_field_arr= '', $select_arr = ''){
			if(empty($select_arr)){
				$select_arr = '*';
			}
			$this->db->select($select_arr);
			$this->db->from($table);
			$this->db->where_not_in($not_field,$userid_arr);
			if(!empty($where_field_arr)){
				$this->db->where($where_field_arr);
			}
			
	       	$query = $this->db->get();	
			$result = $query->result();
	        return $result;	
		}

		/* audience function Get all details Where not in */
		public function getDataWhereNotIn($table = '', $not_field = '', $userid_arr= '', $where_field_arr= '', $select_arr = ''){
			
			$this->db->select($select_arr);
			$this->db->from($table);
			$this->db->where_not_in($not_field,$userid_arr);
			$this->db->where($where_field_arr);
			$query = $this->db->get();	
			$result = $query->result_array();
	        return $result;	
		}

		public function select_num_row($sql)
	    {
	    	$query = $this->db->query($sql);
			return $query->num_rows();
	    }

	}

	/* Change Status */
	/* Change status */
    function updateDataFromTabel($table = '', $data = array(), $field = '', $id = 0) {
      if (empty($table) || !count($data)) {
        return false;
      } else {
        if (is_array($field)) {
          $this->db->where($field);
        } else {
          $this->db->where($field, $id);

        }
        return $this->db->update($table, $data);
      }
    }   
	/* End of file Mod_Common.php */
	/* Location: ./application/controllers/Mod_Common.php */
 ?>