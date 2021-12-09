<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoripelanggan_model extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //listing all kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori_pelanggan');
        $this->db->order_by('id_kategoripelanggan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    //detail kategori
    public function detail($id_kategoripelanggan)
    {
        $this->db->select('*');
        $this->db->from('kategori_pelanggan');
        $this->db->where('id_kategoripelanggan', $id_kategoripelanggan);
        $this->db->order_by('id_kategoripelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //detail slug kategori
    public function read($slug_kategoripelanggan)
    {
        $this->db->select('*');
        $this->db->from('kategori_pelanggan');
        $this->db->where('slug_kategoripelanggan', $slug_kategoripelanggan);
        $this->db->order_by('id_kategoripelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

   

    //tambah
    public function tambah($data)
    {
        $this->db->insert('kategori_pelanggan', $data);    
    }

    //edit
    public function edit($data)
    {
        $this->db->where('id_kategoripelanggan', $data['id_kategoripelanggan']);
        $this->db->update('kategori_pelanggan', $data);
        
    }

    //delete
    public function delete($data)
    {
        $this->db->where('id_kategoripelanggan', $data['id_kategoripelanggan']);
        $this->db->delete('kategori_pelanggan', $data);
        
    }
}

?>