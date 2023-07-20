<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SuratKeluarSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 30; $i++) {
            $data = [
                'no_surat' => $faker->randomNumber(5, true),
                'judul_surat' =>  $faker->word(),
                'jenis_id' => $faker->randomElement(['1', '2']),
                'tujuan' => $faker->address(),
                'tgl_keluar' => Time::now(),
                'keterangan' => $faker->text(),
                'berkas' => $faker->word()
            ];

            $this->db->table('tb_suratkeluar')->insertBatch($data);
        }
    }
}
