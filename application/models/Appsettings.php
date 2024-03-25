<?php


class Appsettings extends CI_model
{
    public function getappbyid()
    {
        return $this->db->get_where('app_settings', ['id' => '1'])->row_array();
    }
    public function appsetting()
    {
      $this->db->select('*');
      $this->db->from('app_settings');
      $this->db->where('id', '1');
      return $this->db->get();
    }
    public function jasalayanan()
    {
      $this->db->select('jasaapp');
      $this->db->from('app_settings');
      $this->db->where('id', '1');
      return $this->db->get()->result_array();
    }
    public function gettransfer()
    {
        $this->db->select('*');
        $this->db->from('list_bank');
        return $this->db->get()->result_array();
    }

    public function getbankid($id)
    {
        $this->db->select('*');
        $this->db->from('list_bank');
        $this->db->where('id_bank', $id);
        return $this->db->get()->row_array();
    }

    public function ubahdataappsettings($data)
    {
        $this->db->set('app_logo', $data['app_logo']);
        $this->db->set('app_email', $data['app_email']);
        $this->db->set('app_website', $data['app_website']);
        $this->db->set('app_privacy_policy', $data['app_privacy_policy']);
        $this->db->set('app_aboutus', $data['app_aboutus']);
        $this->db->set('app_address', $data['app_address']);
        $this->db->set('app_name', $data['app_name']);
        $this->db->set('app_description', $data['app_description']);
        $this->db->set('app_contact', $data['app_contact']);
        $this->db->set('geocode_key', $data['geocode_key']);
        $this->db->set('map_key', $data['map_key']);
        $this->db->set('fcm_key', $data['fcm_key']);
        $this->db->set('maintenance', $data['maintenance']);
        $this->db->set('background', $data['background']);
        $this->db->set('isotp', $data['isotp']);
        $this->db->set('upreff', $data['upreff']);
        $this->db->set('rewardreff', $data['rewardreff']);
        $this->db->set('mode', $data['mode']);
        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }

    public function ubahdatarekening($data, $id)
    {
        $this->db->where('id_bank', $id);
        $this->db->update('list_bank', $data);
    }

    public function hapusrekening($id)
    {
        $this->db->where('id_bank', $id);
        $this->db->delete('list_bank');
    }

    public function adddatarekening($data)
    {
        $this->db->insert('list_bank', $data);
    }

    public function ubahdataemail($data)
    {
        $this->db->set('email_subject', $data['email_subject']);
        $this->db->set('email_text1', $data['email_text1']);
        $this->db->set('email_text2', $data['email_text2']);
        $this->db->set('email_subject_confirm', $data['email_subject_confirm']);
        $this->db->set('email_text3', $data['email_text3']);
        $this->db->set('email_text4', $data['email_text4']);

        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }

    public function ubahdatasmtp($data)
    {
        $this->db->set('smtp_host', $data['smtp_host']);
        $this->db->set('smtp_port', $data['smtp_port']);
        $this->db->set('smtp_username', $data['smtp_username']);
        $this->db->set('smtp_password', $data['smtp_password']);
        $this->db->set('smtp_from', $data['smtp_from']);
        $this->db->set('smtp_secure', $data['smtp_secure']);

        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }
    public function ubahnotif($data)
    {
        $this->db->set('fcm_key', $data['fcm_key']);
        $this->db->set('os_appid', $data['os_appid']);
        $this->db->set('os_restapi', $data['os_restapi']);
        $this->db->set('os_channel', $data['os_channel']);
        $this->db->set('os_template', $data['os_template']);
        $this->db->set('os_channel_chat', $data['os_channel_chat']);
        $this->db->set('os_template_chat', $data['os_template_chat']);
        $this->db->set('mode', $data['mode']);
        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }
    public function ubahduitku($data)
    {
        $this->db->set('duitku_merchant', $data['duitku_merchant']);
        $this->db->set('duitku_key', $data['duitku_key']);
        $this->db->set('duitku_mode', $data['duitku_mode']);
        $this->db->set('duitku_status', $data['duitku_status']);
        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }
    public function ubahdigiflazz($data)
    {
        $this->db->set('digi_user', $data['digi_user']);
        $this->db->set('digi_api', $data['digi_api']);
        $this->db->set('digi_mode', $data['digi_mode']);
        $this->db->set('digi_status', $data['digi_status']);
        $this->db->where('id', '1');
        $this->db->update('app_settings', $data);
    }
}
