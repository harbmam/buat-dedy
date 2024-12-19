<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class pengarangseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengarang')->insert(
            [
            [
            'nama' => 'Deden Hamdani',
            'email' => 'deden@gmail.com',
            'hp' => '0857123456',
            'foto' => 'deden.jpg',
            ],

            [
            'nama' => 'Dedi Iskandar',
            'email' => 'dedi@gmail.com',
            'hp' => '08546456213',
            'foto' => 'dedi.jpg',
            ],

            [
            'nama' => 'Siti Aminah',
            'email' => 'siti@gmail.com',
            'hp' => '08137563456',
            'foto' => 'siti.jpg',
            ]
        ]);
    }
}
