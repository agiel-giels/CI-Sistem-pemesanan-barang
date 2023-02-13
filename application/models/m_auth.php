<?php
class m_auth extends CI_Model{
    
    public function __construct() {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function checkLogin($username,$password){

        $checkUsername = $this->db->query("SELECT id,nama,jabatan,jabatan FROM user WHERE username='$username' ");
        $hasil = $checkUsername->num_rows();

        if($hasil > 0){
            
            $checkPassword = $this->db->query("SELECT id,nama,jabatan,username FROM user WHERE username='$username' AND password ='$password' ");

            $hasil = $checkPassword->num_rows();

            if($hasil > 0){
                $data = $checkPassword->row_array();
                $data['status'] = "ditemukan";
                return $data;                
            }
            $data['status'] = "password";
            return $data;


        }
        $data['status'] = "username";
        return $data;


    }

    function tampil_data(){
		return $this->db->get('user');
	}

    public function checkLoginPelanggan($username, $password){
        $checkUsername = $this->db->query("SELECT id_pelanggan,id,nama_pelanggan, FROM pelanggan WHERE username='$username' ");
        $hasil = $checkUsername->num_rows();

        if($hasil > 0){
            
            $checkPassword = $this->db->query("SELECT id_pelanggan,id,nama_pelanggan, FROM pelanggan WHERE username='$username' AND password ='$password' ");

            $hasil = $checkPassword->num_rows();

            if($hasil > 0){
                $data = $checkPassword->row_array();
                $data['status'] = "ditemukan";
                return $data;                
            }
            $data['status'] = "password";
            return $data;


        }
        $data['status'] = "username";
        return $data;

    }
}

?>