<?php
/* This helper contains c0mmon functions.*/
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//function to generate aplha numeric random string, with a given length

 function date_compare($a, $b)
{
    $t1 = strtotime($a->date);
    $t2 = strtotime($b->date);
    return $t2 - $t1;
}  
function randomString($length = 6) 
{
    $alphabets = range('a','z');
    $numbers = range('1','9');
    $password = '';
    $final_array = array_merge($alphabets,$numbers);          
    while($length--) 
    {
       $key = array_rand($final_array);
       $password .= $final_array[$key];
    }
    if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))
    {
       return $password;
    }
    else
    {
       return  random_string();
    }

 }

 function ci_enc($str){
 $new_str = strtr(base64_encode(addslashes(@gzcompress(serialize($str), 9))), '+/=', '-_.');
 return $new_str; 
}

function ci_dec($str){
 $new_str = unserialize(@gzuncompress(stripslashes(base64_decode(strtr($str, '-_.', '+/=')))));
 return $new_str;
}
function fdate($datevalue){
  $originalDate = $datevalue;
  $newDate = date("m-d-Y", strtotime($originalDate));
  return $newDate;
}
function fdatetime($datetimevalue){
  $originalDate = $datetimevalue;
  $newDate = date("Y-m-d", strtotime($originalDate));
  return $newDate;
}

function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

 function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }


function encode($value,$salt)
{ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, $iv);
        return trim(safe_b64encode($crypttext)); 
}

function decode($value,$salt)
{
        if(!$value){return false;}
        $crypttext = safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
}



function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function fetch_pieChartColor($pos)
{
  $color_array = array(
                        '1'=>'002856',
                        '2'=>'8b1e41',
                        '3'=>'7da8ae',
                        '4'=>'62b4e4',
                        '5'=>'035d67'
                      );


  //Fetch the color from above mentioned array
  foreach($color_array as $key=>$value)
  {
    if($key==$pos)
    {
      return $value;
    }

  }

  //If partition is more than 5, then use random color function
  random_color();
  

}

/*function to split string in specified characters length, without splitting the words*/
function split_string($string)
{
    $output = array();
    while (strlen($string) > 40) {
        $index = strpos($string, ' ', 40);
        $output[] = trim(substr($string, 0, $index));
        $string = substr($string, $index);
    }
    $output[] = trim($string);
    return $output;
}

//function to get latitude and longitude of any city
function get_lat_long($city)
{
    $place = str_replace(' ', '+', $city);
    $geocode_stats = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".$place."&sensor=false");
    $output_deals = json_decode($geocode_stats);
    if($output_deals->results){
    $latLng = $output_deals->results[0]->geometry->location;
    $lat = $latLng->lat;
    $lng = $latLng->lng; 
    }else{
    $lat = '';
    $lng =''; 
    }
    //echo $lat." ".$lng; exit;
    return $lat." ".$lng;
    //return "0 0";
}

function calculate_distance($lat1, $lon1, $lat2, $lon2) 
{ 
  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;
  
  return $miles;
      
} 

