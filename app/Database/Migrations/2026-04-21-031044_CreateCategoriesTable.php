<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 36,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'parent_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 36,
                'null'       => true,
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
        $this->forge->addForeignKey('edited_by', 'users', 'id', 'SET NULL', 'SET NULL');
        // Foreign key for self-referencing parent_id is added but often skipped in CI to prevent circular cascades.
        $this->forge->addForeignKey('parent_id', 'categories', 'id', 'SET NULL', 'SET NULL');
        
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
