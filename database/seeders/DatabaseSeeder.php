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

        // admin 
        User::create([
            'name' => 'Usamah Hafidz',
            'username' => 'usamah',
            'email' => 'usamah@gmail.com',
            // buat passwordnya pake bcrypt
            'password' => bcrypt('bismillah32018')
        ]); 

        User::create([
            'name' => 'Ali Putin',
            'username' => 'putin',
            'email' => 'putin18@gmail.com',
            // buat passwordnya pake bcrypt
            'password' => bcrypt('brazikowas22')
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


        Organisasi::create([
            'name' => 'Rebellion',
            'slug' => 'rebellion',
            'year' => 2019,
            'address' => "Jakarta",
            'olahraga_id' => 1

        ]);

        Anggota::create([
            'name' => 'Usamah',
            'slug' => 'usamah',
            'height' => 170,
            'weight' => 60,
            'number' => '089669235897',
        ]);

        Anggota::create([
            'name' => 'Abdul Hanif',
            'slug' => 'abdul-hanif',
            'height' => 165,
            'weight' => 50,
            'number' => '089669235898',
        ]);

        Anggota::create([
            'name' => 'Ahmad',
            'slug' => 'ahmad',
            'height' => 180,
            'weight' => 80,
            'number' => '089669235895',
        ]);

        AnggotaOrganisasi::create([
           
            'organisasi_id'=> 1,
            'anggota_id'=> 1,
            'position' => 'Anggota',
        ]);

        AnggotaOrganisasi::create([           
            'organisasi_id'=> 1,
            'anggota_id'=> 3,
            'position' => 'Staff',
        ]);


        AnggotaOrganisasi::create([
           
            'organisasi_id'=> 2,
            'anggota_id'=> 2,
            'position' => 'Anggota',
        ]);

      

        Jadwal::create([
            'name'=>'Tebar Sedekah',
            'organisasi_id' => '1',
            'date'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2022'),
            'time'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),
            'desc' => 'Bagi-bagi sedekah di area Semanggi',
            'priority' => 'wajib',

        ]);

        Hasil::create([
            'jadwal_id' => '1',
            'resume' => '<div>
            <div>Salah satu kegiatan rutinan dari Bintang Timur adalah Kegiatan Berbagi Sedekah. Kegiatan ini rutin dilakukan guna membantu masyarakat sekitar yang membutuhkan.</div>

            <div>Acara Tebar Sedekah ini diadakan tiap minggu. Dimana pelaksanaan nya di berbagai tempat di Surakarta</div></div>',                 
            'result' => 'Mempererat hubungan dengan masyarakat sekitar dan membantu meringankan masyarakat',
        
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
