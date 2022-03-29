<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_model{
    public function __construct(){
        parent::__construct();
    }

    public function tagAjaxlist($isCount=false,$start=0,$stop=0, $column_name='',$order='') {
        if(!empty($column_name) && $column_name=='title' ){
            $orderby_name = 'title';
        }else if(!empty($column_name) && $column_name=='status' ){
            $orderby_name = 'status';
        }else if(!empty($column_name) && $column_name=='created_at' ){
            $orderby_name = 'created_at';
        }else{
            $orderby_name = 'id';
        }
        $search = $this->input->get('search');
        $this->db->select('*');
        $this->db->from(TABLE_BLOG_TAG);
        //$this->db->where('tile_id',$tile_id);
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`title` LIKE "%'.$this->db->escape_like_str($search_info).'%"  OR `status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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

    public function catAjaxlist($isCount=false,$start=0,$stop=0, $column_name='',$order='') {
        if(!empty($column_name) && $column_name=='title' ){
            $orderby_name = 'title';
        }else if(!empty($column_name) && $column_name=='status' ){
            $orderby_name = 'status';
        }else if(!empty($column_name) && $column_name=='created_at' ){
            $orderby_name = 'created_at';
        }else{
            $orderby_name = 'id';
        }
        $search = $this->input->get('search');
        $this->db->select('*');
        $this->db->from(TABLE_BLOG_CATEGORY);
        //$this->db->where('tile_id',$tile_id);
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`title` LIKE "%'.$this->db->escape_like_str($search_info).'%"  OR `status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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

    public function blogAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
         if(!empty($column_name) && $column_name=='hs_blog_management.title' ){
            $orderby_name = 'hs_blog_management.title';
        }else if(!empty($column_name) && $column_name=='hs_blog_category.title' ){
            $orderby_name = 'hs_blog_category.title';
        }else if(!empty($column_name) && $column_name=='hs_blog_tag.title' ){
            $orderby_name = 'hs_blog_tag.title';
        }else if(!empty($column_name) && $column_name=='hs_blog_rss.rss_title' ){
            $orderby_name = 'hs_blog_rss.rss_title';
        }else if(!empty($column_name) && $column_name=='hs_blog_management.status' ){
            $orderby_name = 'hs_blog_management.status';
        }else if(!empty($column_name) && $column_name=='hs_blog_management.created_at' ){
            $orderby_name = 'hs_blog_management.created_at';
        }else{
            $orderby_name = 'hs_blog_management.id';
        }
        $search = $this->input->get('search');
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select('hs_blog_management.id, hs_blog_management.title as blog_title,hs_blog_management.blog_img,hs_blog_management.category_id,hs_blog_management.tag_id,hs_blog_management.rss_id,  hs_blog_management.status, hs_blog_management.created_at, hs_blog_category.title, hs_blog_tag.title, hs_blog_rss.rss_title');
        $this->db->from(TABLE_BLOG);

        $this->db->join('hs_blog_tag_option', 'hs_blog_tag_option.blog_id = hs_blog_management.id','inner');
        $this->db->join('hs_blog_tag', 'hs_blog_tag.id = hs_blog_tag_option.blog_tag_id','inner');

        $this->db->join('hs_blog_rss_option', 'hs_blog_rss_option.blog_id = hs_blog_management.id','inner');
        $this->db->join('hs_blog_rss', 'hs_blog_rss.rss_id = hs_blog_rss_option.blog_rss_id','inner');
        
        $this->db->join('hs_blog_category_option', 'hs_blog_category_option.blog_id = hs_blog_management.id','inner');
        $this->db->join('hs_blog_category', 'hs_blog_category.id = hs_blog_category_option.cat_id','inner');

        $this->db->group_by('hs_blog_management.id'); 
       /* $this->db->where('hs_blog_management.id','hs_blog_tag_option.blog_tag_id');
        $this->db->where('hs_blog_management.id','hs_blog_category_option.blog_id');*/
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_blog_management.title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_blog_category.title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_blog_tag.title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_blog_rss.rss_title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_blog_management.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_blog_management.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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
