<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    function index() {  
    	$env = $this->config->item("environment");
    	if($env == "development"){
    		error_reporting(0); 
    	}             
        $this->load->view('public/login');        
    }
}