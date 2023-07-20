<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table            = 'tb_jenis';
    protected $primaryKey       = 'jenis_id';
    protected $allowedFields    = ['jenis_id', 'nama_jenis', 'detail'];

    public function getJenis($id = false)
    {
        if ($id == false) {
            return $this->asObject()->findAll();
        }
        return $this->where('jenis_id', $id)->asObject()->first();
    }
}
