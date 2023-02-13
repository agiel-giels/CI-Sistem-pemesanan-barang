<?php
    class m_register extends CI_Model{

        function __construct(){
            $this->load->database();
            $this->load->library('encryption');
        }

        public function cekUsername(){
            $query = $this->db->query("SELECT * FROM user WHERE username = '$username' ");
            $cek = $query->num_rows();
            if($cek > 0){
                return true;
            }
            return false;
        }

        public function inputRegister($data){
            return $this->db->insert('user',$data);
        }



    }
?>