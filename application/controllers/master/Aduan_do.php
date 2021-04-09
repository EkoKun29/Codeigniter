<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aduan_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('aduan_model');
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
            $lastid = $this->aduan_model->lastid();
            if ($lastid->num_rows() != 0) {
                $id = (int)$lastid->row()->AduanId + 1;
                $tiket = "PN" . str_pad($id, 5, "0", STR_PAD_LEFT);
            } else {
                $tiket = "PN00001";
                $id = 1;
            }
            $kategori = $this->aduan_model->getKategoriId($_POST['kategori']);

            $data = array(
                'AduanId' => $id,
                'AduanKategoriId' => $_POST['kategori'],
                'NoTiket' => $tiket,
                'AduanBidang' => $kategori->KategoriBidang,
                'AduanNipPengirim' => $_SESSION['siltap']['nip'],
                'AduanNamaPengirim' => $_SESSION['siltap']['username'],
                'AduanKdLokasi' => $_SESSION['siltap']['kdlokasi'],
                'AduanKdInstansi' => $_SESSION['siltap']['kdinstansi'],
                'AduanDeskripsi' => $_POST['deskripsi'],
                'AduanProses' => "permohonan",
                'AduanTglPermohonan' => date('Y-m-d H:m:s'),
                'AduanFiles1' => $_POST['files1'],
                'AduanFiles2' => $_POST['files2'],
                'AduanFiles3' => $_POST['files3'],
            );
            $result = $this->aduan_model->add($data);
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
        $this->form_validation->set_rules("KecId", "Id aduan", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                'AduanKategoriId' => $_POST['AduanKategoriId'],
                'AduanBidang' => $_POST['AduanBidang'],
            );
            $result = $this->aduan_model->update($_POST['KecId'], $data);
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
        $result = $this->aduan_model->delete($_POST['id']);
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