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
      $this->load->helper('cookie');
      $this->load->library('cart');
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
	  $this->form_validation->set_rules('reg_pwd', 'reg_pwd', 'trim|required|min_length[6]|max_length[30]|matches[conf_pwd]|md5');
	  $this->form_validation->set_rules('conf_pwd', 'conf_pwd', 'trim|required');
	  $this->form_validation->set_rules('reg_name', 'reg_name', 'required|max_length[20]');
	  $this->form_validation->set_rules('reg_sex', 'reg_sex', 'required');
	  $this->form_validation->set_rules('reg_phone', 'reg_phone', 'trim|required|is_natural|max_length[20]');
	  $this->form_validation->set_rules('reg_addr', 'reg_addr', 'trim|required|max_length[50]');
      if ($this->form_validation->run() == FALSE)
      {
	      $this->load->view('a/aregist.php');
	  }
	  else
	  {
	  	  $this->amodel->insert_member();
	  	  echo "注册成功";
	      $this->load->view('a/alogin.php');
	  }
	 }
    public function show_books()
    {
      $data['username']=get_cookie('username',true);
    	$this->load->library('pagination');
    	$config['base_url'] = site_url('acontroller/show_books');
	    $config['total_rows'] = $this->db->count_all('BOOK');
	    $config['per_page'] = 4;
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
 	 	  $data['books']=$this->amodel->get_books($config['per_page'],$this->uri->segment(3));
	 	  $this->load->view('a/amainpage.php',$data);
    }
    public function book_detail($book_isbn)
    {
	    $data['username']=get_cookie('username',true);
	    $data['detail']=$this->amodel->book_detail($book_isbn);
	    $this->load->view('a/bookdetail.php',$data);
    }
    public function add_cart()
    {
		$this->form_validation->set_rules('cart_isbn', 'cart_isbn', 'trim|required');
		if ($this->form_validation->run() == FALSE)
        {
	       $this->load->view('a/mainpage.php');
	    }
	    else
	    {
	  	   $data = array(
               'id'   => $this->input->post('cart_isbn'),
               'qty'  => $this->input->post('cart_num'),
               'price'=> $this->input->post('cart_price'),
               'name' => $this->input->post('cart_name')
            );
           $this->cart->insert($data);
	  	   /*$cart = $this->cart->contents();
	  	   echo "<pre>";
	  	   print_r($cart);*/
	  	   echo "添加成功";
	  	   $this->show_cart();
        }
    }
    public function show_cart()
    {
    	$username = "";
    	$data['person_name'] = "";
    	$data['person_addr'] = "";
        $data['person_phone'] = "";
    	if(get_cookie('username',true))
    	{
             $row = $this->amodel->person_info(get_cookie('username',true));
             $data['person_name'] = $row->MEMBER_NAME;
             $data['person_addr'] = $row->MEMBER_ADDR;
             $data['person_phone'] = $row->MEMBER_PHONE;
    	}
        $this->load->view('a/cartview.php',$data);
    }
    public function delete_cart()
    {
    	$data = array(
               'rowid'   => $this->input->post('cart_rowid'),
               'qty'  => 0,
            );	
    	$this->cart->update($data);
    	$this->show_cart();
    }
    public function delete_cookie()
    {
    	delete_cookie('username');
    	$this->load->view('a/alogin.php');
    }
    public function create_order()
    {
    	$this->form_validation->set_rules('menber_post','member_post','trim|required');
    	$this->form_validation->set_rules('get_name', 'get_name', 'trim|required');
	    $this->form_validation->set_rules('get_addr', 'get_name', 'trim|required');
	    $this->form_validation->set_rules('get_phone', 'get_phone', 'trim|required');
	    $flag = $this->amodel->create_order();
	    if($flag ==1 ) 
	    {
            echo "订单生成成功";
	        $this->show_cart();
	    }
	    else
	    { 
	    	echo "订单生成失败";
	        $this->show_cart();
	    }
    }
    public function show_my_order()
    {
    	$data['order'] = $this->amodel->show_my_order();
    	$this->load->view('a/myorder.php',$data);
    }
    public function get_order()
    {
       $data = $this->amodel->get_order();
       echo $data;
    }
    public function show_detail_order()
    {
        $result = $this->amodel->show_detail_order();
        if($result){   // we got a result, output json
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    } 
}
