<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Digiflass_model extends CI_model
{
    
    function __construct()
    {
        parent::__construct();
    }
    function datasetting(){
        $this->db->select('*');
        $this->db->from('app_settings');
        $this->db->where('id', '1');
        return $this->db->get();
    }
    public function daftargroup($id)
    {
        $this->db->select('*');
        $this->db->from('ppob_group');
        $this->db->where('type', $id);
        return $this->db->get()->result_array();
    }
    public function listgroup()
    {
        $this->db->select('*');
        $this->db->from('ppob_type');
        return $this->db->get()->result_array();
    }
    public function listdatapasca($idgroup)
    {
        $this->db->select('*');
        $this->db->from('ppob_produk');
        $this->db->where('groupid', $idgroup);
        $this->db->order_by('produk DESC');
        return $this->db->get()->result_array();
    }
}