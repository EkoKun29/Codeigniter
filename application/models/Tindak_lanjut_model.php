<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tindak_lanjut_model extends Ci_Model
{

    // function getDataTables($status = '', $aksi = '')
    // {
    //     $this->load->library('Datatables');
    //     $this->datatables->select("*,KecId");
    //     $this->datatables->from("ref_kecamatan");
    //     $this->datatables->join('ref_kabupaten', 'ref_kecamatan.KabId = ref_kabupaten.KabId');
    //     $this->datatables->add_column('aksi', $aksi, 'KecId');
    //     return $this->datatables->generate();
    // }
    function getById($id)
    {
        $this->db->where("TindakLanjutId", $id);
        $query = $this->db->get('tindak_lanjut');
        return $query->row_array();
    }

    function getAll($nip)
    {
        $this->db->select('*');
        $this->db->from('tindak_lanjut a');
        $this->db->join('aduan b', 'b.AduanId = a.TindakLanjutAduanId');
        $this->db->where('b.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllByBidang($kategori)
    {
        // $user = $this->db->query('SELECT * FROM ');
        
        $this->db->select('*');
        $this->db->from('tindak_lanjut a');
        // $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        // $this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        // $this->db->join('tindak_lanjut d', 'd.TindakLanjutKategoriId = a.AduanKategoriId','right');
        $this->db->where('a.TindakLanjutKategoriId', $kategori);
        
        $query = $this->db->get();
        return $query->result();
    }

    function aduan($kategori){
        $this->db->where('AduanKategoriId', $kategori);
        $q = $this->db->get("aduan");
        return $q->result();
    }
    function getAllByAdmin()
    {
        $this->db->select('*');
        $this->db->from('tindak_lanjut a');
        $this->db->join('aduan b', 'b.AduanId = a.TindakLanjutId');
        $this->db->join('_lokasi c', 'c.kdlokasi = b.AduanKdLokasi');
        // $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    function getId($aduanid)
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        $this->db->join('tindak_lanjut c', 'c.TindakLanjutAduanId = a.AduanId');
        $this->db->where('a.AduanId', $aduanid);
        // $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();

        return $query->row();
    }
    function TindakLanjutBy($aduanid)
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('tindak_lanjut c', 'c.TindakLanjutAduanId = a.AduanId');
        $this->db->where('a.AduanId', $aduanid);
        $query = $this->db->get();

        return $query->result();
    }

    function add($data)
    {
        $this->db->insert('tindak_lanjut', $data);
    }

    function update($id, $data)
    {
        $this->db->where('TindakLanjutId', $id);
        $this->db->update('tindak_lanjut', $data);
    }

    function delete($id)
    {
        $this->db->where('TindakLanjutId', $id);
        $this->db->delete('tindak_lanjut');
    }

    function getEmptyUser()
    {
        $user['AduanId'] = NULL;
        $user['AduanNama'] = NULL;
        $user['AduanBidang'] = NULL;
        return $user;
    }

    function cekAdmBidang($kdlokasi)
    {
        $this->db->where('KategoriSeksi', $kdlokasi);
        $q = $this->db->get('ref_kategori');
        return $q;
    }
    function kategori(){
        $q = $this->db->get('ref_kategori');
        return $q->result();
    }
    function kategoriId($kategoriid){
        $this->db->where('KategoriId',$kategoriid);
        $q = $this->db->get('ref_kategori');
        return $q->row();
    }
    function getPegawaiByLokasi($kdlokasi){
        $this->db->where('kdlokasi',$kdlokasi);
        $this->db->where('kdjabatan',20000);
        $q = $this->db->get('_pegawai');
        return $q->row();
    }
}
