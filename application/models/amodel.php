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
    $reg_name = $this->input->post('reg_name');
    $reg_sex = $this->input->post('reg_sex');
    $reg_phone = $this->input->post('reg_phone');
    $reg_addr = $this->input->post('reg_addr');
    $this->db->query("insert into member(member_post,member_pwd,member_name,member_sex,member_phone,member_addr) 
    	values('{$reg_email}','{$reg_pwd}','{$reg_name}','{$reg_sex}','{$reg_phone}','{$reg_addr}')");
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
  public function person_info($username)
  {
    $query = $this->db->query("select member_name,member_addr,member_phone from member where member_post='{$username}'");
    return $query->row(0);
  }
  public function create_order()
  {
    $member_post = $this->input->post('member_post');
    $items = json_decode(base64_decode($this->input->post('items'),true));
    $total_num = intval($this->input->post('total_num'));
    $total_price = number_format($this->input->post('total_price'),2,'.','');
    $get_name = $this->input->post('get_name');
    $get_addr = $this->input->post('get_addr');
    $get_phone = $this->input->post('get_phone');
    //开启事务
    $this->db->trans_start();
    //添加订单
    $query1 = $this->db->query("insert into book_order(order_num,order_price,order_name,order_addr,order_phone,member_post)
      values('{$total_num}','{$total_price}','{$get_name}','{$get_addr}','{$get_phone}','{$member_post}')");
    foreach ($items as $item) 
    {   
        $query3 = $this->db->query("select book_num,book_if_down from book where isbn='{$item->id}'");
        $row2 = $query3->row(0);
        if($row2->BOOK_NUM!=0&&$row2->BOOK_IF_DOWN!=1)
        {
           $this->db->query("update book set book_num = book_num-1 where isbn='{$item->id}'");
           $this->db->query("update book set book_buy_num = book_buy_num + 1 where isbn='{$item->id}'");
           $this->db->query("insert into order_item(isbn,order_item_num,order_item_price,book_name,member_post,order_id) 
              values('{$item->id}','{$item->qty}','{$item->subtotal}','{$item->name}','{$member_post}',
                seq_order_id.currval)");
        }
    }
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)  return 0;
    else return 1;
  }
  public function show_my_order()
  {
      $member_post = get_cookie('username',true);
      $query = $this->db->query("select order_id,order_num,order_price,to_char(order_time,'yyyy-mm-dd hh24:mi') as
               ordertime,order_if_get from book_order where member_post ='{$member_post}' order by ordertime desc");
      return $query->result();
  }
  public function get_order()
  {
      $order_id = $this->input->post('order_id');
      $flag = $this->db->query("update book_order set order_if_get=1 where order_id='{$order_id}'");
      if($flag) return 1;
      else return 0;
  }
  public function show_detail_order()
  {
      $order_id = $this->input->post('order_id');
      $query = $this->db->query("select isbn,book_name,order_item_num from order_item where order_id='{$order_id}'");
      return $query->result();
  }
}