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

    function getAll()
    {
        $query = $this->db->get('aduan');
        return $query->result();
    }
    function getId($kecid)
    {
        $this->db->where('AduanId', $kecid);
        $query = $this->db->get('aduan');
        return $query->result();
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

    function getEmptyUser()
    {
        $user['AduanId'] = NULL;
        $user['AduanNama'] = NULL;
        $user['AduanBidang'] = NULL;
        return $user;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
