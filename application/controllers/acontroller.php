<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Acontroller extends CI_Controller {
	public function __construct()
    {
    parent::__construct();
    $this->load->model('amodel');
    }
	public function index()
	{
		/*$data['books'] = $this->amodel->get_books();
		$this->load->view('a/alogin.php',$data);*/
	}
}
