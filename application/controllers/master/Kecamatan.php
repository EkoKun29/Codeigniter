<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kecamatan extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kecamatan_model');
    }
    public function index()
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['kecamatan'] = $this->kecamatan_model->getAll();
        } else {
            $data['kecamatan'] = $this->kecamatan_model->getId($sess['kecid']);
        }

        $this->load_view('master/kecamatan', $data);
    }

    function search()
    {

        $aksi = '<div class="hidden-sm hidden-xs btn-group">';
        //        if (has_permission('update')) {
        $aksi .= '<a href="' . base_url("master/kecamatan/update/$1") . '" class="btn btn-outline-info">'
            . '<i class="ace-icon fa fa-pencil bigger-120"></i>'
            . '</a>';

        //        if (has_permission('delete')) {
        $aksi .= '<a href="javascript:;" class="btn btn-outline-danger" onclick="hapus($1)">'
            . '<i class="ace-icon fa fa-trash-o bigger-120"></i>'
            . '</a>';

        $aksi .= '</div>';

        $status = $this->input->post('status');
        echo $this->kecamatan_model->getDataTables($status, $aksi);
    }

    function add()
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['status_form'] = 1;
        } else {
            $data['status_form'] = 0;
        }
        $data['user'] = $this->kecamatan_model->getEmptyUser();
        $data['kab'] = $this->kecamatan_model->kab();
        $data['sub'] = 'add';
        $this->load_view('master/kecamatan_form', $data);
    }

    function update($id)
    {
        $sess = $this->session->userdata('siltap');
        if ($sess['groupid'] == 1 or $sess['groupid'] == 2) {
            $data['status_form'] = 1;
        } else {
            $data['status_form'] = 0;
        }
        $data['user'] = $this->kecamatan_model->getById($id);
        $data['kab'] = $this->kecamatan_model->kab();
        $data['sub'] = 'update';
        $this->load_view('master/kecamatan_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
