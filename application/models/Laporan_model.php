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