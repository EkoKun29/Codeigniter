<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tindak_lanjut extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('tindak_lanjut_model');
    }
    public function index()
    {
        $sess = $_SESSION['siltap'];
        $kdlokasi = !empty($sess['kdlokasi']) ? $sess['kdlokasi'] : "";
        $cek_adm_bidang = $this->tindak_lanjut_model->cekAdmBidang($kdlokasi);

        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->tindak_lanjut_model->getAllByAdmin();
            $this->load_view('master/tindak_lanjut_bidang', $data);
        } else {
            if ($cek_adm_bidang->num_rows() == 1) {
                $data['aduan'] = $this->tindak_lanjut_model->getAllByBidang($cek_adm_bidang->row()->KategoriId);
                $this->load_view('master/tindak_lanjut_bidang', $data);
            } else {
                $data['aduan'] = $this->tindak_lanjut_model->getAll($sess['nip']);
                $this->load_view('master/tindak_lanjut', $data);
            }
        }
    }
    function detail($aduan_id)
    {
        $sess = $_SESSION['siltap'];
        $kdlokasi = !empty($sess['kdlokasi']) ? $sess['kdlokasi'] : "";
        $cek_adm_bidang = $this->tindak_lanjut_model->cekAdmBidang($kdlokasi);



        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->tindak_lanjut_model->getAllByAdmin();
            $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
            $this->load_view('master/tindak_lanjut_bidang', $data);
        } else {
            if ($cek_adm_bidang->num_rows() == 1) {
                $data['aduan'] = $this->tindak_lanjut_model->getAllByBidang($cek_adm_bidang->row()->KategoriId);
                $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
                $this->load_view('master/tindak_lanjut_bidang', $data);
            } else {
                $data['aduan'] = $this->tindak_lanjut_model->getAll($sess['nip']);
                $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
                $this->load_view('master/tindak_lanjut', $data);
            }
        }
    }


    function add()
    {
        $sess = $this->session->userdata('siltap');
        $data['user'] = $this->tindak_lanjut_model->getEmptyUser();
        $data['kategori'] = $this->tindak_lanjut_model->getKategori();
        $data['sub'] = 'add';
        $this->load_view('master/aduan_form', $data);
    }

    function update()
    {
        $id = $_POST['id'];
        $sess = $_SESSION['siltap'];
        $data['user'] = $this->tindak_lanjut_model->getById($id, $sess['nip']);
        $data['sub'] = 'update';
        $this->load->view('master/tindak_lanjut_edit', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
