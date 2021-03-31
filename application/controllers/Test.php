<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
	$this->load->library('Angka');
	// $url="http://mantra.patikab.go.id/json/diskominfopati/siskeudes/total_bpjs_desa";

	// $pardata=array(
	// "q_Kd_Desa"=>urlencode("01.2006."),
	// "q_Kd_Rincian"=>urlencode("5.1.2.01.")
	// );
	// $par="/".http_build_query($pardata);

	// $options=array('http'=>array(
	// 	'method'=>"GET",
	// 	'header'=>implode("\r\n",array("Content-Type:text/plain;charset=UTF-8"))
	// ));
	// $context=stream_context_create($options);
	// $content=file_get_contents($url.$par,false,$context);
	// echo $content;
	// $en_json = json_decode($content);

	// foreach($en_json as $data){
	// 	foreach($data->data->total_bpjs_desa as $total){
	// 		// foreach($total->total_bpjs_desa $siltap){
	// 		// 	echo $siltap;
	// 		// }
	// 		// $hasil = 0;
	// 		// echo  $total->Anggaran."<br>";
	// 		$hasil += $total->Anggaran;
	// 	}

	// }
	// $perbulan = $hasil/12;
	// echo $this->angka->rupiah($perbulan);



	// $perangkat = $this->db->query("SELECT * FROM ref_perangkat")->result();
	// echo "<table>";
	// foreach($perangkat as $p){
	// 	$nmjbt = $p->Jabatan;
	// 	$jabatan = $this->db->query("SELECT * FROM ref_jabatan");
	// 	echo "<tr><td>".$p->Nama."</td> <td>".$p->Jabatan."</td><td></td></tr>";
	// 	foreach($jabatan->result() as $jbt){
	// 		echo "<tr style='background-color:red;'><td>".$jbt->JabatanId."</td><td></td><td></td></tr>";
	// 	}

	// }
	// echo "</table>";


// 	$jabatan = $this->db->query("SELECT * FROM ref_jabatan")->result();
// 	foreach($jabatan as $data){
// 		echo $data->AliasJabatan."<br>----------------------------<br>";
// }




//     $jbt = $this->db->get('ref_jabatan')->result();
//     $start = 1;
//     foreach($jbt as $j){
//         $s =  $start++;

//         if($j->AliasJabatan != NULL OR $j->AliasJabatan != ''){

//             $array = explode(",",$j->AliasJabatan,50);
//             foreach($array as $jb){
//                 echo "<span style='color:red'>".$j->JabatanId."</span>";
//                 $alias = preg_replace("/[^a-zA-Z0-9]/", " ", $jb);
//                 $len = strlen($alias);
//                 $l = $len-1;
//                 $ali = substr($alias,1,$l);
//                 echo $ali." <br>";

//                	$perangkat = $this->db->query("SELECT * FROM ref_perangkat WHERE Jabatan='$ali'");

//                	if($perangkat->num_rows() != 0){
//                		$prt = $perangkat->row();
//                		echo " COCOK ".$prt->Nik."<br>";
//                	}

//                 $data = array(  
//                     'Jabatan' => $j->JabatanId,
//                 );
//                 $this->db->where("Nik",$prt->Nik);
// 				$this->db->update("ref_perangkat",$data);
//                 // $this->permohonan_model->edit_jbt($ali,$data);
//             }

// echo "<br>--------------------<br>";
//         }


//     }

// function edit_jbt($jbtid,$data){
// $this->db->where('Jabatan',$jbtid);
// $this->db->update('ref_perangkat');


	

	// $perangkat = $this->db->query("SELECT * FROM ref_perangkat")->result();

	// foreach($perangkat as $data){
	// 	echo $data->Jabatan." ".$data->Nik." ";
	// 	$jbt = $data->Jabatan;
	// 	$jabatan = $this->db->query("SELECT * FROM ref_jabatan WHERE NamaJabatan='$jbt'");

	// 	if($jabatan->num_rows() != 0){
	// 		$ref_jabatan = $jabatan->row();
	// 		echo "<span style='color:red;'>COCOK ".$ref_jabatan->JabatanId."</span>";
	// 		$perangkat = array(
	// 			"Jabatan" => $ref_jabatan->JabatanId,
	// 		);	
	// 		$this->db->where("Nik",$data->Nik);
	// 		$this->db->update("ref_perangkat",$perangkat);	
	// 	}
	// 	echo "<br>";
	// }

	}
}
