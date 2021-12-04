<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoripelanggan extends CI_Controller{
    
    //Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategoripelanggan_model');
        //proteksi
        $this->simple_login->cek_login();
    }

    //Data kategori
    public function index()
    {
        $kategoripelanggan = $this->kategoripelanggan_model->listing();
        $data = array('title'                => 'Data Kategori Pelanggan',
                      'kategoripelanggan'    => $kategoripelanggan,
                      'isi'                  => 'admin/kategoripelanggan/list'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }

    //Tambah kategori
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategoripelanggan','Nama kategori','required|is_unique[kategori_pelanggan.nama_kategoripelanggan]', 
                array( 'required'    =>'%s harus diisi',
                        'is_unique'  =>'%s Sudah ada. Buat kategori baru!'));
                                
        if($valid->run()===FALSE){
        //end validasi

        $data = array('title'   => 'Tambah Kategori Pelanggan',
                      'isi'    => 'admin/Kategoripelanggan/tambah'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk databese
        }else{
            $i             = $this->input;
            $slug_kategoripelanggan = url_title($this->input->post('nama_kategoripelanggan'),'dash',TRUE);

            $data = array(  'slug_kategoripelanggan'     => $slug_kategoripelanggan,
                            'nama_kategoripelanggan'     =>  $i->post('nama_kategoripelanggan'),            
                            'urutan'                     =>  $i->post('urutan')
                        );
            $this->kategoripelanggan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/kategoripelanggan'),'refresh');
        }
        //end masuk database
    }

    //Edit kategori
    public function edit($id_kategoripelanggan)
    {
        $kategoripelanggan = $this->kategoripelanggan_model->detail($id_kategoripelanggan);
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategoripelanggan','Nama kategori','required', 
                array( 'required'    =>'%s harus diisi'));
                
                
        if($valid->run()===FALSE){
        //end validasi

        $data = array('title'                => 'Edit Kategori Pelanggan',
                      'kategoripelanggan'    => $kategoripelanggan,
                      'isi'                  => 'admin/kategoripelanggan/edit'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk databese
        }else{
            $i             = $this->input;
            $slug_kategoripelanggan = url_title($this->input->post('nama_kategoripelanggan'),'dash',TRUE);
            $data = array(  'id_kategoripelanggan'       =>  $id_kategoripelanggan,
                            'slug_kategoripelanggan'     =>  $slug_kategoripelanggan,
                            'nama_kategoripelanggan'     =>  $i->post('nama_kategoripelanggan'),            
                            'urutan'                     =>  $i->post('urutan')
                        );
            $this->kategoripelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/kategoripelanggan'),'refresh');
        }
        //end masuk database
    }

    //Delete kategori
    public function delete($id_kategoripelanggan)
    {
        $data = array('id_kategoripelanggan' => $id_kategoripelanggan);
        $this->kategoripelanggan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect(base_url('admin/kategoripelanggan'),'refresh');
    }
}

?>