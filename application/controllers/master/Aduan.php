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
        $sess = $this->session->userdata('siltap');
        $data['aduan'] = $this->aduan_model->getAll();
        $this->load_view('master/aduan', $data);
    }


    function add()
    {
        $sess = $this->session->userdata('siltap');
        $data['user'] = $this->aduan_model->getEmptyUser();
        $data['sub'] = 'add';
        $this->load_view('master/aduan_form', $data);
    }

    function update($id)
    {
        $sess = $this->session->userdata('siltap');
        $data['user'] = $this->aduan_model->getById($id);
        $data['sub'] = 'update';
        $this->load_view('master/aduan_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */