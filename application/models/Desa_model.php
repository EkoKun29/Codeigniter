<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Desa_model extends Ci_Model
{

    function getDataTables($status = '', $aksi = '')
    {
        $this->load->library('Datatables');
        $this->datatables->select("*,DesaId");
        $this->datatables->from("ref_desa");
        $this->datatables->join('ref_kecamatan', 'ref_desa.KecId = ref_kecamatan.KecId');
        $this->datatables->add_column('aksi', $aksi, 'DesaId');
        return $this->datatables->generate();
    }
    function getById($id)
    {
        $this->db->where("DesaId", $id);
        $query = $this->db->get('ref_desa');
        return $query->row_array();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('ref_desa');
        $this->db->join('ref_kecamatan', 'ref_kecamatan.KecId = ref_desa.KecId');
        return $this->db->get()->result();
    }
    function getId($kecid)
    {
        $this->db->select('*');
        $this->db->from('ref_desa a');
        $this->db->join('ref_kecamatan b', 'b.KecId = a.KecId');
        $this->db->where('a.KecId', $kecid);
        return $this->db->get()->result();
    }
    function DesaByKec($id)
    {

        $this->db->select('*');
        $this->db->from('ref_desa');
        $this->db->join('ref_kecamatan', 'ref_kecamatan.KecId = ref_desa.KecId');
        $this->db->where("ref_kecamatan.KecId", $id);
        $query = $this->db->get();
        return $query->result();
    }
    function getKec()
    {
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }

    function add($data)
    {
        $this->db->insert('ref_desa', $data);
    }

    function update($id, $data)
    {
        $this->db->where('DesaId', $id);
        $this->db->update('ref_desa', $data);
    }

    function delete($id)
    {
        $this->db->where('DesaId', $id);
        $this->db->delete('ref_desa');
    }

    function getEmptyUser()
    {
        $user['DesaId'] = NULL;
        $user['KecId'] = NULL;
        $user['DesaNama'] = NULL;
        return $user;
    }

    function kec()
    {
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
