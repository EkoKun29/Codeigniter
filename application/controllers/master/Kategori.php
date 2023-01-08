<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }
    public function index()
    {
        $sess = $this->session->userdata('desktik');
        $data['kategori'] = $this->kategori_model->getAll();
        $this->load_view('master/kategori', $data);
    }


    function add()
    {
        $sess = $this->session->userdata('desktik');
        $data['user'] = $this->kategori_model->getEmptyUser();
        $data['sub'] = 'add';
        $this->load_view('master/kategori_form', $data);
    }

    function update($id)
    {
        $sess = $this->session->userdata('desktik');
        $data['user'] = $this->kategori_model->getById($id);
        $data['sub'] = 'update';
        $this->load_view('master/kategori_form', $data);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
