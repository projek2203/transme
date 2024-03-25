<?php
class Saldo_model extends CI_model
{
    public function datadriver($id)
    {
        $this->db->select('*');
        $this->db->join('saldo', 'driver.id = saldo.id_user');
        $this->db->where('driver.id', $id);
        return  $this->db->get_where('driver', ['driver.id' => $id])->row_array();
    }
    public function datacs($id)
    {
        $this->db->select('*');
        $this->db->join('saldo', 'pelanggan.id = saldo.id_user');
        $this->db->where('pelanggan.id', $id);
        return  $this->db->get_where('pelanggan', ['pelanggan.id' => $id])->row_array();
    }
    public function datamitra($id)
    {
        $this->db->select('*');
        $this->db->join('saldo', 'mitra.id_mitra = saldo.id_user');
        $this->db->where('mitra.id_mitra', $id);
        return  $this->db->get_where('mitra', ['mitra.id_mitra' => $id])->row_array();
    }
    public function getallsaldouser()
    {
        $this->db->select('mitra.nama_mitra');
        $this->db->select('driver.nama_driver');
        $this->db->select('pelanggan.fullnama');
        $this->db->select('pelanggan.no_telepon');
        $this->db->select('saldo.*');
        $this->db->join('mitra', 'saldo.id_user = mitra.id_mitra', 'left');
        $this->db->join('driver', 'saldo.id_user = driver.id', 'left');
        $this->db->join('pelanggan', 'saldo.id_user = pelanggan.id', 'left');
        return $this->db->get('saldo')->result_array();
    }
    public function updatesaldowallet($data)
    {

        $saldobaru = $data['saldolama'] + $data['saldo'];
        $this->db->set('saldo', $saldobaru);
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('saldo');

        $numberreff = rand ( 10000 , 99999 );
        $this->db->set('status', '1');
        $this->db->set('reff', 'topup'.$numberreff);
        $this->db->set('type', 'topup');
        $this->db->set('rekening', 'sistem');
        $this->db->set('bank', 'sistem');
     //   $this->db->set('nama_pemilik', $data['namamitra']);
        $this->db->set('jumlah', $data['saldo']);
        $this->db->set('id_user', $data['id_user']);
        $this->db->set('uplink', $data['uplink']);
        $this->db->insert('wallet');
    }
    public function allsaldo()
    {
       
        $this->db->select('mitra.nama_mitra');
        $this->db->select('driver.nama_driver');
        $this->db->select('pelanggan.fullnama');
        $this->db->select('pelanggan.no_telepon');
        $this->db->select('wallet.*');

        $this->db->join('mitra', 'wallet.id_user = mitra.id_mitra', 'left');
        $this->db->join('driver', 'wallet.id_user = driver.id', 'left');
        $this->db->join('pelanggan', 'wallet.id_user = pelanggan.id', 'left');
        $this->db->order_by('wallet.id', 'DESC');
        return $this->db->get('wallet')->result_array();
    }
    public function getallsaldo()
    {
        $this->db->select('SUM(jumlah)as total');
        return $this->db->get('wallet')->row_array();
    }
    public function gettoken($id_user)
    {
        $this->db->select('token');
        $this->db->where('id', $id_user);
        return $this->db->get('pelanggan')->row_array();
    }
    public function getregid($id_user)
    {
        $this->db->select('reg_id');
        $this->db->where('id', $id_user);
        return $this->db->get('driver')->row_array();
    }
    public function gettokenmerchant($id_user)
    {
        $this->db->select('mitra.*');
        $this->db->select('merchant.token_merchant');
        $this->db->join('merchant', 'mitra.id_merchant = merchant.id_merchant', 'left');
        $this->db->where('mitra.id_mitra', $id_user);
        return $this->db->get('mitra')->row_array();
    }
    public function getsaldo($id_user)
    {
        $this->db->select('saldo');
        $this->db->where('id_user', $id_user);
        return $this->db->get('saldo')->row_array();
    }
    public function ubahsaldotopup($id_user, $amount, $saldo)
    {
        $this->db->set('saldo', $saldo['saldo'] + $amount);
        $this->db->where('id_user', $id_user);
        $this->db->update('saldo');
    }
    public function ubahsaldowd($id_user, $amount, $saldo)
    {
        $this->db->set('saldo', $saldo['saldo'] - $amount);
        $this->db->where('id_user', $id_user);
        $this->db->update('saldo');
    }
    public function ubahstatuswithdrawbyid($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('wallet');
    }
    public function send_notif($serverkey,$title, $message, $topic)
    {

        $data = array(
            'title' => $title,
            'message' => $message,
            'type' => 3
        );
        $senderdata = array(
            'data' => $data,
            'to' => $topic
        );

        $headers = array(
            'Content-Type : application/json',
            'Authorization: key=' . $serverkey
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($senderdata),
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
    }
    public function cancelstatuswithdrawbyid($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id', $id);
        $this->db->update('wallet');
    }
}