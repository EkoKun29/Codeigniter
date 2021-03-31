<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permohonan_model extends Ci_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->where('PembayaranId', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getAll($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->join('ref_perangkat f', 'f.Nik = a.Nik');
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get();
        return $query->result();
    }
    function StatusApproveKec($desaid, $bulan, $tahun)
    {
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        // $this->db->or_where('StatusProgress','approved_bpkad');
        //$this->db->or_where('StatusProgress','approved_bpkad');
        $q = $this->db->get('pembayaran');
        return $q->num_rows();
    }
    function StatusApproveBpkad($desaid, $bulan, $tahun)
    {
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress', 'approved_bpkad');
        $q = $this->db->get('pembayaran');
        return $q->num_rows();
    }
    function getDesa($desaid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->join('ref_perangkat f', 'f.Nik = a.Nik');
        $this->db->join('ref_desa g', 'g.DesaId = a.DesaId');
        $this->db->join('ref_jabatan h', 'h.JabatanId = f.Jabatan');
        $this->db->where('f.Status', 1);
        $this->db->where('g.DesaId', $desaid);
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.StatusProgress !=', 'approved_bpkad');
        $query = $this->db->get();
        return $query->result();
    }

    function getPerangkatByDesa($desaid)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        // $this->db->join('ref_kelompok_jabatan d','d.KJabatanId = a.KJabatanId');
        $this->db->join('ref_jabatan c', 'c.JabatanId = a.Jabatan');
        $this->db->where('a.DesaId', $desaid);
        $this->db->where('a.Status', 1);
        // $this->db->where('SUBSTR(a.DesaId,1,2)','22');
        // $this->db->where('a.SkAkhirJabatanTgl',NULL);
        // $this->db->or_where('a.SkAkhirJabatanTgl >',$tgl);
        $query = $this->db->get();
        return $query->result();
    }

    function getPerangkatByDesaDetail($desaid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId= a.KJabatanId');
        // $this->db->join('ref_jabatan c', 'c.JabatanId = a.Jabatan');
        // $this->db->join('pembayaran d', 'd.Nik = a.Nik');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.DesaId', $desaid);
        $query = $this->db->get();
        return $query->result();
    }

    function getDesaId($desaid)
    {
        if (date('m') != 12) {
            $bulan = date('m') + 1;
            $tahun = date('Y');
        } else {
            $bulan = 1;
            $tahun = date('Y') + 1;
        }
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->join('ref_perangkat f', 'f.Nik = b.Nik');
        $this->db->join('ref_desa g', 'g.DesaId = f.DesaId');
        $this->db->where('g.DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get();
        return $query->row();
    }

    function getKecamatan($kecid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->join('ref_perangkat f', 'f.KJabatanId = b.KJabatanId');
        $this->db->join('ref_desa g', 'g.DesaId = f.DesaId');
        $this->db->where('g.KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
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

    function getEmpty()
    {
        $user['PembayaranId'] = NULL;
        $user['Nik'] = NULL;
        $user['StatusId'] = NULL;
        $user['GajiTetap'] = NULL;
        $user['GajiKotor'] = NULL;
        $user['GajiBersih'] = NULL;
        $user['Bulan'] = NULL;
        return $user;
    }
    function kec()
    {
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }

    function kecId($id)
    {
        $this->db->where('KecId', $id);
        $query = $this->db->get('ref_kecamatan');
        return $query->result();
    }

    function desaId($id)
    {
        $this->db->where('KecId', $id);
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function getKecDesa($nik)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_desa b', 'b.DesaId = a.DesaId');
        $this->db->where('a.Nik', $nik);
        $query = $this->db->get();
        return $query->row();
    }

    function desa()
    {
        $query = $this->db->get('ref_desa');
        return $query->result();
    }

    function perangkatByDesa($desaid)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->where('DesaId', $desaid);
        $q = $this->db->get();
        return $q->result();
    }

    function KJabatanId($KJabatanId)
    {
        $this->db->where('KJabatanId', $KJabatanId);
        $q = $this->db->get('ref_kelompok_jabatan');
        return $q->row();
    }
    function BpjsKsh()
    {
        $this->db->where('Status', 1);
        $this->db->order_by('BpjsKesehatanId', 'DESC');
        $q = $this->db->get('ref_bpjs_kesehatan');
        return $q->row();
    }
    function BpjsJkk()
    {
        $this->db->where('Status', 1);
        $this->db->order_by('BpjsJkkId', 'DESC');
        $q = $this->db->get('ref_bpjs_jkk');
        return $q->row();
    }
    function BpjsJkm()
    {
        $this->db->where('Status', 1);
        $this->db->order_by('BpjsJkmId', 'DESC');
        $q = $this->db->get('ref_bpjs_jkm');
        return $q->row();
    }
    function BpjsJht()
    {
        $this->db->where('Status', 1);
        $this->db->order_by('BpjsJhtId', 'DESC');
        $q = $this->db->get('ref_bpjs_jht');
        return $q->row();
    }
    function BpjsJp()
    {
        $this->db->where('Status', 1);
        $this->db->order_by('BpjsJpId', 'DESC');
        $q = $this->db->get('ref_bpjs_jp');
        return $q->row();
    }
    function LastId()
    {
        $this->db->order_by('PembayaranId', 'DESC');
        $q = $this->db->get('pembayaran');
        return $q->row();
    }

    function getPembayaranSum($desaid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        $this->db->select_sum('Potongan_Jht');
        $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);

        $query = $this->db->get('pembayaran');
        return $query->row();
    }
    function getDesaSum($desaid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        $this->db->select_sum('Potongan_Jht');
        $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get('pembayaran');
        return $query->row();
    }

    function getDesaBpjsKsh($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.DesaId', $desaid);
        $this->db->where('BpjsKsh', '1');
        $this->db->where('Bulan', $bulan);
        $this->db->where('Tahun', $tahun);
        $q = $this->db->get();
        return $q->num_rows();
    }
    function getDesaBpjsTenagaKerja($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.DesaId', $desaid);
        $this->db->where('BpjsTenagaKerja', '1');
        $this->db->where('Bulan', $bulan);
        $this->db->where('Tahun', $tahun);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function perangkatSum($desaid, $bulan, $tahun)
    {
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get('pembayaran');
        return $query->num_rows();
    }



    function getPembayaranSumKec($kecid, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        $this->db->select_sum('Potongan_Jht');
        $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->where('KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);

        $query = $this->db->get('pembayaran');
        return $query->row();
    }
    function getDesaSumKec($kecid, $bulan, $tahun)
    {

        $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        $this->db->select_sum('Potongan_Jht');
        $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->where('KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get('pembayaran');
        return $query->row();
    }

    function perangkatSumKec($kecid, $bulan, $tahun)
    {
        $this->db->where('KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $query = $this->db->get('pembayaran');
        return $query->num_rows();
    }
    function approveDesa($desaid, $tahun, $bulan, $data)
    {
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->update('pembayaran', $data);
    }

    function cancelDesa($desaid, $tahun, $bulan, $data)
    {
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->update('pembayaran', $data);
    }

    function approveKec($kecid, $tahun, $bulan, $data)
    {

        $this->db->where('KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->update('pembayaran', $data);
    }

    function cancelKec($kecid, $tahun, $bulan, $data)
    {
        $this->db->where('KecId', $kecid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->update('pembayaran', $data);
    }
    function cekApproveKec($kecid, $bulan, $tahun)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('bulan', $bulan);
        $this->db->where('StatusProgress', 'permohonan_kec');
        $this->db->where('KecId', $kecid);
        $query = $this->db->get('pembayaran');
        return $query->num_rows();
    }
    function cekPembayaran($Nik, $bulan, $tahun)
    {
        $b = $this->db->query("SELECT distinct Bulan FROM pembayaran WHERE Nik='$Nik' ORDER BY   PembayaranId DESC")->num_rows();

        $this->db->where('Nik', $Nik);
        $this->db->where('Tahun', $tahun);
        if ($b != 0) {
            $this->db->where('Bulan', $bulan);
        }
        $q = $this->db->get('pembayaran');
        return $q->num_rows();
    }
    function cekStatusPembayaran($Nik)
    {
        $b = $this->db->query("SELECT distinct Bulan FROM pembayaran WHERE Nik='$Nik' ORDER BY   PembayaranId DESC")->num_rows();

        if (date('m') != 12) {
            $bulan = date('m') + 1;
            $tahun = date('Y');
        } else {
            $bulan = 1;
            $tahun = date('Y') + 1;
        }

        $this->db->where('Nik', $Nik);
        $this->db->where('Tahun', $tahun);
        if ($b != 0) {
            $this->db->where('Bulan', $bulan);
        }
        $this->db->where('StatusProgress', 'approved_bpkad');
        $q = $this->db->get('pembayaran');
        return $q->num_rows();
    }
    function cekStatusPembayaranInsert($Nik, $bulan, $tahun)
    {
        $b = $this->db->query("SELECT distinct Bulan FROM pembayaran WHERE Nik='$Nik' ORDER BY PembayaranId DESC")->num_rows();


        $this->db->where('Nik', $Nik);
        $this->db->where('Tahun', $tahun);
        if ($b != 0) {
            $this->db->where('Bulan', $bulan);
        }
        $this->db->where('StatusProgress', 'approved_bpkad');
        $q = $this->db->get('pembayaran');
        return $q;
    }

    function cekDesaNull($desaid)
    {
        $tahun = date('Y');
        $bulan = date('m');
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $q = $this->db->get('pembayaran');
        $status = $q->num_rows();
    }
    function sttPns($nik)
    {
        $this->db->where('Nik', $nik);
        $q = $this->db->get('ref_perangkat');
        return $q->row();
    }

    function cekSK($nik)
    {
        $this->db->where("Nik", $nik);
        $q = $this->db->get("ref_perangkat");
        return $q->row();
    }

    function getBulanNow($bulan)
    {
        $this->db->where('BulanId <=', $bulan);
        $q = $this->db->get('ref_bulan');
        return $q->result();
    }
    function getBulanById($bulanid)
    {
        $this->db->where('BulanId', $bulanid);
        $q = $this->db->get('ref_bulan');
        return $q->row();
    }

    function perangkatByNik($nik)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'b.JabatanId = a.Jabatan');
        $this->db->where('a.Nik', $nik);
        $this->db->where('a.Status', 1);
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
