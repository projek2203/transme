<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appnotifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->database();
        $this->load->model('Notifikasi_model', 'notif');
        $this->load->model('Appsettings', 'app');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['apps'] = $this->app->getappbyid();
        $this->load->view('includes/header', $data);
        $this->load->view('notifikasi/index', $data);
        $this->load->view('includes/footer', $data);
    }
    public function kirimnotif()
    {
    $datasetting = $this->notif->appsetting()->row();
    $serverkey = $datasetting->fcm_key;
    
        $data = array(
            "message" => "This is a Firebase Cloud Messaging Topic Message!"
        );
        $final = array(
                "condition" => "'news' in topics",
                "data" => $data
                );

        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
                'Authorization: key='.$serverkey,
                'Content-Type: application/json'
                );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($final));
        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
        // curl failed
        }

        // Close connection
        curl_close($ch);
    }
    public function send()
    {
        $datasetting = $this->notif->appsetting()->row();
        $serverkey = $datasetting->fcm_key;
        
        $topic = $this->input->post('topic');
        $title = $this->input->post('title');
        $message = $this->input->post('message');
        
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array (
          'Authorization:key=' . $serverkey,
          'Content-Type:application/json'
        );
        $notifData = [
          'title' => $title,
          'body' => $message,
          'type' => 0
        ];
        $apiBody = [
          'notification' => $notifData,
          'data' => $notifData,
          "time_to_live" => 600,
          'to' => '/topics/'.$topic
        ];
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url );
        curl_setopt ($ch, CURLOPT_POST, true );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
    
        $response = curl_exec($ch);
        $err = curl_error($ch);
    
        curl_close($ch);
        
        //$this->notif->send_notif($serverkey,$title, $message, $topic);
        $this->session->set_flashdata('send', $response);
        redirect('Appnotifikasi/index');
    }
}