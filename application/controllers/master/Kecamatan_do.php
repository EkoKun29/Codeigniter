<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kecamatan_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kecamatan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    var $rules = array(

        array(
            'field' => 'KabId',
            'label' => 'KabId',
            'rules' => 'trim'
        ),
        array(
            'field' => 'KecNama',
            'label' => 'KecNama',
            'rules' => 'required'
        ),
    );

    function add()
    {
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {

            $data = array(
                'KecId' => $_POST['KecId'],
                'KabId' => $_POST['KabId'],
                'KecNama' => $_POST['KecNama'],
                'KecKepala' => $_POST['Camat'],
                'KasiPemdes' => $_POST['KasiPemdes'],
                'KecAlamat' => $_POST['KecAlamat'],
                'KecKodePos' => $_POST['KecKodePos'],
                'KecNoTelp' => $_POST['KecNoTelp'],
            );
            $result = $this->kecamatan_model->add($data);
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
        $this->form_validation->set_rules("KecId", "Id Kecamatan", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                'KecId' => $_POST['KecId'],
                'KabId' => $_POST['KabId'],
                'KecNama' => $_POST['KecNama'],
                'KecKepala' => $_POST['Camat'],
                'KasiPemdes' => $_POST['KasiPemdes'],
                'KecAlamat' => $_POST['KecAlamat'],
                'KecKodePos' => $_POST['KecKodePos'],
                'KecNoTelp' => $_POST['KecNoTelp'],
            );
            $result = $this->kecamatan_model->update($_POST['KecId'], $data);
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
        $result = $this->kecamatan_model->delete($_POST['id']);
        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'User berhasil dihapus!'));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'User Gagal Dihapus!'));
        }
    }
}

/* 
 * End of file User_do.php 
 * File location ./application/controllers/sistem/User_do.php
 */