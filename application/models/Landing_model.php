<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Landing_model extends Ci_Model
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
    
}