function editor($path,$width,$height='300px',$attr=array()) {
    //Loading Library For Ckeditor
    $CI =& get_instance();
    $CI->load->library('ckeditor');
    $CI->load->library('ckFinder');
    //configure base path of ckeditor folder 
    //$CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->config['toolbar'] = 'Full';
    $CI->ckeditor->config['language'] = 'en';
    $CI->ckeditor->config['width'] = $width;
    $CI->ckeditor->config['height'] = $height;
    $CI->ckeditor->textareaAttributes = $attr; 
    //configure ckfinder with ckeditor config 
    $CI->ckfinder->SetupCKEditor($CI->ckeditor,$path); 
  }

  function basic_editor($path,$width,$height='200px') {
    //Loading Library For Ckeditor
    $CI =& get_instance();
    $CI->load->library('ckeditor');
    $CI->load->library('ckFinder');
    //configure base path of ckeditor folder 
    //$CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->config['toolbar'] =
    [
      ['Source','Cut','Copy','Paste','Undo','Redo', '-','Bold','Italic','Underline','Strike', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList', 'BulletedList'],['Link', 'Unlink','-', 'Styles','Format','Font','FontSize'],[ 'TextColor','BGColor']
    ];
    $CI->ckeditor->config['language'] = 'en';
    $CI->ckeditor->config['width'] = $width;
    $CI->ckeditor->config['height'] = $height;
          
    //configure ckfinder with ckeditor config 
    $CI->ckfinder->SetupCKEditor($CI->ckeditor,$path); 
  }

  function video_editor($path,$width,$height='200px') {
    //Loading Library For Ckeditor
    $CI =& get_instance();
    $CI->load->library('ckeditor');
    $CI->load->library('ckFinder');
    //configure base path of ckeditor folder 
    //$CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->basePath = base_url().'js/ckeditor/';
    $CI->ckeditor->config['toolbar'] =
    [
      ['Source','Cut','Copy','Paste','Undo','Redo', '-','Bold','Italic','Underline','Strike', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], ['NumberedList', 'BulletedList', 'Link', 'Unlink', '-', 'Styles','Format'],['Font','FontSize', 'TextColor','BGColor']
    ];
    $CI->ckeditor->config['language'] = 'en';
    $CI->ckeditor->config['width'] = $width;
    $CI->ckeditor->config['height'] = $height;
          
    //configure ckfinder with ckeditor config 
    $CI->ckfinder->SetupCKEditor($CI->ckeditor,$path); 
  }


  function html_cut($text, $max_length)
  {
      $tags   = array();
      $result = "";

      $is_open   = false;
      $grab_open = false;
      $is_close  = false;
      $in_double_quotes = false;
      $in_single_quotes = false;
      $tag = "";

      $i = 0;
      $stripped = 0;

      $stripped_text = strip_tags($text);

      while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
      {
          $symbol  = $text{$i};
          $result .= $symbol;

          switch ($symbol)
          {
             case '<':
                  $is_open   = true;
                  $grab_open = true;
                  break;

             case '"':
                 if ($in_double_quotes)
                     $in_double_quotes = false;
                 else
                     $in_double_quotes = true;

              break;

              case "'":
                if ($in_single_quotes)
                    $in_single_quotes = false;
                else
                    $in_single_quotes = true;

              break;

              case '/':
                  if ($is_open && !$in_double_quotes && !$in_single_quotes)
                  {
                      $is_close  = true;
                      $is_open   = false;
                      $grab_open = false;
                  }

                  break;

              case ' ':
                  if ($is_open)
                      $grab_open = false;
                  else
                      $stripped++;

                  break;

              case '>':
                  if ($is_open)
                  {
                      $is_open   = false;
                      $grab_open = false;
                      array_push($tags, $tag);
                      $tag = "";
                  }
                  else if ($is_close)
                  {
                      $is_close = false;
                      array_pop($tags);
                      $tag = "";
                  }

                  break;

              default:
                  if ($grab_open || $is_close)
                      $tag .= $symbol;

                  if (!$is_open && !$is_close)
                      $stripped++;
          }

          $i++;
      }

      while ($tags)
          $result .= "</".array_pop($tags).">";

      return $result;
  }


  function fetchStatus($status)
  { 
    $status_array = array();
    $status_array = array(
                            '0' => 'Pending',
                            '1' => 'Confirmed',
                            '2' => 'Confirmed',
                            '3' => 'Declined',
                            '4' => 'Declined',
                            '5' => 'Rescheduled',
                            '6' => 'Cancelled',
                            '7' => 'Cancelled',
                            '8' => 'Completed'
                          );
    return $status_array[$status];
    
  }

  
 // For Dosespot
  function SSO($key,$uid)
  {
    $length=32;
    $aZ09 = array_merge(range('A', 'Z'), range('a', 'z'),range(0, 9));
    $randphrase ='';
    // Generate random phrase
    for($c=0;$c < $length;$c++) {
      $randphrase .= $aZ09[mt_rand(0,count($aZ09)-1)];
    }
    //echo "Key: ".$key."<br/>";
    //echo "Phrase: ".$randphrase."<br/>";
    //Append key onto phrase end
    $randkey=$randphrase.$key;
    // SHA512 Hash
    $toencode= utf8_encode($randkey);
    // Pass 3rd, optional parameter as TRUE to output raw binary data
    $output = hash("sha512", $toencode, true);
    //base 64 encode the hash binary data
    $sso = base64_encode($output);
    $length = mb_strlen($sso);
    $characters = 2;
    $start = $length - $characters;
    $last2 = substr($sso , $start ,$characters);
    // Yes, Strip the extra ==
    if($last2 == "==")
    {
      $ssocode = substr($sso,0,-2);
    }
    // No, just pass the value to the next step
    else{$ssocode=$sso;}
    // Prepend the random phrase to the encrypted code.
    $ssocode = $randphrase.$ssocode;
    //echo "SSO: ".$ssocode."<br/>";

    //Use first 22 characters of random.
    $shortphrase=substr($randphrase,0,22);
    //Append uid & key onto shortened phrase end
    $uidv=$uid.$shortphrase.$key;
    // SHA512 Hash
    $idencode= utf8_encode($uidv);
    // Pass 3rd, optional parameter as TRUE to output raw binary data
    $idoutput = hash("sha512", $idencode, true);
    // Base64 Encode of hash binary data
    $idssoe = base64_encode($idoutput);
    //Determine if we need to strip the zeros
    $idlength = mb_strlen($idssoe);
    $idcharacters = 2;
    $idstart = $idlength - $idcharacters;
    $idlast2 = substr($idssoe , $idstart ,$idcharacters);
    if($idlast2 == "==")
    { 
       $ssouidv = substr($idssoe,0,-2);
      }
    // No, just pass the value to the next step
    else{ $ssouidv=$idssoe; }
    //echo "SSOID: ".$ssouidv."<br/>";

    return array($ssocode, $ssouidv);
  }
   
  function follow_redirect($url)
  {
        $redirect_url = null;
        if(function_exists("curl_init")){
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_HEADER, "Content-Type: text/html");
          curl_setopt($ch, CURLOPT_NOBODY, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch); 
          curl_close($ch);
       }
       else
       {
        //echo 'test';
          $url_parts = parse_url($url);
          $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 8080));
          $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
          $request .= 'Host: ' . $url_parts['host'] . "\r\n";
          $request .= "Connection: Close\r\n\r\n";
          fwrite($sock, $request);
          $response = fread($sock, 2048);
          fclose($sock);
       }
      return $response;
       
  }

  function send_email($to_email, $from_email='', $subject, $message) 
{   
    // Configure email library
  $CI =& get_instance();
  if(empty($from_email)){
    $from_email='shrma.aashish@gmail.com';
  }
  $CI->load->library('email');
  $config['protocol'] = 'sendmail';
  //if('192.168.1.116'== $_SERVER['HTTP_HOST']){
  $config['protocol'] = 'smtp';
  $config['smtp_host'] = 'ssl://smtp.googlemail.com';
  $config['smtp_port'] = 25;
  $config['smtp_user'] = 'shrma.aashish@gmail.com';
  $config['smtp_pass'] = 'rupesh@123456';
  //}
  $config['wordwrap'] = TRUE;
  $config['mailtype'] = 'html';
  $config['priority'] = '1';
  $config['charset'] = 'utf-8';
  $config['crlf'] = "\r\n";
  $config['newline'] = "\r\n";
  // Load email library and passing configured values to email library
  $CI->email->initialize($config);  
  $CI->email->from($from_email, 'Laurels School'); 
  $CI->email->to($to_email);
  //$CI->email->cc('syscraft.rupesh@gmail.com');
  $CI->email->subject($subject); 
  $CI->email->message($message);
  // var_dump($CI->email->send());
  // die;
  if($CI->email->send()) {   
   return true;
 } else {
   return $CI->email->print_debugger();
 }
}

