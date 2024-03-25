<?php

class Banner_model extends CI_model
{
    public function getAllpromo()
    {
        $this->db->join('fitur', 'promosi.fitur_promosi = fitur.id_fitur', 'left');
        return  $this->db->get('promosi')->result_array();
    }

    public function getpromobyid($id)
    {
        return $this->db->get_where('promosi', ['id' => $id])->row_array();
    }

    public function tambahdatapromo($data)
    {
        return $this->db->insert('promosi', $data);
    }

    public function hapuspromobyId($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('promosi');
    }

    public function ubahdatapromo($data)
    {

        $this->db->set('foto', $data['foto']);
        $this->db->set('tanggal_berakhir', $data['tanggal_berakhir']);
        $this->db->set('fitur_promosi', $data['fitur_promosi']);
        $this->db->set('link_promosi', $data['link_promosi']);
        $this->db->set('type_promosi', $data['type_promosi']);
        $this->db->set('lokasi', $data['lokasi']);
        $this->db->set('is_show', $data['is_show']);

        $this->db->where('id', $data['id']);
        return $this->db->update('promosi', $data);
    }
}
