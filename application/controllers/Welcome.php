<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
		$this->load->view('landing');

		// $user = $this->db->query("SELECT * FROM yk_user")->result();

		// foreach ($user as $u) {
		// $usr  = $u->UserName;
		// $nip = preg_replace('/_.*/', '', $usr);
		// if ($u->UserId > 7718 and $u->UserId < 8000) {
		// 	$pass = sha1($usr);
		// 	echo $pass . "<br>";

		// 	$this->db->query("UPDATE yk_user SET UserPassword='$pass' WHERE UserId='$u->UserId' ");
		// }
		// }
	}
}
