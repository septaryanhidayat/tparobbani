<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TPA Robbani</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-slate-900 text-slate-300 flex-shrink-0 lg:min-h-screen">
            <!-- Sidebar Header -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-1 bg-white rounded-lg inline-block">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
                    </div>
                    <div>
                        <span class="font-display font-extrabold text-white text-base">TPA Robbani</span>
                        <span class="block text-[10px] text-pink-400 font-bold uppercase tracking-wider">CMS Admin</span>
                    </div>
                </div>
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 text-slate-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="p-4 space-y-1 lg:block" :class="sidebarOpen ? 'block' : 'hidden lg:block'">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-pink-600 text-white shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    📊 Overview Dashboard
                </a>
                <a href="{{ route('admin.registrations.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.registrations.*') ? 'bg-pink-600 text-white shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    📋 Data Pendaftaran
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.settings.*') ? 'bg-pink-600 text-white shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    ⚙️ Teks & Pengaturan Website
                </a>
                <a href="{{ route('admin.activities.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.activities.*') ? 'bg-pink-600 text-white shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    🎯 Kelola Kegiatan Harian
                </a>
                <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.facilities.*') ? 'bg-pink-600 text-white shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    🏫 Kelola Fasilitas & Foto
                </a>
                
                <div class="pt-6 mt-6 border-t border-slate-800">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold text-cyan-400 hover:bg-slate-800 transition">
                        🌐 Lihat Website Utama &rarr;
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold text-rose-400 hover:bg-slate-800 transition">
                            🚪 Keluar (Logout)
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar -->
            <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between shadow-2xs">
                <div class="flex items-center gap-3">
                    <h1 class="font-display font-bold text-xl text-slate-900">@yield('title', 'Admin Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3 text-xs font-semibold text-slate-600">
                    <span class="hidden sm:inline">Pengelola TPA Robbani</span>
                    <div class="w-8 h-8 rounded-full bg-pink-500 text-white font-bold flex items-center justify-center shadow-xs">
                        A
                    </div>
                </div>
            </header>

            <!-- Alerts -->
            <div class="p-6 pb-0">
                @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-xl text-sm font-semibold shadow-xs">
                    ✓ {{ session('success') }}
                </div>
                @endif
                @if(session('info'))
                <div class="p-4 bg-cyan-50 border border-cyan-300 text-cyan-800 rounded-xl text-sm font-semibold shadow-xs">
                    ℹ️ {{ session('info') }}
                </div>
                @endif
                @if($errors->any())
                <div class="p-4 bg-rose-50 border border-rose-300 text-rose-800 rounded-xl text-sm font-semibold shadow-xs">
                    ⚠️ Terdapat kesalahan input. Silakan periksa kembali formulir di bawah.
                </div>
                @endif
            </div>

            <!-- Page Body -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>
