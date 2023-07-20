<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Admin',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'level' => 'admin',
                'sampul' => 'default-image.jpg',
            ],
            [
                'nama_lengkap' => 'Superadmin',
                'username' => 'superadmin',
                'password' => password_hash('superadmin', PASSWORD_DEFAULT),
                'level' => 'superadmin',
                'sampul' => 'default-image.jpg',
            ],
            [
                'nama_lengkap' => 'User Help',
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'level' => 'user',
                'sampul' => 'default-image.jpg',
            ],
        ];

        $this->db->table('tb_users')->insertBatch($data);
    }
}
