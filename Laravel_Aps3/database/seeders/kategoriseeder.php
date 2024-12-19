<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert(
        [
            [
                'nama' => 'Sejarah'
            ],
            [
                'nama' => 'Sosial & Politik'
            ],
            [
                'nama' => 'Pertanian'
            ]
        ]);
    }
}
