<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\AnggotaHasil;
use App\Models\AnggotaOrganisasi;
use App\Models\Hasil;
use App\Models\HasilAnggota;
use App\Models\Jadwal;
use App\Models\Olahraga;
use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Usamah Hafidz',
            'username' => 'usamah',
            'email' => 'usamah@gmail.com',
            // buat passwordnya pake bcrypt
            'password' => bcrypt('32018')
        ]); 

        Olahraga::create([
            'name' => 'Sepak Bola',
            'slug' => 'sepak-bola',
           
        ]);
        Olahraga::create([
            'name' => 'Bulu Tangkis',
            'slug' => 'bulu-tangkis',
           
        ]);

        Organisasi::create([
            'name' => 'Bintang Timur',
            'slug' => 'bintang-timur',
            'year' => 2021,
            'address' => "Surakarta",
            'olahraga_id' => 1
        ]);

        Organisasi::create([
            'name' => 'Elang Emas',
            'slug' => 'elang-emas',
            'year' => 2019,
            'address' => "Yogyakarta",
            'olahraga_id' => 2

        ]);

        Anggota::create([
            'name' => 'Usamah',
            'slug' => 'usamah',
            'height' => 170,
            'weight' => 60,
            // 'position' => 'Ketua',
            'number' => '089669235897',
            // 'organisasi_id'=> 1,
        ]);

        Anggota::create([
            'name' => 'Abdul Hanif',
            'slug' => 'abdul-hanif',
            'height' => 165,
            'weight' => 50,
            // 'position' => 'Anggota',
            'number' => '089669235898',
            // 'organisasi_id'=> 2,       
        ]);

        Anggota::create([
            'name' => 'Ahmad',
            'slug' => 'ahmad',
            'height' => 180,
            'weight' => 80,
            // 'position' => 'Anggota',
            'number' => '089669235895',
            // 'organisasi_id'=> 2,       
        ]);

        AnggotaOrganisasi::create([
           
            'organisasi_id'=> 1,
            'anggota_id'=> 1,
            'position' => 'Anggota',
            // 'number' => '089669235898',
        ]);

        AnggotaOrganisasi::create([
           
            'organisasi_id'=> 1,
            'anggota_id'=> 3,
            'position' => 'Staff',
            // 'number' => '089669235898',
        ]);


        AnggotaOrganisasi::create([
           
            'organisasi_id'=> 2,
            'anggota_id'=> 2,
            'position' => 'Anggota',
            // 'number' => '089669235897',
        ]);

      

        Jadwal::create([
            'name'=>'Ospek Karyawan',
            'organisasi_id' => '1',
            'date'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2022'),
            'time'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),
            'desc' => 'Rapat anggota baru',
            'priority' => 'wajib',



            // 'waktu' =>Carbon::parse('12:00')
        ]);

        Hasil::create([
            'jadwal_id' => '1',
            'resume' => 'Tempat : Bale Angkasa Jaya, Kabupaten Garut',

            // Judul seminar : “Menjadi Wirausaha Sukses di Era Digital”
            
            // Resume oleh : Hari Wibowo, S.Pd.
            
            // Acara seminar ini dibuka oleh ketua panitia penyelenggara dari Forum Pengusaha Riba Kabupaten Garut yakni Agus Bagus. Ia menyampaikan tujuan acara adalah untuk menumbuhkan semangat dan keberlanjutan dunia UMKM Kabupaten Garut di era digital. Menghadirkan dua orang pembicara yakni Hadi Rukito, S.E. (Ketua Asosiasi UMKM Kabupaten Garut) dan Rama Sucipto (Pengusaha Muda Berprestasi Kabupaten Garut)',           
            'result' => 'Meningkatkan kompetensi tenaga kependidikan dan pendidik
            Meningkatkan pemahaman peserta seminar tentang kurikulum 2013',
        
        ]);

        AnggotaHasil::create([
            'hasil_id'=>1,
            'anggota_id'=>1,
            'contribution'=>'Mc Acara'
        ]);
        AnggotaHasil::create([
            'hasil_id'=>1,
            'anggota_id'=>3,
            'contribution'=>'Penanggung Jawab'
        ]);
    }
}
