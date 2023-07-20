<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 30; $i++) {
            $data = [
                'no_surat' => $faker->randomNumber(5, true),
                'tgl_masuk' => Time::now(),
                'judul_surat' => $faker->word(),
                'tgl_diterima' => Time::now(),
                'asal_surat' => $faker->address(),
                'jenis_id' => $faker->randomElement(['1', '2']),
                'dokumen' => $faker->word(),
                'keterangan' => $faker->text()
            ];

            $this->db->table('tb_suratmasuk')->insertBatch($data);
        }
    }
}
