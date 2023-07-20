<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jenis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'jenis_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_jenis' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'detail' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
        ]);
        $this->forge->addKey('jenis_id', true);
        $this->forge->createTable('tb_jenis');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis');
    }
}
