<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('pembayaran_model');
        $this->load->model('pelanggan_model');
        $this->load->model('produk_model');
        $this->load->model('bank_model');
		$this->data['aktif'] = 'transaksi';
     
       
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
        $bank      = $this->bank_model->listing();   
        $kode      = $this->transaksi_model->kode();   

        // var_dump($kode);
        // die;

        $data = array('title' => 'Tambah Transaksi',
                
                'pelanggan'         => $pelanggan,
                'produk'            => $produk,
                'bank'              => $bank,
                'kode'              => $kode,
                'isi'               => 'admin/transaksi/tambahpenjualan'
                );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

     //proses tambah kredit
     public function proses_tambah(){
		
		$jumlah_barang_dibeli = count($this->input->post('nama_produk_hidden'));
		$data_penjualan = [];
        
        $data_penjualan['id_user'] =  $this->session->userdata('id_user');
        
        $data_penjualan['kode_transaksi'] = $this->input->post('kode_transaksi');
        $data_penjualan['tanggal_transaksi'] = date('Y/m/d');
        $data_penjualan['tanggal_pembayaran'] = $this->input->post('tanggal_pembayaran');
        $data_penjualan['id_jenis_pembayaran'] = $this->input->post('id_jenis_pembayaran_hidden');
        $data_penjualan['id_pelanggan']= $this->input->post('id_pelanggan');
        $data_penjualan['alamat_pengiriman'] = $this->input->post('alamat_pengiriman_hidden');
        $data_penjualan['nomor_spk']= $this->input->post('nomor_spk_hidden');
        $data_penjualan['bayar']= $this->input->post('bayar_hidden');
        $data_penjualan['id_bank']= $this->input->post('id_bank_hidden');
        $data_penjualan['bukti_pembayaran']= $this->_uploadImage();
		// if (!$this->input->post('grand_total')) {
		// 	$data_penjualan['total'] = $this->input->post('total_hidden');
		// } else {
			$data_penjualan['total'] = $this->input->post('grandtotal');
		// }
        $this->transaksi_model->tambah($data_penjualan);
        // $data['d'] = $this->input->post('id_produk_hidden');
        
        // var_dump($jumlah_barang_dibeli);
        // die;
		$data_detail_penjualan = [];

		for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
			array_push($data_detail_penjualan, ['id_produk' => $this->input->post('id_produk_hidden')[$i]]);
			$data_detail_penjualan[$i]['kode_transaksi'] = $this->input->post('kode_transaksi');
			$data_detail_penjualan[$i]['harga'] = $this->input->post('harga_produk_hidden')[$i];
			$data_detail_penjualan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_penjualan[$i]['diskon'] = $this->input->post('diskon_hidden');
			$data_detail_penjualan[$i]['ongkir'] = $this->input->post('ongkir_hidden');
			$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}
        $this->transaksi_model->tambahdetail($data_detail_penjualan);
		// if($this->transaksi_model->tambah($data_penjualan) && $this->transaksi_model->tambahdetail($data_detail_penjualan)){
			// for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
			// 	$this->transaksi_model->min_stok($data_detail_penjualan[$i]['jumlah'], $data_detail_penjualan[$i]['id_produk']) or die('gagal min stok');
			// }
		// } else {
		// 	$this->session->set_flashdata('sukses', 'Data <strong>Transaksi</strong> Gagal Dibuat!');
		// 	redirect(base_url('admin/transaksi/tambah'),'refresh');
		// }
        $id_pembayaran = $this->input->post('id_jenis_pembayaran_hidden');
        
        $data_angsuran = [];
        if( $id_pembayaran == '2'){
            $data_angsuran['kode_transaksi'] = $this->input->post('kode_transaksi');
            $data_angsuran['angsuran_ke'] = 1;
            $data_angsuran['bayar']= $this->input->post('bayar_hidden');
            $data_angsuran['id_bank']= $this->input->post('id_bank_hidden');
            $data_angsuran['tanggal_bayar_angsuran'] = date('Y/m/d');
            $data_angsuran['bukti_bayar']= $this->_uploadImage();
            $this->transaksi_model->tambahangsuran($data_angsuran);
            
            $this->session->set_flashdata('sukses', 'Data <strong>Transaksi</strong> Berhasil Dibuat!');
            redirect(base_url('admin/transaksi'),'refresh');
        }      
            
        $this->session->set_flashdata('sukses', 'Data <strong>Transaksi</strong> Berhasil Dibuat!');
        redirect(base_url('admin/transaksi'),'refresh');
}

    public function get_all_produk(){
		$data = $this->transaksi_model->lihat_nama_produk($_POST['id_produk']);
		echo json_encode($data);
	}

    public function get_all_pelanggan(){
		$data = $this->pelanggan_model->lihat_nama_pelanggan($_POST['id_pelanggan']);
		echo json_encode($data);
	}

    //get buat kredit
    public function get_all_pembayaran(){
		$data = $this->pembayaran_model->lihat_pembayaran($_POST['id_jenis_pembayaran']);
		echo json_encode($data);
	}

    public function keranjang_produk(){
		$this->load->view('admin/transaksi/keranjang');
	}

    public function pelanggan_transaksi(){
        $pelanggan = $this->pelanggan_model->listing();
        $data = array('title' => 'Tambah Transaksi',
                
                'pelanggan'         => $pelanggan
                );
		$this->load->view('admin/transaksi/pelanggan',$data);
	}
    public function bayar_produk(){
		$this->load->view('admin/transaksi/bayar');
	}
    public function getDateAjax(){
		$id_produk = $this->input->post('id_produk');
		$date = $this->transaksi_model->get_where(['id_produk' => $id_produk])->result();
	}

    //Edit data transaksi
   public function edit($id_transaksi)
    {
        //ambil data yang akan diedit
        $transaksi = $this->transaksi_model->detail($id_transaksi);
        //ambil data kategori
        $pelanggan = $this->pelanggan_model->listing();
        $produk = $this->produk_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan','Nama pelanggan','required', 
                array( 'required'    =>'%s harus diisi'));

        $valid->set_rules('id_produk','Nama Produk','required', 
                array( 'required'    =>'%s harus diisi'));
       
                        
        if($valid->run()){
            //cek jika ganti gambar
            if(!empty($_FILES['bukti_bayar1']['name'])){

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = '2400'; //dalam kb
            $config['max_width']      = '2024';
            $config['max_height']     = '2024';
            
            $this->load->library('upload', $config);
            
            if ( !$this->upload->do_upload('bukti_bayar1'))
            {
        //end validasi

        $data = array('title'    => 'Edit Data Transaksi: '.$transaksi->nama_pelanggan,
                    'pelanggan'   => $pelanggan,
                    'produk'      => $produk,
                    'error'    => $this->upload->display_errors(),
                    'isi'      => 'admin/transaksi/edit'
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
            $slug_transaksi = url_title($this->input->post('nama_pelanggan').'-'.$this->input->post('nama_produk'),'dash',TRUE  );
            $data = array(  
                

                'id_user'                =>  $this->session->userdata('id_user'),
                'id_transaksi'          =>  $i->post('id_transaksi'),
                'id_produk'             =>  $i->post('id_produk'),
                'id_pelanggan'          =>  $i->post('id_pelanggan'),
                'nama_pelanggan'        =>  $i->post('nama_pelanggan'),
                'nama_produk'           =>  $i->post('nama_produk'),
                'harga'                 =>  $i->post('harga'),
                'jumlah'                =>  $i->post('jumlah'),
                'ongkir'                =>  $i->post('ongkir'),
                'diskon'                =>  $i->post('diskon'),
               
                'alamat_pengirimann'     =>  $i->post('alamat_pengiriman'),
                'status_pembayaran'     =>  $i->post('status_pembayaran'),
                'tgl_bayar1'            =>  $i->post('tgl_bayar1'),
                'bukti_bayar1'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar1'         =>  $i->post('jumlah_bayar1'),
                'nama_bank1'            =>  $i->post('nama_bank1'),
                'tgl_bayar2'            =>  $i->post('tgl_bayar2'),
                'bukti_bayar2'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar2'         =>  $i->post('jumlah_bayar2'),
                'nama_bank2'            =>  $i->post('nama_bank2'),
                'tgl_bayar3'            =>  $i->post('tgl_bayar3'),
                'bukti_bayar3'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar3'         =>  $i->post('jumlah_bayar3'),
                'nama_bank3'            =>  $i->post('nama_bank3')


                );
            $this->transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit dengan gambar');
            redirect(base_url('admin/transaksi'),'refresh');
        }}else{

            //edit pelanggan tanpa edit gambar
            $i = $this->input;
              $slug_transaksi = url_title($this->input->post('nama_pelanggan').'-'.$this->input->post('nama_produk'),'dash',TRUE);
              $data = array(  
                'id_user'                =>  $this->session->userdata('id_user'),
                'id_transaksi'          =>  $i->post('id_transaksi'),
                'id_produk'             =>  $i->post('id_produk'),
                'id_pelanggan'          =>  $i->post('id_pelanggan'),
                'nama_pelanggan'        =>  $i->post('nama_pelanggan'),
                'nama_produk'           =>  $i->post('nama_produk'),
                'harga'                 =>  $i->post('harga'),
                'jumlah'                =>  $i->post('jumlah'),
                'ongkir'                =>  $i->post('ongkir'),
                'diskon'                =>  $i->post('diskon'),
               
                'alamat_pengirimann'     =>  $i->post('alamat_pengiriman'),
                'status_pembayaran'     =>  $i->post('status_pembayaran'),
                'tgl_bayar1'            =>  $i->post('tgl_bayar1'),
               // 'bukti_bayar1'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar1'         =>  $i->post('jumlah_bayar1'),
                'nama_bank1'            =>  $i->post('nama_bank1'),
                'tgl_bayar2'            =>  $i->post('tgl_bayar2'),
               // 'bukti_bayar2'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar2'         =>  $i->post('jumlah_bayar2'),
                'nama_bank2'            =>  $i->post('nama_bank2'),
                'tgl_bayar3'            =>  $i->post('tgl_bayar3'),
               // 'bukti_bayar3'          =>  $upload_gambar['upload_data']['file_name'],
                'jumlah_bayar3'         =>  $i->post('jumlah_bayar3'),
                'nama_bank3'            =>  $i->post('nama_bank3')



                );
            $this->transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit tanpa gambar');
            redirect(base_url('admin/transaksi'),'refresh');
        }}
        //end masuk database
        $data = array('title'             => 'Edit Data Transaksi: '.$transaksi->nama_pelanggan,
                      'pelanggan'         => $pelanggan,
                      'produk'            => $produk,
                      'isi'               => 'admin/transaksi/edit'
                     );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Detail
      public function detail($kode_transaksi)
       {
        $transaksi = $this->transaksi_model->detail($kode_transaksi);
        $dataTransaksi = $this->transaksi_model->list_transaksi($kode_transaksi);
        $aa = $this->transaksi_model->data_angsuran($kode_transaksi);
        // var_dump($dataangsuran);
        // die;
        $data = array('title'        => 'Data Pelanggan',
                      'transaksi'    => $transaksi,
                      'dataTransaksi'=> $dataTransaksi,
                      'aa'    => $aa,
                      'isi'          => 'admin/transaksi/detail'
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
        $tgltransaksi = $this->transaksi_model->listing_transaksi($kode_transaksi);
        $transaksipelanggan = $this->transaksi_model->listing_transaksi($kode_transaksi);
        $transaksi     = $this->transaksi_model->listing_transaksi($kode_transaksi);
        $pembayaran     = $this->transaksi_model->pembayaran($kode_transaksi);
        $dataTransaksi = $this->transaksi_model->list_transaksi($kode_transaksi);
        $data = array(  'title'              => 'Cetak Transaksi',
                        'transaksi'          => $transaksi,
                        'pembayaran'          => $pembayaran,
                        'dataTransaksi'      => $dataTransaksi,
                        'tgltransaksi'       => $tgltransaksi,
                        'transaksipelanggan' => $transaksipelanggan,
                    );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

     //Cetak PDF
     public function pdf($kode_transaksi)
     {
        
         $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
         
         $data = array(  'title'              => 'Cetak Transaksi',
                         'transaksi'          => $transaksi,
                         
                     );
        // $this->load->view('admin/transaksi/cetak', $data, FALSE);
        $html   = $this->load->view('admin/transaksi/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $mpdf->Output();

     }
     
     private function _uploadImage()
     {
         $config['upload_path']          = './assets/upload/image/';
         $config['allowed_types']        = 'gif|jpg|png';
         $config['file_name']            = $this->input->post('kode_transaksi');
         $config['overwrite']			= true;
         $config['max_size']             = 1024; // 1MB
         // $config['max_width']            = 1024;
         // $config['max_height']           = 768;
 
         $this->load->library('upload', $config);
 
         if ($this->upload->do_upload('bukti_bayar_hidden')) {
             return $this->upload->data("file_name");
         }
         return "default.jpg";
     }

     public function laporanpenjualan()
     {
        
        $tahun= $this->transaksi_model->gettahun();
        $data = array(  'title'              => 'Laporan Data penjualan',
                        'tahun'          => $tahun,
                        'isi'          => 'admin/transaksi/report_penjualan'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
     }
 
     public function laporanbybulan()
     {
         $data['title'] = "Laporan Dari Bulan";
         // user data
 
         $tahun1 = htmlspecialchars($this->input->post('tahun1', true));
         $bulanawal1 = htmlspecialchars($this->input->post('bulanawal1', true));
         $bulanakhir = htmlspecialchars($this->input->post('bulanakhir', true));
 
         $data['bybulan'] = $this->transaksi_model->filterbybulan($tahun1, $bulanawal1, $bulanakhir);
         $data['sum'] = $this->transaksi_model->sumbulan($tahun1, $bulanawal1, $bulanakhir);
         $data['tahun'] = $tahun1;
         $data['bulanawal'] = $bulanawal1;
         $data['bulanakhir'] = $bulanakhir;
         $this->load->view('admin/transaksi/report/laporan_by_bulan_penjualan', $data);
         
     }
 
     public function laporanbytahun()
     {
         $data['title'] = "Laporan Dari Tahun";
         // user data
 
         $tahun2 = htmlspecialchars($this->input->post('tahun2', true));
 
         $data['bytahun'] = $this->transaksi_model->filterbytahun($tahun2);
         $data['sum'] = $this->transaksi_model->sum($tahun2);
         $data['tahun'] = $tahun2;
         $this->load->view('admin/transaksi/report/laporan_by_tahun_penjualan', $data);
     }
    
      //Tambah transaksi
    public function tambahangsuran($kode_transaksi)
    {
        
        $transaksi = $this->transaksi_model->detail($kode_transaksi);
        $dataTransaksi = $this->transaksi_model->list_transaksi($kode_transaksi);
        $aa = $this->transaksi_model->data_angsuran($kode_transaksi);
        $bb = $this->transaksi_model->hitung_data_angsuran($kode_transaksi);

        $data = array('title' => 'Tambah Pembayaran Angsuran',
                      'transaksi'    => $transaksi,
                      'dataTransaksi'=> $dataTransaksi,
                      'aa'    => $aa,
                      'bb'    => $bb,
                'isi'               => 'admin/transaksi/pembayaranangasuran'
                );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

     //proses tambah kredit
     public function proses_tambahangsuran($kode_transaksi){
		
		$data_bayar = [
			'kode_transaksi' => $this->input->post('kode_transaksi', true),
			'angsuran_ke' => $this->input->post('angsuran_ke', true),
			'bayar' => $this->input->post('bayar_hidden', true),
			'id_bank' => $this->input->post('id_bank_hidden', true),
			'tanggal_bayar_angsuran' => date('Y/m/d'),
			'bukti_bayar' => $this->_uploadImage(),
		];

		$this->transaksi_model->tambahangsuran($data_bayar);
        $this->session->set_flashdata('sukses', 'Pembayaran <strong>Angsuran</strong> Berhasil Dibuat!');
        redirect(base_url('admin/transaksi/detail/'.$kode_transaksi),'refresh');
}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */