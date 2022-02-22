<?php 

class UserController extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('user');
	}
	public function index()
	{
		$list=$this->user->getListUser();
		$this->load->view('user/user-dashboard',array('list'=>$list));	
	}
    public function addUser()
	{
		$this->load->view('user/add-user');
	}
	public function saveUser()
	{
		$name=$this->input->get('name');
		$password=$this->input->get('password');
		$checkUserName=$this->user->checkUserName($name);
		if($checkUserName>0)
			echo false;
		else{
		$this->user->saveUser(array("name" => $name,"password"=>$password));
		echo true;	
		}
	}
	public function deleteUser()
	{
		$id=$this->input->post('id');
		$this->user->deleteUser($id);
		echo true;
	}
	 public function editUser($id)
	{
		$user=$this->user->getUser($id);
		$this->load->view('user/edit-user',array('user'=>$user,'id'=>$id));
	}
	public function updateUser()
	{
		$name=$this->input->get('name');
		$id=$this->input->get('id');
		$this->user->updateUser($id,array("name" => $name));
		echo true;
	}

}
?>