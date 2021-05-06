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
        $sess = $_SESSION['desktik'];
        
        if ($mode == "deskripsi") {
            $id = $_POST['id'];
            $tindak_lanjut = $this->tindak_lanjut_model->getById($id);
            $data = array(
                'TindakLanjutDeskripsi' => $_POST['TindakLanjutDeskripsi'],
            );
            $result = $this->tindak_lanjut_model->update($id, $data);
            redirect(base_url('master/tindak_lanjut/detail/' . $tindak_lanjut['TindakLanjutAduanId']));
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
        }elseif("forward"){
            $aduanid = $_POST['AduanId'];
            $kategoriid = $_POST['KategoriId'];
            $forward = $_POST['forward'];
            $kategori = $this->tindak_lanjut_model->kategoriId($kategoriid);
            $pegawai = $this->tindak_lanjut_model->getPegawaiByLokasi($kategori->KategoriSeksi);
            $data = array(
                'TindakLanjutAduanId' => $aduanid,
                'TindakLanjutKategoriId' => $kategoriid ,
                'TindakLanjutKdLokasi' => $kategori->KategoriSeksi,
                'TindakLanjutKdJabatan' => 20000,
                'TindakLanjutDari' => $pegawai->nmpegawai,
                'TindakLanjutForward' => $forward,
                'TindakLanjutProses' => "tindak_lanjut",
                'TindakLanjutTgl' => date("Y-m-d H:m:s"),
            );
            $result = $this->tindak_lanjut_model->add($data);
            redirect(base_url('master/tindak_lanjut/detail/' . $aduanid ));
        }
    }

    public function delete()
    {
        $result = $this->tindak_lanjut_model->delete($_POST['id']);
        if (!$result) {
            echo json_encode(array('success' => true, 'msg' => 'Tindak Lanjut berhasil dihapus!'));
        } else {
            echo json_encode(array('success' => false, 'msg' => 'Tindak Lanjut Gagal Dihapus!'));
        }
    }
}
