<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert(
            [
                [
                    'kode_jurusan' => 'DPIB001',
                    'nama_jurusan' => 'DPIB 1',
                    'jml_siswa' => 29,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_jurusan' => 'DPIB001',
                    'nama_jurusan' => 'DPIB 1',
                    'jml_siswa' => 21,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
