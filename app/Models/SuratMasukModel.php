<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table            = 'tb_suratmasuk';
    protected $primaryKey       = 'suratmasuk_id';
    protected $allowedFields    = ['no_surat', 'tgl_masuk', 'judul_surat', 'tgl_diterima', 'asal_surat', 'jenis_id', 'dokumen', 'keterangan'];

    public function getSuratMasuk($id = false)
    {
        if ($id == false) {
            return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->asObject()->findAll();
        }
        return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->where('suratmasuk_id', $id)->asObject()->first();
    }

    public function getSuratMasukCetak($jenis_id = false, $start = false, $end = false)
    {
        if ($jenis_id == false && $start == false && $end == false) {
            return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->asObject()->findAll();
        } elseif ($jenis_id == false) {
            return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->where('tb_suratmasuk.tgl_diterima BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->orderBy('tb_suratmasuk.tgl_diterima', 'ASC')->asObject()->findAll();
        } elseif ($start == false && $end == false) {
            return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->where('tb_suratmasuk.jenis_id', $jenis_id)->asObject()->findAll();
        } else {
            return $this->join('tb_jenis', 'tb_suratmasuk.jenis_id = tb_jenis.jenis_id')->where('tb_suratmasuk.jenis_id', $jenis_id)->where('tb_suratmasuk.tgl_diterima BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')->orderBy('tb_suratmasuk.tgl_diterima', 'ASC')->asObject()->findAll();
        }
    }
}
