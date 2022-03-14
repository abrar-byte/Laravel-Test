<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Hasil;
use App\Models\Jadwal;
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

        Organisasi::create([
            'name' => 'PSSI',
            'slug' => 'pssi',
            'year' => 2021,
            'address' => "Surakarta",
            'sport' => "Sepak Bola"
        ]);

        Organisasi::create([
            'name' => 'PBSI',
            'slug' => 'pbsi',
            'year' => 2019,
            'address' => "Yogyakarta",
            'sport' => "Bulu Tangkis"
        ]);

        Anggota::create([
            'name' => 'Usamah',
            'slug' => 'usamah',
            'height' => 170,
            'weight' => 60,
            'position' => 'Ketua',
            'number' => '089669235897',
            'organisasi_id'=> 1,
        ]);

        Anggota::create([
            'name' => 'Abdul Hanif',
            'slug' => 'abdul-hanif',
            'height' => 165,
            'weight' => 50,
            'position' => 'Anggota',
            'number' => '089669235898',
            'organisasi_id'=> 2,       
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
            'resume' => 'Tempat : Bale Angkasa Jaya, Kabupaten Garut

            Judul seminar : “Menjadi Wirausaha Sukses di Era Digital”
            
            Resume oleh : Hari Wibowo, S.Pd.
            
            Acara seminar ini dibuka oleh ketua panitia penyelenggara dari Forum Pengusaha Riba Kabupaten Garut yakni Agus Bagus. Ia menyampaikan tujuan acara adalah untuk menumbuhkan semangat dan keberlanjutan dunia UMKM Kabupaten Garut di era digital. Menghadirkan dua orang pembicara yakni Hadi Rukito, S.E. (Ketua Asosiasi UMKM Kabupaten Garut) dan Rama Sucipto (Pengusaha Muda Berprestasi Kabupaten Garut).
            
            Sesi 1:
            Narasumber : Hadi Rukito, S.E. (Ketua Asosiasi UMKM Kabupaten Garut)
            
            Topik : Hal Hal yang Harus Disiapkan Pebisnis di Era Digital
            
            Membuka materinya, Bapak Hadi mengingatkan seluruh peserta agar mau beradaptasi dengan perkembangan teknologi. Ada kutipan menarik darinya, yakni “Berinovasi atau mati”
            
            Selanjutnya, ia menyampaikan poin poin yang harus pengusaha UMKM persiapkan di era digital. Antara lain:
            
            Kemauan untuk belajar dan membuka wawasan.
            Memanfaatkan sumber sumber belajar yang ada di Internet. Baik dari Google, Youtube, dan lainnya.
            Selalu terhubung dengan komunitas pengusaha untuk senantiasa update mengenai berbagai informasi terbaru.
            Mulai fokus dalam saluran pemasaran digital. Ia menyarankan fokus dulu pada satu saluran. Misalnya Facebook, Instagram, atau Marketplace.
            Melakukan efisiensi operasional dengan memanfaatkan berbagai produk teknologi terbaru.
            Menurutnya, dengan melakukan kelima hal di atas, pengusaha UMKM akan mampu bertahan di tengah persaingan dunia digital.
            
            Sesi 2
            Narasumber: Rama Sucipto (Pengusaha Muda Berprestasi Kabupaten Garut).
            
            Topik : “Tantangan Bisnis Digital dan Cara Mengatasinya”
            
            Dalam sesi kedua, Kang Rama selaku narasumber yang sudah aktif menggunakan media digital sebagai sarana bisnis menceritakan pengalamannya. Yakni seputar tantangan ia alami dalam bisnis dan juga cara untuk mengatasinya.
            
            Menurut Kang Rama, ada beberapa tantangannya:
            
            Gagap teknologi atau gaptek jadi kendala. Terutama karena banyak keterampilan digital belum dipelajari di sekolah.
            Perkembangan pemasaran digital sangat cepat. Selalu ada hal baru.
            Kompetitor semakin kompetitif saat ini, daya saing jadi tinggi.
            Untuk bisa sukses besar dalam waktu singkat, perlu modal tidak sedikit.
            Agar bisa mengatasinya, Kang Rama berbagi beberapa tipsnya:
            
            Mengubah mindset. Gaptek itu hanya alasan kemalasan, pasti bisa dilawan.
            Pengusaha harus banyak ikut workshop dan seminar, sekaligus membangun koneksi dengan sesama pengusaha.
            Masalah modal dapat teratasi dengan memulai dari hal hal kecil. Jangan minder mulai bisnis dengan modal kecil.
            Sesi 3
            Dalam sesi terakhir, ada forum tanya jawab. Dalam sesi ini, ada dua orang penanya dan dua pertanyaan. Masing masing pemateri menjawab satu pertanyaan.
            
            Penanya 1: Haris Ramadhan
            
            Pertanyaan: Apakah promosi dengan menggunakan sosial media tergolong efektif?
            
            Jawaban narasumber 1: Masalah efektifitas sangat bergantung dari pengusaha yang menjalankannya. Setiap saluran pemasaran punya potensi untuk bisa optimal. Termasuk untuk Facebook.
            
            Khusus untuk Facebook, ada dua strategi pemasaran. Yakni strategi organik dan strategi dengan iklan facebook ads. Jika pengusaha punya modal, pak Hadi menyarankan agar menggunakan Facebook ads.
            
            Penanya 2 : Supangkat
            
            Pertanyaan : Saya pernah dengar pemasaran dengan SEO tapi masih belum paham. Apakah pemateri bisa membantu saya memahaminya?
            
            Jawaban narasumber 2: SEO adalah singkatan dari search engine optimization. Intinya pemasaran dengan memaksimalkan fungsi mesin pencari. Sebagai pemasar, kita berusaha agar situs atau toko online bisa ditemukan oleh orang orang yang mencari informasi di Google. Strategi in bisa efektif asal pengusaha bisa memainkannya.',
            'persons' => 'Usamah, Abdul Hanif',
            'contribution' => 'Pengembangan Organisasi',
            'result' => 'Meningkatkan kompetensi tenaga kependidikan dan pendidik
            Meningkatkan pemahaman peserta seminar tentang kurikulum 2013',
        
        ]);
    }
}
