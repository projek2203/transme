<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_model
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
    public function getallstaff()
    {
        return  $this->db->get('admin')->result_array();
    }
    public function getstaffbyid($id)
    {
        return $this->db->get_where('admin', ['id' => $id])->row_array();
    }
    public function listkategori($tipe)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->order_by('user_name ASC');
        return $this->db->get()->result_array();
    }
    public function addstaff($data)
    {
        $this->db->insert('admin', $data);
    }
    public function hapusstaffbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');
    }
    public function editstaff($data)
    {

        $this->db->set('user_name', $data['user_name']);
        $this->db->set('email', $data['email']);
        $this->db->set('password', $data['password']);
        $this->db->set('image', $data['image']);
        $this->db->set('kota', $data['kota']);
        $this->db->set('level', $data['level']);
        $this->db->where('id', $data['id']);
        return $this->db->update('admin', $data);
    }
}