<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Desa extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('desa_model');
    }
    public function index()
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['desa'] = $this->desa_model->getAll();
        } else {
            $data['desa'] = $this->desa_model->getId($sess['kecid']);
        }
        $data['desa'] = $this->desa_model->getAll();
        $data['kecamatan'] = $this->desa_model->getKec();
        $this->load_view('master/desa', $data);
    }

    public function search()
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $KecId = $this->input->post('kec');
        } else {
            $KecId = $sess['kecid'];
        }
        // $KecId = $this->input->post('kec');

        $data['desa'] = $this->desa_model->DesaByKec($KecId);
        $data['kecamatan'] = $this->desa_model->getKec();
        $this->load_view('master/desa', $data);
    }



    function add()
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['status_form'] = 1;
        } else {
            $data['status_form'] = 0;
        }
        $data['user'] = $this->desa_model->getEmptyUser();
        $data['kec'] = $this->desa_model->kec();
        $data['sub'] = 'add';
        $this->load_view('master/desa_form', $data);
    }

    function update($id)
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['status_form'] = 1;
        } else {
            $data['status_form'] = 0;
        }

        $data['user'] = $this->desa_model->getById($id);
        $data['kec'] = $this->desa_model->kec();
        $data['sub'] = 'update';
        $this->load_view('master/desa_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
