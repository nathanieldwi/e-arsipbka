<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = ['nama_lengkap', 'username', 'password', 'level', 'sampul'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->asObject()->findAll();
        }
        return $this->where('user_id', $id)->asObject()->first();
    }
}
