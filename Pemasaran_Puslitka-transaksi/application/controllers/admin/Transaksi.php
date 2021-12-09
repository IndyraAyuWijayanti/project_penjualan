<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('pelanggan_model');
        $this->load->model('produk_model');
        $this->load->model('bank_model');
     
       
    }

    // Load data transaksi 
    public function index()
    {
         $transaksi = $this->transaksi_model->listing_pelanggan();
         $data = array(  'title'             => 'Data Transaksi',
                         'transaksi'         =>  $transaksi,
                         'isi'               => 'admin/transaksi/list'
                          );
         $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


     //Tambah transaksi
    public function tambah()
    {
      
        
        $pelanggan = $this->pelanggan_model->listing();
        $produk    = $this->produk_model->listing();
        $bank    = $this->bank_model->listing();
        //validasi input
        //validasi input
        //validasi input
        $valid = $this->form_validation;
       
        
                        
        if($valid->run()){
            
            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = '2400'; //dalam kb
            $config['max_width']      = '2024';
            $config['max_height']     = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('bukti_bayar1')){
        //end validasi

        $data = array('title'             => 'Tambah Transaksi',
                      'pelanggan'         => $pelanggan,
                      'produk'            => $produk,
                      'bank'              => $bank,
                      'error'             => $this->upload->display_errors(),
                      'isi'               => 'admin/transaksi/tambah'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk databese
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumb
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            //lokasi folder gbr thumb
            $config['new_image']    = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;
            $config['height']           = 250;
            $config['thumb_marker']     = '';
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //end thumb

            $i = $this->input;
            //slug
           
            $data = array(  
                'id_user'                =>  $this->session->userdata('id_user'),
              
                'id_header_transaksi'   =>  $i->post('id_header_transaksi'),
                'id_transaksi'          =>  $i->post('id_transaksi'),
                'id_produk'             =>  $i->post('id_produk'),
                'id_pelanggan'          =>  $i->post('id_pelanggan'),
                'id_bank'               =>  $i->post('id_bank'),
                'nama_pelanggan'        =>  $i->post('nama_pelanggan'),
                'nama_produk'           =>  $i->post('nama_produk'),
                'harga'                 =>  $i->post('harga'),
                'qty'                   =>  $i->post('qty'),
                'ongkir'                =>  $i->post('ongkir'),
                'diskon'                =>  $i->post('diskon'),
                'total_jumlahproduk'    =>  $i->post('total_jumlahproduk'),
                'total_tagihan'         =>  $i->post('total_tagihan'),
                'total_pembayaran'      =>  $i->post('total_pembayaran'),
                'alamat_pengiriman'     =>  $i->post('alamat_pengiriman'),
                'status_pembayaran'     =>  $i->post('status_pembayaran'),
                'tgl_bayar1'            =>  $i->post('tgl_bayar1'),
                'bukti_bayar1'          =>  $i->post('bukti_bayar1'),
                'jumlah_bayar1'         =>  $i->post('jumlah_bayar1'),
                'nama_bank'             =>  $i->post('nama_bank'),
                'tgl_bayar2'            =>  $i->post('tgl_bayar2'),
                'bukti_bayar2'          =>  $i->post('bukti_bayar2'),
                'jumlah_bayar2'         =>  $i->post('jumlah_bayar2'),
                
                'tgl_bayar3'            =>  $i->post('tgl_bayar3'),
                'bukti_bayar3'          =>  $i->post('bukti_bayar3'),
                'jumlah_bayar3'         =>  $i->post('jumlah_bayar3')
               
                        
               
                
                );
            $this->transaksi_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
            redirect(base_url('admin/transaksi'),'refresh');
        }}
        //end masuk database
        $data = array('title'                => 'Tambah Transaksi',
                      'pelanggan'            => $pelanggan,
                      'produk'               => $produk,
                      'bank'                 => $bank,
                      'isi'                  => 'admin/transaksi/tambah'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    //Detail
    public function detail($kode_transaksi)
    {
        $transaksi = $this->transaksi_model->id_transaksi($id_transaksi);
        $pelanggan = $this->pelanggan_model->id_transaksi($id_transaksi);

        $data = array(  'title'              => 'Riwayat belanja',
                        'header_transaksi'   => $header_transaksi,
                        'transaksi'          => $transaksi,
                        'isi'                => 'admin/transaksi/detail'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //status
    public function status($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

        $i = $this->input;

        $data = array(  'id_header_transaksi'       => $header_transaksi->id_header_transaksi,
                        'id_user'                   => $this->session->userdata('id_user'),
                        'status_bayar'              => 'Success'
                    );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah diedit');
        redirect(base_url('admin/transaksi'),'refresh');
    }

    //Cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site             = $this->konfigurasi_model->listing();

        $data = array(  'title'              => 'Riwayat belanja',
                        'header_transaksi'   => $header_transaksi,
                        'transaksi'          => $transaksi,
                        'site'               => $site
                    );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

     //Cetak PDF
     public function pdf($kode_transaksi)
     {
         $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
         $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
         $site             = $this->konfigurasi_model->listing();
 
         $data = array(  'title'              => 'Riwayat belanja',
                         'header_transaksi'   => $header_transaksi,
                         'transaksi'          => $transaksi,
                         'site'               => $site
                     );
        // $this->load->view('admin/transaksi/cetak', $data, FALSE);
        $html   = $this->load->view('admin/transaksi/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $mpdf->Output();

     }

     // Pengiriman
     public function kirim($kode_transaksi)
     {
         $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
         $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
         $site             = $this->konfigurasi_model->listing();
 
         $data = array(  'title'              => 'Riwayat belanja',
                         'header_transaksi'   => $header_transaksi,
                         'transaksi'          => $transaksi,
                         'site'               => $site
                     );
        // $this->load->view('admin/transaksi/kirim', $data, FALSE);
      $html   = $this->load->view('admin/transaksi/kirim', $data, true);
        // load fungsi mpdf
         $mpdf = new \Mpdf\Mpdf();
         // SETTING HEADER DAN FOOTER
        $mpdf->SetHTMLHeader('
         <div style="text-align: right; font-weight: bold;">
             <img src="'.base_url('assets/uploud/image/'.$site->logo).'" style="height: 50px; width= auto;">
        </div>');
        $mpdf->SetHTMLFooter('
          <div style="padding: 10px 20px; background-color: black; color: white; font-size: 12px;">
             Alamat: '.$site->namaweb.' ('.$site->alamat.')<br>
             Telepon: '.$site->telepon.'
         ');
        // END SETTING HEADER DAN FOOOTER
        // Write some HTML code:
         $mpdf->WriteHTML($html);
        // Output tampil dengan nama baru
         $nama_file_pdf = url_title($site->namaweb, 'dash', 'true').'-'.$kode_transaksi.'.pdf';
         $mpdf->Output($nama_file_pdf,'D'); 

     }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */