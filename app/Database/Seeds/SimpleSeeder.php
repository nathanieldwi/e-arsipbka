<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SimpleSeeder extends Seeder
{
    public function run()
    {
        $this->call('JenisSeeder');
        $this->call('UserSeeder');
        // $this->call('SuratMasukSeeder');
        // $this->call('SuratKeluarSeeder');
    }
}
