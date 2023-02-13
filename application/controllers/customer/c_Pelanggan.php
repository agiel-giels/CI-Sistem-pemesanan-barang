<?php

class c_Pelanggan extends CI_Controller{

    function __construct(){
        parent::__construct();		
        $this->load->model('m_Customer','', TRUE);
        $this->load->model('m_User','',TRUE);
        $this->load->model('m_Barang','',TRUE);
        $this->load->model('m_Pesan','',TRUE);
        if(! $this->session->userdata('id')){
            return redirect('c_Auth');
        }
    }

    function index(){
        $id = $this->session->userdata('id');

        $id_pesan = $this->m_Pesan->cek_pesan_aktif();

        $data['pesan'] = $this->m_Barang->get_byPesanan($id_pesan);

        $this->load->view('customer/header');
        $this->load->view('customer/barangCust', $data);
    }

    function invoice(){
        $data = array(
            'id_pesanan' => $this->m_Pesan->get_byid($this->session->userdata('id')),
        );

        $this->load->view('customer/header');
        $this->load->view('customer/pilihInvoice', $data);
    }

    function proses_invoice(){

        $this->load->library('dompdf_gen');
        $user = $this->session->userdata('id');
        $id_pesanan = $this->input->post('id_pesanan');
    
        $data = array(
                'title' => 'Laporan Barang',
                'barang' => $this->m_Barang->get_pesanan($id_pesanan),
                'date' => date('d - M - Y'),
            );
    
        $this->load->view('customer/invoice', $data);

            $paper_size = 'A4';
            $orientation = 'portrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);
            $this->dompdf->load_html($html);
            //$this->dompdf->render();
            $canvas = $this->dompdf->get_canvas();
            $this->dompdf->stream("Surat_Jalan.pdf", array('Attachment'=>0 ));
    
    }

    function tampilPemesanan(){
        $id = $this->session->userdata('id');
        
        $this->load->view('customer/header');
        $this->load->view('customer/v_pemesanan_barang');
    }

    function tambah(){
        $id = $this->session->userdata('id');
        $nama_barang = $this->input->post('nama_barang');
		$jenis_barang = $this->input->post('jenis_barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $tgl_pesan = $this->input->post('DATE');
        
        $cek_pesanan = $this->m_Pesan->cek_pesan_aktif();

        if($cek_pesanan){
            $data = array(
                'id' => $id,
                'id_pesanan' => $cek_pesanan,
                'nama_barang' => $nama_barang,
                'jenis_barang' => $jenis_barang,
                'qty' => $qty,
                'harga' => $harga,
            );

            $this->m_Barang->input_data($data);
        }else{
            $id_pesanan = $this->m_Pesan->buat_baru();

            $data = array(
                'id' => $id,
                'id_pesanan' => $id_pesanan,
                'nama_barang' => $nama_barang,
                'jenis_barang' => $jenis_barang,
                'qty' => $qty,
                'harga' => $harga,
            );

            $this->m_Barang->input_data($data);
        }
        
        redirect('customer/c_Pelanggan');
    }


    function list_pesanan(){ 
        $id = $this->session->userdata('id');
        $data2['pesan'] = $this->m_Barang->get_byid($id);
        $this->load->view('customer/header');
        $this->load->view('customer/barangCust', $data2);
    }

    public function delete_barang($id_barang){
        $this->m_Barang->hapusBarang($id_barang);

    }

    public function history_pesanan(){
        $id = $this->session->userdata('id');
        $data2['pesan'] = $this->m_Pesan->get_byid($id);
        $this->load->view('customer/header');
        $this->load->view('customer/history', $data2);
    }

    public function detail_pesanan($id_pesanan){
        $data = array(
            'barang' => $this->m_Barang->get_byPesanan($id_pesanan),
        );

        $this->load->view('customer/header');
        $this->load->view('customer/detail_history', $data);
    }

    public function checkout(){
        
        $this->m_Pesan->checkout($id_pesan);

        redirect('customer/c_Pelanggan');
    }

    public function pembatalan_pesanan(){ 
        $this->m_Pesan->pembatalanPesanan($id_pesan);

        redirect('customer/c_Pelanggan');
    }

}



?>