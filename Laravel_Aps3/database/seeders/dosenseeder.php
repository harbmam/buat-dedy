<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class dosenseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert(
            [
                [
                    'nama' => 'Usro', 'email' => 'ppl1@gmail.com', 'hp' => '0821-'. rand(),
                    'alamat' => 'Surabaya', 'matakuliah_id' => 1
                ],
                [
                    'nama' => 'Ucup', 'email' => 'dm1@gmail.com', 'hp' => '0821-'. rand(),
                    'alamat' => 'Jombang', 'matakuliah_id' => 2
                ],
                [
                    'nama' => 'Ucok', 'email' => 'dm2@gmail.com', 'hp' => '0821-'. rand(),
                    'alamat' => 'Malang', 'matakuliah_id' => 4
                ]
            ]);
    }
}
