<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    var $rules = array(

        array(
            'field' => 'kategori_id',
            'label' => 'kategori_id',
            'rules' => 'trim'
        ),
        array(
            'field' => 'kategori_nama',
            'label' => 'kategori_nama',
            'rules' => 'required'
        ),
        array(
            'field' => 'bidang',
            'label' => 'bidang',
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
                'kategori_nama' => $_POST['kategori_nama'],
                'bidang' => $_POST['bidang'],
            );
            $result = $this->kategori_model->add($data);
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
        $this->form_validation->set_rules("KecId", "Id kategori", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                'kategori_nama' => $_POST['kategori_nama'],
                'bidang' => $_POST['bidang'],
            );
            $result = $this->kategori_model->update($_POST['KecId'], $data);
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
        $result = $this->kategori_model->delete($_POST['id']);
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