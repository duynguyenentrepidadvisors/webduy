<?php 

class UserController extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->library('encryption');
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
		$data=$this->getFormData($this->input);
		$checkUserName=$this->user->checkUserName($data['name'],"");
		if($checkUserName>0)
			echo false;
		else{
		$this->user->saveUser($data);
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
	    $data=$this->getFormData($this->input);
		$data['id']=$this->input->get('id');
		$checkUserName=$this->user->checkUserName($data['name'],$data['id']);
		if($checkUserName>0)
			echo false;
		else{		
		$this->user->updateUser($data['id'],$data);
		echo true;
     	}

	}
	public function getFormData($input)
	{
        $name=$input->get('name');
		$password=$input->get('password');
		$firstName=$input->get('firstName');
		$lastName=$input->get('lastName');
		return array("name" => $name,"password"=>$password,'firstName'=>$firstName,'lastName'=>$lastName);
	}

}
?>