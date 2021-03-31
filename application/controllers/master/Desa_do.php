<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Desa_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('desa_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    var $rules = array(
        array(
            'field' => 'DesaId',
            'label' => 'DesaId',
            'rules' => 'trim'
        ),
        array(
            'field' => 'KecId',
            'label' => 'Kecamatan',
            'rules' => 'trim'
        ),
        array(
            'field' => 'DesaNama',
            'label' => 'Desa',
            'rules' => 'required|is_unique[yk_user.UserName]'
        ),
    );

    function add()
    {

        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_message('matches', 'Ulangi password dengan benar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {

            $data = array(
                'DesaId' => $_POST['DesaId'],
                'KecId' => $_POST['KecId'],
                'DesaNama' => $_POST['DesaNama'],
                'NoRek' => $_POST['NoRek'],
                'Npwp' => $_POST['Npwp'],
                'Bendahara' => $_POST['Bendahara'],
                'Alamat' => $_POST['Alamat'],
                'KodePos' => $_POST['KodePos'],
            );
            $result = $this->desa_model->add($data);
            if (!$result) {
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Data baru berhasil ditambahkan!'));
                echo json_encode(array('success' => true, 'msg' => 'Data Baru Berhasil Disimpan.'));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'Data Baru Gagal Disimpan!'));
            }
        }
    }

    function update()
    {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_rules("DesaId", "Id Desa", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                // 'DesaId' => $_POST['DesaId'],                                           
                // 'KecId' => $_POST['KecId'],                            
                // 'DesaNama' => $_POST['DesaNama'], 
                'NoRek' => $_POST['NoRek'],
                'Npwp' => $_POST['Npwp'],
                'Bendahara' => $_POST['Bendahara'],
                'Alamat' => $_POST['Alamat'],
                'KodePos' => $_POST['KodePos'],
            );
            $result = $this->desa_model->update($_POST['DesaId'], $data);
            if (!$result) {
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Data berhasil diupdate!'));
                echo json_encode(array('success' => true, 'msg' => 'Data Berhasil Diupdate.'));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'Data Gagal Diupdate!'));
            }
        }
    }

    public function delete()
    {

        $result = $this->desa_model->delete($_POST['id']);
        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'User berhasil dihapus!'));
            // redirect(base_url("master/desa"));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'User Gagal Dihapus!'));
            // redirect(base_url("master/desa"));
        }
    }
}

/* 
 * End of file User_do.php 
 * File location ./application/controllers/sistem/User_do.php
 */