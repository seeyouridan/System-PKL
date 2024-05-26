<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the 'guru' role with guard set to 'web'
        Role::create([
            'name' => 'guru',
            'guard_name' => 'web',
        ]);

        $data = [
            [
                'username' => 'dessi@gmail.com',
                'password' => Hash::make('Password123'),
                'nip_guru' => '4733753654230092',
                'nama_guru' => 'Desi Andriani, S.Sn',
                'jenis_kelamin' => 'P',
                'no_telp' => '085313417408',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama_guru'],
                'username' => $item['username'],
                'password' => $item['password'],
            ]);
            
            DB::table('mentors')->insert([
                [
                    'nip_guru' => $item['nip_guru'],
                    'nama_guru' => $item['nama_guru'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'no_telp' => $item['no_telp'],
                    'id_user' => $user->id,
                ],
            ]);

            $user->assignRole('guru');
        }
    }
}
