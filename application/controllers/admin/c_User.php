<?php

class c_User extends CI_Controller{

    function __construct(){
        parent::__construct();		
        $this->load->model('m_User');
        if(! $this->session->userdata('id')){
            return redirect('c_Auth');
        }
    }

    function index(){
        $data['user'] = $this->m_User->get();
        $this->load->view('admin/header');
        $this->load->view('admin/v_user',$data);
    }
    public function aksiTambah(){
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

		$data = array(
			'nama' => $nama,
			'jabatan' => $jabatan,
			'no_telp' => $no_telp,
            'alamat' => $alamat,
			'username' => $username,
            'email' => $email,
			'password' => ($password)
		);

		$this->m_User->tambahUser($data);
		redirect('admin/c_User','refresh');
    }
	

    public function hapusUser($id){
		$this->m_User->hapusUser($id);
		redirect('admin/c_User','refresh');
	}

    public function updateUser($id){
		$data['user'] = $this->m_User->getDataById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit_user',$data);			
	}

    public function prosesUpdate($id){
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $email = $this->input->pos('email');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'jabatan' => $jabatan,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'username' => $username,
            'email' => $email,
            'password' => $password
        );

        if ($this->m_User->updateUser($id, $data)) {
            redirect("admin/c_User");
        } else {
            echo "error";
        }
    }


}

?>