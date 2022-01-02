<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{
    
    
	protected $_table = 'produk';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //listing all transaksi
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('kode_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


  function kode(){
    $q = $this->db->query("SELECT MAX(RIGHT(kode_transaksi,2)) AS kd_max FROM transaksi WHERE DATE(tanggal_transaksi)=CURDATE()");
    $kd = "";
    if($q->num_rows()>0){
        foreach($q->result() as $k){
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%03s", $tmp);
        }
    }else{
        $kd = "01";
    }
    date_default_timezone_set('Asia/Jakarta');
    return 'DO'.date('my').'-'.$kd;
}
    //detail transaksi
   
     public function detail($kode_transaksi)
    { 
        $this->db->select(' transaksi.*, users.*, pelanggan.nama_pelanggan, bank.*, produk.*, detail_transaksi.*');
        $this->db->from('transaksi');

        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi', );
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank');
      
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);

        //END JOIN
        $this->db->order_by('transaksi.kode_transaksi', 'asc');
       $query = $this->db->get();
       return $query->row();
    }

    //Listing transaksi (untuk menampilkan di tabel pada detail transaksi)
    public function listing_transaksi($kode_transaksi)
    {
        $this->db->select(' transaksi.*, users.*, pelanggan.nama_pelanggan, bank.*, produk.*, detail_transaksi.*');
        $this->db->from('transaksi');

        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi', );
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank');
      
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);

        //END JOIN
        $this->db->order_by('transaksi.kode_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function lihat_nama_produk($id_produk){
		$query = $this->db->select('*');
		$query = $this->db->where(['id_produk' => $id_produk]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}
    public function get_where($where){
		return $this->db->get_where('produk',$where);
	  }

   //Pelanggan
  public function pelanggan($id_pelanggan,$limit,$start)
    {
        $this->db->select(' transaksi.*,
                            users.nama,
                            pelanggan.nama_pelanggan,s
                            bank.nama_bank,
                            produk.nama_produk'
                            );
                            
        $this->db->from('transaksi');
        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk', 'left');
        $this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');
       
        //END JOIN
        
        $this->db->where('transaksi.id_pelanggan', $id_pelanggan);
        $this->db->where('transaksi.id_bank', $id_bank);
        $this->db->group_by('transaksi.kode_transaksi');

        $this->db->order_by('kode_transaksi', 'asc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }


     //Listing Pelanggan
     public function listing_pelanggan()
    {
        $this->db->select('transaksi.*,
                            users.nama,
                            pelanggan.nama_pelanggan,
                            bank.nama_bank,
                            produk.nama_produk,
                            detail_transaksi.jumlah'
                           );
        $this->db->from('transaksi');
        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('detail_transaksi', 'detail_transaksi.kode_transaksi = transaksi.kode_transaksi', 'left');
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');
      

        //END JOIN
        // $this->db->group_by('transaksi.id_pelanggan');
        // $this->db->group_by('transaksi.id_bank');
        $this->db->order_by('kode_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

 

    //login transaksi
    public function login($transaksiname, $password)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where(array( 'transaksiname'  => $transaksiname,
                                'password'  => SHA1($password)));
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //tambah
    public function tambah($data)
    {
        $this->db->insert('transaksi', $data);    
    }
    public function tambahdetail($data)
    {
        $this->db->insert_batch('detail_transaksi', $data);    
    }

    //edit
    public function edit($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
        
    }

    //delete
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('transaksi', $data);
    }

    //delete transaksi expired
    public function deleteTransaksiExpired($data)
    {
        $this->db->where('kode_transaksi', $data['kode_transaksi']);
        $this->db->delete('transaksi', $data);
        //return $this->db->get()->result_array();
    }

    public function min_stok($stok, $nama_produk){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('id_produk', $nama_produk);
		$query = $this->db->update($this->_table);
		return $query;
	}
}

?>