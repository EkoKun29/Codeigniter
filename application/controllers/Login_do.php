<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_do extends CI_Controller
{

    public function login()
    {
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validate');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => FALSE, 'redirect' => base_url('public/auth'), 'msg' => validation_errors()));
        } else {
            echo json_encode(array('success' => TRUE, 'redirect' => base_url('home/dashboard'), 'msg' => 'Anda berhasil login, tunggu sejenak!'));
        }
    }

    public function validate($username)
    {
        $this->load->model('authentication_model');
        $expired = $this->authentication_model->isExpired($username);

        // if($expired) {
        //     $this->form_validation->set_message("validate", "{field} <b>$username</b> sudah tidak berlaku lagi.");
        //     return FALSE;
        // }

        $data = $this->authentication_model->getUserByUserPassword($_POST['username'], sha1($_POST['password']));
        if (sizeof($data) > 0) {

            $group = $this->authentication_model->getGroup($data['UserId']);
            if ($data['UserName'] != "admin") {
                $pegawai = $this->authentication_model->pegawaiByNip($data['UserNip']);
                $_SESSION['desktik']['nip'] =  $pegawai->nip;
                $_SESSION['desktik']['kdlokasi'] =  $pegawai->kdlokasi;
                $_SESSION['desktik']['kdinstansi'] =  $pegawai->kdinstansi;
                $_SESSION['desktik']['nminstansi'] =  $pegawai->nminstansi;
                $_SESSION['desktik']['nmjabatan'] =  $pegawai->nmjabatan;
            
            $_SESSION['desktik']['kdjabatan'] =  $pegawai->kdjabatan;
            }
            $_SESSION['desktik']['groupid'] = $group->GroupId;
            $_SESSION['desktik']['group'] = $group->GroupName;
            $_SESSION['desktik']['userid'] = $data['UserId'];
            $_SESSION['desktik']['username'] = $data['UserName'];
            $_SESSION['desktik']['groupid'] = $data['UserGroupGroupId'];
            $_SESSION['desktik']['realname'] = $data['UserRealName'];

            return TRUE;
        } else {
            $this->form_validation->set_message("validate", "Nama Pengguna atau Kata Sandi salah.");
            return FALSE;
        }
    }

    function logout()
    {
        //        session_destroy();
        $this->session->sess_destroy();
        redirect(base_url('home/dashboard'));
    }
    function tanggal()
    {
        echo date("d-m-Y");
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */