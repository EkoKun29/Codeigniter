<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends YK_Controller
{

    function index()
    {
        $this->load->library('angka');
        $this->load->helper('bulan');

        $sess = $this->session->userdata('user');
        $bulan = date('n');
        $tahun = date('Y');
        $data['sess']  = $this->session->userdata('desktik');

        $this->load_view('home/dashboard', $data);
    }
    function update()
    {
        $data['laporan']=$this->Laporan_model->getTgl();
        $this->load->view('view/home/dashboard',$data);
      }
}

/*
 * End of File: Dashboard.php
 * File Location : ./controllers/home/Dashboard.php
 */