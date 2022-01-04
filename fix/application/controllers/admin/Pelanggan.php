<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller{
    
    //Load model
    public function __construct()
    {
        parent::__construct();
       
         $this->load->model('pelanggan_model');
         $this->load->model('kategoripelanggan_model');
        //proteksi
         $this->load->library('upload');
        $this->simple_login->cek_login();
    }

    //Data pelanggan
    public function index()
    {
        $pelanggan = $this->pelanggan_model->listing_kategoripelanggan();
        $data = array('title'        => 'Data Pelanggan',
                      'pelanggan'    => $pelanggan,
                      'isi'          => 'admin/pelanggan/list'
                     );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function detail($id_pelanggan)
    {
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);
        $data = array('title'        => 'Data Pelanggan',
                      'pelanggan'    => $pelanggan,
                      'isi'          => 'admin/pelanggan/detail'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah pelanggan
     
        public function tambahpelanggan()
    {
      
        //ambil data kategori pelanggan
        $kategoripelanggan = $this->kategoripelanggan_model->listing();
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan','Nama Pelanggan','required', 
                array( 'required'    =>'%s harus diisi'));
       
        
        $upload_gambar_iupb = "";    
        $upload_gambar_nib= "";    
        $upload_gambar_siup = "";    
        if($valid->run()){
            
            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'pdf|gif|jpg|png|jpeg';
            $config['max_size']       = '2400'; //dalam kb
            $config['max_width']      = '2024';
            $config['max_height']     = '2024';
            
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('iupb')){
              $data = array('title'             => 'Tambah Pelanggan',
                                  'kategoripelanggan' => $kategoripelanggan,
                                  'error'             => $this->upload->display_errors(),
                                  'isi'               => 'admin/pelanggan/tambahpelanggan'
                                 );
              $this->load->view('admin/layout/wrapper', $data, FALSE);
            }else{
              $upload_gambar_iupb = array('upload_data' => $this->upload->data());

              //create thumb
              $config['image_library']    = 'gd2';
              $config['source_image']     = './assets/upload/image/'.$upload_gambar_iupb['upload_data']['file_name'];
              //lokasi folder gbr thumb
              $config['new_image']    = './assets/upload/image/thumbs/';
              $config['create_thumb']     = TRUE;
              $config['maintain_ratio']   = TRUE;
              $config['width']            = 250;
              $config['height']           = 250;
              $config['thumb_marker']     = '';
              
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
            $this->upload->initialize($config);
              if ( ! $this->upload->do_upload('nib')){
                $data = array('title'             => 'Tambah Pelanggan',
                                  'kategoripelanggan' => $kategoripelanggan,
                                  'error'             => $this->upload->display_errors(),
                                  'isi'               => 'admin/pelanggan/tambahpelanggan'
                                 );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
              }else{
                $upload_gambar_nib = array('upload_data' => $this->upload->data());

                //create thumb
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar_nib['upload_data']['file_name'];
                //lokasi folder gbr thumb
                $config['new_image']    = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;
                $config['thumb_marker']     = '';
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('siup')){

                    //end validasi

                    $data = array('title'             => 'Tambah Pelanggan',
                                  'kategoripelanggan' => $kategoripelanggan,
                                  'error'             => $this->upload->display_errors(),
                                  'isi'               => 'admin/pelanggan/tambahpelanggan'
                                 );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);

                //masuk databese
                }else{
                    $upload_gambar_siup = array('upload_data' => $this->upload->data());
                    //create thumb
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_gambar_siup['upload_data']['file_name'];
                    //lokasi folder gbr thumb
                    $config['new_image']    = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

              }
            }
            //end thumb

            $i = $this->input;
            //slug
            $slug_pelanggan = url_title($this->input->post('nama_pelanggan').'-'.$this->input->post('no_identitas'),'dash',TRUE);
            $data = array(  
                'id_user'                =>  $this->session->userdata('id_user'),
              
                'id_pelanggan'           =>  $i->post('id_pelanggan'),
                'id_kategoripelanggan'   =>  $i->post('id_kategoripelanggan'),
                'nama_pelanggan'         =>  $i->post('nama_pelanggan'),
                'no_identitas'           =>  $i->post('no_identitas'),
                'nama_perusahaan'        =>  $i->post('nama_perusahaan'),
                'hp'                     =>  $i->post('hp'),
                'telepon_kantor'         =>  $i->post('telepon_kantor'),
                'no_rekening'            =>  $i->post('no_rekening'),
                'alamat'                 =>  $i->post('alamat'),
                'kota'                   =>  $i->post('kota'),
                'provinsi'               =>  $i->post('provinsi'),
                'keterangan'             =>  $i->post('keterangan'),
                'iupb'                   =>  $upload_gambar_iupb['upload_data']['file_name'],
                'nib'                    =>  $upload_gambar_nib['upload_data']['file_name'],
                'siup'                   =>  $upload_gambar_siup['upload_data']['file_name']
               
                
                );
            $this->pelanggan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/pelanggan'),'refresh');
        }
        //end masuk database
        $data = array('title'                => 'Tambah Pelanggan',
                      'kategoripelanggan'    => $kategoripelanggan,
                      'isi'                  => 'admin/pelanggan/tambahpelanggan'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


//Edit data pelanggan
   public function edit($id_pelanggan)
    {
        //ambil data yang akan diedit
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);
        //ambil data kategori
        $kategoripelanggan = $this->kategoripelanggan_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan','Nama pelanggan','required', 
                array( 'required'    =>'%s harus diisi'));
       
        $upload_gambar_iupb = "";    
        $upload_gambar_nib= "";    
        $upload_gambar_siup = "";
        $bool_iupb = false;  
        $bool_nib = false;  
        $bool_siup = false;
        $i = $this->input;
        //slug
       $slug_pelanggan = url_title($this->input->post('nama_pelanggan').'-'.$this->input->post('no_identitas'),'dash',TRUE);
        $data = array(  
          'id_user'                =>  $this->session->userdata('id_user'),
          'id_pelanggan'           =>  $id_pelanggan,
          'id_kategoripelanggan'   =>  $i->post('id_kategoripelanggan'),
          'nama_pelanggan'         =>  $i->post('nama_pelanggan'),
          'no_identitas'           =>  $i->post('no_identitas'),
          'nama_perusahaan'        =>  $i->post('nama_perusahaan'),
          'hp'                     =>  $i->post('hp'),
          'telepon_kantor'         =>  $i->post('telepon_kantor'),
          'no_rekening'            =>  $i->post('no_rekening'),
          'alamat'                 =>  $i->post('alamat'),
          'kota'                   =>  $i->post('kota'),
          'provinsi'               =>  $i->post('provinsi'),
          'keterangan'             =>  $i->post('keterangan'),
          'slug_pelanggan'         =>  $slug_pelanggan
          );
          
        if($valid->run()){
            //cek jika ganti gambar

            if(!empty($_FILES['iupb']['name'])){

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'pdf|gif|jpg|png|jpeg';
            $config['max_size']       = '2400'; //dalam kb
            $config['max_width']      = '2024';
            $config['max_height']     = '2024';
            
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('iupb')){
              //end validasi

              $data = array('title'    => 'Edit Pelanggan: '.$pelanggan->nama_pelanggan,
                            'kategoripelanggan' => $kategoripelanggan,
                            'pelanggan'   => $pelanggan,
                            'error'    => $this->upload->display_errors(),
                            'isi'      => 'admin/pelanggan/edit'
                           );
              $this->load->view('admin/layout/wrapper', $data, FALSE);
            //masuk databese
            }else{
              $bool_iupb = true;  
              $upload_gambar_iupb = array('upload_data' => $this->upload->data());

                    //create thumb
              $config['image_library']    = 'gd2';
              $config['source_image']     = './assets/upload/image/'.$upload_gambar_iupb['upload_data']['file_name'];
                    //lokasi folder gbr thumb
              $config['new_image']    = './assets/upload/image/thumbs/';
              $config['create_thumb']     = TRUE;
              $config['maintain_ratio']   = TRUE;
              $config['width']            = 250;
              $config['height']           = 250;
              $config['thumb_marker']     = '';
                  
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
              $this->upload->initialize($config);
              $data['iupb'] =  $upload_gambar_iupb['upload_data']['file_name'];

           }
           if(!empty($_FILES['nib']['name'])){

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'pdf|gif|jpg|png|jpeg';
            $config['max_size']       = '2400'; //dalam kb
            $config['max_width']      = '2024';
            $config['max_height']     = '2024';
              if ( ! $this->upload->do_upload('nib')){
                    //end validasi
                  $data = array('title'             => 'Edit Pelanggan: '.$pelanggan->nama_pelanggan,
                            'kategoripelanggan' => $kategoripelanggan,
                            'pelanggan'         => $pelanggan,
                            'error'             => $this->upload->display_errors(),
                            'isi'               => 'admin/pelanggan/edit'
                                 );
                  $this->load->view('admin/layout/wrapper', $data, FALSE);


                  //masuk databese
              }else{
                $bool_nib = true;  
                $upload_gambar_nib = array('upload_data' => $this->upload->data());

                        //create thumb
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar_nib['upload_data']['file_name'];
                        //lokasi folder gbr thumb
                $config['new_image']    = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;
                $config['thumb_marker']     = '';
                        
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $data['nib'] =  $upload_gambar_nib['upload_data']['file_name'];

              }
            }
                if(!empty($_FILES['siup']['name'])){

                  $config['upload_path']    = './assets/upload/image/';
                  $config['allowed_types']  = 'pdf|gif|jpg|png|jpeg';
                  $config['max_size']       = '2400'; //dalam kb
                  $config['max_width']      = '2024';
                  $config['max_height']     = '2024';
    
    
                    if ( ! $this->upload->do_upload('siup')){
                            //end validasi
                   $data = array('title'    => 'Edit Pelanggan: '.$pelanggan->nama_pelanggan,
                                 'kategoripelanggan' => $kategoripelanggan,
                                 'pelanggan'   => $pelanggan,
                                 'error'    => $this->upload->display_errors(),
                                 'isi'      => 'admin/pelanggan/edit'
                                         );
                            $this->load->view('admin/layout/wrapper', $data, FALSE);
    
    
                      //masuk databese
                    }else{ 
                      $bool_siup = true;
                      $upload_gambar_siup = array('upload_data' => $this->upload->data());
        
                                    //create thumb
                      $config['image_library']    = 'gd2';
                      $config['source_image']     = './assets/upload/image/'.$upload_gambar_siup['upload_data']['file_name'];
                                    //lokasi folder gbr thumb
                      $config['new_image']    = './assets/upload/image/thumbs/';
                      $config['create_thumb']     = TRUE;
                      $config['maintain_ratio']   = TRUE;
                      $config['width']            = 250;
                      $config['height']           = 250;
                      $config['thumb_marker']     = '';        
                      $this->load->library('image_lib', $config);
                      $this->image_lib->resize();
                      $data['siup'] =  $upload_gambar_siup['upload_data']['file_name'];
                    }
                }             
            //end thumb

           
            // $this->pelanggan_model->edit($data);

        }
        if($bool_iupb == true && $bool_nib == true &&   $bool_siup == true){
          $this->pelanggan_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah berhasil diedit');
        redirect(base_url('admin/pelanggan'),'refresh');
        }
      }else{
        $data = array('title'             => 'Edit Pelanggan: '.$pelanggan->nama_pelanggan,
                      'kategoripelanggan' => $kategoripelanggan,
                      'pelanggan'         => $pelanggan,
                      'isi'               => 'admin/pelanggan/edit'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
        
    }

    public function download($id_pelanggan)
    {
       $pelanggan = $this->pelanggan_model->listing();

     // $pelanggan 

   $data = array(  'title'              => 'download gambar',
                   'pelanggan'          => $pelanggan,
                   'kategoripelanggan'  => $kategoripelanggan,
                      
                    );

    force_download('./assets/upload/image/thumbs/'.$data->nama_berkas,NULL);
    
    $this->load->view('admin/pelanggan/detail', $data, FALSE); 

    }


  
    
     //Cetak
    public function cetak($id_pelanggan)
    {
        $pelanggan       = $this->pelanggan_model->id_pelanggan($id_pelanggan);
       
        //ambil data kategori
        $kategoripelanggan = $this->kategoripelanggan_model->listing();
        
       

        $data = array(  'title'              => 'Cetak Pelanggan',
                        'pelanggan'          => $pelanggan,
                        'kategoripelanggan'  => $kategoripelanggan,
                      
                    );
        $this->load->view('admin/pelanggan/cetak', $data, FALSE);
    }


        
    

    //Delete pelanggan
    public function delete($id_pelanggan)
    {
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);
        $data = array('id_pelanggan' => $id_pelanggan);
        $this->pelanggan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect(base_url('admin/pelanggan'),'refresh');
    }



    //cetak excel data pelanggan
    public function excel()
    {

       $pelanggan = $this->pelanggan_model->listing_kategoripelanggan();


        $data = array(  'title'              => 'Cetak Pelanggan',
                        'pelanggan'          => $pelanggan,
                        'kategoripelanggan'  => $kategoripelanggan,
                      
                    );

      $this->load->view('admin/pelanggan/excel', $data, FALSE); 
         
    }


    //print data pelanggan
    public function print()
    {

       $pelanggan = $this->pelanggan_model->listing_kategoripelanggan();


        $data = array(  'title'              => 'Cetak Pelanggan',
                        'pelanggan'          => $pelanggan,
                        
                      
                    );

      
         $this->load->view('admin/pelanggan/print', $data, FALSE); 
    }

    
}

?>
