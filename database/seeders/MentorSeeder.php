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
        Role::create([
            'name' => 'guru',
            'guard_name' => 'web',
        ]);

        $data = [
            [
                'username' => 'mentoribudessi',
                'nip_guru' => '4733753654230092',
                'nama_guru' => 'Dessi Andriani, S. T.',
                'jenis_kelamin' => 'P',
                'no_telp' => '085313417408',
            ],

            [
                'username' => 'mentoribukani',
                'nip_guru' => '',
                'nama_guru' => 'Kani Muthmainnah, S. T., M. Ars.',
                'jenis_kelamin' => 'P',
                'no_telp' => '085863286663',
            ],

            [
                'username' => 'mentorpaanggi',
                'nip_guru' => '',
                'nama_guru' => 'Moch. Anggi Kusumah, S. Pd.',
                'jenis_kelamin' => 'L',
                'no_telp' => '085723212904',
            ],

            [
                'username' => 'mentorpaluki',
                'nip_guru' => '',
                'nama_guru' => 'R. Luki Muharam, S. ST.',
                'jenis_kelamin' => 'L',
                'no_telp' => '081912748722',
            ],

            [
                'username' => 'mentoribusri',
                'nip_guru' => '',
                'nama_guru' => 'Sri Mulyani, S. Pd.',
                'jenis_kelamin' => 'P',
                'no_telp' => '087794477734',
            ],

            [
                'username' => 'mentorpatatang',
                'nip_guru' => '',
                'nama_guru' => 'Tatang Sudrajat, S. Pd.',
                'jenis_kelamin' => 'L',
                'no_telp' => '081912219430',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama_guru'],
                'username' => $item['username'],
                'password' => Hash::make('mentordpib2024'),
            ]);

            DB::table('mentors')->insert([
                [
                    'nama_guru' => $item['nama_guru'],
                    'nip_guru' => $item['nip_guru'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'no_telp' => $item['no_telp'],
                    'id_user' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $user->assignRole('guru');
        }
    }
}
