<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Acontroller extends CI_Controller {
	public function __construct()
    {
      parent::__construct();
      $this->load->model('amodel');
  	  $this->load->helper('form');
	  $this->load->library('form_validation');
      $this->load->database();
      $this->load->helper('url');
    }
	public function index()
	{
	  $this->form_validation->set_rules('login_email', 'login_email', 'trim|required|valid_email');
	  $this->form_validation->set_rules('login_pwd', 'login_pwd', 'trim|required|md5');
	  if ($this->form_validation->run() == FALSE)
      {
	      $this->load->view('a/alogin.php');
	  }
	  else
	  {
	  	$check_login_mark = $this->amodel->check_login();
	  	switch ($check_login_mark) {
	  		case 0:
	  			echo "该用户不存在";
	  			break;
	  		case 1:
	  		    echo "密码错误";
	  		    break;
	  		case 2:
	  		    $this->show_books();
	  		     break;
	  		default:
	  			break;
	  	}  
	  }
	}
	public function handle_reg()
	{
	  $this->form_validation->set_rules('reg_email', 'reg_email', 'trim|required|valid_email');
	  $this->form_validation->set_rules('reg_pwd', 'reg_pwd', 'trim|required|matches[conf_pwd]|md5');
	  $this->form_validation->set_rules('conf_pwd', 'conf_pwd', 'trim|required');
	  $this->form_validation->set_rules('reg_sex', 'reg_sex', 'required');
	  $this->form_validation->set_rules('reg_phone', 'reg_phone', 'trim|required');
	  $this->form_validation->set_rules('reg_addr', 'reg_addr', 'trim|required');
      if ($this->form_validation->run() == FALSE)
      {
	      $this->load->view('a/aregist.php');
	  }
	  else
	  {
	  	  $this->amodel->insert_member();
	      $this->load->view('a/alogin.php');
	  }
	 }
    public function show_books()
    {
    	$this->load->library('pagination');
    	$config['base_url'] = site_url('acontroller/show_books');
	    $config['total_rows'] = $this->db->count_all('BOOK');
	    $config['per_page'] = 4;
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
 	 	$data['books']=$this->amodel->get_books($config['per_page'],$this->uri->segment(3));
	 	$this->load->view('a/amainpage.php',$data);
    }		
}
