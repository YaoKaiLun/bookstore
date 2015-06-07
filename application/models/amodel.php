<?php
class Amodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function insert_member()
  {
  	/*$mem_array = array('MEMBER_POST' => $this->input->post('reg_email'),
	  	               'MEMBER_PWD' => $this->input->post('reg_pwd'), 
	  		           'MEMBER_SEX' => $this->input->post('reg_sex'),
	  	               'MEMBER_PHONE' => $this->input->post('reg_phone'), 
	  		           'MEMBER_ADDR' => $this->input->post('reg_addr')
  		              );
    $this->db->set($mem_array);
    $this->db->insert('MEMBER');*/
    $reg_email = $this->input->post('reg_email');
    $reg_pwd = $this->input->post('reg_pwd');
    $reg_sex = $this->input->post('reg_sex');
    $reg_phone = $this->input->post('reg_phone');
    $reg_addr = $this->input->post('reg_addr');
    $this->db->query("insert into member(member_post,member_pwd,member_sex,member_phone,member_addr) 
    	values('{$reg_email}','{$reg_pwd}','{$reg_sex}','{$reg_phone}','{$reg_addr}')");
  }
  public function check_login()
  {
  	$login_email = $this->input->post('login_email');
  	$login_pwd = $this->input->post('login_pwd');
  	$encode_pwd = $login_pwd;
  	$query = $this->db->query("select member_pwd from member where member_post='{$login_email}'");
  	$row = $query->row();
  	$num = $query->num_rows();
  	if($num == 0) return 0;
  	else if($encode_pwd!=$row->MEMBER_PWD) return 1 ;
  	else return 2;
  }
    public function get_books()
  {
    $query = $this->db->query('select ISBN,book_name from book');
    return $query->result_array();
  }
}