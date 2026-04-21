<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id'         => '123e4567-e89b-12d3-a456-426614174000',
            'nama'       => 'Administrator',
            'jabatan'    => 'Admin',
            'email'      => 'admin@example.com',
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
