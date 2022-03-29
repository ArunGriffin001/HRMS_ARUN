<?php defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__) . '/vendor/autoload.php';
define('DOMPDF_ENABLE_AUTOLOAD', false);
define('DOMPDF_ENABLE_FONTSUBSETTING', true);
define("DOMPDF_ENABLE_HTML5PARSER", true);
define("DOMPDF_ENABLE_REMOTE", true);

require_once(dirname(__FILE__) . '/dompdf/dompdf_config.inc.php');


class Pdfgenerator extends DOMPDF {

  public function generate($html, $filename='', $stream=false, $paper = 'A4', $orientation = "portrait",$pdfpassword="")
  {
    
    $dompdf = new DOMPDF();
     // echo $html;
     // die;
    // header('Content-type: text/html; charset=UTF-8') ;//chrome
    //  if ( get_magic_quotes_gpc() )
//    $html = stripslashes($html);

  //  $dompdf->load_html("<h1>Hello</h1>");
    //error_reporting(E_ALL);

    $dompdf->load_html($html);
   // $dompdf->load_html_file($html);
   // $dompdf->set_paper($paper, $orientation);
    //$customPaper = array(0,0,730,950);
   // $customPaper = array(0,0,950,950);
   // $orientation="landscape";
   // $dompdf->set_paper($customPaper,$orientation);
    $dompdf->set_paper('A4', 'portrait');
    //$dompdf->set_paper('A3', 'portrait');
   

   // echo dirname(__FILE__) . '/vendor/autoload.php';
   // die;
    // echo "<pre>";
    // print_r($dompdf);
    // die;
    $dompdf->render();
    if($pdfpassword != ""){
        $dompdf->get_canvas()->get_cpdf()->setEncryption("pass", $pdfpassword);
    }   

    $output = $dompdf->output();
    file_put_contents(FCPATH.'/uploads/invoice/'.$filename.'.pdf', $output);
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        $output;
    }
  }
}