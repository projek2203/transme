<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Google extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Google_model', 'google');
        $this->load->helper(array('url','html','form'));
    }    
 
    public function index() {
        $users = $this->google->get_list();
 
        $markers = [];
        $infowindow = [];
 
        foreach($users as $value) {
          $markers[] = [
            $value->status, $value->latitude, $value->longitude
          ];          
          $infowindow[] = [
           "<div class=info_content><h3>".$value->status."</h3><p>".$value->status."</p></div>"
          ];
        }
        $location['markers'] = json_encode($markers);
        $location['infowindow'] = json_encode($infowindow);
     
        $this->load->view('driver/tracker',$location);
    }
     
}
?>