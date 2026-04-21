<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 36,
            ],
            'nama_item' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'deskripsi_item' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'category_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 36,
                'null'       => true,
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'edited_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 36,
                'null'       => true,
            ],
            'last_edited' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('edited_by', 'users', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
