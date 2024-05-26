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
                ],

                [
                    'kota' => 'Bandung',
                    'jml_instansi' => '16',
                ],

                [
                    'kota' => 'Sukabumi',
                    'jml_instansi' => '3',
                ],

                [
                    'kota' => 'Bogor',
                    'jml_instansi' => '4',
                ],

                [
                    'kota' => 'Jakarta',
                    'jml_instansi' => '5',
                ],
            ]
        );
    }
}
