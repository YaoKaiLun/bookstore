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
  	$encode_pwd = $login_pwd;
  	$query = $this->db->query("select admin_pwd,admin_type_id from admin where admin_name='{$admin_name}'");
  	$row = $query->row();
  	$num = $query->num_rows();
  	if($num == 0) return 0;
  	else if($encode_pwd!=$row->ADMIN_PWD) return 1 ;
  	else 
    {
      $admin_type_id = $row->ADMIN_TYPE_ID;
      $admin_type = $this->db->query("select admin_type_name from admin_type where admin_type_id='{$admin_type_id}'");
      return $admin_type;
    }
  }
    public function get_books()
  {
    $query = $this->db->query('select ISBN,book_name from book');
    return $query->result_array();
  }
}