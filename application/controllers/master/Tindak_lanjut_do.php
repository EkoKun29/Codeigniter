<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tindak_lanjut_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('tindak_lanjut_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    var $rules = array(

        array(
            'field' => 'AduanId',
            'label' => 'AduanId',
            'rules' => 'trim'
        ),
        array(
            'field' => 'kategori',
            'label' => 'kategori',
            'rules' => 'required'
        ),
        array(
            'field' => 'deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required'
        ),
    );


    function update($mode)
    {
        if ($mode == "deskripsi") {
            $id = $_POST['id'];
            $data = array(
                'TindakLanjutDeskripsi' => $_POST['TindakLanjutDeskripsi'],
            );
            $result = $this->tindak_lanjut_model->update($id, $data);
            redirect(base_url('master/tindak_lanjut/detail/' . $id));
        } elseif ($mode == "selesai") {
            $data = array(
                'TindakLanjutProses' => 'selesai',
                'TindakLanjutTglSelesai' => date("Y-m-d H:d:s"),
            );
            $result = $this->tindak_lanjut_model->update($_POST['id'], $data);
            if (!$result) {
                echo json_encode(array('success' => true, 'msg' => 'User berhasil dihapus!'));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'User Gagal Dihapus!'));
            }
        }
    }

    public function delete()
    {
        $result = $this->aduan_model->delete($_POST['id']);
        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'User berhasil dihapus!'));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'User Gagal Dihapus!'));
        }
    }
}
