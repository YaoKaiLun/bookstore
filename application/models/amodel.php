<?php
class Amodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_books(){
    $query = $this->db->query('select ISBN,book_name from book');
    return $query->result_array();
  }
}