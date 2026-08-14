@extends('layouts.app')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section id="beranda" class="relative overflow-hidden bg-tpa-hero pt-8 pb-16 lg:pt-16 lg:pb-28">
    <!-- Abstract Background Ornaments -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-pink-300/30 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-cyan-300/30 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Copywriting & CTA -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <!-- Registration Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-amber-400 to-yellow-500 text-purple-950 font-extrabold text-xs sm:text-sm shadow-md animate-bounce">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    {{ $settings['hero_badge'] ?? 'BURUAN DAFTAR! KUOTA TERBATAS 2025 / 2026' }}
                </div>

                <h1 class="font-display text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                    {{ $settings['hero_title'] ?? 'Taman Penitipan Anak TPA ROBBANI' }}
                </h1>

                <p class="text-base sm:text-xl text-slate-600 font-medium leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $settings['hero_subtitle'] ?? 'Tempat terbaik untuk tumbuh kembang, kecerdasan, dan karakter ananda. Lingkungan yang aman, penuh kasih sayang, bersih, ber-AC, & berlandaskan nilai keislaman.' }}
                </p>

                <!-- Hero Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="#pendaftaran" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-base text-white bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 hover:from-pink-700 hover:to-cyan-700 shadow-xl shadow-pink-500/25 hover:shadow-pink-500/40 transition transform hover:-translate-y-1 text-center">
                        📋 Daftar Online Sekarang
                    </a>
                    <a href="https://wa.me/62{{ $settings['pusat_phone'] ?? '0811747472' }}?text=Halo%20TPA%20Robbani,%20saya%20ingin%20bertanya%20mengenai%20pendaftaran" 
                       target="_blank" 
                       class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-base text-slate-800 bg-white border-2 border-slate-200 hover:border-emerald-500 hover:text-emerald-600 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-0.999 3.648 3.742-0.981z"/></svg>
                        Tanya via WhatsApp
                    </a>
                </div>

                <!-- Quick Highlights Bar -->
                <div class="pt-6 grid grid-cols-2 sm:grid-cols-3 gap-4 border-t border-slate-200/80">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xl">
                            ❄️
                        </div>
                        <div class="text-left">
                            <span class="block text-xs font-bold text-slate-400 uppercase">Ruangan</span>
                            <span class="text-sm font-bold text-slate-800">Nyaman & Ber-AC</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xl">
                            📖
                        </div>
                        <div class="text-left">
                            <span class="block text-xs font-bold text-slate-400 uppercase">Pendidikan</span>
                            <span class="text-sm font-bold text-slate-800">Huruf & Hijaiyah</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 col-span-2 sm:col-span-1">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl">
                            📍
                        </div>
                        <div class="text-left">
                            <span class="block text-xs font-bold text-slate-400 uppercase">Lokasi</span>
                            <span class="text-sm font-bold text-slate-800">Pusat & Cabang</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Hero Visual Image Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Decorative Gradient Frame -->
                    <div class="absolute -inset-3 rounded-3xl bg-gradient-to-tr from-pink-500 via-purple-500 to-cyan-500 opacity-30 blur-lg animate-pulse-glow"></div>
                    
                    <div class="relative bg-white rounded-3xl p-3 shadow-2xl border border-slate-100">
                        <img src="{{ asset($settings['hero_image'] ?? 'images/hero-kids.png') }}" alt="Anak-anak gembira di TPA Robbani" class="w-full h-80 sm:h-96 object-cover rounded-2xl">

                        <!-- Floating Badge 1: TPA Pusat -->
                        <div class="absolute -bottom-4 -left-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-xl border border-pink-100 flex items-center gap-3 animate-float">
                            <div class="w-12 h-12 rounded-xl bg-pink-500 text-white flex items-center justify-center font-bold text-xl shadow-md">
                                🏠
                            </div>
                            <div>
                                <span class="block text-xs font-bold text-pink-600">{{ $settings['pusat_name'] ?? 'TPA PUSAT' }}</span>
                                <span class="text-sm font-extrabold text-slate-800">{{ $settings['pusat_address'] ?? 'Jl Sarjana, Blok C17' }}</span>
                            </div>
                        </div>

                        <!-- Floating Badge 2: TPA Cabang -->
                        <div class="absolute -top-4 -right-4 bg-white/95 backdrop-blur-md rounded-2xl p-3 sm:p-4 shadow-xl border border-cyan-100 flex items-center gap-3 animate-float" style="animation-delay: 2s;">
                            <div class="w-10 h-10 rounded-xl bg-cyan-500 text-white flex items-center justify-center font-bold text-lg shadow-md">
                                🌟
                            </div>
                            <div>
                                <span class="block text-xs font-bold text-cyan-600">{{ $settings['cabang_name'] ?? 'TPA CABANG' }}</span>
                                <span class="text-sm font-extrabold text-slate-800">{{ $settings['cabang_address'] ?? 'Griya Sejahtera 7' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ================= TENTANG KAMI SECTION ================= -->
<section id="tentang" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-pink-100 text-pink-600 tracking-widest uppercase mb-3">
                Mengapa Memilih TPA Robbani?
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Pengasuhan Terbaik Berlandaskan Kasih Sayang & Edukasi Islami
            </h2>
            <p class="mt-4 text-slate-600 text-base leading-relaxed">
                Kami memahami betapa berharganya ananda bagi Ayah & Bunda. TPA Robbani hadir dengan komitmen tinggi memberikan ruang tumbuh kembang yang aman, bersih, edukatif, dan penuh kehangatan keluarga.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Pillar 1 -->
            <div class="bg-gradient-to-b from-pink-50 to-white rounded-3xl p-8 border border-pink-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-pink-500 to-rose-400 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-lg shadow-pink-500/30">
                    ❤️
                </div>
                <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Kasih Sayang Pengasuh</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pengasuh terlatih yang sabar, ramah, dan mendampingi ananda seperti anak sendiri selama Ayah & Bunda beraktivitas.
                </p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-gradient-to-b from-purple-50 to-white rounded-3xl p-8 border border-purple-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-purple-500 to-indigo-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-lg shadow-purple-500/30">
                    📖
                </div>
                <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Huruf Dasar & Hijaiyah</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Mengenalkan abjad dasar, angka, serta hafalan doa harian & huruf Hijaiyah sejak dini secara menyenangkan.
                </p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-gradient-to-b from-cyan-50 to-white rounded-3xl p-8 border border-cyan-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-cyan-500 to-blue-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-lg shadow-cyan-500/30">
                    🧩
                </div>
                <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Motorik & Kreativitas</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Dilengkapi Alat Penunjang Edukatif (APE), kolam mandi bola, menggambar, mewarnai, serta stimulasi motorik.
                </p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-gradient-to-b from-emerald-50 to-white rounded-3xl p-8 border border-emerald-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-lg shadow-emerald-500/30">
                    ❄️
                </div>
                <h3 class="font-display text-xl font-bold text-slate-900 mb-3">Ruang Ber-AC & Higienis</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Fasilitas kamar tidur nyaman, toilet dengan water heater/cooler, dapur & kulkas yang senantiasa terjaga kebersihannya.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- ================= KEGIATAN HARIAN SECTION ================= -->
<section id="kegiatan" class="py-20 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-cyan-100 text-cyan-700 tracking-widest uppercase mb-3">
                Program & Aktivitas
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Kegiatan Harian Ananda di TPA Robbani
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Setiap hari dirancang penuh dengan kegembiraan, pembelajaran positif, dan kebiasaan baik untuk menunjang tumbuh kembang optimal.
            </p>
        </div>

        <!-- Activities Grid from CMS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($activities as $index => $act)
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between group">
                <div>
                    @if($act->image)
                    <div class="h-44 overflow-hidden relative">
                        <img src="{{ asset($act->image) }}" alt="{{ $act->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 w-9 h-9 rounded-xl bg-gradient-to-r {{ $act->color ?? 'from-pink-500 to-rose-500' }} text-white flex items-center justify-center font-bold text-sm shadow-md">
                            0{{ $index + 1 }}
                        </span>
                    </div>
                    @endif

                    <div class="p-6">
                        @if(!$act->image)
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-10 h-10 rounded-xl bg-gradient-to-r {{ $act->color ?? 'from-pink-500 to-rose-500' }} text-white flex items-center justify-center font-bold text-base shadow-md">
                                0{{ $index + 1 }}
                            </span>
                            <span class="text-xs font-bold text-slate-400 bg-slate-100 px-3 py-1 rounded-full">Kegiatan Rutin</span>
                        </div>
                        @endif

                        <h3 class="font-display text-xl font-bold text-slate-900 group-hover:text-pink-600 transition mb-2">
                            {{ $act->title }}
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ $act->desc }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Learning Activity Banner Showcase -->
        <div class="mt-16 bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 rounded-3xl p-8 lg:p-12 text-white shadow-2xl relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-7 space-y-4">
                    <span class="px-3 py-1 rounded-full text-xs font-extrabold bg-amber-400 text-purple-950 inline-block">
                        PEMBELAJARAN INTERAKTIF
                    </span>
                    <h3 class="font-display text-2xl sm:text-3xl font-bold">
                        {{ $settings['learning_title'] ?? 'Pendidikan Karakter & Pengenalan Hijaiyah Sejak Dini' }}
                    </h3>
                    <p class="text-pink-100 text-sm sm:text-base leading-relaxed">
                        {{ $settings['learning_desc'] ?? 'Metode pengajaran kami menekankan pada pendekatan yang menyenangkan (play-based learning). Anak diajak belajar huruf dasar dan Hijaiyah tanpa merasa tertekan, diselingi bernyanyi dan cerita islami.' }}
                    </p>
                </div>
                <div class="lg:col-span-5">
                    <img src="{{ asset($settings['learning_image'] ?? 'images/learning-hijaiyah.png') }}" alt="Belajar Hijaiyah TPA Robbani" class="w-full h-56 object-cover rounded-2xl shadow-lg border-2 border-white/30">
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ================= FASILITAS SECTION ================= -->
<section id="fasilitas" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 tracking-widest uppercase mb-3">
                Fasilitas Lengkap
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Fasilitas Nyaman & Edukatif untuk Ananda
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Seluruh fasilitas di TPA Robbani disesuaikan khusus untuk keamanan, kenyamanan, dan higienitas anak-anak.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $facility)
            <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 group">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset($facility->image ?? 'images/play-area.png') }}" alt="{{ $facility->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-extrabold text-pink-600 shadow-sm">
                        {{ $facility->tag ?? 'Fasilitas Utama' }}
                    </span>
                </div>

                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-slate-900 mb-2 group-hover:text-pink-600 transition">
                        {{ $facility->title }}
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $facility->desc }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Extra Detailed Checklist from Flyer -->
        <div class="mt-12 bg-purple-900 text-white rounded-3xl p-8 sm:p-10 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-4 text-center lg:text-left">
                <span class="text-amber-400 font-extrabold text-xs tracking-widest uppercase block mb-1">Standard Keamanan</span>
                <h3 class="font-display text-2xl font-bold">Fasilitas Higienis & Aman</h3>
                <p class="text-purple-200 text-sm mt-2">Setiap ruangan secara rutin dibersihkan dan di-sterilisasi demi kesehatan ananda.</p>
            </div>
            <div class="lg:col-span-8 grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm font-semibold">
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">❄️</span> Area Ber-AC
                </div>
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">🧩</span> APE Edukatif
                </div>
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">🍽️</span> Ruang Makan
                </div>
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">🛏️</span> Kamar Tidur
                </div>
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">🍳</span> Dapur & Kulkas
                </div>
                <div class="bg-purple-800/60 rounded-xl p-4 flex items-center gap-3 border border-purple-700">
                    <span class="text-xl">🚿</span> Toilet Heater & Cooler
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ================= PERSYARATAN & BIAYA SECTION ================= -->
<section id="persyaratan" class="py-20 bg-gradient-to-b from-slate-50 via-pink-50/40 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Pricing Card -->
            <div class="lg:col-span-5">
                <div class="relative bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-pink-100 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-pink-500/10 rounded-bl-full pointer-events-none"></div>

                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-extrabold bg-pink-100 text-pink-600 uppercase tracking-widest mb-4">
                        Biaya Pendaftaran
                    </span>

                    <h3 class="font-display text-2xl font-bold text-slate-900">Uang Pendaftaran</h3>
                    <p class="text-slate-500 text-sm mt-1">Sekali bayar pada saat registrasi awal</p>

                    <div class="my-6 py-4 border-y border-slate-100">
                        <span class="text-xs font-semibold text-slate-400 block mb-1">Total Biaya Registrasi:</span>
                        <div class="flex items-baseline gap-2">
                            <span class="font-display text-4xl sm:text-5xl font-extrabold text-pink-600">{{ $settings['registration_fee'] ?? 'Rp 200.000' }}</span>
                            <span class="text-slate-400 text-sm font-semibold">,-</span>
                        </div>
                    </div>

                    <ul class="space-y-3 text-sm text-slate-600 mb-8">
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">✓</span>
                            Sudah termasuk Formulir Registrasi
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">✓</span>
                            Surat Pernyataan Orang Tua
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">✓</span>
                            Pendataan & Penyiapan Berkas Ananda
                        </li>
                    </ul>

                    <a href="#pendaftaran" class="block w-full py-4 rounded-2xl font-bold text-center text-white bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 shadow-lg shadow-pink-500/25 transition">
                        Daftar Pendaftaran Online &rarr;
                    </a>
                </div>
            </div>

            <!-- Right Column: Requirements List from Flyer -->
            <div class="lg:col-span-7 space-y-6">
                
                <div>
                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-purple-100 text-purple-700 tracking-widest uppercase mb-3">
                        Kelengkapan Berkas
                    </span>
                    <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Persyaratan Pendaftaran TPA Robbani
                    </h2>
                    <p class="mt-3 text-slate-600">
                        Mohon mempersiapkan dokumen-dokumen berikut untuk proses verifikasi pendaftaran ananda:
                    </p>
                </div>

                <div class="space-y-4">
                    @foreach($requirements as $index => $req)
                    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-start gap-4 transition hover:border-pink-300 hover:shadow-md">
                        <span class="flex-shrink-0 w-8 h-8 rounded-xl bg-pink-500 text-white font-extrabold flex items-center justify-center text-sm shadow-md">
                            {{ $index + 1 }}
                        </span>
                        <p class="font-semibold text-slate-800 text-base pt-1">
                            {{ $req }}
                        </p>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</section>


