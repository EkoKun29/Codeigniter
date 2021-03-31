<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class rekapitulasi_model extends Ci_Model
{
    private $_table = "pembayaran";
    function getDesaByKec($kecid)
    {
        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_desa');
        return $q->result();
    }
    function getDesa($tahun, $bulan)
    {
        $this->db->select('pembayaran.DesaId,ref_desa.DesaNama');
        $this->db->distinct();
        $this->db->from('pembayaran');
        $this->db->join('ref_desa', 'pembayaran.DesaId = ref_desa.DesaId');
        $this->db->where('pembayaran.Tahun', $tahun);
        $this->db->where('pembayaran.Bulan', $bulan);
        $this->db->order_by('ref_desa.DesaNama', 'Asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getDesaByKecByTahunByBulan($kecid, $tahun, $bulan)
    {
        // $this->db->select('pembayaran.DesaId,ref_desa.DesaNama,ref_desa.NoRek,ref_desa.Npwp,TglPermohonan');
        $this->db->select('ref_desa.DesaId,ref_desa.DesaNama');
        $this->db->distinct();
        $this->db->from('pembayaran');
        $this->db->join('ref_desa', 'pembayaran.DesaId = ref_desa.DesaId');
        $this->db->where('pembayaran.KecId', $kecid);
        $this->db->where('pembayaran.Tahun', $tahun);
        $this->db->where('pembayaran.Bulan', $bulan);
        $this->db->where('pembayaran.StatusProgress !=', "permohonan_kec");
        // $this->db->group_by('pembayaran.DesaId');
        $this->db->order_by('ref_desa.DesaNama', 'Asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getDesaByDesaByKecByTahunByBulan($kecid, $desaid, $tahun, $bulan)
    {
        // $this->db->select('pembayaran.DesaId,ref_desa.DesaNama,ref_desa.NoRek,ref_desa.Npwp,TglPermohonan');
        $this->db->select('ref_desa.DesaId,ref_desa.DesaNama');
        $this->db->distinct();
        $this->db->from('pembayaran');
        $this->db->join('ref_desa', 'pembayaran.DesaId = ref_desa.DesaId');
        $this->db->where('pembayaran.KecId', $kecid);
        $this->db->where('pembayaran.DesaId', $desaid);
        $this->db->where('pembayaran.Tahun', $tahun);
        $this->db->where('pembayaran.Bulan', $bulan);
        $this->db->where('pembayaran.StatusProgress !=', "permohonan_kec");
        // $this->db->group_by('pembayaran.DesaId');
        $this->db->order_by('ref_desa.DesaNama', 'Asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getDesaByTahunByBulan($kecid, $desaid, $tahun, $bulan)
    {
        $this->db->select('pembayaran.DesaId,ref_desa.DesaNama');
        $this->db->distinct();
        $this->db->from('pembayaran');
        $this->db->join('ref_desa', 'pembayaran.DesaId = ref_desa.DesaId');
        $this->db->where('pembayaran.KecId', $kecid);
        $this->db->where('pembayaran.DesaId', $desaid);
        $this->db->where('pembayaran.Tahun', $tahun);
        $this->db->where('pembayaran.Bulan', $bulan);
        // $this->db->group_by('pembayaran.DesaId');
        $this->db->order_by('ref_desa.DesaNama', 'Asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getKepalaDesaCek($tahun, $bulan, $kec, $desa)
    {
        // $this->db->select('*');
        // $this->db->from();
        // $this->db->join('ref_kelompok_jabatan b','a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c','c.Nik = a.Nik');
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('KecId', $kec);
        $this->db->where('DesaId', $desa);
        $query = $this->db->get('pembayaran a');
        return $query->row();
    }

    function getKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kec, $desa)
    {
        // $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        // $this->db->select_sum('Potongan_Jht');
        // $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }

    function totalKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesaByTahunByBulanByKecByDesaJML($tahun, $bulan, $kec, $desa)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesaByTahunByBulanByKecByDesa_Kumulatif($tahun, $bulan, $kec, $desa)
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
        // $this->db->select_sum('Potongan_Jht');
        // $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesaByTahunByBulanByKecByDesa_KumulatifJML($tahun, $bulan, $kec, $desa)
    {
        // $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesaByTahunByBulanByKec($tahun, $bulan, $kec)
    {
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
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesaByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kec)
    {
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
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $this->db->where('a.StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function getKepalaDesa_Kumulatif($tahun, $bulan, $kec)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        $this->db->where('a.KJabatanId <', '3');
        // $this->db->or_where('a.KJabatanId', '3');
        $this->db->where('StatusProgress !=', 'permohonan_kec');

        $query = $this->db->get();
        return $query;
    }
    function getPerangkatDesa_Kumulatif($tahun, $bulan, $kec)
    {

        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        $this->db->where('a.KJabatanId >', '2');
        // $this->db->or_where('a.KJabatanId', '2');
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }

    function getPenghasilanTetapKepalaDesaByTahunByBulanByKecByDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.GajiBulanan', 'GajiBulanan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId', '1');
        $this->db->or_where('b.KJabatanId', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }

    function getPenghasilanTetapPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.GajiBulanan', 'GajiBulanan');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.KJabatanId != ', '1');
        $this->db->where('a.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }

    function getPenghasilanTetapPerangkatByTahunByBulanByKec($tahun, $bulan, $kec)
    {
        $this->db->select_sum('a.GajiBulanan', 'GajiBulanan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $query = $this->db->get();
        return $query;
    }
    function getPenghasilanTetapPerangkatByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kec)
    {
        $this->db->select_sum('a.GajiBulanan', 'GajiBulanan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsKesehatan($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Kesehatan', 'Jaminan_Kesehatan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsKesehatanAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Kesehatan', 'Jaminan_Kesehatan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsKesehatanAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Kesehatan', 'Jaminan_Kesehatan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkk($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkk', 'Jaminan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkkAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkk', 'Jaminan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkkAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkk', 'Jaminan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkm($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkm', 'Jaminan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkmAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkm', 'Jaminan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsJkmAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkm', 'Jaminan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganKesehatan1($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan1', 'Potongan_Kesehatan1');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganKesehatan1All($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan1', 'Potongan_Kesehatan1');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganKesehatan1All_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan1', 'Potongan_Kesehatan1');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganKesehatan2($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan2', 'Potongan_Kesehatan2');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }

    function sumBpjsPotonganKesehatan2All($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan2', 'Potongan_Kesehatan2');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganKesehatan2All_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Kesehatan2', 'Potongan_Kesehatan2');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkk($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkk', 'Potongan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkkAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkk', 'Potongan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkkAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkk', 'Potongan_Jkk');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkm($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkm', 'Potongan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkmAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkm', 'Potongan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJkmAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jkm', 'Potongan_Jkm');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJht($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jht', 'Potongan_Jht');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJhtAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jht', 'Potongan_Jht');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJhtAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jht', 'Potongan_Jht');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJp($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jp', 'Potongan_Jp');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJpAll($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jp', 'Potongan_Jp');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function sumBpjsPotonganJpAll_Kumulatif($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Potongan_Jp', 'Potongan_Jp');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId != ', '1');
        $this->db->where('b.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        // $this->db->where('a.DesaId', $desa);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function getPerangkatByTahunByBulanByKecByDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('a.KJabatanId !=', '1');
        $this->db->where('a.KJabatanId !=', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query;
    }
    function getPerangkatByTahunByBulanByKec($tahun, $bulan, $kec)
    {
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
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId !=', '1');
        $this->db->where('b.KJabatanId !=', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $query = $this->db->get();
        return $query;
    }
    function getPerangkatByTahunByBulanByKec_Kumulatif($tahun, $bulan, $kec)
    {
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
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        $this->db->where('b.KJabatanId !=', '1');
        $this->db->where('b.KJabatanId !=', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        // $this->db->where('a.KecId', $kec);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query;
    }
    function getGajiPnsRealisasi($tahun, $bulan, $desa)
    {
        $this->db->select_sum('GajiBulanan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.DesaId', $desa);
        $this->db->where('b.Pns !=', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function getTunjanganPnsRealisasi($tahun, $bulan, $desa)
    {
        $this->db->select_sum('GajiBulanan');
        $this->db->from('pembayaran a');
        $this->db->join('ref_perangkat b', 'b.Nik = a.Nik');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.DesaId', $desa);
        $this->db->where('b.Pns', 1);
        $query = $this->db->get();
        return $query->row();
    }
    // function getPerangkatByTahunByBulanByDesa($tahun, $bulan, $desa) {
    //     // $this->db->select('*');
    //     $this->db->select('ref_desa.DesaId,ref_desa.DesaNama');
    //     // $this->db->select_sum('pembayaran.GajiBersih', 'gaji');
    //     // $this->db->distinct();
    //     $this->db->from('pembayaran');
    //     $this->db->join('ref_desa','pembayaran.DesaId = ref_desa.DesaId');
    //     $this->db->where('pembayaran.KecId', $kecid);
    //     $this->db->where('pembayaran.Tahun', $tahun);
    //     $this->db->where('pembayaran.Bulan', $bulan);
    //     $this->db->group_by('pembayaran.DesaId');
    //     $this->db->order_by('ref_desa.DesaNama', 'Asc');
    //     $query = $this->db->get();
    //     // return $query->result()s;
    //     return $query;
    // }
    function ApiPagu($kddesa, $kdrincian)
    {

        $url = "http://mantra.patikab.go.id/json/diskominfopati/siskeudes/total_bpjs_desa";

        $pardata = array(
            "q_Kd_Desa" => urlencode($kddesa),
            "q_Kd_Rincian" => urlencode($kdrincian)
        );
        $par = "/" . http_build_query($pardata);

        $options = array('http' => array(
            'method' => "GET",
            'header' => implode("\r\n", array("Content-Type:text/plain;charset=UTF-8"))
        ));
        $context = stream_context_create($options);
        $content = file_get_contents($url . $par, false, $context);
        // echo $content;
        $en_json = json_decode($content);

        foreach ($en_json as $data) {
            foreach ($data->data->total_bpjs_desa as $total) {
                // foreach($total->total_bpjs_desa $siltap){
                //  echo $siltap;
                // }
                // $hasil = 0;
                // echo  $total->Anggaran."<br>";
                $hasil += $total->Anggaran;
            }
        }
        $perbulan = $hasil / 12;
        return $perbulan;
    }



    function getTahunByDesa()
    {
        $this->db->select('tahun');
        $this->db->distinct();
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    function getTahunByKec($kecId)
    {
        $this->db->select('tahun');
        $this->db->distinct();
        $this->db->where('KecId', $kecId);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function getTahun()
    {
        $this->db->select('tahun');
        $this->db->distinct();
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function getBulanByTahunByDesa($tahun, $desaId)
    {
        $this->db->select('bulan');
        $this->db->distinct();
        $this->db->where(
            array(
                'Tahun' => $tahun,
                'DesaId' => $desaId,
                'StatusProgress !=' => 'permohonan_kec'
            )
        );
        $this->db->order_by('Bulan', 'Asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    function getBulanByTahunByKec($tahun, $kecId)
    {
        $this->db->select('bulan');
        $this->db->distinct();
        $this->db->where(
            array(
                'Tahun' => $tahun,
                'KecId' => $kecId,
                'StatusProgress !=' => 'permohonan_kec'
            )
        );
        $this->db->order_by('Bulan', 'Asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function getBulanByTahun($tahun)
    {
        $this->db->select('bulan');
        $this->db->distinct();
        $this->db->where(
            array(
                'Tahun' => $tahun
            )
        );
        $this->db->order_by('Bulan', 'Asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    function getBulanByTahunRekapitulasi($tahun)
    {
        $this->db->select('bulan');
        $this->db->distinct();
        $this->db->where(
            array(
                'Tahun' => $tahun,
                'StatusProgress !=' => 'permohonan_kec'
            )
        );
        $this->db->order_by('Bulan', 'Asc');
        $query = $this->db->get($this->_table);
        return $query->result();
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

    function TotalBpjsKsh($desaid, $tahun, $bulan)
    {
        $this->db->select_sum('BpjsKsh');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->row();
    }

    function TotalBpjsTK($desaid, $tahun, $bulan)
    {
        $this->db->select_sum('BpjsTenagaKerja');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->row();
    }
    function TotalBpjsJHT($desaid, $tahun, $bulan)
    {
        $this->db->select_sum('BpjsJht');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->row();
    }
    function TotalBpjsJP($desaid, $tahun, $bulan)
    {
        $this->db->select_sum('BpjsJp');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->row();
    }
    function TotalPns($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('a.Pns', '1');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->num_rows();
    }
    function TotalNonPns($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('a.Pns !=', '1');
        $this->db->where('b.desaid', $desaid);
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $q = $this->db->get();
        return $q->num_rows();
    }
    function getAllDesa($desaid, $tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        // $this->db->join('ref_perangkat f', 'f.Nik = a.Nik');
        // $this->db->join('ref_desa g', 'g.DesaId = a.DesaId');
        // $this->db->join('ref_jabatan h', 'h.JabatanId = f.Jabatan');
        $this->db->where('a.DesaId', $desaid);
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->result();
    }
    function getAllDesaSortir($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join('ref_kelompok_jabatan b', 'b.KJabatanId = a.KJabatanId');
        $this->db->join('ref_perangkat f', 'f.Nik = a.Nik');
        $this->db->join('ref_desa g', 'g.DesaId = f.DesaId');
        $this->db->join('ref_jabatan h', 'h.JabatanId = f.Jabatan');
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllDesaSum($desaid, $tahun, $bulan)
    {
        // $this->db->select('*');
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->select_sum('Potongan_Kesehatan1');
        $this->db->select_sum('Potongan_Kesehatan2');
        $this->db->select_sum('Potongan_Jkk');
        $this->db->select_sum('Potongan_Jkm');
        // $this->db->select_sum('Potongan_Jht');
        // $this->db->select_sum('Potongan_Jp');
        $this->db->select_sum('Jumlah_Potongan');
        $this->db->select_sum('GajiKotor');
        $this->db->select_sum('GajiBersih');
        $this->db->from('pembayaran ');
        $this->db->where('DesaId', $desaid);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->row();
    }

    function getDesaKec($desaid)
    {
        $this->db->select('*');
        $this->db->from('ref_desa a');
        $this->db->join('ref_kecamatan b', 'b.KecId = a.KecId');
        $this->db->where('a.DesaId', $desaid);
        $query = $this->db->get();
        return $query->row();
    }
    function getKec()
    {
        $q = $this->db->get('ref_kecamatan');
        return $q->result();
    }
    function getKecId($kecid)
    {
        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_kecamatan');
        return $q->row();
    }

    function getKecByDesa($desaid)
    {
        $this->db->where('DesaId', $desaid);
        $q = $this->db->get('ref_desa');
        return $q->row();
    }
    function edit_jbt($ali, $data)
    {
        $this->db->where('Jabatan', $ali);
        $this->db->update('ref_perangkat', $data);
    }

    function getCamat($kecid)
    {
        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_kecamatan');
        return $q->row();
    }

    function getKades($desaid)
    {

        $this->db->where('KJabatanId <', 3);
        // $this->db->or_where('KJabatanId',2);
        $this->db->where('DesaId', $desaid);
        $q = $this->db->get('ref_perangkat');
        return $q;
    }

    function getBendahara($desaid)
    {

        $this->db->where('DesaId', $desaid);
        $q = $this->db->get('ref_desa');
        return $q->row();
    }

    function getPemdes($kecid)
    {

        $this->db->where('KecId', $kecid);
        $q = $this->db->get('ref_kecamatan');
        return $q->row();
    }


    function getKumulatifPns($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik", 'left');
        $this->db->where('Pns', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function getKumulatifNonPns($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik", 'left');
        $this->db->where('Pns !=', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getKumulatifBpjsKsh($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik");
        $this->db->where('BpjsKsh', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getKumulatifBpjsTenagaKerja($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik");
        $this->db->where('BpjsTenagaKerja', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function getKumulatifBpjsJht($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik");
        $this->db->where('BpjsJht', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function getKumulatifBpjsJp($tahun, $bulan)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->join("ref_perangkat b", "b.Nik = a.Nik");
        $this->db->where('BpjsJp', 1);
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('StatusProgress !=', 'permohonan_kec');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function perangkatByNik($nik)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('ref_jabatan b', 'b.JabatanId = a.Jabatan');
        $this->db->where('a.Nik', $nik);
        $q = $this->db->get();
        return $q->row();
    }

    function getSumSiltapDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.GajiBulanan', 'GajiBulanan');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        // $this->db->where('a.KJabatanId != ', '1');
        // $this->db->where('a.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query->row();
    }

    function getSumIjkKesehatanDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Kesehatan', 'Jaminan_Kesehatan');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        // $this->db->where('a.KJabatanId != ', '1');
        // $this->db->where('a.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query->row();
    }

    function getSumJkkDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkk', 'Jaminan_Jkk');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        // $this->db->where('a.KJabatanId != ', '1');
        // $this->db->where('a.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query->row();
    }

    function getSumJkmDesa($tahun, $bulan, $kec, $desa)
    {
        $this->db->select_sum('a.Jaminan_Jkm', 'Jaminan_Jkm');
        $this->db->from('pembayaran a');
        // $this->db->join('ref_kelompok_jabatan b', 'a.KJabatanId = b.KJabatanId');
        // $this->db->join('ref_perangkat c', 'c.Nik = a.Nik');
        // $this->db->join('ref_jabatan d', 'c.Jabatan = d.JabatanId');
        // $this->db->where('a.KJabatanId != ', '1');
        // $this->db->where('a.KJabatanId != ', '2');
        $this->db->where('a.Tahun', $tahun);
        $this->db->where('a.Bulan', $bulan);
        $this->db->where('a.KecId', $kec);
        $this->db->where('a.DesaId', $desa);
        $query = $this->db->get();
        return $query->row();
    }

    function perangkatByDesaNonPns($tahun, $bulan, $desaid)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->join('ref_jabatan c', 'c.JabatanId = a.Jabatan');
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $this->db->where('b.DesaId', $desaid);
        $this->db->where('a.Pns', 0);
        $this->db->order_by('b.KJabatanId', 'ASC');
        $q = $this->db->get();
        return $q;
    }
    function perangkatByDesaPns($tahun, $bulan, $desaid)
    {
        $this->db->select('*');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->join('ref_jabatan c', 'c.JabatanId = a.Jabatan');
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $this->db->where('b.DesaId', $desaid);
        $this->db->where('a.Pns', 1);
        $this->db->order_by('b.KJabatanId', 'ASC');
        $q = $this->db->get();
        return $q;
    }

    // lembar rekap 1 - siltap
    function gajiByPerangkatByBulan($tahun, $bulan, $desaid, $nik)
    {
        $this->db->where('Tahun', $tahun);
        $this->db->where('Bulan', $bulan);
        $this->db->where('DesaId', $desaid);
        $this->db->where('Nik', $nik);
        $q = $this->db->get('pembayaran');
        return $q->row();
    }
    function gajiByPerangkatByTahun($tahun, $desaid, $nik)
    {
        $this->db->select_sum('GajiBulanan');
        $this->db->select_sum('Jaminan_Kesehatan');
        $this->db->select_sum('Jaminan_Jkk');
        $this->db->select_sum('Jaminan_Jkm');
        $this->db->where('Tahun', $tahun);
        $this->db->where('DesaId', $desaid);
        $this->db->where('Nik', $nik);
        $q = $this->db->get('pembayaran');
        return $q->row();
    }

    function getDesaById($desaid)
    {
        $this->db->where('DesaId', $desaid);
        $q = $this->db->get('ref_desa');
        return $q->row();
    }
    function tunjanganPns($tahun, $bulan, $desaid)
    {
        $this->db->select_sum('GajiBulanan');
        $this->db->from('ref_perangkat a');
        $this->db->join('pembayaran b', 'b.Nik = a.Nik');
        $this->db->where('b.Tahun', $tahun);
        $this->db->where('b.Bulan', $bulan);
        $this->db->where('b.DesaId', $desaid);
        $this->db->where('a.Pns', 1);
        $this->db->where('a.PensiunPns !=', 1);
        $q = $this->db->get();
        return $q->row();
    }
}
