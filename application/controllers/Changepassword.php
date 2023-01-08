<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('system_model');
        $this->load->model('menu_model');
        $this->load->model('password_model');
    }
	public function index()
	{
		
        $menu['menu'] = $this->system_model->getMenu($_SESSION['desktik']['userid']);
        $data['username'] = $_SESSION['desktik']['username'];
        $data['userid'] = $_SESSION['desktik']['userid'];
		$this->load->view('layouts/header', $menu);
		$this->load->view('user/changepwd',$data);
		$this->load->view('layouts/footer');
		// print_r($_SESSION['siltap']);


		// $a = $this->db->query("show tables")->result();

		// print_r($a);
	}

	function update(){
		$userid = $this->input->post("userid");
		$pwd_lama = $this->input->post("pwd_lama");
		$pwd_baru = $this->input->post("pwd_baru");
		$pwd_baru_2 = $this->input->post("pwd_baru_2");

		$cek = $this->password_model->cek_pwd($userid,sha1($pwd_lama));
		if($userid == $_SESSION['desktik']['userid'] AND $pwd_baru == $pwd_baru_2){

			if($cek != 0){
				$data = array(
					"UserPassword" => sha1($pwd_baru),
				);
				$this->password_model->update($userid,$data);
				echo json_encode(array('success' => true, 'msg'=> 'Password Berhasil Diupdate'));
			}else{
				echo json_encode(array('success' => false, 'msg'=> 'User ID Tidak Ditemukan'));
			}

		}else{
			// redirect('changepassword');
			echo json_encode(array('success' => false, 'msg'=> 'Password Baru Tidak Valid'));
		}



		


	}

}
