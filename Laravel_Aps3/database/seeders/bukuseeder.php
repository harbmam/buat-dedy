<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class bukuseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert(
            [
                [
                    'isbn' => '111', 'judul' => 'Sejarah Kemerdekaan RI', 'thn_cetak' => 2021,
                    'stok' => 10, 'idpengarang' => 1, 'idpenerbit' => 2, 'idkategori' =>1
                ],
                [
                    'isbn' => '112', 'judul' => 'Menanam Jagung Unggul', 'thn_cetak' => 2021,
                    'stok' => 15, 'idpengarang' => 2, 'idpenerbit' => 1, 'idkategori' =>3
                ]
            ]);
    }
}
