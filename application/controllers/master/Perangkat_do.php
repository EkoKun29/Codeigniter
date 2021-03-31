<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class perangkat_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('perangkat_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    var $rules = array(

        array(
            'field' => 'Nik',
            'label' => 'Nik',
            'rules' => 'trim'
        ),
        array(
            'field' => 'DesaId',
            'label' => 'DesaId',
            'rules' => 'required'
        ),
        array(
            'field' => 'NoRekening',
            'label' => 'NoRekening',
            'rules' => 'required'
        ),
        array(
            'field' => 'Nama',
            'label' => 'Nama',
            'rules' => 'required'
        ),
        array(
            'field' => 'Jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'
        ),
        array(
            'field' => 'KJabatan',
            'label' => 'KJabatan',
            'rules' => 'required'
        ),
        array(
            'field' => 'Pns',
            'label' => 'Pns',
            'rules' => 'required'
        ),
        array(
            'field' => 'PensiunPns',
            'label' => 'PensiunPns',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Ksh',
            'label' => 'Bpjs_Ksh',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Tenaga_Kerja',
            'label' => 'Bpjs_Tenaga_Kerja',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Jht',
            'label' => 'Bpjs_Jht',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Jp',
            'label' => 'Bpjs_Jp',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Alasan',
            'label' => 'Bpjs_Alasan',
            'rules' => 'required'
        ),
        array(
            'field' => 'Bpjs_Tmt',
            'label' => 'Bpjs_Tmt',
            'rules' => 'required'
        ),
        array(
            'field' => 'Pj',
            'label' => 'Pj',
            'rules' => 'required'
        ),
        array(
            'field' => 'Plt',
            'label' => 'Plt',
            'rules' => 'required'
        ),
        array(
            'field' => 'Alamat',
            'label' => 'Alamat',
            'rules' => 'required'
        ),
        array(
            'field' => 'StatusId',
            'label' => 'StatusId',
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

            $cek_nik = $this->perangkat_model->cekPerangkat($_POST['Nik']);
            if ($cek_nik == 0) {
                $data = array(
                    'Nik'                   => $_POST['Nik'],
                    'DesaId'                => $_POST['DesaId'],
                    'StatusId'              => $_POST['StatusId'],
                    'NoRekening'            => $_POST['NoRekening'],
                    'Nama'                  => $_POST['Nama'],
                    'KJabatanId'            => $_POST['KJabatan'],
                    'Jabatan'               => $_POST['Jabatan'],
                    'Alamat'                => $_POST['Alamat'],
                    'Pns'                   => $_POST['Pns'],
                    'PensiunPns'            => $_POST['PensiunPns'],
                    'BpjsKsh'               => $_POST['Bpjs_Ksh'],
                    'BpjsTenagaKerja'       => $_POST['Bpjs_Tenaga_Kerja'],
                    'BpjsJht'               => $_POST['Bpjs_Jht'],
                    'BpjsJp'                => $_POST['Bpjs_Jp'],
                    'BpjsAlasan'            => $_POST['Bpjs_Alasan'],
                    'BpjsTmt'               => $_POST['Bpjs_Tmt'],
                    'Pj'                    => $_POST['Pj'],
                    'Plt'                   => $_POST['Plt'],
                    'NoSk'                  => $_POST['NoSk'],
                    'TglSk'                 => $_POST['TglSk'],
                    'SkPelantik'            => $_POST['SkPelantik'],
                    'SkJenkel'              => $_POST['SkJenkel'],
                    'SkTempatLahir'         => $_POST['SkTempatLahir'],
                    'SkTglLahir'            => $_POST['SkTglLahir'],
                    'SkPendidikan'          => $_POST['SkPendidikan'],
                    'SkAgama'               => $_POST['SkAgama'],
                    'SkBengkok'             => $_POST['SkBengkok'],
                    'SkNoHp'                => $_POST['SkNoHp'],
                    'SkAkhirJabatanUmur'    => $_POST['SkAkhirJabatanUmur'],
                    'SkAkhirJabatanTgl'     => $_POST['SkAkhirJabatanTgl'],
                );
                $result = $this->perangkat_model->add($data);
                if (!$result) {
                    $this->session->set_flashdata(array('added' => true, 'msg' => 'Data baru berhasil ditambahkan!'));
                    echo json_encode(array('success' => true, 'msg' => 'Data Baru Berhasil Disimpan.'));
                } else {
                    echo json_encode(array('success' => false, 'msg' => 'Data Baru Gagal Disimpan!'));
                }
            } else {
                echo json_encode(array('success' => false, 'msg' => 'Data Sudah Ada di Database Silahkan menghubungi Dispermades Untuk Mengembalikan Data'));
            }
        }
    }

    function update()
    {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_rules("Nik", "Nik", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('tanggal');

            $data = array(
                'Nik'                   => $_POST['Nik'],
                'DesaId'                => $_POST['DesaId'],
                'StatusId'              => $_POST['StatusId'],
                'NoRekening'            => $_POST['NoRekening'],
                'Nama'                  => $_POST['Nama'],
                'KJabatanId'            => $_POST['KJabatan'],
                'Jabatan'               => $_POST['Jabatan'],
                'Alamat'                => $_POST['Alamat'],
                'Pns'                   => $_POST['Pns'],
                'PensiunPns'            => $_POST['PensiunPns'],
                'BpjsKsh'               => $_POST['Bpjs_Ksh'],
                'BpjsTenagaKerja'       => $_POST['Bpjs_Tenaga_Kerja'],
                'BpjsJht'               => $_POST['Bpjs_Jht'],
                'BpjsJp'                => $_POST['Bpjs_Jp'],
                'BpjsAlasan'            => $_POST['Bpjs_Alasan'],
                'BpjsTmt'               => $_POST['Bpjs_Tmt'],
                'Pj'                    => $_POST['Pj'],
                'Plt'                   => $_POST['Plt'],
                'NoSk'                  => $_POST['NoSk'],
                'TglSk'                 => $_POST['TglSk'],
                'SkPelantik'            => $_POST['SkPelantik'],
                'SkJenkel'              => $_POST['SkJenkel'],
                'SkTempatLahir'         => $_POST['SkTempatLahir'],
                'SkTglLahir'            => $_POST['SkTglLahir'],
                'SkPendidikan'          => $_POST['SkPendidikan'],
                'SkAgama'               => $_POST['SkAgama'],
                'SkBengkok'             => $_POST['SkBengkok'],
                'SkNoHp'                => $_POST['SkNoHp'],
                'SkAkhirJabatanUmur'    => $_POST['SkAkhirJabatanUmur'],
                'SkAkhirJabatanTgl'     => $_POST['SkAkhirJabatanTgl'],

            );
            $result = $this->perangkat_model->update($_POST['Nik'], $data);
            if (!$result) {
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Data berhasil diupdate!'));
                echo json_encode(array('success' => true,   'msg' => 'Data Berhasil Diupdate.'));
            } else {
                echo json_encode(array('success' => false,  'msg' => 'Data Gagal Diupdate!'));
            }
        }
    }
    //fungsi edit status perangkat desa
    function search()
    {

        $data = array(
            // 'Nik'       => $_POST['Nik'],
            'Status'  => 1,

        );
        $result = $this->perangkat_model->update($_POST['id'], $data);
        if (!$result) {
            // $this->session->set_flashdata(array('added' => true, 'msg' => 'Data berhasil diupdate!'));
            echo json_encode(array('success' => true,   'msg' => 'Data Berhasil Diupdate.'));
        } else {
            echo json_encode(array('success' => false,  'msg' => 'Data Gagal Diupdate!'));
        }
    }


    public function delete()
    {
        $result = $this->perangkat_model->delete($_POST['id']);

        if (!$result) {
            echo json_encode(array('success' => true,   'msg' => 'User berhasil dihapus!'));
        } else {
            echo json_encode(array('success' => false,  'msg' => 'User Gagal Dihapus!'));
        }
    }
}

/* 
 * End of file User_do.php 
 * File location ./application/controllers/sistem/User_do.php
 */