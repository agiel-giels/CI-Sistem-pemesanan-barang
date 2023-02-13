<?php

class c_Pimpinan extends CI_Controller{

    function __construct(){
        parent::__construct();		
        $this->load->model('m_auth');
        $this->load->model('m_Pesan');
        $this->load->model('m_Barang');
        $this->load->model('m_User');
        if(! $this->session->userdata('id')){
            return redirect('c_Auth');
        }
    }

    function index(){
        $data['total_pesan'] = $this->m_Pesan->hitungJumlahDataPesan();
        $data['total_user'] = $this->m_User->hitungJumlahDataUser();
        $data['total_barang'] = $this->m_Barang->hitungJumlahDataBarang();
        $this->load->view('pimpinan/header');
        $this->load->view('admin/dashboard',$data);
    }

    public function lihatLaporan(){
        $data = array(
            'barang' => $this->m_Barang->get()->result_array(),
        );
        $this->load->view('pimpinan/header');
        $this->load->view('pimpinan/laporan', $data);
    }

    public function download_laporan(){
        $data = array(
            'id_pesanan' => $this->m_Pesan->get()->result_array(),
        );

        $this->load->view('pimpinan/header');
        $this->load->view('admin/download_laporan', $data);
    }





}



?>