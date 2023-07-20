<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table            = 'tb_suratkeluar';
    protected $primaryKey       = 'suratkeluar_id';
    protected $allowedFields    = ['no_surat', 'judul_surat', 'jenis_id', 'tujuan', 'tgl_keluar', 'keterangan', 'berkas'];

    public function getSuratKeluar($id = false)
    {
        if ($id == false) {
            return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->asObject()->findAll();
        }
        return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->where('suratkeluar_id', $id)->asObject()->first();
    }

    public function getSuratKeluarCetak($jenis_id = false, $start = false, $end = false)
    {
        if ($jenis_id == false && $start == false && $end == false) {
            return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->asObject()->findAll();
        } elseif ($jenis_id == false) {
            return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->where('tb_suratkeluar.tgl_keluar BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->orderBy('tb_suratkeluar.tgl_keluar', 'ASC')->asObject()->findAll();
        } elseif ($start == false && $end == false) {
            return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->where('tb_suratkeluar.jenis_id', $jenis_id)->asObject()->findAll();
        } else {
            return $this->join('tb_jenis', 'tb_suratkeluar.jenis_id = tb_jenis.jenis_id')->where('tb_suratkeluar.jenis_id', $jenis_id)->where('tb_suratkeluar.tgl_keluar BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->orderBy('tb_suratkeluar.tgl_keluar', 'ASC')->asObject()->findAll();
        }
    }
}
