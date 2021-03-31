<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekapitulasi_edit_model extends Ci_Model
{

    function getDataTables($status = '', $aksi = '')
    {
        $this->load->library('Datatables');
        $this->datatables->select("*,DesaId");
        $this->datatables->from("pembayaran");
        $this->datatables->join('ref_kabupaten', 'pembayaran.KabId = ref_kabupaten.KabId');
        $this->datatables->add_column('aksi', $aksi, 'DesaId');
        return $this->datatables->generate();
    }
    function getById($id)
    {
        $this->db->where("PembayaranId", $id);
        $query = $this->db->get('pembayaran');
        return $query->row_array();
    }

    function getKecamatan()
    {
        $q = $this->db->get('ref_kecamatan');
        return $q->result();
    }
    function getDesaId($kecid)
    {
        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_desa');
        return $q->result();
    }
    function getTahunByPembayaran()
    {
        $this->db->select('tahun');
        $this->db->distinct();
        $query = $this->db->get('pembayaran');
        return $query->result();
    }

    function getBulanByTahun($tahun)
    {
        $this->db->select('bulan');
        $this->db->distinct();
        $this->db->where('Tahun', $tahun);
        $this->db->order_by('bulan', 'Asc');
        $query = $this->db->get('pembayaran');
        return $query->result();
    }
    function getDesa($kecid)
    {

        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_desa');
        return $q->result();
    }


    function getId($DesaId)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
        $this->db->where('a.DesaId', $DesaId);
        $query = $this->db->get();
        return $query->result();
    }
    function getPerangkatBySortir($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
        $this->db->where('a.DesaId', $desaid);
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
    function getDesaById($id)
    {
        $this->db->where("PembayaranId", $id);
        $query = $this->db->get('pembayaran');
        return $query->row();
    }
    function getPerangkatByDesa($desaid)
    {
        $this->db->where("DesaId", $desaid);
        $query = $this->db->get('ref_perangkat');
        return $query->result();
    }
    function getPerangkatByNik($nik)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_desa b', 'b.DesaId = a.DesaId');
        $this->db->where("a.Nik", $nik);
        $query = $this->db->get('ref_perangkat');
        return $query->row();
    }
    function getPerangkatAll()
    {
        $query = $this->db->get('ref_perangkat');
        return $query->result();
    }
    function getDesaAll()
    {
        $this->db->select('*');
        $this->db->from('ref_desa a');
        $this->db->join('ref_kecamatan b', 'b.KecId = a.KecId');
        $query = $this->db->get();
        return $query->result();
    }

    function add($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    function update($id, $data)
    {
        $this->db->where('PembayaranId', $id);
        $this->db->update('pembayaran', $data);
    }

    function delete($id)
    {
        $this->db->where('PembayaranId', $id);
        $this->db->delete('pembayaran');
    }

    function getEmptyUser()
    {
        $user['DesaId'] = NULL;
        $user['KabId'] = NULL;
        $user['KecNama'] = NULL;
        return $user;
    }

    function kab()
    {
        $query = $this->db->get('ref_kabupaten');
        return $query->result();
    }
    function bulan()
    {
        $query = $this->db->get('ref_bulan');
        return $query->result();
    }
    function LastId()
    {
        $this->db->order_by('PembayaranId', 'DESC');
        $q = $this->db->get('pembayaran');
        return $q->row();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