<!-- ================= FORMULIR PENDAFTARAN ONLINE SECTION ================= -->
<section id="pendaftaran" class="py-20 bg-white" x-data="registrationForm()">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-800 tracking-widest uppercase mb-3">
                Form Registrasi Fast-Track
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Formulir Pendaftaran Online
            </h2>
            <p class="mt-3 text-slate-600 text-sm sm:text-base">
                Isi data ananda dan orang tua di bawah ini. Setelah dikirim, Anda akan langsung terhubung ke WhatsApp pengasuh TPA Robbani.
            </p>
        </div>

        <!-- Registration Success Alert Modal -->
        <div x-show="submitted" 
             x-transition 
             class="mb-8 p-6 bg-emerald-50 border-2 border-emerald-400 rounded-3xl shadow-xl text-center space-y-4" 
             style="display: none;">
            <div class="w-16 h-16 bg-emerald-500 text-white rounded-full flex items-center justify-center text-3xl mx-auto shadow-md">
                ✓
            </div>
            <h3 class="font-display text-2xl font-bold text-emerald-950">Pendaftaran Berhasil Dikirim!</h3>
            <p class="text-emerald-800 text-sm max-w-md mx-auto" x-text="successMessage"></p>
            
            <div class="pt-2">
                <a :href="waUrl" 
                   target="_blank" 
                   class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-xl transition transform hover:scale-105">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-0.999 3.648 3.742-0.981z"/></svg>
                    Buka WhatsApp & Konfirmasi Berkas &rarr;
                </a>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-2xl border border-slate-100">
            <form @submit.prevent="submitForm" class="space-y-6">
                @csrf

                <!-- Section: Data Anak -->
                <div>
                    <h4 class="font-display font-bold text-lg text-slate-900 border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center text-sm font-bold">1</span>
                        Data Anak
                    </h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap Anak *</label>
                            <input type="text" x-model="formData.child_name" required placeholder="Contoh: Muhammad Robbani" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Panggilan</label>
                            <input type="text" x-model="formData.child_nickname" placeholder="Contoh: BANI" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Lahir Anak *</label>
                            <input type="date" x-model="formData.birth_date" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jenis Kelamin *</label>
                            <select x-model="formData.gender" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm bg-white">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Section: Data Orang Tua -->
                <div class="pt-4">
                    <h4 class="font-display font-bold text-lg text-slate-900 border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm font-bold">2</span>
                        Data Orang Tua / Wali
                    </h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Ayah / Ibu / Wali *</label>
                            <input type="text" x-model="formData.parent_name" required placeholder="Nama lengkap orang tua" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor WhatsApp Aktif *</label>
                            <input type="tel" x-model="formData.phone" required placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none text-sm">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Pilihan Lokasi TPA *</label>
                        <select x-model="formData.branch" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none text-sm bg-white">
                            <option value="TPA Pusat (Jl Sarjana)">TPA Pusat - {{ $settings['pusat_address'] ?? 'Jl Sarjana, Blok C17 Timbangan' }}</option>
                            <option value="TPA Cabang (Griya Sejahtera)">TPA Cabang - {{ $settings['cabang_address'] ?? 'Griya Sejahtera 7 A4 No. 5' }}</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Alamat Domisili</label>
                        <textarea x-model="formData.address" rows="2" placeholder="Alamat rumah / domisili Ayah & Bunda" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none text-sm"></textarea>
                    </div>

                    <div class="mt-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Catatan Khusus / Alergi (Opsional)</label>
                        <textarea x-model="formData.notes" rows="2" placeholder="Contoh: Alergi udang, rutinitas khusus minum susu jam 10 pagi, dll." class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none text-sm"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                            :disabled="loading" 
                            class="w-full py-4 rounded-2xl font-bold text-base text-white bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 hover:from-pink-700 hover:to-cyan-700 shadow-xl shadow-pink-500/25 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 disabled:opacity-50">
                        <span x-show="!loading">Kirim Pendaftaran Online & Connect WhatsApp &rarr;</span>
                        <span x-show="loading" style="display: none;">Memproses...</span>
                    </button>
                    <p class="text-center text-xs text-slate-400 mt-3">
                        * Pendaftaran awal tidak memotong biaya otomatis. Pembayaran pendaftaran {{ $settings['registration_fee'] ?? 'Rp 200.000' }} dilakukan saat konfirmasi.
                    </p>
                </div>
            </form>
        </div>

    </div>
