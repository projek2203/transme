<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Google_model extends CI_model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function get_list() {
  
        $query = $this->db->get('config_driver');
        return $query->result();
      
        }
    }
?>