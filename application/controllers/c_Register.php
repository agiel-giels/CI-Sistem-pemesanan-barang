<?php
    class c_Register extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('m_register');
        }

        public function index(){
            $this->load->view('v_Register');
            $this->load->view('login/header');
            $this->load->view('login/footer');
        }

        public function aksi_register(){
            $nama = $this->input->post('nama');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');

            $cekUsername = $this->m_register->cekUsername($username);

            if($cekUsername){
                $this->session->set_flashdata('error','Username sudah digunakan!');
                return redirect('c_Register');
            }

            if($password != $password2){
                $this->session->set_flashdata('error','Password harus sama!');
                return redirect('c_Register');
            }

            $data = array(
                'nama' => $nama,
                'jabatan' => 'pelanggan',
                'no_telp' => $no_telp,
                'alamat' => $alamat,
                'username' => $username,
                'password' => $password
            );

            $input = $this->m_register->inputRegister($data);
            
            if($input){
                $this->session->set_flashdata('success','Register berhasil silakan login!');
                return redirect('C_auth');
            }
            $this->session->set_flashdata('error','gagal coba cek lagi!');
            return redirect('c_Register');
        }
    }




?>