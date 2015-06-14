<?php
class Amodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function insert_member()
  {
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
  	else
      {
      $cookie = array(
              'name'   => 'username',
              'value'  => $login_email,
              'expire' => time()+86500,
              //chrome不能保存本地cookie，所以不要设置domain
              //'domain' => '.localhost',
              'path'   => '/',
             );   
      $this->input->set_cookie($cookie);
      $_COOKIE['username'] = $login_email;
      return 2;
      } 
  }
  public function get_books($num, $offset)
  {
    $query = $this->db->get('BOOK', $num, $offset);   
    return $query;
  }
  public function book_detail($book_isbn)
  {
    $query = $this->db->query("select * from book where isbn = '{$book_isbn}'");
    return $query->row();
  }
}