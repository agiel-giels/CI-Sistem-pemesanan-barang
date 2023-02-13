<?php

class m_User extends CI_Model{

    public function __construct(){
        $this->load->database();
        $this->load->library('encryption');
    }

    public function get(){    
        return $this->db->get("user");
    }

    public function getDataById($id){
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where('id',$id);
		$data = $this->db->get();
		return $data->result_array();	
	}

    public function tambahUser($data){
        return $this->db->insert("user",$data);
    }

    public function hapusUser($id){
		$this->db->where('id',$id);
		return $this->db->delete('user');
	}

    public function updateUser($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('user',$data);
	}
    public function getnama($id){
    $this->db->where('id',$id);
    return $this->db->get('user')->result_array();
    }

    public function hitungJumlahDataUser()
{   
    $query = $this->db->get('user');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

}





?>