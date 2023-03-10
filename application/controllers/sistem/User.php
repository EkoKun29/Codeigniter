<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends YK_Controller
{

    public function index()
    {
        $this->load->model('user_model');
        $sess = $this->session->userdata('user');
        $data['user'] = $this->user_model->getAll();
        $this->load_view('sistem/user', $data);
        //$this->output->enable_profiler(TRUE);

    }

    function search()
    {
        $this->load->model('user_model');

        $aksi = '<div class="hidden-sm hidden-xs btn-group">';
        //        if (has_permission('update')) {
        $aksi .= '<a href="' . base_url("sistem/user/update/$1") . '" class="btn btn-outline-info">'
            . '<i class="ace-icon fa fa-pencil bigger-120"></i>'
            . '</a>';

        //        if (has_permission('delete')) {
        $aksi .= '<a href="javascript:;" class="btn btn-outline-warning" onclick="reset($1)">'
            . '<i class="ace-icon fa fa-refresh bigger-120"></i>'
            . '</a>';

        $aksi .= '<a href="javascript:;" class="btn btn-outline-danger" onclick="hapus($1)">'
            . '<i class="ace-icon fa fa-trash-o bigger-120"></i>'
            . '</a>';

        $aksi .= '</div>';

        $status = $this->input->post('status');
        echo $this->user_model->getDataTables($status, $aksi);
    }

    function add()
    {
        $this->load->model('user_model');
        $this->load->model('group_model');
        $this->load->model('unit_kerja_model');

        $data['user'] = $this->user_model->getEmptyUser();
        $data['groups'] = $this->group_model->getAll2();
        $data['usergroup'] = array();
        // $data['unitkerja'] = $this->unit_kerja_model->getAll();
        $data['sub'] = 'add';
        $this->load_view('sistem/user_form', $data);
    }

    function update($id)
    {
        $this->load->model('user_model');
        $this->load->model('group_model');
        // $this->load->model('unit_kerja_model');

        $data['user'] = $this->user_model->getById($id);
        $data['groups'] = $this->group_model->getAll();
        $data['usergroup'] = $this->user_model->getUserGroupsById($id);
        // $data['unitkerja'] = $this->unit_kerja_model->getAll();
        $data['sub'] = 'update';
        $this->load_view('sistem/user_form', $data);
    }

    // FUNGSI RESET BUKAN DELETE
    public function delete()
    {
        $this->load->model('user_model');
        $user = $this->user_model->getID($_POST['id']);
        $data = array('UserPassword' => sha1($user->UserName));
        $result = $this->user_model->reset($_POST['id'], $data);

        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'User berhasil direset! '));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'User gagal direset!' . $user->UserPassword));
        }
    }
}

/* End of file User.php */
/* Location: ./application/controllers/sistem/User.php */
