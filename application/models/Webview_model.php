<?php

class Webview_model extends CI_model
{
    public function getdata()
    {
        return  $this->db->get('webview')->result_array();
    }
    public function getdatabyid($id)
    {
        return $this->db->get_where('webview', ['id' => $id])->row_array();
    }
    public function addweb($data)
    {
        $this->db->insert('webview', $data);
    }
    public function editweb($data)
    {

        $this->db->set('nama', $data['nama']);
        $this->db->set('url', $data['url']);
        $this->db->set('ikon', $data['ikon']);
        $this->db->set('status', $data['status']);
        $this->db->where('id', $data['id']);
        return $this->db->update('webview', $data);
    }
    public function hapusweb($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('webview');
    }
}