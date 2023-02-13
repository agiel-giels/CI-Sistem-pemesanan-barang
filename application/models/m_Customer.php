<?php
class m_Customer extends CI_Model{

    public function __construct(){
        $this->load->database();
        $this->load->library('encryption');
    }

    public function get(){    
        return $this->db->get("pesan");
    }

    public function input_data($data){
        $this->db->insert('barang', $data);
    }

    






}