function uplode_multifile($nameAttr,$dire,$allowed_type='gif|jpg|png|jpeg|bmp',$max_size='10240')
  {
    $CI =& get_instance();
    $config['upload_path'] = $dire;
    $config['allowed_types'] = $allowed_type;    
    $config['max_size'] = $max_size;
    $config['encrypt_name'] = TRUE;   
    //$config['overwrite'] = TRUE;  
    $CI->load->library('upload', $config);    
    if (!$CI->upload->do_upload($nameAttr)){
    print_r($config['upload_path']);
    echo "<pre>";  
      print_r($CI->upload->display_errors());die;
      return false;     
    }else{
      $data = array('upload_data' => $CI->upload->data());              
      if(!empty($data['upload_data']['file_name'])){
        return $fileName = $data['upload_data']['file_name'];
      } else {
        return false;
      }
    }

  }

 
ini_set("gd.jpeg_ignore_warning", 1);
error_reporting(E_ALL & ~E_NOTICE);
function compress($source, $destination, $quality,$path) {

    $source=$path."".$source;
    $destination=$path."".$destination;
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);
       if(function_exists('exif_read_data')){
    $exif = @exif_read_data($destination);
        if (!empty($exif['Orientation']))
        {
            $image = imagecreatefromjpeg($destination);
            switch ($exif['Orientation'])
            {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;

                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;

                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
        }
      }
        
      imagejpeg($image, $destination, $quality);
    return $destination;    
}
  