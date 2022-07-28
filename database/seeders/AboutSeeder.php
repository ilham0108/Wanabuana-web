<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            'id'            => "1",
            'about'         => '<h2><strong>Lahirnya Wanabuana</strong></h2>

            <p>Mapala Wanabuana lahir pada tahun 1998, tepatnya pada tanggal 28 September 1998. Awal didirikan, Mapala Wanabuana berada dibawah naungan LKP Aksmi Kusuma Bangsa.&nbsp;Wanabuana pada awalnya hanya sekumpulan remaja yang menempuh kursus di sebuah LPK, setelah beberapa kali sharing akhirnya diputuskanlah untuk membentuk sebuah organisasi yang berorientasi pada gerakan pecinta alam.&nbsp;Setelah berjalan sekitar satu bulan, hingga pada akhir september 1998 terkumpul 24 orang yang sepakat mendirikan organisasi pecinta alam dengan nama WANABUANA.&nbsp;</p>
            
            <p>Untuk melaksanakan berbagai kegiatan termasuk pendidikan dan pelatihan, wanabuana dilatih oleh Argawana (Mapala AUB Surakarta). Untuk materi kelas dilaksanakan selama 5 hari, sedangkan untuk materi praktek selama 3 hari. Pada 26 september 1997 seluruh peserta sejumlah 24 diberangkatkan menuju lokasi pelatihan di kaki gunung Lawu, perbukitan Djobolarangan menjadi saksi perjalanan terbentuknya Wanabuana selama 3 hari.</p>
            
            <p>Pada tanggal 28 september 1998 jam 6 pagi saat kabut tipis menyelimuti puncak Lawu secara serentak peserta Diklat I Wanabuana dengan sandi Lentera Alam mengucapkan janji untuk bersama dalam naungan Wanabuana. Dan tanggal 28 September akhirnya dijadikan hari jadi Wanabuana.</p>
            
            <p>Pada tahun 2002 Wanabuana resmi menjadi Mapala AMIK Harapan Bangsa Surakarta Kampus. Kini Mapala Wanabuana telah berada dibawah naungan Universitas Duta Bangsa Surakarta dengan status sebagai mapala universitas.</p>
            
            <p>&nbsp;</p>
            
            <h2><strong>Makna Sebuah Nama</strong></h2>
            
            <p><strong>Wanabuana&nbsp;</strong>terdiri dari gabungan 2 suku kata, yaitu&nbsp;<strong>WANA&nbsp;</strong>dan <strong>BUANA&nbsp;</strong>dimana <strong>WANA&nbsp;</strong>sendiri memiliki arti <strong>HUTAN&nbsp;</strong>dan <strong>BUANA&nbsp;</strong>memiliki arti <strong>BUMI. </strong>Maka dari itu tersebut diharapkan organisasi wanabuana ini dapat berguna bagi alam dan juga masyarakat sekitarnya.&nbsp;&nbsp;</p>
            
            <p>&nbsp;</p>
            
            <h2><strong>Lambang Wanabuana</strong></h2>
            
            <p>Lambang Wanabuana mengalami beberapa kali perubahan, pada awal dibentuk memiliki lambang seekor burung garuda dengan 5 helai bulu sayap, sebuah jarum kompas, tali simpul, dan tiga helai bulu ekor. Pada tahun 2003 Wanabuana menjadi Mapala, atas inisiatif bersama dirasa perlu diadakan perubahan lambang.</p>
            
            <p>Kemudian oleh A Conk/WNB. 98. 023. LA/Lentera Alam &lsquo;98 yang tergabung dalam Dewan Pendiri dirancang sebuah lambang yang masih dipakai sampai sekarang.</p>
            
            <p><strong>MAKNA LAMBANG WANABUANA</strong></p>
            
            <ul>
                <li><strong>GARIS VERTIKAL</strong>&nbsp; &nbsp; &nbsp; &nbsp;: HUBUNGAN ANTARA MANUSIA DENGAN TUHAN.</li>
                <li><strong>GARIS HORIZONTAL</strong> : HUBUNGAN MANUSIA DENGAN SESAMA/LINGKUNGAN</li>
                <li><strong>KOMPAS</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: TUJUAN/MENGHUBUNGKAN GARIS VERTIKAL &amp; HORIZONTAL</li>
                <li><strong>LINGKARAN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>: PERSAUDARAAN YANG ABADI</li>
                <li><strong>TULISAN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>: IDENTITAS WANABUANA</li>
            </ul>
            
            <h2>&nbsp;</h2>
            
            <h2><strong>Divisi Wanabuana</strong></h2>
            
            <ul>
                <li>Emergency</li>
                <li>Navigasi</li>
                <li>Gunung Hutan</li>
                <li>Survival</li>
            </ul>
            
            <p>&nbsp;</p>
            
            <h2><strong>Generasi Wanabuana</strong></h2>
            
            <p>Dari awal berdirinya wanabuana hingga kini, selalu lahirlah wanabuana-wanabuana muda yang tangguh dan memiliki prinsip. hingga saat ini, wanabuana telah memiliki total 21 generasi angkatan dan memiliki total lebih dari 250 anggota.</p>
            
            <ol>
                <li>Lentera Alam</li>
                <li>Dahana Lembah</li>
                <li>Fajar Kartika&nbsp;</li>
                <li>Surya Bawana</li>
                <li>Lintang kabut</li>
                <li>Pelangi Rimba</li>
                <li>Tirta Paksa</li>
                <li>Bara Rimba</li>
                <li>Lelana Wiratama</li>
                <li>Bayu Arga</li>
                <li>Kabut Purnama&nbsp;</li>
                <li>512</li>
                <li>Giri Tirta&nbsp;</li>
                <li>Lintang mentari&nbsp;</li>
                <li>Hadicayapata</li>
                <li>Cemara Ranak</li>
                <li>Lembah Pradana</li>
                <li>Sandhiya Giri</li>
                <li>Emulsi Belantara&nbsp;</li>
                <li>Abhinaya Eka</li>
                <li>Nawa puspa</li>
            </ol>
            
            <p>&nbsp;</p>
            
            <p>&nbsp;</p>',
            'image'         => 'gabungan.png',
            'created_at'    => new \DateTime,
            'updated_at'    => null,
        ];
        DB::table('about')->insert($about);
    }
}
