<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $yk_user = $this->db->query("SELECT * FROM yk_user")->result();
		// foreach($yk_user as $data){
		// 	echo $data->UserPassword."<br>";
		// 	$pass = sha1($data->UserPassword);
		// 	$id = $data->UserId;
		// 	// $this->db->query("UPDATE yk_user SET UserPassword='$pass' WHERE UserId='$id'");
		// }

		// $perangkat = $this->db->query("SELECT * FROM ref_perangkat")->result();
		// foreach($perangkat as $data){
		// 	echo $data->Nik." ".$data->DesaId." ";
		// 	$desa = $this->db->query("SELECT * FROM ref_desa_2 WHERE DesaNama='$data->DesaId'");
		// 	if($desa->num_rows() != 0){
		// 		$desaid = $desa->row()->DesaId;
		// 		echo "-----".$desaid." ".$desa->row()->DesaNama."<br>";
				
		// 	// $this->db->query("UPDATE ref_perangkat SET DesaId='$desaid' WHERE Nik='$data->Nik'");
		// 	}else{
		// 		echo "-----KOSONG<br>";
		// 	}
			
		// }
		$this->load->helper('word');

		$kec = $this->db->get("ref_kecamatan")->result();	
		foreach($kec as $k){

			$kecamatan = remove_word($k->KecNama);

			$desa_by_p = $this->db->query("SELECT DISTINCT DesaId FROM ref_perangkat WHERE KecId='$kecamatan'")->result();
			echo $kecamatan." #### ".$k->KecId."<br>";
			foreach($desa_by_p as $d){
				$nmdesa = strtoupper($d->DesaId); 
				$nmdesa_alias = "PEMERINTAH DESA ".$nmdesa;
				$desa = $this->db->query("SELECT * FROM ref_desa WHERE DesaNama='$nmdesa_alias' AND KecId='$k->KecId'");

				// $nmkec = "KECAMATAN ".$d->KecNama;
				// $kec = $this->db->query("SELECT * FROM ref_kecamatan WHERE KecNama='$nmkec'")->row();
				$desaid = $desa->row()->DesaId;
				echo "----------".$kecamatan." : ".$nmdesa." === ";
					echo $k->KecId." : ".$desaid."<br>";
				
				
				// $this->db->query("UPDATE ref_perangkat SET KecId='$k->KecId', DesaId='$desaid' WHERE KecId='$kecamatan' AND DesaId='$nmdesa'");

			}
			
		}
		// $this->db->query("UPDATE ref_perangkat SET KJabatanId='2' WHERE KJabatanId='Kepala Desa Pns'");

	}
}
