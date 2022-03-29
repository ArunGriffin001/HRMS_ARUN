<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_model{
    public function __construct(){
        parent::__construct();
    }


   public function userAjaxlist($isCount=false,$start=0,$stop=0, $column_name='',$order='') {
        if(!empty($column_name) && $column_name=='company_name' ){
            $orderby_name = 'company_name';
        }else if(!empty($column_name) && $column_name=='email' ){
            $orderby_name = 'email';
        }else if(!empty($column_name) && $column_name=='phone_number' ){
            $orderby_name = 'phone_number';
        }else if(!empty($column_name) && $column_name=='status' ){
            $orderby_name = 'status';
        }else if(!empty($column_name) && $column_name=='created_at' ){
            $orderby_name = 'created_at';
        }else{
            $orderby_name = 'id';
        }
        $search = $this->input->get('search');
        $this->db->select('*');
        $this->db->from(TABLE_USERS);
        //$this->db->where('tile_id',$tile_id);
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`company_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `email` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `phone_number` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
        }
        //--------search text-box value end
        if($stop!=0) { 
           $this->db->limit($stop,$start);
        }
        $query=$this->db->get(); 
        if($isCount){
             $returnData = $query->num_rows();
        }else{
            $returnData = $query->result();
            $this->session->set_userdata('search_data',$returnData);
        }
        
        return $returnData;
    }

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

}
?>
