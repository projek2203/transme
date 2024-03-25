<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_driver extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }
    public function dataforgot($forgotpass)
    {
        $forgot = $this->db->insert('forgot_password', $forgotpass);
        return $forgot;
    }
    //----------------- Get Data App Setting ----------------------------------
    public function get_settings()
    {
        $this->db->select('*');
        $this->db->from('app_settings');
        $this->db->where('id', '1');
        return $this->db->get()->result_array();
    }
    public function signup($data_signup, $data_kendaraan, $data_berkas)
    {
        $inskendaraan = $this->db->insert('kendaraan', $data_kendaraan);
        $inserid = $this->db->insert_id();
        $datasignup = array(
            'id' => $data_signup['id'],
            'nama_driver' => $data_signup['nama_driver'],
            'no_ktp' => $data_signup['no_ktp'],
            'tgl_lahir' => $data_signup['tgl_lahir'],
            'no_telepon' => $data_signup['no_telepon'],
            'phone' => $data_signup['phone'],
            'email' => $data_signup['email'],
            'countrycode' => $data_signup['countrycode'],
            'foto' => $data_signup['foto'],
            'password' => $data_signup['password'],
            'job' => $data_signup['job'],
            'gender' => $data_signup['gender'],
            'kota' => $data_signup['kota'],
            'alamat_driver' => $data_signup['alamat_driver'],
            'reg_id' => '12345',
            'kendaraan' => $inserid,
            'status' => '0'
        );
        $signup = $this->db->insert('driver', $datasignup);

        $dataconfig = array(
            'id_driver' => $data_signup['id'],
            'latitude' => '0',
            'longitude' => '0',
            'status' => '5'
        );
        $insconfig = $this->db->insert('config_driver', $dataconfig);

        $databerkas = array(
            'id_driver' => $data_signup['id'],
            'foto_ktp' => $data_berkas['foto_ktp'],
            'foto_sim' => $data_berkas['foto_sim'],
            'id_sim' => $data_berkas['id_sim']
        );
        $insberkas = $this->db->insert('berkas_driver', $databerkas);

        $datasaldo = array(
            'id_user' => $data_signup['id'],
            'saldo' => 0
        );
        $insSaldo = $this->db->insert('saldo', $datasaldo);
        return $signup;
    }

    public function check_exist($email, $phone)
    {
        $cek = $this->db->query("SELECT id FROM driver where email='$email' AND no_telepon='$phone'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_ktp($ktp)
    {
        $cek = $this->db->query("SELECT id FROM driver where no_ktp='$ktp'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_sim($sim)
    {
        $cek = $this->db->query("SELECT id_berkas FROM berkas_driver where id_sim='$sim'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_phone($phone)
    {
        $cek = $this->db->query("SELECT id FROM driver where no_telepon='$phone'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function check_exist_email($email)
    {
        $cek = $this->db->query("SELECT id FROM driver where email='$email'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_banned($phone)
    {
        $stat =  $this->db->query("SELECT id FROM driver WHERE status='3' AND no_telepon='$phone'");
        if ($stat->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_phone_edit($id, $phone)
    {
        $cek = $this->db->query("SELECT no_telepon FROM driver where no_telepon='$phone' AND id!='$id'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_exist_email_edit($id, $email)
    {
        $cek = $this->db->query("SELECT id FROM driver where email='$email' AND id!='$id'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_data_pelanggan($condition)
    {
        $this->db->select('driver.*, saldo.saldo,kendaraan.*');
        $this->db->from('driver');
        $this->db->join('saldo', 'driver.id = saldo.id_user');
        $this->db->join('kendaraan', 'driver.kendaraan = kendaraan.id_k');
        $this->db->where($condition);
        $this->db->where('status', '1');
        return $this->db->get();
    }

    public function get_job()
    {
        $this->db->select('*');
        $this->db->from('driver_job');
        $this->db->where('status_job', '1');
        return $this->db->get()->result();
    }
    public function getarea($id)
    {
        $this->db->select('kota');
        $this->db->from('area');
        $this->db->where('kota', $id);
        $area = $this->db->get();
        return $area;
    }

    public function get_status_kota($condition)
    {
        $this->db->select('*');
        $this->db->from('area');
        $this->db->where($condition);
        return $this->db->get();
    }
    public function get_status_driver($condition)
    {
        $this->db->select('*');
        $this->db->from('config_driver');
        $this->db->where($condition);
        return $this->db->get();
    }

    public function edit_profile($data, $phone)
    {

        $this->db->where('no_telepon', $phone);
        $this->db->update('driver', $data);
        return true;
    }

    public function edit_status_login($phone)
    {
        $phonenumber = array('no_telepon' => $phone);
        $datadriver = $this->get_data_driver($phonenumber);
        $datas = array('status' => '4');
        $this->db->where('id_driver', $datadriver->row('id'));
        $this->db->update('config_driver', $datas);
        return true;
    }

    public function logout($dataEdit, $id)
    {

        $this->db->where('id_driver', $id);
        $logout = $this->db->update('config_driver', $dataEdit);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_kendaraan($data, $id)
    {

        $this->db->where('id_k', $id);
        $this->db->update('kendaraan', $data);
        return true;
    }

    function my_location($data_l)
    {
        if ($data_l['bearing'] != '0.0') {
            $data = array(
                'latitude' => $data_l['latitude'],
                'longitude' => $data_l['longitude'],
                'bearing' => $data_l['bearing']
            );
        } else {
            $data = array(
                'latitude' => $data_l['latitude'],
                'longitude' => $data_l['longitude'],
                'bearing' => $data_l['bearing']
            );
        }
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
 
    
    function aktivitas($data_l)
    {
        $data = array(
                'aktivitas' => $data_l['aktivitas']
            );
        $this->db->where('id', $data_l['id']);
        $upd = $this->db->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function update_status($data_l)
    {
        $data = array(
                'status' => $data_l['status']
            );
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function get_driver_aktivitas($aktivitas)
    {
        $this->db->select(''
            . 'id,'
            . 'aktivitas');
        $this->db->from('driver');
        $this->db->where('aktivitas', $aktivitas);
        $loc = $this->db->get();
        return $loc;
    }
    public function get_aktivitas_driver($condition)
    {
        $this->db->select('driver.*');
        $this->db->from('driver');
        $this->db->join('config_driver', 'driver.id = config_driver.id_driver');
        $this->db->where($condition);
        return $this->db->get();
    }
    public function get_data_driver($condition)
    {
        $this->db->select('driver.*, saldo.saldo');
        $this->db->from('driver');
        $this->db->join('config_driver', 'driver.id = config_driver.id_driver');
        $this->db->join('saldo', 'driver.id = saldo.id_user');
        $this->db->where($condition);
        return $this->db->get();
    }
    public function user_cancel_request($cond)
    {


        $this->db->select(''
            . 'id_driver,'
            . 'status');
        $this->db->from('history_transaksi');
        $this->db->where('id_transaksi', $cond['id_transaksi']);
        $id = $this->db->get();

        $this->db->select('transaksi.*, fitur.home');
        $this->db->from('transaksi');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->where('id', $cond['id_transaksi']);
        $id2 = $this->db->get();


        if ($id->row('status') == 1 || $id->row('status') == 2) {
            $data = array(
                'status' => '5'
            );
            if ($id2->row('home') == 4) {
                $get_mitra = $this->get_trans_merchant($cond['id_transaksi']);
                $this->deletechat($cond['id_transaksi']);
                $this->deletechatmerchant($cond['id_transaksi']);
            };
            $this->db->where($cond);
            $edit = $this->db->update('history_transaksi', $data);
           /* $data = array(
                'status' => '1'
            );
            $this->db->where('id_driver', $id->row('id_driver'));
            $edit = $this->db->update('config_driver', $data);*/
            return array(
                'status' => true,
                'data' => [],
                'iddriver' => $id->row('id_driver'),
                'idpelanggan' => $id2->row('id_pelanggan')
            );
        } else {
            return array(
                'status' => false,
                'data' => []
            );
        }
    }
    function change_status_driver($idD, $stat_order)
    {
        $params = array(
            'status' => $stat_order
        );
        $this->db->where('id_driver', $idD);
        $upd = $this->db->update('config_driver', $params);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_data_driver_sync($id)
    {

        $this->db->select(""
            . "driver.*,"
            . "kendaraan.*,"
            . "driver.foto as foto,"
            . "saldo,"
            . "config_driver.status as status_config");
        $this->db->from('driver');
        $this->db->join('config_driver', 'driver.id = config_driver.id_driver');
        $this->db->join('saldo', 'driver.id = saldo.id_user');
        $this->db->join('kendaraan', 'driver.kendaraan = kendaraan.id_k');
        $this->db->where('driver.id', $id);
        $dataCon = $this->db->get();
        return array(
            'data_driver' => $dataCon,
            'status_order' => $this->check_status_order($id)
        );
    }

    function check_status_order($idDriver)
    {
        $this->db->select(''
            . 'transaksi.*,'
            . 'transaksi_detail_send.*,'
            . 'history_transaksi.*,'
            . 'pelanggan.fullnama,'
            . 'pelanggan.no_telepon as telepon,'
            . 'pelanggan.token as reg_id_pelanggan');
        $this->db->join('transaksi', 'transaksi.id = history_transaksi.id_transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id');
        $this->db->join('transaksi_detail_send', 'transaksi.id = transaksi_detail_send.id_transaksi', 'left');
        $this->db->where("(history_transaksi.status = '2' OR history_transaksi.status = '3')", NULL, FALSE);
        $this->db->where('history_transaksi.id_driver', $idDriver);
        $this->db->order_by('history_transaksi.nomor', 'DESC');
        $check = $this->db->get('history_transaksi', 1, 0);
        return $check;
    }

    function edit_config($data, $id)
    {
        $this->db->where('id_driver', $id);
        $edit = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function accept_request($cond)
    {

        $this->db->where('id_driver', 'D0');
        $this->db->where('id_transaksi', $cond['id_transaksi']);
        $this->db->where("(status = '1')", NULL, FALSE);
        
        $this->db->from('history_transaksi');
        $cek_once = $this->db->get();
        if ($cek_once->num_rows() > 0) {
            $data = array(
                'status' => '2',
                'id_driver' => $cond['id_driver']
            );
            $this->db->where('id_driver', 'D0');
            $this->db->where('id_transaksi', $cond['id_transaksi']);
            $edit = $this->db->update('history_transaksi', $data);

            if ($this->db->affected_rows() > 0) {
                $this->db->where('id', $cond['id_transaksi']);
                $update_trans = $this->db->update('transaksi', array('id_driver' => $cond['id_driver']));


                $dataupdate = array(
                    'timeout' => '1'
                );
                $this->db->where('id_driver', $cond['id_driver']);
                $this->db->where('id_transaksi', $cond['id_transaksi']);
                $updatetiemout = $this->db->update('transaksi', $dataupdate);

                $datD = array(
                    'status' => '2'
                );
                $this->db->where(array('id_driver' => $cond['id_driver']));
                $updDriver = $this->db->update('config_driver', $datD);
                return array(
                    'status' => true,
                    'data' => []
                );
            } else {
                return array(
                    'status' => false,
                    'data' => []
                );
            }
        } else {
            return array(
                'status' => false,
                'data' => 'canceled'
            );
        }
    }
    public function getdatapel($idtrx){
        $this->db->select('transaksi.*,pelanggan.token');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
        $this->db->where('transaksi.id', $idtrx);
        return $this->db->get()->result_array();
    }
    public function start_request($cond)
    {

        $this->db->where($cond);
        $this->db->where('status', '2');
        $this->db->from('history_transaksi');
        $cek_once = $this->db->get();
        if ($cek_once->num_rows() > 0) {
            $data = array(
                'status' => '3',
                'id_driver' => $cond['id_driver']
            );
            $this->db->where($cond);
            $edit = $this->db->update('history_transaksi', $data);
            if ($this->db->affected_rows() > 0) {
                $datD = array(
                    'status' => '3'
                );
                $this->db->where(array('id_driver' => $cond['id_driver']));
                $updDriver = $this->db->update('config_driver', $datD);
                return array(
                    'status' => true,
                    'data' => []
                );
            } else {
                return array(
                    'status' => false,
                    'data' => []
                );
            }
        } else {
            $datD = array(
                'status' => '1'
            );
            $this->db->where(array('id_driver' => $cond['id_driver']));

            $updDriver = $this->db->update('config_driver', $datD);
            return array(
                'status' => false,
                'data' => 'canceled'
            );
        }
    }


    public function finish_request($cond, $condtr)
    {
        $this->db->where($condtr);
        $this->db->update('transaksi', array('waktu_selesai' => date('Y-m-d H:i:s')));


        if ($this->db->affected_rows() > 0) {
            $last_trans = $this->get_data_last_transaksi($condtr);
            $get_mitra = $this->get_trans_merchant($last_trans->row('id_transaksi'));
            $datapelanggan = $this->get_data_pelangganid($last_trans->row('id_pelanggan'));
            $datadriver = $this->get_data_driverid($cond['id_driver']);

            $data_cut = array(
                'id_driver' => $cond['id_driver'],
                'harga' => $last_trans->row('harga'),
                'jasaapp' => $last_trans->row('jasaapp'),
                'biaya_akhir' => $last_trans->row('biaya_akhir'),
                'kredit_promo' => $last_trans->row('kredit_promo'),
                'id_transaksi' => $last_trans->row('id_transaksi'),
                'fitur' => $last_trans->row('fitur'),
                'order_fitur' => $last_trans->row('order_fitur'),
                'nama_driver' => $datadriver->row('nama_driver'),
                'pakai_wallet' => $last_trans->row('pakai_wallet')
            );
            $dataC = array(
                'id_pelanggan' => $last_trans->row('id_pelanggan'),
                'harga' => $last_trans->row('harga'),
                'jasaapp' => $last_trans->row('jasaapp'),
                'biaya_akhir' => $last_trans->row('biaya_akhir'),
                'kredit_promo' => $last_trans->row('kredit_promo'),
                'id_transaksi' => $last_trans->row('id_transaksi'),
                'pakai_wallet' => $last_trans->row('pakai_wallet'),
                'order_fitur' => $last_trans->row('order_fitur'),
                'nama_pelanggan' => $datapelanggan->row('fullnama'),
                'fitur' => $last_trans->row('fitur')
            );
            if ($last_trans->row('home') == 4) {

                $data_cut_mitra = array(
                    'id_mitra' => $get_mitra->row('id_mitra'),
                    'harga' => $get_mitra->row('total_biaya'),
                    'biaya_akhir' => $last_trans->row('biaya_akhir'),
                    'kredit_promo' => $last_trans->row('kredit_promo'),
                    'id_transaksi' => $last_trans->row('id_transaksi'),
                    'fitur' => $last_trans->row('fitur'),
                    'order_fitur' => $last_trans->row('order_fitur'),
                    'nama_mitra' => $get_mitra->row('nama_mitra'),
                    'pakai_wallet' => $last_trans->row('pakai_wallet')
                );
               // $this->cut_mitra_saldo_by_order($data_cut_mitra);
               // $this->delete_chat($get_mitra->row('id_merchant'), $last_trans->row('id_pelanggan'));
               // $this->delete_chat($get_mitra->row('id_merchant'), $cond['id_driver']);
            };

            $cutUser = $this->cut_user_saldo_by_order($dataC);
            $cutting = $this->cut_driver_saldo_by_order($data_cut);


            if ($cutting['status']) {
               // $this->delete_chat($cond['id_driver'], $last_trans->row('id_pelanggan'));
                $this->deletechat($cond['id_transaksi']);
                $this->deletechatmerchant($cond['id_transaksi']);
                $data = array(
                    'status' => '4'
                );
                $this->db->where($cond);
                $this->db->update('history_transaksi', $data);

                $datD = array(
                    'status' => '1'
                );
                $this->db->where(array('id_driver' => $cond['id_driver']));
                $this->db->update('config_driver', $datD);
                
                return array(
                    'status' => true,
                    'data' => $last_trans->result(),
                    'idp' => $last_trans->row('id_pelanggan'),
                );
            } else {
                return array(
                    'status' => false,
                    'data' => $cutting['pesan']
                );
            }
        } else {
            return array(
                'status' => false,
                'data' => 'abc'
            );
        }
    }
    function finishstatus($iddriver,$idtrans)
    {
         $data = array(
                    'status' => '4'
         );
        $this->db->where('id_driver', $iddriver);
        $this->db->where('id_transaksi', $idtrans);
        $upd = $this->db->update('history_transaksi', $data);
        return true;
    }
    public function get_data_pelangganid($id)
    {
        $this->db->select('pelanggan.*, saldo.saldo');
        $this->db->from('pelanggan');
        $this->db->join('saldo', 'pelanggan.id = saldo.id_user');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function get_data_driverid($id)
    {
        $this->db->select('driver.*, saldo.saldo');
        $this->db->from('driver');
        $this->db->join('saldo', 'driver.id = saldo.id_user');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function cut_user_saldo_by_order($dataC)
    {

        $this->db->where('id_user', $dataC['id_pelanggan']);
        $saldo = $this->db->get('saldo')->row('saldo');

        if ($dataC['pakai_wallet'] == 1) {
            $hasil = $dataC['biaya_akhir'];
            $data_ins = array(
                'id_user' => $dataC['id_pelanggan'],
                'jumlah' => $hasil,
                'bank' => $dataC['fitur'],
                'nama_pemilik' => $dataC['nama_pelanggan'],
                'rekening' => 'wallet',
                'type' => 'Order-',
                'reff' => 'Order'.$dataC['id_transaksi']
            );
            $ins_trans = $this->db->insert('wallet', $data_ins);
            if ($ins_trans) {
                $this->db->where('id_user', $dataC['id_pelanggan']);
                $upd = $this->db->update('saldo', array('saldo' => ($saldo - $hasil)));
            } else {
                return false;
            }
        }
    }

    function cut_driver_saldo_by_order($data)
    {
        $this->db->select('komisi');
        $this->db->where('id_fitur', $data['order_fitur']);
        $persen = $this->db->get('fitur')->row('komisi');
        $jasaapp = $this->db->get('app_settings')->row('jasaapp');
        
        $this->db->where('id_user', $data['id_driver']);
        $saldo = $this->db->get('saldo')->row('saldo');
        $numberreff = rand ( 10000 , 99999 );
        $promo = $data['kredit_promo'];
        if ($data['pakai_wallet'] == 1) {
            $kred = $data['harga'];
            $potongan = $kred * ($persen / 100);
            $hasil = $kred - $potongan;
            //set komisi
            $data_kom = array(
                'id_driver' => $data['id_driver'],
                'komisi' => $potongan
            );
            $ins_komisi = $this->db->insert('komisi', $data_kom);
            //end komisi
            $data_ins = array(
                'id_user' => $data['id_driver'],
                'jumlah' => $hasil,
                'bank' => $data['fitur'],
                'nama_pemilik' => $data['nama_driver'],
                'rekening' => 'wallet',
                'type' => 'Order+',
                'reff' => 'Order'.$numberreff
            );
            $ins_trans = $this->db->insert('wallet', $data_ins);
            if ($ins_trans) {
                $this->db->where('id_user', $data['id_driver']);
                $upd = $this->db->update('saldo', array('saldo' => ($saldo + $hasil)));
                if ($this->db->affected_rows() > 0) {
                    return array(
                        'status' => true,
                        'pesan' => 'berhasil',
                        'data' => array('saldo' => ($saldo + $hasil))
                    );
                } else {
                    return array(
                        'status' => false,
                        'pesan' => 'gagal',
                        'data' => 'fail in update'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'pesan' => 'gagal',
                    'data' => 'false'
                );
            }
        } else {
            $kalkulasi = $data['harga'];
            $hasil = $kalkulasi * ($persen / 100);
            $data_ins = array(
                'id_user' => $data['id_driver'],
                'jumlah' => $hasil,
                'bank' => $data['fitur'],
                'nama_pemilik' => $data['nama_driver'],
                'rekening' => 'wallet',
                'type' => 'Order-',
                'reff' => 'Order'.$numberreff
            );
            $ins_trans = $this->db->insert('wallet', $data_ins);
            if ($ins_trans) {
                $this->db->where('id_user', $data['id_driver']);
                $upd = $this->db->update('saldo', array('saldo' => ($saldo - $hasil)));
                if ($this->db->affected_rows() > 0) {
                    return array(
                        'status' => true,
                        'pesan' => 'berhasil',
                        'data' => 'true'
                    );
                } else {
                    return array(
                        'status' => false,
                        'pesan' => 'gagal',
                        'data' => 'fail in update'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'pesan' => 'gagal',
                    'data' => 'false'
                );
            }
        }
    }

    function cut_mitra_saldo_by_order($data)
    {
        $this->db->select('komisi');
        $this->db->where('id_fitur', $data['order_fitur']);
        $persen = $this->db->get('fitur')->row('komisi');

        $this->db->where('id_user', $data['id_mitra']);
        $saldo = $this->db->get('saldo')->row('saldo');
        $numberreff = rand ( 10000 , 99999 );
        if ($data['pakai_wallet'] == 1) {
            $kred = $data['harga'];
            $potongan = $kred * ($persen / 100);
            $hasil = $kred - $potongan;

            $data_ins = array(
                'id_user' => $data['id_mitra'],
                'jumlah' => $hasil,
                'bank' => $data['fitur'],
                'nama_pemilik' => $data['nama_mitra'],
                'rekening' => 'wallet',
                'type' => 'Order-',
                'reff' => 'Order'.$numberreff
            );
            $ins_trans = $this->db->insert('wallet', $data_ins);
            if ($ins_trans) {
                $this->db->where('id_user', $data['id_mitra']);
                $upd = $this->db->update('saldo', array('saldo' => ($saldo - $hasil)));
                if ($this->db->affected_rows() > 0) {
                    return array(
                        'status' => true,
                        'data' => array('saldo' => ($saldo - $hasil))
                    );
                } else {
                    return array(
                        'status' => false,
                        'data' => 'fail in update'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'data' => 'false'
                );
            }
        } else {
            $hasil = $data['harga'] * ($persen / 100);
            $data_ins = array(
                'id_user' => $data['id_mitra'],
                'jumlah' => $hasil,
                'bank' => $data['fitur'],
                'nama_pemilik' => $data['nama_mitra'],
                'rekening' => 'wallet',
                'type' => 'Order-',
                'reff' => 'Order'.$numberreff
            );
            $ins_trans = $this->db->insert('wallet', $data_ins);
            if ($ins_trans) {
                $this->db->where('id_user', $data['id_mitra']);
                $upd = $this->db->update('saldo', array('saldo' => ($saldo - $hasil)));
                if ($this->db->affected_rows() > 0) {
                    return array(
                        'status' => true,
                        'data' => 'true'
                    );
                } else {
                    return array(
                        'status' => false,
                        'data' => 'fail in update'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'data' => 'false'
                );
            }
        }
    }
    
    function get_data_last_transaksi($cond)
    {
        $this->db->select('id as id_transaksi,'
            . '(waktu_selesai - waktu_order) as lama,'
            . 'waktu_selesai,'
            . 'harga,'
            . 'biaya_akhir,'
            . 'kredit_promo,'
            . 'order_fitur,'
            . 'id_pelanggan,'
            . 'fitur.home, fitur.fitur,'
            . 'pakai_wallet');
        $this->db->select('transaksi.jasaapp');
        $this->db->from('transaksi');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->where($cond);
        $cek = $this->db->get();
        return $cek;
    }

    public function getalltrx($iduser)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.id_driver', $iduser);
        return $this->db->get();
    }

    function all_transaksi($iduser)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
        $this->db->join('transaksi_detail_merchant', 'transaksi.id = transaksi_detail_merchant.id_transaksi', 'left');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->join('status_transaksi', 'history_transaksi.status = status_transaksi.id', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->where('transaksi.id_driver', $iduser);
        $this->db->where('history_transaksi.status != 1');
        $this->db->where('history_transaksi.status != 2');
        $this->db->where('history_transaksi.status != 3');
        $this->db->where('history_transaksi.status != 0');
        $this->db->order_by('transaksi.no', 'DESC');
        $trans = $this->db->get();
        return $trans;
    }
    function delete_chat($otherid, $userid)
    {
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );
        $data3 = array();
        $url3 = firebaseDb . '/chat/' . $otherid . '-' . $userid . '/.json';
        $ch3 = curl_init($url3);

        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch3, CURLOPT_POSTFIELDS, json_encode($data3));
        curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);

        $return3 = curl_exec($ch3);

        $json_data3 = json_decode($return3, true);

        $data2 = array();

        $url2 = firebaseDb . '/chat/' . $userid . '-' . $otherid . '/.json';
        $ch2 = curl_init($url2);

        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

        $return2 = curl_exec($ch2);

        $json_data2 = json_decode($return2, true);

        $data1 = array();

        $url1 = firebaseDb . '/Inbox/' . $userid . '/' . $otherid . '/.json';
        $ch1 = curl_init($url1);

        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);

        $return1 = curl_exec($ch1);

        $json_data1 = json_decode($return1, true);

        $data = array();

        $url = firebaseDb . '/Inbox/' . $otherid . '/' . $userid . '/.json';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $return = curl_exec($ch);

        $json_data = json_decode($return, true);
    }


    public function getAlldriver()
    {
        $this->db->select('config_driver.status as status_job');
        $this->db->select('driver_job.driver_job');
        $this->db->select('driver.*');
    
        $this->db->join('config_driver', 'driver.id = config_driver.id_driver', 'left');
        $this->db->join('driver_job', 'driver.job = driver_job.id', 'left');
       
        return  $this->db->get('driver')->result_array();
    }

    public function getdriverbyid($id)
    {
        $this->db->select('kendaraan.*');
        $this->db->select('saldo.saldo');
        $this->db->select('config_driver.status as status_job');
        $this->db->select('driver_job.driver_job');
        $this->db->select('berkas_driver.*');
        $this->db->select('driver.*');
        $this->db->join('kendaraan', 'driver.kendaraan = kendaraan.id_k', 'left');
        $this->db->join('saldo', 'driver.id = saldo.id_user', 'left');
        $this->db->join('config_driver', 'driver.id = config_driver.id_driver', 'left');
        $this->db->join('driver_job', 'driver.job = driver_job.id', 'left');
        $this->db->join('berkas_driver', 'driver.id = berkas_driver.id_driver', 'left');
        return  $this->db->get_where('driver', ['driver.id' => $id])->row_array();
    }

    public function countorder($id)
    {
        $this->db->select('id_driver');
        $query = $this->db->get_where('transaksi', ['id_driver' => $id])->result_array();
        return count($query);
    }

    public function wallet($id)
    {
        $this->db->order_by('wallet.id', 'DESC');
        return $this->db->get_where('wallet', ['id_user' => $id])->result_array();
    }
    public function getProfesi($id)
    {
        $stmt = $this->con->prepare("SELECT id, job FROM driver WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($id, $job);
        $stmt->fetch();
        $user = array();
        $user['id'] = $id;
        $user['job'] = $job;
        return $user;
    }
    function datatransaksi($idtran)
    {
        $this->db->select('*');
        $this->db->select('transaksi_detail_send.telepon_penerima');
        $this->db->from('transaksi');

        $this->db->join('transaksi_detail_merchant', 'transaksi.id = transaksi_detail_merchant.id_transaksi', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->join('merchant', 'transaksi_detail_merchant.id_merchant = merchant.id_merchant', 'left');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->join('transaksi_detail_send', 'transaksi.id = transaksi_detail_send.id_transaksi', 'left');
        $this->db->where('transaksi.id', $idtran);

        $trans = $this->db->get();
        return $trans;
    }
    function datatransaksisend($idtran)
    {
        $this->db->select('*');
        $this->db->from('transaksi_detail_send');
        $this->db->where('transaksi_detail_send.id_transaksi', $idtran);
        $trans = $this->db->get();
        return $trans;
    }
    function datatransaksimerchant($idtran)
    {
        $this->db->select('*');
        $this->db->from('transaksi');

        $this->db->join('transaksi_detail_merchant', 'transaksi.id = transaksi_detail_merchant.id_transaksi', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->join('merchant', 'transaksi_detail_merchant.id_merchant = merchant.id_merchant', 'left');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->join('transaksi_detail_send', 'transaksi.id = transaksi_detail_send.id_transaksi', 'left');
        $this->db->where('transaksi.id', $idtran);

        $trans = $this->db->get()->result_array();
        return $trans;
    }
    public function transaksi($id)
    {
        $this->db->select('status_transaksi.*');
        $this->db->select('history_transaksi.*');
        $this->db->select('fitur.*');
        $this->db->select('transaksi.*');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->join('status_transaksi', 'history_transaksi.status = status_transaksi.id', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->order_by('transaksi.id', 'DESC');
        $this->db->where('history_transaksi.status != 1');
        return $this->db->get_where('transaksi', ['transaksi.id_driver' => $id])->result_array();
    }
    function getjasaappp($idtran)
    {
        $this->db->select('transaksi.jasaapp');
        $this->db->from('transaksi');
        $this->db->where('transaksi.id', $idtran);

        $trans = $this->db->get();
        return $trans;
    }
    function getverifikasi($id)
    {
        $this->db->select('transaksi_detail_merchant.struk');
        $this->db->from('transaksi_detail_merchant');
        $this->db->where('transaksi_detail_merchant.id_transaksi', $id);
        $trans = $this->db->get()->result_array();
        return $trans;
    }
    public function ubahdataid($data)
    {
        $this->db->set('nama_driver', $data['nama_driver']);
        $this->db->set('email', $data['email']);
        $this->db->set('countrycode', $data['countrycode']);
        $this->db->set('phone', $data['phone']);
        $this->db->set('no_telepon', $data['no_telepon']);
        $this->db->set('tempat_lahir', $data['tempat_lahir']);
        $this->db->set('tgl_lahir', $data['tgl_lahir']);
        $this->db->set('alamat_driver', $data['alamat_driver']);

        $this->db->where('id', $data['id']);
        $this->db->update('driver', $data);
    }

    public function ubahdatakendaraan($data, $data2)
    {
        $this->db->set('jenis', $data['jenis']);
        $this->db->set('merek', $data['merek']);
        $this->db->set('tipe', $data['tipe']);
        $this->db->set('nomor_kendaraan', $data['nomor_kendaraan']);
        $this->db->set('warna', $data['warna']);


        $this->db->where('id_k', $data['id_k']);
        $this->db->update('kendaraan', $data);

        $this->db->set('job', $data2['job']);
        $this->db->where('id', $data2['id']);
        $this->db->update('driver', $data2);
    }

    public function ubahdatafoto($data)
    {
        $this->db->set('foto', $data['foto']);

        $this->db->where('id', $data['id']);
        $this->db->update('driver', $data);
    }

    public function ubahdatapassword($data)
    {
        $this->db->set('password', $data['password']);

        $this->db->where('id', $data['id']);
        $this->db->update('driver', $data);
    }

    public function blockdriverbyid($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('driver');

        $this->db->set('status', 5);
        $this->db->where('id_driver', $id);
        $this->db->update('config_driver');
    }

    public function unblockdriverbyid($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('driver');
    }

    public function ubahdatacard($data, $data2)
    {

        $this->db->set('foto_ktp', $data['foto_ktp']);
        $this->db->set('foto_sim', $data['foto_sim']);
        $this->db->set('id_sim', $data['id_sim']);
        $this->db->where('id_driver', $data['id']);
        $this->db->update('berkas_driver');

        $this->db->set('no_ktp', $data2['no_ktp']);
        $this->db->where('id', $data2['id']);
        $this->db->update('driver');
    }

    public function driverjob()
    {
        return $this->db->get('driver_job')->result_array();
    }

    public function hapusdriverbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('driver');

        $this->db->where('id_driver', $id);
        $this->db->delete('config_driver');

        $this->db->where('id_driver', $id);
        $this->db->delete('transaksi');

        $this->db->where('id_user', $id);
        $this->db->delete('saldo');

        $this->db->where('id_driver', $id);
        $this->db->delete('history_transaksi');

        $this->db->where('id_driver', $id);
        $this->db->delete('berkas_driver');

        $this->db->where('userid', $id);
        $this->db->delete('forgot_password');

        $this->db->where('id_driver', $id);
        $this->db->delete('rating_driver');

        $this->db->where('id_user', $id);
        $this->db->delete('wallet');
    }

    public function tambahdatadriver($datadriver)
    {
        $this->db->insert('driver');
    }

    public function ubahstatusnewreg($id,$linkuser)
    {
        $this->db->set('status', 1);
        $this->db->set('uplink', $linkuser);
        $this->db->where('id', $id);
        $this->db->update('driver');
    }

    public function get_trans_merchant($idtransaksi)
    {
        $this->db->select('mitra.*,transaksi_detail_merchant.id_merchant,transaksi_detail_merchant.total_biaya');
        $this->db->from('transaksi_detail_merchant');
        $this->db->join('mitra', 'transaksi_detail_merchant.id_merchant = mitra.id_merchant');
        $this->db->where('id_transaksi', $idtransaksi);
        return $this->db->get();
    }

    public function get_verify($data)
    {
        $this->db->select('*');
        $this->db->from('transaksi_detail_merchant');
        $this->db->where($data);
        return $this->db->get();
    }
function get_driver_location($idDriver)
    {
        $this->db->select(''
            . 'id_driver,'
            . 'bearing,'
            . 'status,'
            . 'latitude,'
            . 'respon,'
            . 'longitude');
        $this->db->from('config_driver');
        $this->db->where('id_driver', $idDriver);
        $loc = $this->db->get();
        return $loc;
    }
    function get_driver_area($kota)
    {
        $this->db->select(''
            . 'id,'
            . 'kota,'
            . 'promo,'
            . 'rate1,'
            . 'rate2,'
             . 'rate3,'
            . 'status');
        $this->db->from('area');
        $this->db->where('kota', $kota);
        $loc = $this->db->get();
        return $loc;
    }
  function my_token($data_l)
    {
        if ($data_l['reg_id'] != '12345') {
            $data = array(
                'reg_id' => $data_l['reg_id']
            );
        }else if ($data_l['reg_id'] == NULL) {
            $data = array(
                'reg_id' => '1234'
            );
        }else if ($data_l['reg_id'] == 'NULL') {
            $data = array(
                'reg_id' => '1234'
            );
        }else if ($data_l['reg_id'] == '') {
            $data = array(
                'reg_id' => '1234'
            );
        } else {
            $data = array(
                'reg_id' => $data_l['reg_id']
            );
        }
        $this->db->where('id', $data_l['id']);
        $upd = $this->db->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
     function data_area()
    {
        $this->db->select('*');
        $this->db->from('area');
        $this->db->where("status", "1");
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
     public function insertwallet($data_withdraw)
    {
        $verify = $this->db->insert('wallet', $data_withdraw);
        return true;
    }
     public function saldouser($id)
    {
        $this->db->select('saldo');
        $this->db->from('saldo');
        $this->db->where('id_user', $id);
        $saldo = $this->db->get();
        return $saldo;
    }
    public function tambahsaldo($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('saldo', $data);
        return true;
    }
    function lokasiku($data_l)
    {
        $data = array(
                'id_driver' => $data_l['id_driver'],
                'latitude' => $data_l['latitude'],
                'longitude' => $data_l['longitude'],
                'bearing' => $data_l['bearing']
            );
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
     function save_status($data_lokasi)
    {
       
        $this->db->select('*');
        $this->db->from('config_driver');
        $this->db->where('id_driver', $data_lokasi['id_driver']);
        $id = $this->db->get();
        if ($id->row('status') == '') {
            $this->db->insert('lokasi_pelanggan', $data_lokasi);
            return true; 
        } else {
            $this->db->where('id_driver', $data_lokasi['id_driver']);
            $this->db->update('config_driver', $data_lokasi);
            return true; 
        }
        
    }
    function get_list_saldo($iduser)
    {
        $this->db->select(''
            . 'id_user,'
            . 'jumlah,'
            . 'type,'
            . 'status');
        $this->db->from('wallet');
        $this->db->where('id_user', $iduser);
        $this->db->where('waktu <', date("YYYY-MM-dd hh:mm:ss"));
        $loc = $this->db->get();
        return $loc;
    }
    function my_lokasi($data_l)
    {
        if ($data_l['bearing'] != '0.0') {
            $data = array(
                'latitude' => $data_l['latitude'],
                'longitude' => $data_l['longitude'],
                'bearing' => $data_l['bearing']
            );
        } else {
            $data = array(
                'latitude' => $data_l['latitude'],
                'longitude' => $data_l['longitude'],
                'bearing' => $data_l['bearing']
            );
        }
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
     function perbarui_lokasiold($data_lokasi)
    {
       
        $this->db->select('*');
        $this->db->from('config_driver');
        $this->db->where('id_driver', $data_lokasi['id_driver']);
        $id = $this->db->get();
        if ($id->row('status') == '') {
            return true; 
        } else {
            $this->db->where('id_driver', $data_lokasi['id_driver']);
            $this->db->update('config_driver', $data_lokasi);
            return true; 
        }
        
    }
     function perbarui_lokasi($data_lokasi)
    {
       
        $this->db->select('*');
        $this->db->from('config_driver');
        $this->db->where('id_driver', $data_lokasi['id_driver']);
        $this->db->update('config_driver', $data_lokasi);
        return true; 
    }
    public function poindriver($id)
    {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->where('id', $id);
        $point = $this->db->get();
        return $point;
    }
    function list_slider()
    {
        $this->db->select('*');
        $this->db->from('promosi');
        $this->db->where('is_show', '1');
        $this->db->where('tanggal_berakhir>', date("Y-m-d"));
        return $this->db->get();
    }
    function list_point()
    {
        $this->db->select('*');
        $this->db->from('poin');
        $this->db->where('tipe', '1');
        $this->db->where('expire>', date("Y-m-d"));
        return $this->db->get();
    }
     public function poinuser($id)
    {
        $this->db->select('point');
        $this->db->from('driver');
        $this->db->where('id', $id);
        $saldo = $this->db->get();
        return $saldo;
    }
    public function kurangipoin($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('driver', $data);
        return true;
    }
    public function redeempoin($data)
    {
        $verify = $this->db->insert('redeem', $data);
        return true;
    }
    public function list_ikon($id)
    {
        $this->db->select('*');
        $this->db->from('driver_job');
        $this->db->where('id', $id);
        $point = $this->db->get();
        return $point;
    }
    public function cek_komisi($id)
    {
        $this->db->select('*');
        $this->db->from('fitur');
        $this->db->where('id_fitur', $id);
        $point = $this->db->get();
        return $point;
    }
    public function list_menu($id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('id_item', $id);
        $point = $this->db->get();
        return $point;
    }
    function data_menu($data_l)
    {
        $data = array(
                'jumlah_item' => $data_l['jumlah_item'],
                'total_harga' => $data_l['total_harga']
            );
        $this->db->where('id_item', $data_l['id_item']);
        $this->db->where('id_transaksi', $data_l['id_transaksi']);
        $upd = $this->db->update('transaksi_item', $data);
        return true;
    }
    function data_harga($data_l)
    {
        $data = array(
                'total_biaya' => $data_l['total_biaya']
            );
        $this->db->where('id_transaksi', $data_l['id_transaksi']);
        $upd = $this->db->update('transaksi_detail_merchant', $data);
        return true;
    }
    function updatetotal($data_l)
    {
        $data = array(
                'biaya_akhir' => $data_l['biaya_akhir']
            );
        $this->db->where('id', $data_l['id']);
        $upd = $this->db->update('transaksi', $data);
         return true;
    }
    public function deletemenu($id_item,$id_transaksi)
    {
        $this->db->where('id_item', $id_item);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi_item');
        return true;
    }
    public function deletechat($id_transaksi)
    {
        $this->db->where('idtrans', $id_transaksi);
        $this->db->delete('chat');
        return true;
    }
    public function deletechatmerchant($id_transaksi)
    {
        $this->db->where('idtrans', $id_transaksi);
        $this->db->delete('chat_merchant');
        return true;
    }
     function updatestatushome($data_l)
    {
        $data = array(
                'status' => $data_l['status']
            );
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        return true;
    }
     function statuson($data_l)
    {
        $data = array(
                'status' => '1'
            );
        $this->db->where('id_driver', $data_l['id_driver']);
        $upd = $this->db->update('config_driver', $data);
        return true;
    }
     function ceklogin($iduser)
    {
       $this->db->select('*');
        $this->db->from('driver');
        $this->db->where('driver.id', $iduser);
        $trans = $this->db->get();
        return $trans;
    }
     function updatelogin($data_l)
    {
        $data = array(
                'islogin' => $data_l['islogin']
        );
        $this->db->where('id', $data_l['id']);
        $upd = $this->db->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
     function cekpin($iduser)
    {
       $this->db->select('*');
        $this->db->from('driver');
        $this->db->where('driver.id', $iduser);
        $trans = $this->db->get();
        return $trans;
    }
     function cekstatus($iduser)
    {
       $this->db->select('*');
        $this->db->from('config_driver');
        $this->db->where('config_driver.id_driver', $iduser);
        $trans = $this->db->get();
        return $trans;
    }
    function updateexpire($data_l)
    {
        $data = array(
                'expire' => $data_l['expire']
        );
        $this->db->where('id', $data_l['id']);
        $upd = $this->db->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //detail transaksi
    public function detail_item($id)
    {
        $this->db->select('transaksi_item.jumlah_item,item.nama_item,item.id_item,item.foto_item,item.harga_item,item.harga_promo,item.status_promo,item.deskripsi_item, transaksi_item.catatan_item,transaksi_item.id_item, transaksi_item.total_harga');
        $this->db->from('transaksi_item');
        $this->db->join('item', 'transaksi_item.id_item = item.id_item');
        $this->db->where('id_transaksi', $id);
        return $this->db->get();
    }
    //detail transaksi jasa
    public function detail_itemjasa($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi_jasa');
        $this->db->where('idtransaksi', $id);
        return $this->db->get();
    }
    public function detail_item_verif($id)
    {
        $this->db->select('transaksi_item.jumlah_item,item.nama_item,item.id_item,item.foto_item,item.harga_item,item.harga_promo,item.status_promo,item.deskripsi_item, transaksi_item.catatan_item,transaksi_item.id_item, transaksi_item.total_harga');
        $this->db->from('transaksi_item');
        $this->db->join('item', 'transaksi_item.id_item = item.id_item');
        $this->db->where('id_transaksi', $id);
        return $this->db->get()->result();
    }
    function update_otp($iduser,$data_l)
    {
        $this->db->where('id', $iduser);
        $this->db->update('driver', $data_l);
        return true; 
    }
    public function get_otpkode($iduser)
    {
        $this->db->select('otp');
        $this->db->from('driver');
        $this->db->where('id', $iduser);
        $this->db->limit(1);
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
        //return $this->db->get()->result_array();
    }
    public function get_dataprofil($iduser)
    {
        $this->db->select(""
            . "driver.*,"
            . "kendaraan.*,"
            . "driver_job.*,"
            . "driver.foto as foto");
        $this->db->from('driver');
        $this->db->join('kendaraan', 'driver.kendaraan = kendaraan.id_k');
        $this->db->join('driver_job', 'driver.job = driver_job.id');
        $this->db->where('driver.id', $iduser);
        return $this->db->get();
    }
    public function get_dataprofilbyphone($iduser)
    {
        $this->db->select(""
            . "driver.*,driver.id AS iddriver,"
            . "kendaraan.*,"
            . "driver_job.*,"
            . "driver.foto as foto");
        $this->db->from('driver');
        $this->db->join('kendaraan', 'driver.kendaraan = kendaraan.id_k');
        $this->db->join('driver_job', 'driver.job = driver_job.id');
        $this->db->where('driver.phone', $iduser);
        return $this->db->get();
    }
    function datasetting()
    {
        $this->db->select('*');
        $this->db->from('app_settings');
        $this->db->where('id', '1');
        return $this->db->get();
    }
    public function insertchat($data)
    {
        return $this->db->insert('chat', $data);
    }
    public function insertchatmerchant($data,$foto,$namafoto)
    {
        if($foto == "0"){
            //non foto
        }else{
            $path = "images/chat/" . $namafoto;
            file_put_contents($path, base64_decode($foto));
        }
        $verify = $this->db->insert('chat_merchant', $data);
        return true;
    }
    function datachat($idtrans)
    {
        $this->db->select('*','pelanggan.*','driver.*');
        $this->db->from('chat');
        $this->db->join('pelanggan', 'chat.idcust = pelanggan.id', 'left');
        $this->db->join('driver', 'chat.iddriver = driver.id', 'left');
        $this->db->where('idtrans', $idtrans);
        $this->db->order_by('jam', 'ASC');
        return $this->db->get()->result();
    }
    function datachatmerchant($idtrans)
    {
        $this->db->select('*','merchant.*','driver.*');
        $this->db->from('chat_merchant');
        $this->db->join('merchant', 'chat_merchant.idmerc = merchant.id_merchant', 'left');
        $this->db->join('driver', 'chat_merchant.iddriver = driver.id', 'left');
        $this->db->where('idtrans', $idtrans);
        $this->db->order_by('jam', 'ASC');
        return $this->db->get()->result();
    }
    //-------------------------------- Grafik ----------------------------------------
    function cekstatustransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('history_transaksi');
        $this->db->where('id_user', $id);
        $cek = $this->db->get();
        $hasil = 2;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $hasil = $row->status;
            }
        }
        return $hasil;
    }
    function datagrafik($bulan,$id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where("(MONTH(waktu) = $bulan AND YEAR(waktu) = date('Y'))", NULL, FALSE);
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalpendapatan($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalordertunai($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalordersaldo($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalpendapatanharian($id)
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where("(DAY(waktu) = $day AND MONTH(waktu) = $month)", NULL, FALSE);
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalpendapatanmingguan($id)
    {
   
        $today = date("Y-m-d");
        $todayMinusSeven = date("Y-m-d",strtotime("-7 days"));

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('waktu BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalpendapatanbulanan($id)
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $this->db->select('*');
        $this->db->from('wallet');
        //$this->db->where("(MONTH(waktu) = $month AND YEAR(waktu) = $year)", NULL, FALSE);
        $this->db->where('waktu BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function totalpendapatantahunan($id)
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where("(YEAR(waktu) = $year)", NULL, FALSE);
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata += $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function datamingrafik($id)
    {
        $this->db->select_min('wallet.jumlah');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order-' OR type = 'Order+')", NULL, FALSE);
        $this->db->where('status', '1');
        $cek = $this->db->get();
        $countdata = 0;
        $hasil = 0;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $countdata = $row->jumlah;
            }
            $hasil = $countdata;
        }
        return $hasil;
    }
    function datastatus($id)
    {
        $this->db->select_min('config_driver.status');
        $this->db->from('config_driver');
        $this->db->where('id_driver', $id);
        $cek = $this->db->get();
        $getstatus = 1;
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $getstatus = $row->status;
            }
        }
        return $getstatus;
    }
    function emailsend($subject, $emailuser, $content, $host, $port, $username, $password, $from, $appname, $secure)
    {
        require APPPATH . '/libraries/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = $secure;
        $mail->Host = $host; //host masing2 provider email
        $mail->SMTPDebug = 0;
        $mail->Port = $port;
        $mail->SMTPAuth = true;
        $mail->Username = $username; //user email
        $mail->Password = $password; //password email 
        $mail->SetFrom($from, $appname); //set email pengirim
        $mail->Subject = $subject; //subyek email
        $mail->AddAddress($emailuser, "User");  //tujuan email
        $mail->MsgHTML($content); //pesan dapat berupa html
        $mail->Send();
        return true;
    }
    //---------------------------- Template Forgot ---------------------------------
    function template1($subject, $text1, $text2, $web, $appname, $linkbtn, $linkgoogle, $address)
    {
        $msg = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head><meta charset="shift_jis">
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->

<meta content="width=device-width" name="viewport">
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 610px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">

<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">


<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 26px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 31px; margin: 0;"><span style="font-size: 26px;"><strong>' . $subject . '</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 20px; padding-bottom: 10px; padding-left: 20px;" valign="top">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid #6DC0FF; width: 50%;" valign="top" width="50%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">

<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: justify; mso-line-height-alt: 17px; margin: 0;">' . $text1 . '</p>
</div><div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">

</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:192pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#6dc0ff"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<a href="' . $linkbtn . '" rel="noopener" style="color: #ffffff" target="_blank"><div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#6dc0ff;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #6dc0ff;border-right:1px solid #6dc0ff;border-bottom:1px solid #6dc0ff;border-left:1px solid #6dc0ff;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong> Reset Password </strong></span></span></div></a>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>

<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;">' . $text2 . ' .</p>
</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid two-up" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">


<div class="col num6" style="max-width: 320px; min-width: 295px; display: table-cell; vertical-align: top; width: 295px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">


<div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;">
<p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: NaNpx; margin: 0;">' . $address . '</p>
</div>
</div>





</div>

</div>
</div>


<div class="col num6" style="max-width: 320px; min-width: 295px; display: table-cell; vertical-align: top; width: 295px;">
<div style="width:100% !important;">

<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

<div align="center" class="img-container center fixedwidth" style="padding-right: 10px;padding-left: 10px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 10px;padding-left: 10px;" align="center"><![endif]--><a href="' . $linkgoogle . '"><img align="center" alt="Image" border="0" class="center fixedwidth" src="https://gojasa.com/fileenvato/googleplay.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 206px; display: block;" title="Image" width="206" data-iml="5150976.220000001"></a><a>
<!--[if mso]></td></tr></table><![endif]-->
</a></div></div><a>
<!--<![endif]-->
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</a></div><a>
</a></div><a>
</a></div><a>
</a><div style="background-color:transparent;"><a>
</a><div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 590px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;"><a>
</a><div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;"><a>
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:590px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="590" style="background-color:transparent;width:590px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
</a><div class="col num12" style="min-width: 320px; max-width: 590px; display: table-cell; vertical-align: top; width: 590px;"><a>
</a><div style="width:100% !important;"><a>
<!--[if (!mso)&(!IE)]><!-->
</a><div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><a>
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
</a><div style="color:#999999;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;"><a>
</a><div style="font-size: 14px; line-height: 1.2; color: #999999; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 17px;"><a>
</a><p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;"><a>Copyright Â© 2020 </a><a href="' . $web . '" rel="noopener" style="text-decoration: underline; color: #6dc0ff;" target="_blank">' . $appname . '</a>. All Rights Reserved</p>
</div><a>
</a></div><a>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</a></div><a>
<!--<![endif]-->
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</a></div><a>
</a></div><a>
</a></div><a>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</a></td>
</tr>
</tbody>
</table>



</body></html>';
        return $msg;
    }
   
    function rejectstatusnol($iddriver)
    {
        $data = array(
            'status' => '1'
        );
        $this->db->where('id_driver', $iddriver);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function rejectstatussatu($iddriver)
    {
        $data = array(
            'status' => '4'
        );
        $this->db->where('id_driver', $iddriver);
        $upd = $this->db->update('config_driver', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function datawaitorder(){
        $result = $this->db->query("
            SELECT t.*,f.jarak_driver,
                (6371 * acos(cos(radians(t.start_latitude)) * cos(radians( ld.latitude ))"
            . " * cos(radians(ld.longitude) - radians(t.start_longitude))"
            . " + sin(radians(t.start_latitude)) * sin( radians(ld.latitude)))) AS distance
            FROM config_driver ld, transaksi t,fitur f
            WHERE t.id_driver IS NULL
            HAVING distance <= f.jarak_driver
            ORDER BY distance ASC");
        return $result;
    }
    function datawaittransaksi($lat,$long)
    {
        
        $this->db->select("
            transaksi.*,
            fitur.jarak_driver,fitur.fitur,fitur.icon,
            pelanggan.fullnama,
            (6371 * acos(cos(radians($lat)) * 
            cos(radians(transaksi.start_latitude)) * 
            cos(radians(transaksi.start_longitude) - 
            radians( $long)) + 
            sin(radians($lat)) * 
            sin( radians(transaksi.start_latitude)))) AS distance");
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->join('config_driver', 'transaksi.id_driver = config_driver.id_driver', 'left');
        $this->db->where('transaksi.id_driver',null);
        $this->db->where('transaksi.timeout = 0');
        $this->db->having('distance <= 1');
        $this->db->order_by('distance', 'ASC');
        $trans = $this->db->get();
        return $trans;
    }
    function datatransaksiwaiting($data)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
        $this->db->join('transaksi_detail_merchant', 'transaksi.id = transaksi_detail_merchant.id_transaksi', 'left');
        $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
        $this->db->join('merchant', 'transaksi_detail_merchant.id_merchant = merchant.id_merchant', 'left');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->join('transaksi_detail_send', 'transaksi.id = transaksi_detail_send.id_transaksi', 'left');
        $this->db->where('transaksi.id', $data['id_transaksi']);
        $this->db->where('transaksi.id_driver', $data['id_driver']);
        $trans = $this->db->get();
        return $trans;
    }
    public function insertupgrade($data)
    {
        $this->db->insert('upgrade',$data);
    }
    public function checkexsupg($id)
    {
        $cek = $this->db->query("SELECT iddriver FROM upgrade where iddriver='$id'");
        if ($cek->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    //---------------------- cutting transfer saldo ----------------------------------
    function transfersaldo_driver($data)
    {
        $numberreff = rand ( 10000 , 99999 );

        $this->db->where('id_user', $data['id_driver']);
        $saldoawal = $this->db->get('saldo')->row('saldo');

        $nilai = $data['jumlah'];
        $dataawal = array(
            'id_user' => $data['id_driver'],
            'jumlah' => $nilai,
            'bank' => 'Sistem',
            'nama_pemilik' => $data['nama_driver'],
            'rekening' => 'wallet',
            'tujuan' => $data['nama_tujuan'],
            'type' => 'Transfer',
            'reff' => 'Trf'.$numberreff
        );
        $ins_trans = $this->db->insert('wallet', $dataawal);
       
        if ($ins_trans) {
            $this->db->where('id_user', $data['id_driver']);
            $upd = $this->db->update('saldo', array('saldo' => ($saldoawal - $nilai)));
            if ($this->db->affected_rows() > 0) {
                //next insert
                $this->db->where('id_user', $data['id_tujuan']);
                $saldotujuan = $this->db->get('saldo')->row('saldo');
                $nilai = $data['jumlah'];
                $datatujuan = array(
                    'id_user' => $data['id_tujuan'],
                    'jumlah' => $data['jumlah'],
                    'bank' => 'Sistem',
                    'nama_pemilik' => $data['nama_tujuan'],
                    'rekening' => 'wallet',
                    'type' => 'Topup',
                    'reff' => 'Topup'.$numberreff
                );
                $next_trans = $this->db->insert('wallet', $datatujuan);
                $this->db->where('id_user', $data['id_tujuan']);
                $next_upd = $this->db->update('saldo', array('saldo' => ($saldotujuan + $nilai)));
                return array(
                    'status' => true,
                    'pesan' => 'sukses',
                    'data' => 'fail in update'
                );
            }else{
                return array(
                    'status' => false,
                    'pesan' => 'gagal',
                    'data' => 'fail in update'
                );
            }
        }else{
            return array(
                'status' => false,
                'pesan' => 'gagal',
                'data' => 'fail in update'
            );
        }
    }
    public function tokenpelanggan($id)
    {
        $this->db->select('token');
        $this->db->from('pelanggan');
        $this->db->where('id', $id);
        $pelanggan = $this->db->get();
        return $pelanggan;
    }
    public function osdatachat($id)
    {
        $this->db->select('idtrans,iddriver,idcust');
        $this->db->from('chat');
        $this->db->where('idtrans', $id);
        $pelanggan = $this->db->get();
        return $pelanggan;
    }
    
    public function ostokenpelanggan($id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id', $id);
        $pelanggan = $this->db->get();
        return $pelanggan;
    }
    public function ostokenmerchant($id)
    {
        $this->db->select('*');
        $this->db->from('merchant');
        $this->db->where('id_merchant', $id);
        $pelanggan = $this->db->get();
        return $pelanggan;
    }
    public function updateostoken($data,$iddriver)
    {
        $this->db->where('id', $iddriver);
        $this->db->update('driver', $data);
        return true;
    }
    public function getdattrxharian($iddriver){
        $day = date('d');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
        $this->db->where('history_transaksi.status != 1');
        $this->db->where('history_transaksi.status != 2');
        $this->db->where('history_transaksi.status != 3');
        $this->db->where('history_transaksi.status != 0');
        $this->db->where("(DAY(transaksi.waktu_order) = $day)", NULL, FALSE);
        $this->db->where('transaksi.id_driver', $iddriver);
        return $this->db->get()->result_array();
    }
    //---------------------- Wallet ------------------------------------------
    public function getwallet($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
    public function getwallettunai($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where("(type = 'Order-')", NULL, FALSE);
        $this->db->where('id_user', $id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
    public function getwalletsaldo($id)
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('id_user', $id);
        $this->db->where("(type = 'Order+')", NULL, FALSE);
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
    public function getdetailwallet($iddriver){
        $day = date('d');
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->join('history_transaksi', 'wallet.id_user = history_transaksi.id_driver', 'left');
        $this->db->join('transaksi', 'wallet.id_user = transaksi.id_driver', 'left');
        $this->db->where('history_transaksi.status != 1');
        $this->db->where('history_transaksi.status != 2');
        $this->db->where('history_transaksi.status != 3');
        $this->db->where('history_transaksi.status != 0');
        $this->db->where('wallet.id_user', $iddriver);
        return $this->db->get()->result_array();
    }
}
