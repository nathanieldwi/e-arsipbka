<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'suratmasuk_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'tgl_masuk' => [
                'type' => 'DATE',
                'null' => TRUE
            ],
            'judul_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'tgl_diterima' => [
                'type' => 'DATE',
                'null' => TRUE
            ],
            'asal_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'jenis_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('suratmasuk_id', true);
        $this->forge->createTable('tb_suratmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('tb_suratmasuk');
    }
}
