<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// tambahkan ini
use DB;
class matkulseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matkul')->insert(
            [
                [
                    'kode_mk' => 'MK01', 'nama' => 'Web Design'
                ],
                [
                    'kode_mk' => 'MK02', 'nama' => 'Fundamental Digital Marketing'
                ],
                [
                    'kode_mk' => 'MK03', 'nama' => 'Database SQL'
                ],
                [
                    'kode_mk' => 'MK04', 'nama' => 'Multi Media'
                ]
            ]);
    }
}
