<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instances')->insert(
            [
                [
                    'kode_instansi' => 'INS001',
                    'nama_instansi' => 'CV. GRAHA TEKNIK',
                    'kuota' => '6',
                    'alamat' => 'Jl. Aria Cikondang No 8 RT/RW 003/007, Kel. Sawah Gede, Cianjur',
                    'id_kota' => '1',
                    'no_telp' => '085797306040',
                    'id_guru' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS002',
                    'nama_instansi' => 'CV. GUBAH',
                    'kuota' => '5',
                    'alamat' => 'Gg. Margaluyu No.92 b, Sayang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43213',
                    'id_kota' => '1',
                    'no_telp' => '0815-6363-9156',
                    'id_guru' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS003',
                    'nama_instansi' => 'DISPERKIM',
                    'kuota' => '1',
                    'alamat' => 'Jl. Kawaluyaan Indah Raya No.4, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286',
                    'id_kota' => '1',
                    'no_telp' => '(022) 7319735',
                    'id_guru' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS004',
                    'nama_instansi' => "DUD'S PROJECT",
                    'kuota' => '4',
                    'alamat' => 'Jl. Ir. H. Juanda No.80, Mekarsari, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43211',
                    'id_kota' => '1',
                    'no_telp' => '0812-2394-0207',
                    'id_guru' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS005',
                    'nama_instansi' => 'PERUMNAS PI',
                    'kuota' => '2',
                    'alamat' => 'Jl. Raya Cibeber, Sukasari, Kec. Cilaku, Kabupaten Cianjur, Jawa Barat 43285',
                    'id_kota' => '1',
                    'no_telp' => '-',
                    'id_guru' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS006',
                    'nama_instansi' => 'CV. TSULUST',
                    'kuota' => '2',
                    'alamat' => 'Jl. Bungursari VI No.7, Pasirlayung, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40192',
                    'id_kota' => '2',
                    'no_telp' => '-',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS007',
                    'nama_instansi' => 'CV. GANESA',
                    'kuota' => '2',
                    'alamat' => 'Jl.Dipenogoro no 27, Citarum, Kec. Bandung Wetan, Kota Bandung',
                    'id_kota' => '2',
                    'no_telp' => '081284959767',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS008',
                    'nama_instansi' => 'CV. INFRA DYNAMIC INDONESIA',
                    'kuota' => '4',
                    'alamat' => 'Terrace Pelangi Arjasari Blok F8 Baros, Kec. Arjasari, Kabupaten Bandung, Jawa Barat',
                    'id_kota' => '2',
                    'no_telp' => '082295599849',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS009',
                    'nama_instansi' => 'PT. ASIMETRIS REKAYASA INDONESIA',
                    'kuota' => '4',
                    'alamat' => 'Jl. Bukit Arcamanik Ruko 19 D RT/RW 003/009, Kec. Cimenyan, Kab. Bandung, Jawa Barat',
                    'id_kota' => '2',
                    'no_telp' => '085871040780',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS010',
                    'nama_instansi' => 'PT. ISA WANI KARYA',
                    'kuota' => '1',
                    'alamat' => 'Jl. Sentra utama, No 30, Komolek Town Place Kota Cimahi, Jawa Barat',
                    'id_kota' => '2',
                    'no_telp' => '085794471347',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS011',
                    'nama_instansi' => 'PT. MODUL TRI ARBA',
                    'kuota' => '3',
                    'alamat' => 'Jl. Eboni, Cisaranten Kidul, Kec. Gedebage, Kota Bandung, Jawa Barat 40295',
                    'id_kota' => '2',
                    'no_telp' => '-',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS012',
                    'nama_instansi' => 'PT. NEW ACITYA',
                    'kuota' => '4',
                    'alamat' => 'Jl. Doktor Muwardi, Gg. Perjuangan, Cianjur 1393668',
                    'id_kota' => '1',
                    'no_telp' => '-',
                    'id_guru' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS013',
                    'nama_instansi' => 'CV. TRIMACON ENGINEERING',
                    'kuota' => '5',
                    'alamat' => 'Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212',
                    'id_kota' => '1',
                    'no_telp' => '-',
                    'id_guru' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS014',
                    'nama_instansi' => 'CV. SUBA ARCH',
                    'kuota' => '3',
                    'alamat' => 'Kurnia, Meubel Jl. Balandongan No.160, Sudajaya Hilir, Kec. Baros, Kota Sukabumi, Jawa Barat 43161',
                    'id_kota' => '3',
                    'no_telp' => '0857-2588-9448',
                    'id_guru' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS015',
                    'nama_instansi' => 'PT. ANUGRAH REJEKI KREASI',
                    'kuota' => '3',
                    'alamat' => 'Rukan Artha Gading Niaga, Jl. Boulevard Artha Gading, RT.18/RW.8, Klp. Gading Bar., Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14240',
                    'id_kota' => '4',
                    'no_telp' => '(021) 45850857',
                    'id_guru' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS016',
                    'nama_instansi' => 'PT. LUNADI KONSTRUKSI MANDIRI',
                    'kuota' => '1',
                    'alamat' => 'Jl. Raya Puncak No 396 RT/RW 005/006, Bogor',
                    'id_kota' => '4',
                    'no_telp' => '085881567970',
                    'id_guru' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS017',
                    'nama_instansi' => 'DESIGN NINE',
                    'kuota' => '4',
                    'alamat' => 'Ariobimo Central 4th floor Jl. H.R.Rasuna Said Kav.X-2 No.5, RT.9/RW.4, Kuningan Tim., Kecamatan Setiabudi, Jakarta, Daerah Khusus Ibukota Jakarta 12950',
                    'id_kota' => '5',
                    'no_telp' => '(021) 52909160',
                    'id_guru' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'kode_instansi' => 'INS018',
                    'nama_instansi' => 'PT. TATA MULIA NUSANTARA INDAH',
                    'kuota' => '1',
                    'alamat' => 'Jl. Rawa Gelam II, Jatinegara, Kec. Pulo Gadung, Jakarta',
                    'id_kota' => '5',
                    'no_telp' => '082295599849',
                    'id_guru' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
