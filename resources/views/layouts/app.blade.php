<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Models\Setting::get('site_name', 'TPA Robbani') }} - Taman Penitipan Anak Indralaya | Safe, Loving & Islamic Daycare</title>
    <meta name="description" content="{{ \App\Models\Setting::get('hero_subtitle', 'Taman Penitipan Anak (TPA) Robbani Indralaya Utara. Penitipan anak aman, nyaman, ber-AC, dengan pengasuhan berlandaskan kasih sayang.') }}">
    <meta name="keywords" content="TPA Robbani, Taman Penitipan Anak Indralaya, Daycare Indralaya, TPA Ogan Ilir, Penitipan Anak Timbangan, Daycare Islam">
    
    <!-- Open Graph / WhatsApp / Social Media Preview -->
    <meta property="og:title" content="{{ \App\Models\Setting::get('site_name', 'TPA Robbani') }} - Taman Penitipan Anak Indralaya">
    <meta property="og:description" content="{{ \App\Models\Setting::get('hero_subtitle', 'Tempat terbaik untuk tumbuh kembang, kecerdasan, dan karakter ananda. Tempat aman, ber-AC, & edukatif.') }}">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ \App\Models\Setting::get('site_name', 'TPA Robbani') }} - Taman Penitipan Anak">
    <meta name="twitter:description" content="{{ \App\Models\Setting::get('hero_subtitle', 'Tempat terbaik untuk tumbuh kembang anak.') }}">
    <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50/60 selection:bg-pink-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 text-white text-xs sm:text-sm py-2 px-3 sm:px-4 text-center font-medium shadow-sm flex items-center justify-center gap-1.5 sm:gap-2">
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-extrabold bg-amber-400 text-purple-950 animate-pulse flex-shrink-0">
            {{ \App\Models\Setting::get('announcement_badge', 'KUOTA TERBATAS!') }}
        </span>
        <span class="truncate">{{ \App\Models\Setting::get('announcement_text', 'Pendaftaran TPA Robbani Tahun Ajaran 2025/2026 Telah Dibuka!') }}</span>
        <a href="#pendaftaran" class="underline hover:text-amber-200 font-bold ml-1 transition flex-shrink-0 hidden sm:inline">Daftar &rarr;</a>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-pink-100 shadow-xs">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20 gap-2">
                
                <!-- Left: Logo Image + TPA Robbani Text (Neat Mobile & Desktop Layout) -->
                <a href="#beranda" class="flex items-center gap-2 sm:gap-3.5 flex-shrink min-w-0 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo TPA Robbani" class="h-10 sm:h-12 w-auto flex-shrink-0 object-contain transition transform group-hover:scale-105">
                    <div class="flex flex-col justify-center min-w-0">
                        <span class="text-[10px] sm:text-xs font-bold text-cyan-700 tracking-wider uppercase leading-tight truncate">Taman Penitipan Anak</span>
                        <span class="font-display font-extrabold text-base sm:text-2xl tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 leading-tight truncate">TPA ROBBANI</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center gap-6 lg:gap-8 font-semibold text-slate-600 text-sm">
                    <a href="#beranda" class="hover:text-pink-600 transition py-1">Beranda</a>
                    <a href="#tentang" class="hover:text-pink-600 transition py-1">Tentang Kami</a>
                    <a href="#kegiatan" class="hover:text-pink-600 transition py-1">Kegiatan</a>
                    <a href="#fasilitas" class="hover:text-pink-600 transition py-1">Fasilitas</a>
                    <a href="#persyaratan" class="hover:text-pink-600 transition py-1">Biaya & Syarat</a>
                    <a href="#lokasi" class="hover:text-pink-600 transition py-1">Lokasi</a>
                    <a href="#faq" class="hover:text-pink-600 transition py-1">FAQ</a>
                </div>

                <!-- CTA Button Desktop & Admin Link -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="https://wa.me/62{{ \App\Models\Setting::get('pusat_phone', '811747472') }}?text=Halo%20TPA%20Robbani,%20saya%20ingin%20bertanya%20mengenai%20penitipan%20anak" 
                       target="_blank" 
                       class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                        <svg class="w-4 h-4 text-emerald-500 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-0.999 3.648 3.742-0.981z"/></svg>
                        Hubungi WA
                    </a>
                    <a href="#pendaftaran" class="px-4 py-2 rounded-full font-bold text-xs text-white bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 shadow-md shadow-pink-500/20 transition transform hover:-translate-y-0.5">
                        Daftar Online
                    </a>
                </div>

                <!-- Right: Mobile Hamburger Menu Button -->
                <div class="md:hidden flex items-center flex-shrink-0">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="p-2 rounded-xl text-slate-700 hover:text-pink-600 hover:bg-pink-50 focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-xl">
            <a @click="mobileMenuOpen = false" href="#beranda" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Beranda</a>
            <a @click="mobileMenuOpen = false" href="#tentang" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Tentang Kami</a>
            <a @click="mobileMenuOpen = false" href="#kegiatan" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Kegiatan Harian</a>
            <a @click="mobileMenuOpen = false" href="#fasilitas" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Fasilitas</a>
            <a @click="mobileMenuOpen = false" href="#persyaratan" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Biaya & Syarat</a>
            <a @click="mobileMenuOpen = false" href="#lokasi" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">Lokasi TPA</a>
            <a @click="mobileMenuOpen = false" href="#faq" class="block px-3 py-2 rounded-lg font-semibold text-slate-700 hover:bg-pink-50 hover:text-pink-600">FAQ</a>
            <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
                <a href="#pendaftaran" @click="mobileMenuOpen = false" class="text-center w-full py-3 rounded-xl font-bold text-white bg-gradient-to-r from-pink-600 to-purple-600 shadow-md">
                    Daftar Online Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Floating WhatsApp Widget Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/62{{ \App\Models\Setting::get('pusat_phone', '811747472') }}?text=Halo%20TPA%20Robbani,%20saya%20ingin%20bertanya%20informasi%20pendaftaran" 
           target="_blank"
           class="flex items-center gap-2.5 px-4 sm:px-5 py-3 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm shadow-2xl shadow-emerald-500/40 transform hover:scale-105 transition group">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
            </span>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-0.999 3.648 3.742-0.981z"/></svg>
            <span class="hidden sm:inline">Chat WA Pengasuh</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t-4 border-pink-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                
                <!-- Col 1: Brand -->
                <div class="space-y-4 md:col-span-1">
                    <div class="flex items-center gap-3">
                        <div class="p-1.5 bg-white rounded-xl shadow-md inline-block">
                            <img src="{{ asset('images/logo.png') }}" alt="TPA Robbani" class="h-10 w-auto">
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-pink-400">Taman Penitipan Anak</span>
                            <span class="font-display font-extrabold text-xl text-white">{{ \App\Models\Setting::get('site_name', 'TPA Robbani') }}</span>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        TPA Robbani hadir membantu orang tua memberikan pengasuhan yang penuh kasih sayang, aman, islami, dan mendukung tumbuh kembang anak secara optimal.
                    </p>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="font-display font-bold text-lg text-white mb-4 text-pink-400">Navigasi Cepat</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#beranda" class="hover:text-pink-400 transition">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-pink-400 transition">Tentang TPA Robbani</a></li>
                        <li><a href="#kegiatan" class="hover:text-pink-400 transition">Program & Kegiatan</a></li>
                        <li><a href="#fasilitas" class="hover:text-pink-400 transition">Fasilitas Utama</a></li>
                        <li><a href="#persyaratan" class="hover:text-pink-400 transition">Uang Pendaftaran & Syarat</a></li>
                        <li><a href="#pendaftaran" class="hover:text-pink-400 transition">Formulir Registrasi</a></li>
                        <li><a href="{{ route('admin.login') }}" class="text-slate-500 hover:text-slate-300 transition text-xs mt-2 block">🔐 Admin Login</a></li>
                    </ul>
                </div>

                <!-- Col 3: TPA Pusat -->
                <div>
                    <h4 class="font-display font-bold text-lg text-white mb-4 text-cyan-400">{{ \App\Models\Setting::get('pusat_name', 'TPA Pusat') }}</h4>
                    <p class="text-sm text-slate-400 leading-relaxed mb-3">
                        {{ \App\Models\Setting::get('pusat_address', 'Jl Sarjana, Blok C17 Timbangan') }}
                    </p>
                    <div class="space-y-1 text-sm">
                        <p class="text-white font-medium">WhatsApp / Call:</p>
                        <a href="https://wa.me/62{{ \App\Models\Setting::get('pusat_phone', '811747472') }}" target="_blank" class="inline-flex items-center gap-1.5 text-emerald-400 hover:underline font-semibold">
                            📱 {{ \App\Models\Setting::get('pusat_phone_formatted', '0811 7474 72') }}
                        </a>
                    </div>
                </div>

                <!-- Col 4: TPA Cabang -->
                <div>
                    <h4 class="font-display font-bold text-lg text-white mb-4 text-amber-400">{{ \App\Models\Setting::get('cabang_name', 'TPA Cabang') }}</h4>
                    <p class="text-sm text-slate-400 leading-relaxed mb-3">
                        {{ \App\Models\Setting::get('cabang_address', 'Griya Sejahtera 7 A4 No. 5') }}
                    </p>
                    <div class="space-y-1 text-sm">
                        <p class="text-white font-medium">WhatsApp / Call:</p>
                        <a href="https://wa.me/62{{ \App\Models\Setting::get('cabang_phone', '82378176209') }}" target="_blank" class="inline-flex items-center gap-1.5 text-amber-400 hover:underline font-semibold">
                            📱 {{ \App\Models\Setting::get('cabang_phone_formatted', '0823 7817 6209') }}
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_tagline', 'Taman Penitipan Anak (TPA) Robbani') }}. All rights reserved.</p>
                <p>Kec. Indralaya Utara, Kab. Ogan Ilir, Timbangan</p>
            </div>
        </div>
    </footer>

</body>
</html>
