<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'         => '123e4567-e89b-12d3-a456-426614174000',
                'nama'       => 'Administrator',
                'jabatan'    => 'Admin',
                'email'      => 'admin@example.com',
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => '223e4567-e89b-12d3-a456-426614174001',
                'nama'       => 'Staf Gudang',
                'jabatan'    => 'Gudang',
                'email'      => 'gudang@example.com',
                'username'   => 'gudang',
                'password'   => password_hash('gudang123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => '323e4567-e89b-12d3-a456-426614174002',
                'nama'       => 'Pengunjung / Guest',
                'jabatan'    => 'Guest',
                'email'      => 'guest@example.com',
                'username'   => 'guest',
                'password'   => password_hash('guest123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($users as $user) {
            $exists = $this->db->table('users')->where('username', $user['username'])->countAllResults();
            if ($exists == 0) {
                $this->db->table('users')->insert($user);
            }
        }
    }
}
