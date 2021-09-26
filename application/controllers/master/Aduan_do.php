<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aduan_do extends YK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('aduan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('bot_telegram');
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
                $tiket = date('Y').".". str_pad($id, 6, "0", STR_PAD_LEFT);
            } else {
                $tiket = date('Y').".000001";
                $id = 1;
            }
            $kategori = $this->aduan_model->getKategoriId($_POST['kategori']);

            $upload1 = $this->aduan_model->upload_aduan1();
            $upload2 = $this->aduan_model->upload_aduan2();
            $upload3 = $this->aduan_model->upload_aduan3();
            $file1 = !empty($_FILES['file1']['name']) ? $_FILES['file1']['name'] : "";
            $file2 = !empty($_FILES['file2']['name']) ? $_FILES['file2']['name'] : "";
            $file3 = !empty($_FILES['file3']['name']) ? $_FILES['file3']['name'] : "";
            $data = array(
                'AduanId' => $id,
                'AduanKategoriId' => $_POST['kategori'],
                'NoTiket' => $tiket,
                'AduanSeksi' => $kategori->KategoriSeksi,
                'AduanKdjabatan' => 20000,
                'AduanNipPengirim' => $_SESSION['desktik']['nip'],
                'AduanNamaPengirim' => $_SESSION['desktik']['realname'],
                'AduanKdLokasi' => $_SESSION['desktik']['kdlokasi'],
                'AduanKdInstansi' => $_SESSION['desktik']['kdinstansi'],
                'AduanDeskripsi' => $_POST['deskripsi'],
                'AduanProses' => "permohonan",
                'AduanTglPermohonan' => date('Y-m-d H:m:s'),
                'AduanFiles1' => $file1,
                'AduanFiles2' => $file2,
                'AduanFiles3' => $file3,
            );

            if($kategori->KategoriChatID != NULL){
               /// sendMessage($kategori->KategoriChatID,"Aduan Baru Dari : ". $_SESSION['desktik']['realname']." ".$_SESSION['desktik']['nminstansi']." => ".$_POST['deskripsi']);
            }

            if ($upload1['result'] == "success") { 
                $image1 = "berhasil";
            } else { 
                $image1 = "error";
            }
            if ($upload2['result'] == "success") { 
                $image2 = "berhasil";
            } else { 
                $image2 = "error";
            }
            if ($upload3['result'] == "success") { 
                $image3 = "berhasil";
            } else { 
                $image3 = "error";
            }

            $result = $this->aduan_model->add($data);

            if (!$result) {
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Data baru berhasil ditambahkan!'));
                echo json_encode(array('success' => true, 'msg' => 'Data Baru Berhasil Disimpan.','image1' => $image1,'image2' => $image2,'image3' => $image3));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'Data Baru Gagal Disimpan!','image1' => $image1,'image2' => $image2,'image3' => $image3));
            }
        }
    }

    function update($mode)
    {
        $sess = $_SESSION['desktik'];
        if ($mode == "update") {
            $status = !empty($_POST['status']) ? $_POST['status'] : "";
            if ($status == "EditTolak") {
                $data = array(
                    'AduanTolakDeskripsi' => $_POST['AduanTolakDeskripsi'],
                );
                $this->aduan_model->update($_POST['AduanId'], $data);
                redirect(base_url('master/aduan/detail/' . $_POST['AduanId']));
            } else {
                $this->load->library('form_validation');
                $config = $this->rules;
                $this->form_validation->set_rules($config);
                $this->form_validation->set_rules("AduanId", "Id aduan", "required");
                $this->form_validation->set_message('required', 'Field %s harus diisi.');
                $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
                $this->form_validation->set_error_delimiters('', '<br/>');

                if ($this->form_validation->run() == FALSE) {
                    echo json_encode(array('success' => false, 'msg' => validation_errors()));
                } else {

                    $kategori = $this->aduan_model->getKategoriId($_POST['kategori']);
                    $this->load->helper('tanggal');
                    $data = array(
                        'AduanKategoriId' => $_POST['kategori'],
                        'AduanSeksi' => $kategori->KategoriSeksi,
                        'AduanDeskripsi' => $_POST['deskripsi'],
                    );
                    $result = $this->aduan_model->update($_POST['AduanId'], $data);
                    if (!$result) {
                        $this->session->set_flashdata(array('added' => true, 'msg' => 'Data berhasil diupdate!'));
                        echo json_encode(array('success' => true, 'msg' => 'Data Berhasil Diupdate.'));
                    } else {
                        echo json_encode(array('success' => false, 'msg' => 'Data Gagal Diupdate!'));
                    }
                }
            }
        } else if ($mode == "tindak_lanjut") {
            $data = array(
                'AduanProses' => "diterima",
                'AduanTglVerifikasi' => date("Y-m-d H:d:s"),
            );
            $lastid_tindak_lanjut = $this->aduan_model->lastid_tindak_lanjut();
            if ($lastid_tindak_lanjut->num_rows() == 0) {
                $lastid = 1;
            } else {
                $lastid = $lastid_tindak_lanjut->row()->TindakLanjutId + 1;
            }
            $aduan = $this->aduan_model->getId($_POST['id']);
            $data_tindak_lanjut = array(
                'TindakLanjutId' => $lastid,
                'TindakLanjutAduanId' => $_POST['id'],
                'TindakLanjutKategoriId' => $aduan->KategoriId,
                'TindakLanjutKdLokasi' => $sess['kdlokasi'],
                'TindakLanjutKdJabatan' => 20000,
                'TindakLanjutDari' => $_SESSION['desktik']['realname'],
                'TindakLanjutProses' => "tindak_lanjut",
                'TindakLanjutTgl' => date("Y-m-d H:d:s"),
            );
            if($aduan->KategoriChatID != NULL){
                // sendMessage($aduan->KategoriChatID,"Aduan ID ".$aduan->NoTiket." Berhasil Ditindak Lanjuti");
            }
            $result = $this->aduan_model->tindak_lanjut($_POST['id'], $data);


            if (!$result) {
                echo json_encode(array('success' => true, 'msg' => 'User berhasil ditindak lanjut!'));
                $this->aduan_model->add_tindak_lanjut($data_tindak_lanjut);
            } else {
                echo json_encode(array('success' => false, 'msg' => 'User Gagal ditindak lanjut!'));
            }
        } else if ($mode == "tolak_aduan") {
            $data = array(
                'AduanProses' => "ditolak",
                'AduanTglVerifikasi' => date("Y-m-d H:d:s"),
            );
            $result = $this->aduan_model->tindak_lanjut($_POST['id'], $data);
            

            if (!$result) {
                echo json_encode(array('success' => true, 'msg' => 'User berhasil ditolak!'));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'User Gagal ditolak!'));
            }
        } else {
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

                $kategori = $this->aduan_model->getKategoriId($_POST['kategori']);
                $this->load->helper('tanggal');
                $data = array(
                    'AduanKategoriId' => $_POST['kategori'],
                    'AduanSeksi' => $kategori->KategoriSeksi,
                    'AduanDeskripsi' => $_POST['deskripsi'],
                );
                $result = $this->aduan_model->update($_POST['AduanId'], $data);
                if (!$result) {
                    $this->session->set_flashdata(array('added' => true, 'msg' => 'Data berhasil diupdate!'));
                    echo json_encode(array('success' => true, 'msg' => 'Data Berhasil Diupdate.'));
                } else {
                    echo json_encode(array('success' => false, 'msg' => 'Data Gagal Diupdate!'));
                }
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
    public function tindak_lanjut()
    {
        $data = array(
            'AduanProses' => "diterima",
            'AduanTglVerifikasi' => date("Y-m-d H:d:s"),
        );
        $result = $this->aduan_model->tindak_lanjut($_POST['id'], $data);
        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'User berhasil ditindak lanjut!'));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'User Gagal ditindak lanjut!'));
        }
    }
}
