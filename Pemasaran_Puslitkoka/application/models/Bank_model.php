<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }




    
    //listing all kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->order_by('id_bank', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    }


   


?>