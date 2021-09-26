<<<<<<< HEAD
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends Ci_Model
{ 
    function getById($id)
    {
        $this->id->where("LaporanId",$Id);
        $query = $this->db->get ('Laporan');
        return $query->row_array();
    }

function getAll()
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        $this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        //$this->db->join('tindak_lanjut d', 'd.TindakLanjutAduanId = a.AduanId');
        //$this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
   public function tampil_data()
    {
        return $this->db->get('aduan a');
    }
    function kategori()
    {
        //$this->db->where("KategoriId" ,$Kategori_Id);
        $query = $this->db->get ('ref_kategori');
        return $query->result();

    }
   
  
    function getAllByKategori($KategoriId)
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        // $this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        //$this->db->join('tindak_lanjut d', 'd.TindakLanjutAduanId = a.AduanId');
        //$this->db->where('a.AduanNipPengirim', $nip);
        $this->db->where("b.KategoriId ", $KategoriId);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllByLokasi($KategoriSeksi)
    {
        $this->db->select('*');
         $this->db->from('aduan a');
        
        $this->db->join('ref_kategori b', 'b.KategoriSeksi = a.AduanKdLokasi');
        //$this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        //$this->db->join('tindak_lanjut d', 'd.TindakLanjutAduanId = a.AduanId');
        //$this->db->where('a.AduanNipPengirim', $nip);
        $this->db->where("b.KategoriSeksi ", $KategoriSeksi);
        $query = $this->db->get();
        return $query->result();
    }
    function getTgl()
    {
        $this->db->select('*');
        $this->db->from('');
        $this->db->where("b.KategoriId ", $KategoriId);
        $query = $this->db->get();
    }
}
?>
=======
 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 class Laporan_model extends Ci_Model
 {
    function getById($id)
    {
         $this->db->where("LaporanId", $Id);
         $query = $this->db->get('Laporan');
         return $query->row_array();
    }
     
    function getAll()
    {
        $this->db->select('*');
        $this->db->from('tindak_lanjut a');
        // $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        // $this->db->join('tindak_lanjut c', 'c.TindakLanjutAduanId = a.AduanId');
        // $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    
    function tampil_data()
    {
        return $this->db->get('tindak_lanjut a');
    }
    function getTotal()
    {
        $sql = "SELECT count(TindakLanjutDari) as Nama FROM tindak_lanjut a";
        $query = $this->db->query($sql);
        return $query->row()->Nama;
    }
}
>>>>>>> e3966c814671b40a22d011a1afe0d0bfc7bbba00
