<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jenis' => 'Test 1',
                'detail' => 'Test 1'
            ],
            [
                'nama_jenis' => 'Test 2',
                'detail' => 'Test 2'
            ],
        ];

        $this->db->table('tb_jenis')->insertBatch($data);
    }
}
