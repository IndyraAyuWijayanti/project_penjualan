<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model{
    
	protected $_table = 'pelanggan';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //listing all pelanggan
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    

    //detail pelanggan
    public function detail($id_pelanggan)
    {
        $this->db->select('pelanggan.*, kategori_pelanggan.*');
        $this->db->from('pelanggan');

        //join
       $this->db->join('kategori_pelanggan', 'kategori_pelanggan.id_kategoripelanggan = pelanggan.id_kategoripelanggan', 'left');

       //end join
           $this->db->where('id_pelanggan', $id_pelanggan);
       $this->db->group_by('pelanggan.id_pelanggan');
       $this->db->order_by('id_pelanggan', 'asc');
       $query = $this->db->get();
       return $query->row();
    }


     //Kategori Pelanggan
        public function kategoripelanggan($id_kategoripelanggan,$limit,$start)
    {
        $this->db->select(' pelanggan.*,
                            users.nama,
                            kategori_pelanggan.nama_kategoripelanggan,
                            kategori_pelanggan.slug_kategoripelanggan');
                            
        $this->db->from('pelanggan');
        //JOIN
        $this->db->join('users', 'users.id_user = pelanggan.id_user', 'left');
        $this->db->join('kategori_pelanggan', 'kategori_pelanggan.id_kategoripelanggan = pelanggan.id_kategoripelanggan', 'left');
       
        //END JOIN
        
        $this->db->where('pelanggan.id_kategoripelanggan', $id_kategoripelanggan);
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }


    //Listing Kategori
     public function listing_kategoripelanggan()
    {
        $this->db->select(' pelanggan.*,
                            users.nama,
                            kategori_pelanggan.nama_kategoripelanggan,
                            kategori_pelanggan.slug_kategoripelanggan'
                           );
        $this->db->from('pelanggan');
        //JOIN
        $this->db->join('users', 'users.id_user = pelanggan.id_user', 'left');
        $this->db->join('kategori_pelanggan', 'kategori_pelanggan.id_kategoripelanggan = pelanggan.id_kategoripelanggan', 'left');

      

        //END JOIN
        // $this->db->group_by('pelanggan.id_kategoripelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
   
    public function lihat_nama_pelanggan($id_pelanggan){
		$query = $this->db->select('*');
		$query = $this->db->where(['id_pelanggan' => $id_pelanggan]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

    //tambah
    public function tambah($data)
    {
        $this->db->insert('pelanggan', $data);    
    }

    //edit
    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $data);
        
    }

    //delete
    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('pelanggan', $data);
        
    }
}

?>