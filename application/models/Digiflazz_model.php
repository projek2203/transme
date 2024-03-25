<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Digiflazz_model extends CI_model
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
    public function getallhistori()
    {
        $this->db->select('digi_history.*,pelanggan.fullnama,pelanggan.kota');
        $this->db->from('digi_history');
        $this->db->join('pelanggan', 'digi_history.idpelanggan = pelanggan.id', 'left');
        $this->db->order_by('digi_history.tanggal', 'DESC');
        return $this->db->get()->result_array();
    }
    function datatransaksi($idreff){
        $this->db->select('digi_history.reffid,digi_history.idpelanggan,digi_history.harga,digi_history.upharga,digi_history.sukses,digi_history.upharga,digi_history.tujuan,digi_history.sn,digi_history.status,digi_history.tanggal,pelanggan.*');
        $this->db->from('digi_history');
        $this->db->join('pelanggan', 'pelanggan.id = digi_history.idpelanggan');
        $this->db->where('reffid', $idreff);
        return $this->db->get();
    }
    public function statustrx($reff,$data)
    {
        $this->db->where('reffid', $reff);
        $this->db->update('digi_history', $data);
        return true;
    }
    function data_saldo($id)
    {
        $this->db->select('*');
        $this->db->where('saldo.id_user', $id);
        $this->db->from('saldo');
        $trans = $this->db->get();
        return $trans;
    }
    public function ubahsaldo($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('saldo', $data);
        return true;
    }
    public function getAllKategori()
    {
        return  $this->db->get('digi_kategori')->result_array();
    }
    public function listkategori()
    {
        $this->db->select('*');
        $this->db->from('digi_kategori');
        $this->db->order_by('kategori DESC');
        $this->db->where('status', 1);
        return $this->db->get()->result_array();
    }
    public function listkategoribyid($id)
    {
        return $this->db->get_where('digi_kategori', ['id' => $id])->row_array();
    }
    public function listkategoribyidx($id)
    {
        $this->db->select('*');
        $this->db->from('digi_kategori');
        $this->db->where('id', $id);
        return $this->db->get()->result_array();
    }
    public function listbrand($tipe)
    {
        $this->db->select('*');
        $this->db->from('digi_brand');
        $this->db->order_by('type ASC');
        $this->db->order_by('nama ASC');
        $this->db->where('status', 1);
        $this->db->where('type', $tipe);
        return $this->db->get()->result_array();
    }
    public function listhistory($id)
    {
        $this->db->select('*');
        $this->db->from('digi_history');
        $this->db->where('idpelanggan', $id);
        return $this->db->get()->result_array();
    }
    public function addkategori($data)
    {
        $this->db->insert('digi_kategori', $data);
    }
    public function inserthistori($data)
    {
        $datresult = $this->db->insert('digi_history', $data);
        return $datresult;
    }
    public function editkategori($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('kategori', $data['kategori']);
        $this->db->set('tipe', $data['tipe']);
        $this->db->set('ikon', $data['ikon']);
        $this->db->set('status', $data['status']);
        $this->db->where('id', $data['id']);
        return $this->db->update('digi_kategori', $data);
    }
    public function hapuskatbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('digi_kategori');
    }
    public function sendnotif($serverkey,$token,$amount,$status)
    {
        $url = "https://fcm.googleapis.com/fcm/send";   
        $header = [
            'authorization: key='.$serverkey,
            'content-type: application/json'
        ];
        $id = '1';
        $notification = [
            'title' => 'Topup & Pembayaran',
            'body' => 'Topup '.$amount.' '.$status.'.',
            'type' => 0
        ];
        $extraNotificationData = ["message" => $notification,"id" =>$id,"type" =>0];
        $fcmNotification = [
            'to'        => $token,
            'notification' => $notification,
            'priority'          => 'high', 
            'data' => $extraNotificationData
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = json_decode(curl_exec($ch)); 
        curl_close($ch);
        return $result;
    }
    //--------------------------------------- Data Brand ----------------------------
    public function getAllBrand()
    {
        return  $this->db->get('digi_brand')->result_array();
    }
    public function getalldigikategori()
    {
        return  $this->db->get('digi_kategori')->result_array();
    }

    public function addproduk($data)
    {
        $this->db->insert('digi_brand', $data);
    }
    public function listbrandbyid($id)
    {
        return $this->db->get_where('digi_brand', ['id' => $id])->row_array();
    }
    public function hapusbrandbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('digi_brand');
    }
    public function editbrand($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('brand', $data['brand']);
        $this->db->set('keterangan', $data['keterangan']);
        $this->db->set('type', $data['type']);
        $this->db->set('ikon', $data['ikon']);
        $this->db->set('status', $data['status']);
        $this->db->set('fee', $data['fee']);
        $this->db->where('id', $data['id']);
        return $this->db->update('digi_brand', $data);
    }
}