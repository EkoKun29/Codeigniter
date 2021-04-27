<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aduan_model extends Ci_Model
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
        $this->db->where("AduanId", $id);
        $query = $this->db->get('aduan');
        return $query->row_array();
    }

    function getAll($nip)
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        // $this->db->join('tindak_lanjut c', 'c.TindakLanjutAduanId = a.AduanId');
        $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllByBidang($kategori)
    {
        // $user = $this->db->query('SELECT * FROM ');

        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        $this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        // $this->db->join('tindak_lanjut d', 'd.TindakLanjutAduanId = a.AduanId');
        $this->db->where('a.AduanKategoriId', $kategori);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllByAdmin()
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        $this->db->join('_lokasi c', 'c.kdlokasi = a.AduanKdLokasi');
        $this->db->join('tindak_lanjut d', 'd.TindakLanjutAduanId = a.AduanId');
        // $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    function getId($aduanid)
    {
        $this->db->select('*');
        $this->db->from('aduan a');
        $this->db->join('ref_kategori b', 'b.KategoriId = a.AduanKategoriId');
        // $this->db->join('tindak_lanjut c', 'c.TindakLanjutAduanId = a.AduanId');
        $this->db->where('a.AduanId', $aduanid);
        // $this->db->where('a.AduanNipPengirim', $nip);
        $query = $this->db->get();

        return $query->row();
    }

    function getTindakLanjut($aduanid)
    {
        $this->db->where('TindakLanjutAduanId');
        $q = $this->db->get('tindak_lanjut');
        return $q;
    }


    function add($data)
    {
        $this->db->insert('aduan', $data);
    }

    function update($id, $data)
    {
        $this->db->where('AduanId', $id);
        $this->db->update('aduan', $data);
    }

    function delete($id)
    {
        $this->db->where('AduanId', $id);
        $this->db->delete('aduan');
    }
    function tindak_lanjut($id, $data)
    {
        $this->db->where('AduanId', $id);
        $this->db->update('aduan', $data);
    }
    function add_tindak_lanjut($data)
    {
        $this->db->insert('tindak_lanjut', $data);
    }

    function lastid_tindak_lanjut()
    {
        $this->db->order_by('TindakLanjutId', 'DESC');
        $q = $this->db->get('tindak_lanjut');
        return $q;
    }
    function getEmptyUser()
    {
        $user['AduanId'] = NULL;
        $user['AduanNama'] = NULL;
        $user['AduanBidang'] = NULL;
        return $user;
    }
    function getKategori()
    {
        $q = $this->db->get('ref_kategori');
        return $q->result();
    }
    function getKategoriId($kategoriid)
    {
        $this->db->where('KategoriId', $kategoriid);
        $q = $this->db->get('ref_kategori');
        return $q->row();
    }
    function lastid()
    {
        $this->db->order_by('AduanId', 'desc');
        $q = $this->db->get('aduan');
        return $q;
    }


    function cekAdmBidang($kdlokasi)
    {
        $this->db->where('KategoriSeksi', $kdlokasi);
        $q = $this->db->get('ref_kategori');
        return $q;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
