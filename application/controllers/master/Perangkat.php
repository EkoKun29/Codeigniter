<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perangkat extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('perangkat_model');
    }
    public function index()
    {
        $sess = $this->session->userdata('siltap');
        $desa = 1;
        $data['perangkat']  = $this->perangkat_model->getAllId($desa);
        $data['kecamatan']  = $this->perangkat_model->kec();
        $data['desa']       = $this->perangkat_model->desa();

        if ($sess['groupid'] == 4) {
            $data['desabykec'] = $this->perangkat_model->kec_id($sess['kecid']);
            $this->load_view('master/perangkat_kec', $data);
        } else {
            $this->load_view('master/perangkat', $data);
        }
    }
    function detail($mode)
    {
        if ($mode == "get_kecamatan") {
            $id = $this->input->post('id', TRUE);

            $data = $this->perangkat_model->kec_id($id);
            $result = array();
            foreach ($data as $item) {
                $id_desa    = $item->DesaId;
                $nama_desa  = $item->DesaNama;
                $data = array(
                    'id'      =>  $id_desa,
                    'nama'    =>  $nama_desa,
                );
                array_push($result, $data);
            }
            echo json_encode($result);
        } elseif ($mode == "sortir") {
            $sess = $this->session->userdata('siltap');
            $desa = $this->input->post('desa');
            $kec = $this->input->post('kecamatan');
            $id = $this->uri->segment('5');
            // $sess = $this->session->userdata('user');
            $data['kecamatan']  = $this->perangkat_model->kec();
            $data['desa']       = $this->perangkat_model->desa();

            if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
                $data['perangkat']  = $this->perangkat_model->getAllperangkat($desa);
            } elseif ($desa != "") {
                $data['perangkat']  = $this->perangkat_model->getAllId($desa);
            } else {
                $data['perangkat']  = $this->perangkat_model->getAllIdKec($kec);
            }

            if ($sess['groupid'] == 4) {
                $data['desabykec'] = $this->perangkat_model->kec_id($sess['kecid']);
                $this->load_view('master/perangkat_kec', $data);
            } else {
                $this->load_view('master/perangkat', $data);
            }
        } elseif ($mode == "nik") {
            $nik = $this->uri->segment(5);
            $data['perangkat'] = $this->perangkat_model->PerangkatByNik($nik);
            $this->load_view('master/perangkat_detail', $data);
        }
    }


    function add()
    {
        $sess = $this->session->userdata('siltap');

        if ($sess['groupid'] == 3) {
            $desaid = $sess['desaid'];
            $data['desa'] = $this->perangkat_model->desaById($desaid);
        } elseif ($sess['groupid'] == 4) {
            $kecid = $sess['kecid'];
            $data['desa'] = $this->perangkat_model->kec_id($kecid);
        } else {
            $data['desa'] = $this->perangkat_model->desa();
        }

        $data['user'] = $this->perangkat_model->getEmptyUser();
        $data['jabatan'] = $this->perangkat_model->jabatan();
        $data['status'] = $this->perangkat_model->StatusId();
        $data['kjabatan'] = $this->perangkat_model->KJabatan();
        $data['sub'] = 'add';
        $this->load_view('master/perangkat_form', $data);
    }

    function update($id)
    {

        $data['user'] = $this->perangkat_model->getById($id);
        $data['desa'] = $this->perangkat_model->desa();
        $data['jabatan'] = $this->perangkat_model->jabatan();
        $data['status'] = $this->perangkat_model->StatusId();
        $data['kjabatan'] = $this->perangkat_model->KJabatan();
        $data['sub'] = 'update';
        $this->load_view('master/perangkat_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
