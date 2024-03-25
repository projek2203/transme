<?php
class Poin_model extends CI_model
{
    public function getallpoin()
    {
        return  $this->db->get('poin')->result_array();
    }
    public function getpoinbyid($id)
    {
        return $this->db->get_where('poin', ['id' => $id])->row_array();
    }
    public function addpoin($data)
    {
        $this->db->insert('poin', $data);
    }
    public function hapuspoinbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('poin');
    }
}
?>