<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_model extends Ci_Model
{

    private $_table = "pembayaran";

    public function getApprovedKecByTahunByBulanByDesa($tahun, $bulan, $desa)
    {
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa,
            'StatusProgress' => 'approved_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getApprovedBpkadByTahunByBulanByDesa($tahun, $bulan, $desa)
    {
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getBulanByTahunByDesa($tahun, $desa)
    {
        $this->db->select('Bulan');
        $this->db->distinct();
        $this->db->where(array(
            'Tahun' => $tahun,
            'DesaId' => $desa
        ));
        return $this->db->get($this->_table);
    }

    public function getByTahunByBulanByDesa($tahun, $bulan, $desa)
    {
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBersihApprovedByTahunByDesa($tahun, $bulan, $desa)
    {
        $this->db->select_sum('GajiBersih', 'totalgajibersih');
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedByTahun($tahun, $bulan)
    {
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedByTahunByDesa($tahun, $bulan, $desa)
    {
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedByTahunByKec($tahun, $bulan, $kec)
    {
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'KecId' => $kec,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedPerBulanByTahun($tahun)
    {
        $this->db->select('Bulan');
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->group_by("bulan");
        $this->db->where(array(
            'Tahun' => $tahun,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedPerBulanByTahunByDesa($tahun, $desa)
    {
        $this->db->select('Bulan');
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->group_by("bulan");
        $this->db->where(array(
            'Tahun' => $tahun,
            'DesaId' => $desa,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiBulananApprovedPerBulanByTahunByKec($tahun, $kec)
    {
        $this->db->select('Bulan');
        $this->db->select_sum('GajiBulanan', 'totalgajibulanan');
        $this->db->group_by("bulan");
        $this->db->where(array(
            'Tahun' => $tahun,
            'KecId' => $kec,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }

    public function getGajiKotorApprovedByTahunByDesa($tahun, $bulan, $desa)
    {
        $this->db->select_sum('GajiKotor', 'totalgajikotor');
        $this->db->where(array(
            'Tahun' => $tahun,
            'Bulan' => $bulan,
            'DesaId' => $desa,
            'StatusProgress !=' => 'permohonan_kec'
        ));
        return $this->db->get($this->_table);
    }
    public function list_bulan($tahun)
    {
        $this->db->select('Bulan');
        $this->db->distinct();
        $this->db->where('Tahun', $tahun);
        $q = $this->db->get('pembayaran');
        return $q->result();
    }

    public function status_approval($bulan)
    {
        $this->db->where('Bulan', $bulan);
        $q = $this->db->get('pembayaran');
        return $q->row();
    }
}
