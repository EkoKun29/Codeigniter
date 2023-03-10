<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends Ci_Model
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
        $this->db->where("KategoriId", $id);
        $query = $this->db->get('ref_kategori');
        return $query->row_array();
    }

    function getAll()
    {
        $query = $this->db->get('ref_kategori');
        return $query->result();
    }
    function getId($kecid)
    {
        $this->db->where('KategoriId', $kecid);
        $query = $this->db->get('ref_kategori');
        return $query->result();
    }


    function add($data)
    {
        $this->db->insert('ref_kategori', $data);
    }

    function update($id, $data)
    {
        $this->db->where('KategoriId', $id);
        $this->db->update('ref_kategori', $data);
    }

    function delete($id)
    {
        $this->db->where('KategoriId', $id);
        $this->db->delete('ref_kategori');
    }

    function getEmptyUser()
    {
        $user['KategoriId'] = NULL;
        $user['KategoriNama'] = NULL;
        $user['KategoriBidang'] = NULL;
        return $user;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
