<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{


    public function __construct()
    {

        parent::__construct();
        $this->load->model('Login_model');
    }
    
    //Halaman login
    public function index()
    {
        $this->load->view('login/list');
    }
    
    public function proses_login()
    {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

           // var_dump($username, $password);
                   // die;

            $cekuserdaftar= $this->Login_model->cekuserdaftar($username);
            if($cekuserdaftar){

                $ceklogin = $this->Login_model->ceklogin($username,$password);

                if ($ceklogin){
                    //var_dump($ceklogin);
                   // die;
                    foreach ($ceklogin as $row)

                    if($row->is_active == 'Y') {
                        $this->session->set_userdata('username', $row->username);
                        $this->session->set_userdata('nama', $row->nama);
                        $this->session->set_userdata('akses_level', $row->akses_level);
                        $this->session->set_userdata('email', $row->email);

                        if
                            (($this->session->userdata('akses_level')== "Admin")|| ($this->session->userdata('akses_level')== "User"))
                        {
                            redirect('admin/Dasbor', 'refresh');
                            


                        }else{
                            echo "<script>alert('Maaf, Anda tidak memiliki hak akses');</script>";
                            redirect('Login', 'refresh');

                        }
                    }else{

                        echo "<script>alert('Maaf, Username belum aktif');</script>";
                        redirect('Login', 'refresh');
                        
                    }

                }else{
                //var_dump($ceklogin);
                    //die;
                
                                    echo "<script>alert('Maaf, Username atau password salah!!');</script>";
                  
                        redirect('Login', 'refresh');

                }
            }else{

                echo "<script>alert('Maaf, Username belum terdafar.');</script>";
                        redirect('Login', 'refresh');

            }

            
            //end validasi
        
        
    }


    //fungsi logout
    public function logout()
    {
        //ambil fungsi logout dari simple login

        //ambil dari simple login

        $this->simple_login->logout();
    }
}

?>