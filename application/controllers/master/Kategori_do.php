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
            'field' => 'KategoriId',
            'label' => 'KategoriId',
            'rules' => 'trim'
        ),
        array(
            'field' => 'KategoriNama',
            'label' => 'KategoriNama',
            'rules' => 'required'
        ),
        array(
            'field' => 'KategoriSeksi',
            'label' => 'KategoriSeksi',
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
                'KategoriNama' => $_POST['KategoriNama'],
                'KategoriSeksi' => $_POST['KategoriSeksi'],
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
        $this->form_validation->set_rules("KategoriId", "Id kategori", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                'KategoriNama' => $_POST['KategoriNama'],
                'KategoriSeksi' => $_POST['KategoriSeksi'],
            );
            $result = $this->kategori_model->update($_POST['KategoriId'], $data);
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