<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{
    
    
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
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

   

    //detail transaksi
   
     public function detail($id_transaksi)
    {
        $this->db->select('transaksi.*, pelanggan.*, bank.*, produk.*');
        $this->db->from('transaksi');

        //join
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');

        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        
       //end join
        $this->db->group_by('transaksi.id_transaksi');
        $this->db->order_by('id_transaksi', 'asc');
       $query = $this->db->get();
       return $query->row();
    }

    //Listing transaksi (untuk menampilkan di tabel pada detail transaksi)
    public function listing_transaksi($id_transaksi)
    {
        $this->db->select(' transaksi.*, users.*, pelanggan.*, bank.*, produk.*');
        $this->db->from('transaksi');

        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');
      
        $this->db->where('transaksi.id_transaksi', $id_transaksi);

        //END JOIN
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


   //Pelanggan
  public function pelanggan($id_pelanggan,$limit,$start)
    {
        $this->db->select(' transaksi.*,
                            users.nama,
                            pelanggan.nama_pelanggan,
                            
                            bank.nama_bank,
                            produk.nama_produk'
                            );
                            
        $this->db->from('transaksi');
        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');
       
        //END JOIN
        
        $this->db->where('transaksi.id_pelanggan', $id_pelanggan);
        $this->db->where('transaksi.id_produk', $id_produk);
        $this->db->where('transaksi.id_bank', $id_bank);
        $this->db->group_by('transaksi.id_transaksi');

        $this->db->order_by('id_transaksi', 'asc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }


     //Listing Pelanggan
     public function listing_pelanggan()
    {
        $this->db->select(' transaksi.*,
                            users.nama,
                            pelanggan.nama_pelanggan,
                            
                            bank.nama_bank,
                            produk.nama_produk'
                           );
        $this->db->from('transaksi');
        //JOIN
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('bank', 'bank.id_bank = transaksi.id_bank', 'left');
      

        //END JOIN
        $this->db->group_by('transaksi.id_pelanggan');
        $this->db->group_by('transaksi.id_produk');
        $this->db->group_by('transaksi.id_bank');
        $this->db->order_by('id_transaksi', 'asc');
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
}

?>