<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_siswa' => 1,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 2,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 3,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 4,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 5,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 6,
                'id_instansi' => 1,
            ],
            [
                'id_siswa' => 7,
                'id_instansi' => 2,
            ],
            [
                'id_siswa' => 8,
                'id_instansi' => 2,
            ],
            [
                'id_siswa' => 9,
                'id_instansi' => 2,
            ],
            [
                'id_siswa' => 10,
                'id_instansi' => 2,
            ],
            [
                'id_siswa' => 11,
                'id_instansi' => 2,
            ],
            [
                'id_siswa' => 12,
                'id_instansi' => 3,
            ],
            [
                'id_siswa' => 13,
                'id_instansi' => 4,
            ],
            [
                'id_siswa' => 14,
                'id_instansi' => 4,
            ],
            [
                'id_siswa' => 15,
                'id_instansi' => 4,
            ],
            [
                'id_siswa' => 16,
                'id_instansi' => 4,
            ],
            [
                'id_siswa' => 17,
                'id_instansi' => 5,
            ],
            [
                'id_siswa' => 18,
                'id_instansi' => 5,
            ],
            [
                'id_siswa' => 19,
                'id_instansi' => 6,
            ],
            [
                'id_siswa' => 20,
                'id_instansi' => 6,
            ],
            [
                'id_siswa' => 21,
                'id_instansi' => 7,
            ],
            [
                'id_siswa' => 22,
                'id_instansi' => 7,
            ],
            [
                'id_siswa' => 23,
                'id_instansi' => 8,
            ],
            [
                'id_siswa' => 24,
                'id_instansi' => 8,
            ],
            [
                'id_siswa' => 25,
                'id_instansi' => 8,
            ],
            [
                'id_siswa' => 26,
                'id_instansi' => 8,
            ],
            [
                'id_siswa' => 27,
                'id_instansi' => 9,
            ],
            [
                'id_siswa' => 28,
                'id_instansi' => 9,
            ],
            [
                'id_siswa' => 29,
                'id_instansi' => 9,
            ],
            [
                'id_siswa' => 30,
                'id_instansi' => 9,
            ],
            [
                'id_siswa' => 31,
                'id_instansi' => 10,
            ],
            [
                'id_siswa' => 32,
                'id_instansi' => 11,
            ],
            [
                'id_siswa' => 33,
                'id_instansi' => 11,
            ],
            [
                'id_siswa' => 34,
                'id_instansi' => 11,
            ],
            [
                'id_siswa' => 35,
                'id_instansi' => 12,
            ],
            [
                'id_siswa' => 36,
                'id_instansi' => 12,
            ],
            [
                'id_siswa' => 37,
                'id_instansi' => 12,
            ],
            [
                'id_siswa' => 38,
                'id_instansi' => 12,
            ],
            [
                'id_siswa' => 39,
                'id_instansi' => 13,
            ],
            [
                'id_siswa' => 40,
                'id_instansi' => 13,
            ],
            [
                'id_siswa' => 41,
                'id_instansi' => 13,
            ],
            [
                'id_siswa' => 42,
                'id_instansi' => 13,
            ],
            [
                'id_siswa' => 43,
                'id_instansi' => 13,
            ],
            [
                'id_siswa' => 44,
                'id_instansi' => 14,
            ],
            [
                'id_siswa' => 45,
                'id_instansi' => 14,
            ],
            [
                'id_siswa' => 46,
                'id_instansi' => 14,
            ],
            [
                'id_siswa' => 47,
                'id_instansi' => 15,
            ],
            [
                'id_siswa' => 48,
                'id_instansi' => 15,
            ],
            [
                'id_siswa' => 49,
                'id_instansi' => 15,
            ],
            [
                'id_siswa' => 50,
                'id_instansi' => 16,
            ],
            [
                'id_siswa' => 51,
                'id_instansi' => 17,
            ],
            [
                'id_siswa' => 52,
                'id_instansi' => 17,
            ],
            [
                'id_siswa' => 53,
                'id_instansi' => 17,
            ],
            [
                'id_siswa' => 54,
                'id_instansi' => 17,
            ],
            [
                'id_siswa' => 55,
                'id_instansi' => 18,
            ],
        ];

        foreach ($data as $item) {
            DB::table('pkls')->insert([
                [
                    'id_siswa' => $item['id_siswa'],
                    'id_instansi' => $item['id_instansi'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
