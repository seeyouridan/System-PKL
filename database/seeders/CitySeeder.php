<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert(
            [
                [
                    'kota' => 'Cianjur',
                    'jml_instansi' => '27',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kota' => 'Bandung',
                    'jml_instansi' => '16',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kota' => 'Sukabumi',
                    'jml_instansi' => '3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kota' => 'Bogor',
                    'jml_instansi' => '4',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kota' => 'Jakarta',
                    'jml_instansi' => '5',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
