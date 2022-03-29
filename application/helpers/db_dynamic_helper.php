<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function current_session_year_db()
{
        $ci=& get_instance();
        $params=$ci->input->post();
        if(empty($params)){
        $params=json_decode(file_get_contents('php://input'), true);
        }
        if(isset($params['db_name']))
        {     
        $db_name=$params['db_name'];
        return $db_name=$ci->config->item('db_prefix').$db_name;
        }
        $month=date("n",time());        
        if($month>=7){
        $year=date("Y")."_".date("Y",strtotime('+1 year'));
        }else{
            
        $year=date("Y",strtotime('-1 year')).'_'.date("Y");
        }
        return $ci->config->item('db_prefix').$year;
}

function switch_db_dinamico($name_db)
{

    $config_app['hostname'] = 'localhost';

    // $config_app['username'] = 'laurelss_2019_20';
    // $config_app['password'] = 'Atqo61PsO0tn';
    $config_app['username'] = 'staff_api';
    $config_app['password'] = 'NCInWMFqWHzFKFTY';

    $config_app['database'] = $name_db;

    $config_app['dbdriver'] = 'mysqli';

    $config_app['dbprefix'] = 'l2rsh_';

    $config_app['pconnect'] = FALSE;

    $config_app['db_debug'] = FALSE;

    return $config_app;

}
function copy_db($originalDB, $newDB,$data=TRUE) {

    $conn=mysqli_connect("localhost","staff_api","NCInWMFqWHzFKFTY");

    $db_check = mysqli_select_db ($conn,$originalDB );
   $getTables =  mysqli_query($conn,"SHOW TABLES") ;  
    $originalDBs = [];
    while($row = mysqli_fetch_row($getTables )) {
            $originalDBs[] = $row[0];
        }
   mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS `$newDB`");
  if(!mysqli_select_db($conn,$newDB)){
    foreach( $originalDBs as $tab ) {
            mysqli_select_db ($conn, $newDB ) ;
            mysqli_query($conn,"CREATE TABLE $tab LIKE ".$originalDB.".".$tab) ;
            if(in_array($tab,array("l2rsh_busmaster","l2rsh_busroute","l2rsh_cities","l2rsh_classmaster","l2rsh_schoolhouse","l2rsh_schoolremarks","l2rsh_class_section","l2rsh_class_subject","l2rsh_config","l2rsh_contactus","l2rsh_countries","l2rsh_fee_schedule","l2rsh_fee_segments","l2rsh_schoolprofile","l2rsh_sectionmaster","l2rsh_staff","l2rsh_staff_class_subject","l2rsh_staff_role","l2rsh_states","l2rsh_subjectmaster"))){
                mysqli_query($conn,"INSERT INTO $tab SELECT * FROM ".$originalDB.".".$tab) ;
            }
    }
   }
    return true;
}


?>