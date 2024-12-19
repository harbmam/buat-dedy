<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class mahasantriseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasantri')->insert(
            [
                [
                    'nama' => 'Bedu', 'nim' => '240210', 'dosen_id' => 3,
                    'jurusan_id' => 2
                ],
                [
                    'nama' => 'Bambang', 'nim' => '240105', 'dosen_id' => 1,
                    'jurusan_id' => 1
                ],
                [
                    'nama' => 'Bobby', 'nim' => '240207', 'dosen_id' => 2,
                    'jurusan_id' => 2
                ]
            ]);
    }
}
