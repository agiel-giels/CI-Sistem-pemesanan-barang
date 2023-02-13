<?php 
class c_Barang extends CI_Controller{

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
        $data = array(
            'pesanan_checkout' => $this->m_Pesan->get_checkout(),
            'pesanan_diproses' => $this->m_Pesan->get_diproses(),
        );

        $this->load->view('admin/header');
        $this->load->view('admin/v_Barang', $data);
    }

    public function aksiTambah(){
		$nama_barang = $this->input->post('nama_barang');
		$jenis_barang = $this->input->post('jenis_barang');
		$tahun_pembuatan = $this->input->post('tahun_pembuatan');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');

		$data = array(

			'nama_barang' => $nama_barang,
			'jenis_barang' => $jenis_barang,
			'tahun_pembuatan' => $tahun_pembuatan,
            'harga' => $harga,
			'qty' => $qty

		);

		$this->m_Barang->input_data($data,'barang');
		redirect('admin/c_Barang','refresh');
	}


    public function hapusBarang($id_barang){
		$this->m_Barang->hapusBarang($id_barang);
		redirect('admin/c_Barang','refresh');
	}

    // public function updateBarang($id_barang){
	// 	$data['barang'] = $this->m_Barang->getDataById($id_barang);
	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/edit_barang',$data);			
	// }


    public function prosesUpdate($id_barang){
        $nama_barang = $this->input->post('nama_barang');
        $jenis_barang = $this->input->post('jenis_barang');
        $tahun_pembuatan = $this->input->post('tahun_pembuatan');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        

        $data = array(
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'tahun_pembuatan' => $tahun_pembuatan,
            'harga' => $harga,
            'qty' => $qty
        );

        if ($this->m_Barang->updateBarang($id_barang, $data)) {
            redirect("admin/c_Barang");
        } else {
            echo "error";
        }
    }

    public function confirm_pesanan($id_pesan){
        $this->m_Pesan->prosesPesanan($id_pesan);

        redirect("admin/c_Barang");
    }

    


}
?>