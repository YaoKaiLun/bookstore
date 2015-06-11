<?php
class Bmodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function check_login()
  {
  	$admin_name = $this->input->post('admin_name');
  	$admin_pwd = $this->input->post('admin_pwd');
  	$query = $this->db->query("select admin_pwd,admin_type_id from admin where admin_name='{$admin_name}'");
  	$row = $query->row();
    $real_pwd = strtolower($row->ADMIN_PWD);
  	$num = $query->num_rows();
  	if($num == 0) return 0;
  	else if($admin_pwd!= $real_pwd) return 404 ;
  	else return $row->ADMIN_TYPE_ID;
  }
  public function get_books()
  {
    $query = $this->db->query('select ISBN,book_name from book');
    return $query->result_array();
  }
  public function deal_store($num, $offset)
  {
    $query = $this->db->get('BOOK', $num, $offset);   
    return $query;
  } 
}