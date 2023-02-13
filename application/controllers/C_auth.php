<?php

class C_auth extends CI_Controller{

    function __construct(){
		parent::__construct();		
		$this->load->model('m_auth');
	}

    function index(){
        $this->load->view('login/v_login');
        $this->load->view('login/header');
        $this->load->view('login/footer');
    }


      public function checkLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dataCheck = $this->m_auth->checkLogin($username,$password);

        if($dataCheck['status'] == "ditemukan"){
            if($dataCheck['jabatan'] == "admin"){
                $this->session->set_userdata($dataCheck);
                return redirect("admin/c_Admin");
            }

            if($dataCheck['jabatan'] == "pimpinan"){
                $this->session->set_userdata($dataCheck);
                return redirect("pimpinan/c_Pimpinan");
            }

            if($dataCheck['jabatan'] == "pelanggan"){
                $this->session->set_userdata($dataCheck);
                return redirect("customer/c_Pelanggan");
            }            

            
            return redirect("c_Auth");  
        }
        if($dataCheck['status'] == "password"){
            $this->session->set_flashdata("error","Login Gagal Karena Password Salah");
            return redirect("C_auth");
        }

        $this->session->set_flashdata("error","Login Gagal Karena Username Belum Terdaftar");
        return redirect("C_auth");


    }
    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('C_auth','refresh');
    }

    
}
?>