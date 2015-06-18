<?php
class Bmodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function check_login()
  {
  	$admin_id = $this->input->post('admin_id');
  	$admin_pwd = (int)$this->input->post('admin_pwd');
  	$query = $this->db->query("select admin_pwd,admin_type_id,admin_mark from admin where admin_id='{$admin_id}'");
    if(!empty($query))
    {
    $row = $query->row(0);
    $num = $query->num_rows();
    $real_pwd = $row->ADMIN_PWD;
    if($num == 0) return 0;
    else if($real_pwd!=$admin_pwd) return 404 ;
    else if($row->ADMIN_MARK==1) return 403;
    else return $row->ADMIN_TYPE_ID;
    }
  }
  public function deal_store($num, $offset)
  {
    $query = $this->db->get('BOOK', $num, $offset);   
    return $query;
  } 
  public function change_book()
  {
    $isbn = $this->input->post('isbn');
    $book_price = $this->input->post('bookprice');
    $book_num = $this->input->post('booknum');
    $book_if_down = (int)$this->input->post('bookifdown');
    $flag = $this->db->query("update book set book_price='{$book_price}',
      book_num='{$book_num}', book_if_down='{$book_if_down}' where isbn='{$isbn}'");
    return $flag;
  }
  public function delete_book()
  {
    $isbn = $this->input->post('isbn');
    $flag = $this->db->query("delete from book where isbn='{$isbn}'");
    return $flag;
  }
  public function add_book()
  {
    $isbn = $this->input->post('isbn');
    $book_name = $this->input->post('bookname');
    $book_type_id = $this->input->post('booktypeid');
    $publish_house = $this->input->post('publishhouse');
    $publish_time = $this->input->post('publishtime');
    $book_author = $this->input->post('bookauthor');
    $book_key = $this->input->post('bookkey');
    $book_price = $this->input->post('bookprice');
    $book_page = $this->input->post('bookpage');
    $book_info = $this->input->post('bookinfo');
    $book_num = $this->input->post('booknum');
    $flag = $this->db->query(
      "insert into 
      book(isbn, book_name, book_type_id, publish_house, publish_time, 
      book_author, book_key, book_price, book_page, book_info, book_buy_num, book_num) 
      values('{$isbn}', '{$book_name}', '{$book_type_id}', '{$publish_house}', to_date('{$publish_time}','yyyy-mm-dd'),
      '{$book_author}', '{$book_key}', '{$book_price}', '{$book_page}', '{$book_info}', 0, '{$book_num}')
    ");
    return $flag;
  }
  public function show_sending_order()
  {
    $query = $this->db->query("select order_id,order_num,order_price,order_name,order_addr,order_phone,
             to_char(order_time,'yyyy-mm-dd hh24:mi') as ordertime
             from book_order where order_if_send=0");
    return $query->result();
  }
  public function send_order()
  {
      $order_id = $this->input->post('order_id');
      $flag = $this->db->query("update book_order set order_if_send=1");
      if($flag) return 1;
      else return 0;
  }
  public function show_detail_order()
  {
      //$order_id = $this->input->get('order_id');
      $order_id = $this->input->post('order_id');
      $query = $this->db->query("select isbn,book_name,order_item_num from order_item where order_id='{$order_id}'");
      return $query->result();
  }
  public function show_member($num, $offset)
  {
     $query = $this->db->get('MEMBER', $num, $offset);   
     return $query->result();
  }
  public function show_admin($num, $offset)
  {
     $this->db->order_by('ADMIN_REG_TIME','DESC');
     $query = $this->db->get_where('ADMIN',array('ADMIN_TYPE_ID !=' => 1), $num, $offset); 
     return $query->result();
  }
  public function ban_admin()
  {
     $admin_id = $this->input->post('admin_id');
     $flag = $this->db->query("update admin set admin_mark=1 where admin_id='{$admin_id}'");
     if($flag) return 1;
     else return 0;
  }
  public function ok_admin()
  {
     $admin_id = $this->input->post('admin_id');
     $flag = $this->db->query("update admin set admin_mark=0 where admin_id='{$admin_id}'");
     if($flag) return 1;
     else return 0;
  }
  public function del_admin()
  {
     $admin_id = $this->input->post('admin_id');
     $flag = $this->db->query("delete from admin where admin_id='{$admin_id}'");
     if($flag) return 1;
     else return 0;
  }
  public function add_admin()
  {
      $reg_name = $this->input->post('reg_name');
      $reg_pwd = $this->input->post('reg_pwd');
      $type_id = intval($this->input->post('admin_type_id'));
      $query = $this->db->query("insert into admin(admin_name,admin_pwd,admin_type_id)
       values('{$reg_name}','{$reg_pwd}','{$type_id}')");
      if($query) return 1;
      else return 0;
  }  
}