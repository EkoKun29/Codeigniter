<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aduan extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('aduan_model');
    }
    public function index()
    {
        $sess = $_SESSION['siltap'];
        $cek_adm_bidang = $this->aduan_model->cekAdmBidang($sess['kdlokasi']);

        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->aduan_model->getAllByAdmin();
            $this->load_view('master/aduan_bidang', $data);
        } else {
            if ($cek_adm_bidang == 1) {
                $data['aduan'] = $this->aduan_model->getAllByBidang($sess['kdlokasi']);
                $this->load_view('master/aduan_bidang', $data);
            } else {
                $data['aduan'] = $this->aduan_model->getAll($sess['nip']);
                $this->load_view('master/aduan', $data);
            }
        }
    }
    function detail($aduan_id)
    {
        $sess = $_SESSION['siltap'];
        $cek_adm_bidang = $this->aduan_model->cekAdmBidang($sess['kdlokasi']);

        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->aduan_model->getAllByAdmin();
            $data['aduanid'] = $this->aduan_model->getId($aduan_id);
            $data['tindak_lanjut'] = $this->aduan_model->getTindakLanjut($aduan_id);
            $this->load_view('master/aduan_bidang', $data);
        } else {
            if ($cek_adm_bidang == 1) {
                $data['aduan'] = $this->aduan_model->getAllByBidang($sess['kdlokasi']);
                $data['aduanid'] = $this->aduan_model->getId($aduan_id);
                $data['tindak_lanjut'] = $this->aduan_model->getTindakLanjut($aduan_id);
                $this->load_view('master/aduan_bidang', $data);
            } else {
                $data['aduan'] = $this->aduan_model->getAll($sess['nip']);
                $data['aduanid'] = $this->aduan_model->getId($aduan_id);
                $data['tindak_lanjut'] = $this->aduan_model->getTindakLanjut($aduan_id);
                $this->load_view('master/aduan', $data);
            }
        }
    }


    function add()
    {
        $sess = $this->session->userdata('siltap');
        $data['user'] = $this->aduan_model->getEmptyUser();
        $data['kategori'] = $this->aduan_model->getKategori();
        $data['sub'] = 'add';
        $this->load_view('master/aduan_form', $data);
    }

    function update($id)
    {
        $sess = $_SESSION['siltap'];
        $data['user'] = $this->aduan_model->getById($id);
        $data['kategori'] = $this->aduan_model->getKategori();
        $data['sub'] = 'update/update';
        $this->load_view('master/aduan_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
