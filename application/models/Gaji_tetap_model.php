<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gaji_tetap_model extends Ci_Model {

    function getDataTables($status = '', $aksi = '') {
        $this->load->library('Angka');
        $this->load->library('Datatables');
        $this->datatables->select("*,SiltapId");
        $this->datatables->from("ref_siltap");
        $this->datatables->join('ref_perangkat','ref_perangkat.Nik = ref_siltap.Nik');
        $this->datatables->add_column('aksi', $aksi, 'SiltapId');
        //$this->adtatables->add_column('rupiah',$rupiah,'ref_siltap.GajiTetap');
        return $this->datatables->generate();
    }
    
    function getById($id) {
        $this->db->select('*');
        $this->db->from('ref_siltap');
        $this->db->where("SiltapId", $id);
        $this->db->join('ref_perangkat','ref_perangkat.Nik = ref_siltap.Nik');
        //$this->db->join('ref_desa','ref_desa.DesaId = ref_perangkat.DesaId');
        //$this->db->join('ref_desa','ref_desa.KecId = ref_kecamatan.KecId');
        
        $query = $this->db->get();
        return $query->row_array();
        
    }

    function getAll() {
        $this->db->select('*');
        $this->db->from('ref_siltap a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
        $query = $this->db->get();
        return $query->result();
    }
    function getAllPerangkat() {
        $query = $this->db->get('ref_perangkat');
        return $query->result();
    }

    function getAllkec($kecid) {
        $this->db->select('*');
        $this->db->from('ref_desa a');
        $this->db->join('ref_perangkat b','b.DesaId = a.DesaId');
        $this->db->join('ref_siltap c','c.Nik = b.Nik');
        $this->db->where('a.KecId',$kecid);
        $query = $this->db->get();
        return $query->result();
    }
    function getAllDesa($desaid) {
        
        $this->db->select('*');
        $this->db->from('ref_siltap a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
       
        $this->db->where("b.DesaId", $desaid);
        $query = $this->db->get();
        return $query->result();
    }
    function ketSiltap($nik){
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_desa b','b.DesaId = a.DesaId');
        $this->db->join('ref_jabatan c','c.JabatanId = a.Jabatan');
        $this->db->where('Nik',$nik);
        return $this->db->get();
        
    }

    function add($data) {
        $this->db->insert('ref_siltap',$data);
    }

    function update($id,$data) {
        $this->db->where('SiltapId',$id);
        $this->db->update('ref_siltap',$data);
    }

    function delete($id) {
        $this->db->where('SiltapId',$id);
        $this->db->delete('ref_siltap');
    }

    function getEmptyUser() {
        $user['SiltapId'] = NULL;
        $user['Nik'] = NULL;
        $user['DesaId'] = NULL;
        $user['KecId'] = NULL;
        $user['GajiTetap'] = NULL;
        $user['Status'] = NULL;
        return $user;
    }

    function kec(){
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }

    function kecId($id){
        $this->db->where('KecId',$id);
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }

    function desaId($id){
        $this->db->where('KecId',$id);
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function desa(){
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function perangkat(){
        $query = $this->db->get('ref_perangkat');
        return $query->result();
    }

    function perangkatId($id){
        $this->db->where('Nik',$id);
        $query = $this->db->get('ref_perangkat');
        return $query->result();
    }

    function perangkatAll(){
        $q = $this->db->get('ref_perangkat');
        return $q->result();
    }
    function perangkatByDesa($desaid){
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->where('DesaId',$desaid);
        $q = $this->db->get();
        return $q->result();
    }
    function perangkatByDesaSiltap($desaid){
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_siltap b','b.Nik = a.Nik');
        $this->db->where('DesaId',$desaid);
        $q = $this->db->get();
        return $q->result();
    }
    function perangkatByKec($kecid){
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_desa c','c.DesaId = a.DesaId');
        $this->db->where('c.KecId',$kecid);
        $q = $this->db->get();
        return $q->result();
    }
    function perangkatByKecSiltap($kecid){
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_siltap b','b.Nik = a.Nik');
        $this->db->join('ref_desa c','c.DesaId = a.DesaId');
        $this->db->where('c.KecId',$kecid);
        $q = $this->db->get();
        return $q->result();
    }
    function cekSiltap($Nik){
        $this->db->where('Nik',$Nik);
        $q = $this->db->get('ref_siltap');
        return $q->num_rows();
    }
    function lastId(){
        $q = $this->db->query("SELECT DISTINCT SiltapId FROM ref_siltap ORDER BY SiltapId DESC");
        return $q->row();
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
