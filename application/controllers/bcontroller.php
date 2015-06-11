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
    	$config['base_url'] = site_url('acontroller/show_books');
	    $config['total_rows'] = $this->db->count_all('BOOK');
	    $config['per_page'] = 4;
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
 	 	$data['books']=$this->amodel->deal_store($config['per_page'],$this->uri->segment(3));
    	$this->load->view('b/storeadmin.php');
    }	
}