</section>


<!-- ================= LOKASI CABANG SECTION ================= -->
<section id="lokasi" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-cyan-100 text-cyan-800 tracking-widest uppercase mb-3">
                Lokasi TPA Robbani
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Pilih Lokasi Terdekat dari Kediaman Anda
            </h2>
            <p class="mt-4 text-slate-600">
                TPA Robbani memiliki 2 lokasi strategis di wilayah Indralaya Utara, Kab. Ogan Ilir, Timbangan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($branches as $branch)
            <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-md flex flex-col justify-between hover:shadow-2xl transition">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3.5 py-1 rounded-full text-xs font-extrabold bg-pink-100 text-pink-600">
                            {{ $branch['badge'] }}
                        </span>
                        <span class="text-xs font-semibold text-slate-400">Ogan Ilir, Indralaya Utara</span>
                    </div>

                    <h3 class="font-display text-2xl font-bold text-slate-900 mb-2">
                        {{ $branch['name'] }}
                    </h3>

                    <p class="text-slate-700 text-base font-medium mb-1">
                        📍 {{ $branch['address'] }}
                    </p>
                    <p class="text-slate-500 text-sm mb-6">
                        {{ $branch['district'] }}
                    </p>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-2 mb-6">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Nomor Telepon / WA:</span>
                            <span class="font-bold text-slate-900">{{ $branch['phone_formatted'] }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">Jam Operasional:</span>
                            <span class="font-semibold text-emerald-600">{{ $settings['operational_hours'] ?? 'Senin - Sabtu (07:00 - 17:00 WIB)' }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="{{ $branch['wa_url'] }}" 
                       target="_blank" 
                       class="flex-1 py-3 px-4 rounded-xl font-bold text-sm text-center text-white bg-emerald-500 hover:bg-emerald-600 shadow-md transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-0.999 3.648 3.742-0.981z"/></svg>
                        Hubungi {{ $branch['name'] }}
                    </a>
                    <a href="{{ $branch['maps_url'] }}" 
                       target="_blank" 
                       class="py-3 px-4 rounded-xl font-bold text-sm text-center text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                        🗺️ Petunjuk Arah
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- ================= FAQ SECTION ================= -->
<section id="faq" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-purple-100 text-purple-700 tracking-widest uppercase mb-3">
                Tanya Jawab
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900">
                Pertanyaan Sering Diajukan (FAQ)
            </h2>
        </div>

        <div class="space-y-4" x-data="{ activeFaq: null }">
            @foreach($faqs as $index => $faq)
            <div class="bg-slate-50 rounded-2xl border border-slate-200/80 overflow-hidden transition">
                <button @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})" 
                        class="w-full px-6 py-5 text-left font-display font-bold text-base text-slate-900 flex justify-between items-center hover:text-pink-600 transition">
                    <span>{{ $faq->question }}</span>
                    <span class="text-xl text-pink-500 font-bold ml-4" x-text="activeFaq === {{ $index }} ? '−' : '+'"></span>
                </button>
                <div x-show="activeFaq === {{ $index }}" 
                     x-transition 
                     class="px-6 pb-5 text-slate-600 text-sm leading-relaxed border-t border-slate-200/50 pt-3" 
                     style="display: none;">
                    {{ $faq->answer }}
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- Alpine Registration Script -->
<script>
    function registrationForm() {
        return {
            loading: false,
            submitted: false,
            successMessage: '',
            waUrl: '',
            formData: {
                child_name: '',
                child_nickname: '',
                birth_date: '',
                gender: 'Laki-laki',
                parent_name: '',
                phone: '',
                branch: 'TPA Pusat (Jl Sarjana)',
                address: '',
                notes: ''
            },
            async submitForm() {
                this.loading = true;
                try {
                    const response = await fetch("{{ route('registration.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(this.formData)
                    });

                    const result = await response.json();
                    if (response.ok && result.success) {
                        this.submitted = true;
                        this.successMessage = result.message;
                        this.waUrl = result.wa_url;
                        
                        // Automatically open WA window after short pause
                        setTimeout(() => {
                            window.open(this.waUrl, '_blank');
                        }, 1200);
                    } else {
                        alert(result.message || 'Terjadi kesalahan saat mengirim pendaftaran.');
                    }
                } catch (e) {
                    alert('Gagal terhubung ke server. Silakan coba lagi.');
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>

@endsection
