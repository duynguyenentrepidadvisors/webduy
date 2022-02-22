<?php
class user extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();

    }
    public function getList()
    {
        $this->db->select("*");
        $query= $this->db->get("user");
        return $query->result();
    }
    public function checkUser($name,$password)
    {
        $this->db->where('name',$name);
        $this->db->where('password',$password);
        $query = $this->db->get("user");
        return count($query->result());
    }
    public function checkUserName($name)
    {
        $this->db->where('name',$name);
        $query = $this->db->get("user");
        return count($query->result());
    }
     public function getListUser()
    {
        $this->db->select("*");
        $query= $this->db->from("user");
        $query= $this->db->get();
        return $query->result();
    }
     public function saveUser($data)
    {
        $query= $this->db->insert("user",$data);
        return true;
    }
      public function deleteUser($id)
    {
     $this->db->where('id', $id);
     $this->db->delete('user');    
     return true;
    }
      public function updateUser($id,$data)
    {
       $this->db->update('user',$data,array('id' =>  $id ));
        return true;
    }
     public function getUser($id)
    {
        return $this->db->get_where('user',array('id'=>$id))->result_array();;
    }
}
?>