<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class YK_Controller extends CI_Controller {

    function __Construct() {
        parent::__Construct();
        $this->authentication();
        $this->cek_same_password();

    }

    function load_view($template, $data = array()) {
        if (isset($_SESSION['ajax'])) {
            $this->load->view($template, $data);
            unset($_SESSION['ajax']);
        } elseif (isset($_SESSION['iframe'])) {
            $this->load->view($template, $data);
            $this->load->view('system/iframe');
            unset($_SESSION['iframe']);
        } else {
            $this->load->model('system_model');
            $this->load->model('menu_model');
            
            $menu['menu'] = $this->system_model->getMenu($_SESSION['desktik']['userid']);
            $menu['authentication'] = $this->menu_model->getAuth($this->uri->segment(1)."/".$this->uri->segment(2), $_SESSION['desktik']['userid']);            
            $this->load->view('layouts/header', $menu);
            $this->load->view($template, $data);
            $this->load->view('layouts/footer');
        }
    }

    function load_view_frontend($template, $data = array()) {           
            $this->load->view('layouts/header-frontend');
            $this->load->view($template, $data);
            $this->load->view('layouts/footer-frontend');
    }

    function authentication() {
        $this->load->model('authentication_model');
        $module_non_login = array('main','frontend');
        $module_login = array('home', 'login', 'ajax');
        $uid = empty($_SESSION['desktik']['userid']) ? 0 : $_SESSION['desktik']['userid'];
        $module = ($this->uri->segment(1) == '' ? 'home' : $this->uri->segment(1));
        $class = ($this->uri->segment(2) == '' ? 'home' : $this->uri->segment(2));
        if (substr($class, strlen($class) - 3, 3) == '_do')
            $class = substr($class, 0, strlen($class) - 3);
        $fungsi = ($this->uri->segment(3) == '' ? 'index' : $this->uri->segment(3));
        if (in_array($module, $module_non_login)) {
            
        } elseif (in_array($module, $module_login) AND $uid) {
            
        } elseif ($this->authentication_model->cekModule($module, $class, $fungsi, $uid)) {
            
        } elseif (!$this->authentication_model->cekModule($module, $class, $fungsi, $uid) AND $uid) {
            redirect('home/forbidden');
        } else {
            redirect('public/auth');        
        }
    }

    function cek_same_password(){
        $status = $this->config->item("environment");
        $siltap = $this->session->userdata('desktik');
        if($status =="production"){
            $userid = $siltap['userid'];
            $user = $this->authentication_model->getIdUser($userid);
            $username = sha1($user->UserName);
            if($username == $user->UserPassword){
                redirect(base_url('changepassword'));
            }

        }
    }

}

/**
 * End of file YK_Controller.php
 * File location : ./application/core/YK_Controller.php
 */