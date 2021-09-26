<<<<<<< HEAD
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends YK_Controller
{
//test
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }
    public function index()
    {
       
        $data['laporan']= $this->Laporan_model->getAll();
        $this->load_view('master/laporan',$data);
    }
        

        public function detail($id)
        {
            $data['laporan']= $this->Laporan_model->getAll();
            $data['kategori']= $this->Laporan_model->kategori();
            if($id=="aduan"){

                $this->load_view('master/laporan_aduan',$data);
            }elseif($id=="tindak_lanjut"){
                $this->load_view('master/laporan_tindak_lanjut',$data);
                }
        }
        public function Cetak()
        {
            $data['laporan']=$this->Laporan_model->tampil_data()->result();
            $this->load->view('master/cetak_aduan', $data);
        }

        public function export($KategoriId)
        {
            $data['laporan']=$this->Laporan_model->getAllByKategori($KategoriId);
            $this->load->view('master/eksport_aduan', $data);
        }
        public function search($KategoriSeksi)
        {
            $data['laporan']=$this->Laporan_model->getAllByLokasi($KategoriSeksi);
            $this->load->view('master/addlokasi_aduan', $data);
        }
}
    ?>
=======
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
>>>>>>> e3966c814671b40a22d011a1afe0d0bfc7bbba00
