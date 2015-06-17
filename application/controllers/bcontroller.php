<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bcontroller extends CI_Controller {
	public function __construct()
    {
      parent::__construct();
      $this->load->model('bmodel');
  	  $this->load->helper('form');
	  $this->load->library('form_validation');
	  $this->load->helper('url');
    }
	public function index()
	{
	  $this->form_validation->set_rules('admin_name', 'admin_name', 'trim|required');
	  $this->form_validation->set_rules('admin_pwd', 'admin_pwd', 'trim|required|md5');
	  if ($this->form_validation->run() == FALSE)
      {
	      $this->load->view('b/blogin.php');
	  }
	  else
	  {
	  	switch ($this->bmodel->check_login()) {
	  		case 0:
	  			echo "该用户不存在";
	  			break;
	  		case 404:
	  		    echo "密码错误";
	  		    break;
	  		case 1:
	  		     $this->load->view('b/systemadmin.php');
	  		     break;
  		    case 2:
  		         $this->show_store();
  		         break;
  		    case 3:
  		         $this->load->view('b/custservice.php');
  		         break;
	        case 4:
	             $this->load->view('b/sending_order.php');
	             break;
	  		default:
	  		     echo "不存在的管理员类型";
	  			break;
	  	}  
	  }
	}
	public function show_books()
    {
 	 	$data['books']=$this->bmodel->get_books();
	 	$this->load->view('b/storeadmin.php',$data);
    }
    public function show_store()
    {
    	$this->load->library('pagination');
    	$config['base_url'] = site_url('bcontroller/show_store');
	    $config['total_rows'] = $this->db->count_all('BOOK');
	    $config['per_page'] = 4;
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
 	 	$data['books']=$this->bmodel->deal_store($config['per_page'],$this->uri->segment(3));
    	$this->load->view('b/storeadmin.php',$data);
    }
    public function change_book()
    {
    	$change = $this->bmodel->change_book();
    	echo $change;
    }
    public function delete_book()
    {
    	$delete = $this->bmodel->delete_book();
    	echo $delete;
    }
    public function add_book_view()
    {
    	$this->load->view('b/addbook.php');
    }	
    public function add_book()
    {
       $this->form_validation->set_rules('isbn', 'isbn', 'trim|required');
	   $this->form_validation->set_rules('bookname', 'bookname', 'trim|required');
	   $this->form_validation->set_rules('bookauthor', 'bookauthor', 'trim|required');
	   $this->form_validation->set_rules('publishhouse', 'publishhouse', 'trim|required');
	   $this->form_validation->set_rules('publishtime', 'publishtime', 'trim|required');
	   $this->form_validation->set_rules('bookprice', 'bookprice', 'trim|required');
	   $this->form_validation->set_rules('booknum', 'booknum', 'trim|required');
	   $this->form_validation->set_rules('bookkey', 'bookkey', 'trim|required');
	   $this->form_validation->set_rules('bookpage', 'bookpage', 'trim|required');
	   $this->form_validation->set_rules('bookinfo', 'bookinfo', 'trim|required');
	  if ($this->form_validation->run() == FALSE)
      {
	      $this->load->view('b/addbook.php');
	  }
	  else
	  {
	  	  $flag = $this->bmodel->add_book();
	  	  if($flag)
	  	  {
	  	  	echo "添加成功";
	  	  	$this->load->view('b/addbook.php');
	  	  }
	  	  else echo "添加失败";
      }
    }
    public function show_sending_order()
    {
    	$data['query'] = $this->bmodel->show_sending_order();
    	$this->load->view('b/sending_order.php',$data); 
    }
    public function send_order()
    {
       $data = $this->bmodel->send_order();
       echo $data;
    }
    public function show_detail_order()
    {
        $result = $this->bmodel->show_detail_order();
        if($result){   // we got a result, output json
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
}