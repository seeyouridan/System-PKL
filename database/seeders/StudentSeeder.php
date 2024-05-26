<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'siswa',
            'guard_name' => 'web'
        ]);
        
        $data = [
            [
                'password' => Hash::make('Password123'),
                'nis' => '222310014',
                'nama' => 'M. Mardi',
                'jenis_kelamin' => 'L',
                'id_jurusan' => '1',
                'id_guru' => '1',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama'],
                'username' => $item['nis'],
                'password' => $item['password'],
            ]);

            DB::table('students')->insert([
                [
                    'nis' => $item['nis'],
                    'nama' => $item['nama'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'id_jurusan' => $item['id_jurusan'],
                    'id_guru' => $item['id_guru'],
                    'id_user' => $user->id,
                ],
            ]);

            $user->assignRole('siswa');
        }
    }
}
