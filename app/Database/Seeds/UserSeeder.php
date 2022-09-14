<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'fqt',
                'nama' => 'Dimyati',
                'alias' => "Fqt",
                'image' => 'default.jpg',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'role' => 'Root',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'username' => 'syaiful',
                'nama' => 'Syaiful Hidayat',
                'alias' => "Sya",
                'image' => 'default.jpg',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'role' => 'Admin',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'username' => 'alib',
                'nama' => 'Alib Ria',
                'alias' => "Alb",
                'image' => 'default.jpg',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'role' => 'Editor',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO role (role, created_at, updated_at) VALUES(:role:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // $this->db->table('role')->insert($data);
        $this->db->table('user')->insertBatch($data);
    }
}
