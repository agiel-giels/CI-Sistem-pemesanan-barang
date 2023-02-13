<?php

class c_Admin extends CI_Controller{

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
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard',$data);

    }


    public function proses_pesanan($id_pesan){
        $this->m_Pesan->prosesPesanan($id_pesan);

        redirect('admin/c_Barang');
    }

    public function kirim_pesanan($id_pesan){
        $this->m_Pesan->kirimPesanan($id_pesan);

        redirect('admin/c_Barang');
    }


    public function selesai_pesanan($id_pesan){
        $this->m_Pesan->selesaiPesanan($id_pesan);

        redirect('admin/c_Barang');
    }

    public function detail_pesanan($id_pesanan){
        $data = array(
            'id_pesanan' => $id_pesanan,
            'barang' => $this->m_Barang->get_byPesanan($id_pesanan),
        );

        $this->load->view('admin/header');
        $this->load->view('admin/detail_pesanan', $data);
    }

    public function confirm_pesanan($id_barang, $id_pesanan){
        $this->m_Barang->confirm_pesanan($id_barang);

        redirect('admin/c_Admin/detail_pesanan/'.$id_pesanan);
    }
    
    public function batalkan_pesanan($id_barang, $id_pesanan){
        $this->m_Barang->batalkan_pesanan($id_barang);

        redirect('admin/c_Admin/detail_pesanan/'.$id_pesanan);
    }

    public function laporan(){
        $data = array(
            'barang' => $this->m_Barang->get()->result_array(),
        );

        $this->load->view('admin/header');
        $this->load->view('admin/laporan', $data);
    }

    function download_laporan(){
        
        $data = array(
            'barang' => $this->m_Barang->get_Laporan(),
        );

        $this->load->view('admin/header');
        $this->load->view('admin/download_laporan', $data);
    }

    function proses_laporan(){
            $this->load->library('dompdf_gen');
            $user = $this->session->userdata('id');
            $tanggalawal = $this->input->post('tanggalawal');
            $tanggalakhir = $this->input->post('tanggalakhir');
            $id_pesan = $this->input->post('id_pesan');
        
            $data = array(
                    'title' => 'Laporan Barang',
                    'subtitle' => "Dari tanggal ".$tanggalawal.' Sampai tanggal '.$tanggalakhir,
                    'date' => date('d - M - Y'),
                    'barang' => $this->m_Barang->filterbytanggal($tanggalawal,$tanggalakhir,$id_pesan),
                    'id_pesan' => $id_pesan,
                    'tanggalawal' => $tanggalawal,
                    'tanggalakhir' => $tanggalakhir
                );
        
            $this->load->view('admin/cetak_laporan', $data);
        
            $paper_size = 'A4';
            $orientation = 'portrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);
            $this->dompdf->load_html($html);
            //$this->dompdf->render();
            $canvas = $this->dompdf->get_canvas();
            $this->dompdf->stream("Laporan.pdf", array('Attachment'=>0 ));
    }

    // function proses_laporan(){
    //     $user = $this->session->userdata('id');
    //     $tanggalawal = $this->input->post('tanggalawal');
    //     $tanggalakhir = $this->input->post('tanggalakhir');
    //     $submittype = $this->input->post('submittype');

    //     if ($submittype == 'filter') {
    //         if(isset($_GET['tanggalawal']) && isset($_GET['tanggalakhir'])){
	// 			$tanggalawal = $_GET['tanggalakhir'];
	// 			$tanggalakhir = $_GET['tanggalakhir'];
	// 		}
			
	// 		$data = array(
	// 			'title' => 'Laporan Perawatan',
	// 			'barang' => $this->m_Barang->get_Laporan($tanggalawal,$tanggalakhir),
	// 			'tanggalawal' => $tanggalawal,
	// 			'tanggalakhir' => $tanggalakhir,
	// 		);
	
	// 		$this->load->view('admin/download_laporan', $data);
			
    //     } else if ($submittype == 'print') {
    //         $this->load->library('dompdf_gen');

    //         $data = array(
    //                 'title' => 'Laporan Barang',
    //                 'barangggg' => $this->m_Barang->get_Laporan($tanggalawal,$tanggalakhir),
    //                 'date' => date('d - M - Y'),
    //                 'user' => $user,
    //                 'tanggalawal' => $tanggalawal,
    //                 'tanggalakhir' => $tanggalakhir
    //             );

	// 		$this->load->view('admin/cetak_laporan', $data);

	// 		$paper_size = 'A4';
	// 		$orientation = 'portrait';
	// 		$html = $this->output->get_output();
	// 		$this->dompdf->set_paper($paper_size, $orientation);

	// 		$this->dompdf->load_html($html);
	// 		$this->dompdf->render();
	// 		$this->dompdf->stream("Laporan_Perawatan_Barang_Inventaris.pdf", array("Attachment"=> false));

	// 		exit(0);
    //     }
    // }
}

?>