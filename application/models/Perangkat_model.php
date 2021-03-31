<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perangkat_model extends Ci_Model
{

    function getDataTables($status = '', $aksi = '', $kec = '', $desa = '')
    {
        $this->load->library('Datatables');
        $this->datatables->select("*,Nik");
        $this->datatables->from("ref_perangkat");
        $this->datatables->join('ref_desa', 'ref_desa.DesaId = ref_perangkat.DesaId');
        $this->datatables->add_column('aksi', $aksi, 'Nik');
        return $this->datatables->generate();
    }


    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'a.Jabatan = b.JabatanId');
        $this->db->where("Nik", $id);
        $this->db->where('a.Status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'a.Jabatan = b.JabatanId');
        $this->db->where('a.Status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getAllId($id)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'a.Jabatan = b.JabatanId');
        $this->db->where("DesaId", $id);
        $this->db->where('a.Status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllperangkat($id)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'a.Jabatan = b.JabatanId');
        $this->db->where("DesaId", $id);
        // $this->db->where('a.Status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllIdKec($id)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'a.Jabatan = b.JabatanId');
        $this->db->join('ref_desa c', 'c.DesaId = a.DesaId');
        $this->db->where("a.KecId", $id);
        $this->db->where('a.Status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function add($data)
    {
        $this->db->insert('ref_perangkat', $data);
    }

    function update($id, $data)
    {
        $this->db->where('Nik', $id);
        $this->db->update('ref_perangkat', $data);
    }

    function delete($id)
    {
        $this->db->where('Nik', $id);
        // $this->db->delete('ref_perangkat');
        $edit_status = array('Status' => 0);
        $this->db->update('ref_perangkat', $edit_status);
    }

    function getEmptyUser()
    {
        $user['Nik'] = NULL;
        $user['DesaId'] = NULL;
        $user['StatusId'] = NULL;
        $user['NoRekening'] = NULL;
        $user['Nama'] = NULL;
        $user['KJabatanId'] = NULL;
        $user['Jabatan'] = NULL;
        $user['Alamat'] = NULL;
        $user['Pns'] = NULL;
        $user['BpjsKsh'] = NULL;
        $user['BpjsTenagaKerja'] = NULL;
        $user['BpjsAlasan'] = NULL;
        $user['BpjsTMT'] = NULL;
        $user['Pj'] = NULL;
        $user['Plt'] = NULL;

        $user['NoSk']  = NULL;
        $user['TglSk'] = NULL;
        $user['SkPelantik'] = NULL;
        $user['SkJenkel'] = NULL;
        $user['SkTempatLahir'] = NULL;
        $user['SkTglLahir'] = NULL;
        $user['SkPendidikan'] = NULL;
        $user['SkAgama'] = NULL;
        $user['SkAkhirJabatanUmur'] = NULL;
        $user['SkAkhirJabatanTgl'] = NULL;


        return $user;
    }
    function kec()
    {
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }
    function kec_id($id)
    {
        $this->db->where('KecId', $id);
        $query = $this->db->get('ref_desa');
        return $query->result();
    }
    function desa()
    {
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function desaById($desaid)
    {
        $this->db->where('DesaId', $desaid);
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function jabatan()
    {
        $query = $this->db->get('ref_jabatan');
        return $query->result();
    }

    function StatusId()
    {
        $q = $this->db->get("ref_status_perangkat");
        return $q->result();
    }

    function KJabatan()
    {
        $q = $this->db->get("ref_kelompok_jabatan");
        return $q->result();
    }
    function desaid($desa_id)
    {
        $this->db->where('DesaId', $desa_id);
        $q = $this->db->get('ref_desa');
        return $q->row();
    }

    function PerangkatByNik($nik)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_desa b', 'b.DesaId = a.DesaId');
        $this->db->join('ref_kelompok_jabatan c', 'c.KJabatanId = a.KJabatanId');
        $this->db->join('ref_status_perangkat d', 'd.StatusId = a.StatusId');
        $this->db->join('ref_jabatan e', 'e.JabatanId = a.Jabatan');
        $this->db->where('a.Nik', $nik);
        $q = $this->db->get();
        return $q->row();
    }

    function cekPerangkat($nik)
    {
        $this->db->where('Nik', $nik);
        $q = $this->db->get('ref_perangkat a');
        return $q->num_rows();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
