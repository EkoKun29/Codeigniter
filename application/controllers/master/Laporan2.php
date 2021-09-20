<?php if (!defined('BASEPATH')) exit('No direct script acces allowed');

class Laporan2 extends YK_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
    }

    public function index()
    {
        // $sess = $_SESSION['desktik'];
        // $kdlokasi = !empty($sess['kdlokasi']) ? $sess['kdlokasi'] : "";
        // $cek_adm_bidang = $this->laporan_model->cekAdmBidang($kdlokasi);
            $data['laporan2'] = $this->laporan_model->getAll();
            $this->load_view('master/laporan_aduan', $data);
        
    }
}