<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Digiflass extends CI_model
{
    public function listgroup()
    {
        $this->db->select('*');
        $this->db->from('ppob_group');
        $this->db->order_by('group DESC');
        return $this->db->get()->result_array();
    }
    public function listdatapasca($idgroup)
    {
        $this->db->select('*');
        $this->db->from('ppob_pasca');
        $this->db->where('groupid', $idgroup);
        $this->db->order_by('produk ASC');
        return $this->db->get()->result_array();
    }
}