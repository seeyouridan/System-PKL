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
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310017',
                'nama' => 'M. Zidan Maulana',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310036',
                'nama' => 'Eneng Resa Latifatul Zakiyah',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310043',
                'nama' => 'Muhamad Ilham Fakih',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310038',
                'nama' => 'Helva Hadiprawira',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310024',
                'nama' => 'Resti Faujiani',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310011',
                'nama' => 'Hera Rahmaniah',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310027',
                'nama' => 'Riska Aulia Soparina',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310033',
                'nama' => 'Ani Nurfitri',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310056',
                'nama' => 'Siti Fityatul Kamila',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310023',
                'nama' => 'Naufal Arinda Rizqullah',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310018',
                'nama' => 'Muhamad Dikri Langlang Buana',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 2,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310003',
                'nama' => 'Andra',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310012',
                'nama' => 'Jihan Novita Angel',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310021',
                'nama' => 'Muhammad Saepul Ramdan',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310454',
                'nama' => 'Muhamad Wildan',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310019',
                'nama' => 'Muhamad Rais Alfian',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310009',
                'nama' => 'Gio Deska Syafa\'at',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 3,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310008',
                'nama' => 'Farhan Maulana',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310025',
                'nama' => 'Reza Aditya',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310001',
                'nama' => 'Agil Lukman Ramadan',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310013',
                'nama' => 'M. Fauzan Hidayat',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310030',
                'nama' => 'Ady Wibowo',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310034',
                'nama' => 'Azmil Halim',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310045',
                'nama' => 'Muhammad Fatih Budiman',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310054',
                'nama' => 'Rijal Septiani',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310002',
                'nama' => 'Al - Aswag Nazaila',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310007',
                'nama' => 'Eden Abdullah',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310010',
                'nama' => 'Gun Gun Gunawan',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310028',
                'nama' => 'Siva Maharani',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310047',
                'nama' => 'Muhammad Rizal Fauzi',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310029',
                'nama' => 'Vanesha Al Ghanny',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310040',
                'nama' => 'Jihan Cahya',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310048',
                'nama' => 'Nadia Nurapipah',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310049',
                'nama' => 'Najwa Ululazmi',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310052',
                'nama' => 'Resti Nur Rahmah',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310058',
                'nama' => 'Zahra Amelia',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310015',
                'nama' => 'M. Rifcki Azwar',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 4,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310004',
                'nama' => 'Auriel Oktavia Zsahwa',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 5,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310006',
                'nama' => 'Dimas Surya Muhamad Nuralim',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 5,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310020',
                'nama' => 'Muhammad Hafidz Fauzan',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 1,
                'id_guru' => 5,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310037',
                'nama' => 'Geral Guruh Pamungkas',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 5,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310041',
                'nama' => 'M. Fachrul Hammam Romadhon',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 5,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310455',
                'nama' => 'Leah Latifah Robaniah',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 6,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310022',
                'nama' => 'Nabila',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 6,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310026',
                'nama' => 'Rida Septian Ramdani',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 1,
                'id_guru' => 6,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310035',
                'nama' => 'Dinda Avrelia',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310057',
                'nama' => 'Sri Wahyuni',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310051',
                'nama' => 'Nur Rizqi Sindi',
                'jenis_kelamin' => 'P',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310039',
                'nama' => 'Indra Pangestu',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310044',
                'nama' => 'Muhamad Rizqy Awaludin',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310046',
                'nama' => 'Muhammad Irwansyah',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310031',
                'nama' => 'Ahmad Jaki Barjanji',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310055',
                'nama' => 'Rizky Maulana Putra',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
            ],

            [
                'password' => Hash::make('Password123'),
                'nis' => '222310053',
                'nama' => 'Reza Fauzia',
                'jenis_kelamin' => 'L',
                'id_jurusan' => 2,
                'id_guru' => 7,
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
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $user->assignRole('siswa');
        }
    }
}
