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
        $sess = $_SESSION['desktik'];
        $kdlokasi = !empty($sess['kdlokasi']) ? $sess['kdlokasi'] : "";
        $cek_adm_bidang = $this->tindak_lanjut_model->cekAdmBidang($kdlokasi);

        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->tindak_lanjut_model->getAllByAdmin();
            $this->load_view('master/tindak_lanjut_bidang', $data);
        } else {
            if ($cek_adm_bidang->num_rows() != 0 and $sess['kdjabatan'] == 20000) {
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
        $sess = $_SESSION['desktik'];
        $kdlokasi = !empty($sess['kdlokasi']) ? $sess['kdlokasi'] : "";
        $cek_adm_bidang = $this->tindak_lanjut_model->cekAdmBidang($kdlokasi);



        if ($sess['groupid'] == 1) {
            $data['aduan'] = $this->tindak_lanjut_model->getAllByAdmin();
            $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
            $data['tindaklanjutid'] = $this->tindak_lanjut_model->TindakLanjutBy($aduan_id);
            $this->load_view('master/tindak_lanjut_bidang', $data);
        } else {
            if ($cek_adm_bidang->num_rows() != 0 and $sess['kdjabatan'] == 20000) {
                $data['aduan'] = $this->tindak_lanjut_model->getAllByBidang($cek_adm_bidang->row()->KategoriId);
                $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
                $data['tindaklanjutid'] = $this->tindak_lanjut_model->TindakLanjutBy($aduan_id);
                $this->load_view('master/tindak_lanjut_bidang', $data);
            } else {
                $data['aduan'] = $this->tindak_lanjut_model->getAll($sess['nip']);
                $data['aduanid'] = $this->tindak_lanjut_model->getId($aduan_id);
                $data['tindaklanjutid'] = $this->tindak_lanjut_model->TindakLanjutBy($aduan_id);
                $this->load_view('master/tindak_lanjut', $data);
            }
        }
    }


    function add()
    {
        $sess = $this->session->userdata('desktik');
        $data['user'] = $this->tindak_lanjut_model->getEmptyUser();
        $data['kategori'] = $this->tindak_lanjut_model->getKategori();
        $data['sub'] = 'add';
        $this->load_view('master/aduan_form', $data);
    }

    function update($mode)
    {
        if ($mode == "deskripsi") {
            $id = $_POST['id'];
            $sess = $_SESSION['desktik'];
            $data['user'] = $this->tindak_lanjut_model->getById($id, $sess['nip']);
            $data['sub'] = 'update';
            $this->load->view('master/tindak_lanjut_edit', $data);
        } elseif ($mode == "forward") {
            $data['kategori'] = $this->tindak_lanjut_model->kategori();
            $this->load->view('master/tindak_lanjut_forward',$data);
        }
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
