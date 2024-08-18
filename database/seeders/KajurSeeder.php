<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KajurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'kajur',
            'guard_name' => 'web'
        ]);

        $data = [
            [
                'username' => 'wawan@gmail.com',
                'nip_guru' => '19681130 199801 1 002',
                'nama_guru' => 'Wawan Syamsul Rizal, S.Pd',
                'jenis_kelamin' => 'L',
                'no_telp' => '087710903377',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama_guru'],
                'username' => $item['username'],
                'password' => Hash::make('kajurdpib2024'),
            ]);

            DB::table('mentors')->insert([
                [
                    'nip_guru' => $item['nip_guru'],
                    'nama_guru' => $item['nama_guru'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'no_telp' => $item['no_telp'],
                    'id_user' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $user->assignRole('kajur');
        }
    }
}
