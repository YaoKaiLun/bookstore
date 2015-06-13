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
}