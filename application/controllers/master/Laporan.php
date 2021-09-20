<?php if (!defined('BASEPATH')) exit('No direct script acces allowed');

class Laporan extends YK_Controller
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
            $data['laporan'] = $this->laporan_model->getAll();
            $this->load_view('master/laporan', $data);
        
    }

    public function detail($id){
    $data['laporan'] = $this->laporan_model->getAll();
        if($id=="laporanaduan"){
        $this->load_view('master/laporan_aduan', $data);
    }elseif
        ($id=="laporantindaklanjut"){

        $data['laporantindaklanjut'] = $this->laporan_model->getAll();
        $data['count'] = $this->laporan_model->getTotal();
        $this->load_view('master/laporan_tindak_lanjut', $data);

        // print_r($data);
        // foreach($data['laporan'] as $d){
        //     echo $d->TindakLanjutId."<br>";
        }
    }

    public function export(){
        $data['laporan'] = $this->laporan_model->tampil_data()->result();
		$this->load_view('master/print_laporan', $data);
    }
    
}
