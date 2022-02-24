<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->library('session');
	}
	public function index()
	{
        if($this->session->has_userdata("name"))
        {
        	redirect('dashboard','refresh');
        }
		$this->load->view('auth/login',"refresh");
	}
	public function login()
	{

	    $this->form_validation->set_rules('name','Name','required');
	    $this->form_validation->set_rules('password','Password','required');
	    if($this->form_validation->run()){
        $login=$this->input->post('login');
		if(isset($login))
		{
		$name=$this->input->post('name');
		$password=$this->input->post('password');
		$check=$this->user->checkUser($name,$password);
        if($check>0)
        {
        	$data=array(
        		'name'=>$name,
        	    'password'=>$password);
        	$this->session->set_userdata($data);
        	redirect('dashboard','refresh');
	    }
	    else
	    {
	    	$this->session->set_flashdata('message', 'User or password invalid.');
        	$this->index();
	    }}
	    }else{
        	$this->index();
	    }
	}
}