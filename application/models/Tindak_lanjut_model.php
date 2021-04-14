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
    function getAllByBidang($bid)
    {
        // $user = $this->db->query('SELECT * FROM ');
        $this->db->select('*');
        $this->db->from('tindak_lanjut a');
        $this->db->join('aduan b', 'b.AduanId = a.TindakLanjutAduanId');
        $this->db->join('_lokasi c', 'c.kdlokasi = b.AduanKdLokasi');
        $this->db->where('b.AduanBidang', $bid);
        $query = $this->db->get();
        return $query->result();
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

    // function getTindakLanjut($aduanid)
    // {
    //     $this->db->where('TindakLanjutId');
    //     $q = $this->db->get('tindak_lanjut');
    //     return $q;
    // }

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
    // function tindak_lanjut($id, $data)
    // {
    //     $this->db->where('TindakLanjutId', $id);
    //     $this->db->update('tindak_lanjut', $data);
    // }
    // function add_tindak_lanjut($data)
    // {
    //     $this->db->insert('tindak_lanjut', $data);
    // }

    // function lastid_tindak_lanjut()
    // {
    //     $this->db->order_by('TindakLanjutId', 'DESC');
    //     $q = $this->db->get('tindak_lanjut');
    //     return $q;
    // }
    function getEmptyUser()
    {
        $user['AduanId'] = NULL;
        $user['AduanNama'] = NULL;
        $user['AduanBidang'] = NULL;
        return $user;
    }
    // function getKategori()
    // {
    //     $q = $this->db->get('ref_kategori');
    //     return $q->result();
    // }
    // function getKategoriId($kategoriid)
    // {
    //     $this->db->where('KategoriId', $kategoriid);
    //     $q = $this->db->get('ref_kategori');
    //     return $q->row();
    // }
    // function lastid()
    // {
    //     $this->db->order_by('AduanId', 'desc');
    //     $q = $this->db->get('aduan');
    //     return $q;
    // }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
