<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create multiple users

        /* no exemplo abaixo fazemos a criação de três colunas da tabela sendo representados pelas array, 
        os respectivos nomes se refere-se ao que temos na table, e o valor que será preenchido dentro daquele valor */


        DB::table('users')->insert([
            [
            'username' => 'user1@gmail.com',
            'password' => bcrypt('abc123456'),
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'username' => 'user2@gmail.com',
            'password' => bcrypt('abc123456'),
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'username' => 'user3@gmail.com',
            'password' => bcrypt('abc123456'),
            'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
