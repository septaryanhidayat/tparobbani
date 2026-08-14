<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin User
        User::updateOrCreate(
            ['email' => 'tpa@sitrobbani.sch.id'],
            [
                'name' => 'Admin TPA Robbani',
                'password' => Hash::make('p4l3mb4ng'),
            ]
        );

        // 2. Seed Default Settings
        $defaultSettings = [
            'site_name' => 'TPA Robbani',
            'site_tagline' => 'Taman Penitipan Anak (TPA) Robbani',
            'announcement_badge' => 'KUOTA TERBATAS!',
            'announcement_text' => 'Pendaftaran TPA Robbani Tahun Ajaran 2025/2026 Telah Dibuka!',
            'hero_badge' => 'BURUAN DAFTAR! KUOTA TERBATAS 2025 / 2026',
            'hero_title' => 'Taman Penitipan Anak TPA ROBBANI',
            'hero_subtitle' => 'Tempat terbaik untuk tumbuh kembang, kecerdasan, dan karakter ananda. Lingkungan yang aman, penuh kasih sayang, bersih, ber-AC, & berlandaskan nilai keislaman.',
            'hero_image' => 'images/hero-kids.png',
            
            // Pricing & Requirements
            'registration_fee' => 'Rp 200.000',
            'requirements_list' => "Membayar uang pendaftaran Rp 200.000,-\nMengisi Formulir dan Surat Pernyataan Orang Tua\nFotokopi Kartu Keluarga (KK) 1 Lembar\nFotokopi Akta Kelahiran Anak 1 Lembar\nFotokopi KTP Orang Tua masing-masing 1 lembar",

            // TPA Pusat
            'pusat_name' => 'TPA Pusat',
            'pusat_address' => 'Jl Sarjana, Blok C17 Timbangan',
            'pusat_district' => 'Kec. Indralaya Utara, Kab. Ogan Ilir, Timbangan',
            'pusat_phone' => '0811747472',
            'pusat_phone_formatted' => '0811 7474 72',

            // TPA Cabang
            'cabang_name' => 'TPA Cabang',
            'cabang_address' => 'Griya Sejahtera 7 A4 No. 5',
            'cabang_district' => 'Kec. Indralaya Utara, Kab. Ogan Ilir',
            'cabang_phone' => '082378176209',
            'cabang_phone_formatted' => '0823 7817 6209',

            // Operational hours
            'operational_hours' => 'Senin - Sabtu (07:00 - 17:00 WIB)',
        ];

        foreach ($defaultSettings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Seed Activities if empty
        if (Activity::count() === 0) {
            $activities = [
                [
                    'title' => 'Belajar Mengenal Huruf Dasar',
                    'desc' => 'Mengenalkan huruf abjad dengan metode visual, lagu, dan permainan edukatif interaktif.',
                    'icon' => 'font-case',
                    'color' => 'from-pink-500 to-rose-500',
                    'order' => 1,
                ],
                [
                    'title' => 'Belajar Mengenal Huruf Hijaiyah',
                    'desc' => 'Pembiasaan bacaan Iqro & pengenalan huruf Hijaiyah sejak dini dengan cara yang menyenangkan.',
                    'icon' => 'book-open',
                    'color' => 'from-purple-500 to-indigo-500',
                    'order' => 2,
                ],
                [
                    'title' => 'Bermain Motorik Halus & Kasar',
                    'desc' => 'Stimulasi ketangkasan, koordinasi mata-tangan, keseimbangan, serta stimulasi fisik tumbuh kembang.',
                    'icon' => 'puzzle-piece',
                    'color' => 'from-cyan-500 to-blue-500',
                    'order' => 3,
                ],
                [
                    'title' => 'Menggambar dan Mewarnai',
                    'desc' => 'Mengasah imajinasi, mengekspresikan seni warna, dan melatih konsentrasi jari jemari anak.',
                    'icon' => 'paint-brush',
                    'color' => 'from-amber-400 to-orange-500',
                    'order' => 4,
                ],
                [
                    'title' => 'Makan Bersama',
                    'desc' => 'Menanamkan adab berdoa sebelum & sesudah makan, kemandirian menyuap, dan pola makan sehat.',
                    'icon' => 'cake',
                    'color' => 'from-emerald-500 to-teal-600',
                    'order' => 5,
                ],
                [
                    'title' => 'Tidur Siang',
                    'desc' => 'Istirahat teratur di kamar tidur yang nyaman, bersih, ber-AC, dan terpantau dengan penuh kasih sayang.',
                    'icon' => 'moon',
                    'color' => 'from-violet-500 to-fuchsia-600',
                    'order' => 6,
                ],
            ];
            foreach ($activities as $act) {
                Activity::create($act);
            }
        }

        // 4. Seed Facilities if empty
        if (Facility::count() === 0) {
            $facilities = [
                [
                    'title' => 'Area Bermain Nyaman & Ber-AC',
                    'desc' => 'Ruangan ber-AC yang dingin, bersih, dan luas agar anak bebas bermain tanpa merasa gerah.',
                    'image' => 'images/play-area.png',
                    'tag' => 'Kenyamanan Utama',
                    'order' => 1,
                ],
                [
                    'title' => 'Alat Penunjang Edukatif (APE)',
                    'desc' => 'Mainan edukasi lengkap penunjang tumbuh kembang motorik, logika, dan sensorik anak.',
                    'image' => 'images/learning-hijaiyah.png',
                    'tag' => 'Edukasi & Stimulasi',
                    'order' => 2,
                ],
                [
                    'title' => 'Ruang Makan Representatif',
                    'desc' => 'Tempat makan bersih, berestetika, dan higienis khusus anak untuk makan bersama dengan menyenangkan.',
                    'image' => 'images/dining-kitchen.png',
                    'tag' => 'Kesehatan & Adab',
                    'order' => 3,
                ],
                [
                    'title' => 'Kamar Tidur',
                    'desc' => 'Kasur empuk, wangi, sprei bersih, dan suasana tenang untuk tidur siang yang berkualitas.',
                    'image' => 'images/bedroom.png',
                    'tag' => 'Istirahat Nyaman',
                    'order' => 4,
                ],
                [
                    'title' => 'Dapur & Lemari Es',
                    'desc' => 'Fasilitas dapur dan kulkas untuk menyimpan serta menyiapkan MPASI, susu, & makanan anak secara higienis.',
                    'image' => 'images/dining-kitchen.png',
                    'tag' => 'Higienis & Steril',
                    'order' => 5,
                ],
                [
                    'title' => 'Toilet (Heater & Cooler)',
                    'desc' => 'Kamar mandi bersih khusus anak yang dilengkapi pemanas dan pendingin air (Water Heater & Cooler).',
                    'image' => 'images/bathroom.png',
                    'tag' => 'Fasilitas Modern',
                    'order' => 6,
                ],
            ];
            foreach ($facilities as $fac) {
                Facility::create($fac);
            }
        }

        // 5. Seed FAQs if empty
        if (Faq::count() === 0) {
            $faqs = [
                [
                    'question' => 'Berapa biaya pendaftaran TPA Robbani?',
                    'answer' => 'Biaya pendaftaran awal adalah sebesar Rp 200.000,- yang sudah mencakup formulir registrasi dan penyiapan berkas ananda.',
                    'order' => 1,
                ],
                [
                    'question' => 'Apa saja usia anak yang dapat dititipkan di TPA Robbani?',
                    'answer' => 'TPA Robbani menerima bayi & balita (mulai usia 3 bulan hingga usia prasekolah/PAUD).',
                    'order' => 2,
                ],
                [
                    'question' => 'Bagaimana fasilitas pengasuhan dan keamanan di TPA Robbani?',
                    'answer' => 'Semua ruangan dilengkapi AC, kasur tidur bersih, dapur higienis, toilet ber-heater/cooler, APE edukatif, dan didampingi pengasuh yang penyayang dan berpengalaman.',
                    'order' => 3,
                ],
                [
                    'question' => 'Di mana lokasi TPA Robbani?',
                    'answer' => 'TPA Robbani memiliki 2 lokasi di Indralaya Utara, Kab. Ogan Ilir: TPA Pusat di Jl Sarjana Blok C17 Timbangan, dan TPA Cabang di Griya Sejahtera 7 A4 No. 5.',
                    'order' => 4,
                ],
                [
                    'question' => 'Bagaimana cara mendaftar secara online?',
                    'answer' => 'Bunda / Ayah dapat langsung mengisi formulir pendaftaran di bagian bawah website ini. Setelah dikirim, Anda akan langsung terhubung ke WhatsApp pengasuh TPA Robbani.',
                    'order' => 5,
                ],
            ];
            foreach ($faqs as $faq) {
                Faq::create($faq);
            }
        }
    }
}
