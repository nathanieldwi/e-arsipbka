<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'suratkeluar_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'judul_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'jenis_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'tgl_keluar' => [
                'type' => 'DATE',
                'null' => TRUE
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'berkas' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
        ]);
        $this->forge->addKey('suratkeluar_id', true);
        $this->forge->createTable('tb_suratkeluar');
    }

    public function down()
    {
        $this->forge->dropTable('tb_suratkeluar');
    }
}
