<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kecamatan_model extends Ci_Model
{

    function getDataTables($status = '', $aksi = '')
    {
        $this->load->library('Datatables');
        $this->datatables->select("*,KecId");
        $this->datatables->from("ref_kecamatan");
        $this->datatables->join('ref_kabupaten', 'ref_kecamatan.KabId = ref_kabupaten.KabId');
        $this->datatables->add_column('aksi', $aksi, 'KecId');
        return $this->datatables->generate();
    }
    function getById($id)
    {
        $this->db->where("KecId", $id);
        $query = $this->db->get('ref_kecamatan');
        return $query->row_array();
    }

    function getAll()
    {
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }
    function getId($kecid)
    {
        $this->db->where('KecId', $kecid);
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }


    function add($data)
    {
        $this->db->insert('ref_kecamatan', $data);
    }

    function update($id, $data)
    {
        $this->db->where('KecId', $id);
        $this->db->update('ref_kecamatan', $data);
    }

    function delete($id)
    {
        $this->db->where('KecId', $id);
        $this->db->delete('ref_kecamatan');
    }

    function getEmptyUser()
    {
        $user['KecId'] = NULL;
        $user['KabId'] = NULL;
        $user['KecNama'] = NULL;
        return $user;
    }

    function kab()
    {
        $query = $this->db->get('ref_kabupaten');
        return $query->result();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
