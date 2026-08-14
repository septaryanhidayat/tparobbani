<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - TPA Robbani</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-950 to-slate-900 min-h-screen flex items-center justify-center p-4 font-sans text-slate-800">

    <div class="w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl border border-slate-100 relative overflow-hidden">
        
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Logo TPA Robbani" class="h-16 w-auto mx-auto mb-3">
            <h1 class="font-display font-extrabold text-2xl text-slate-900">Admin CMS Panel</h1>
            <p class="text-xs text-slate-500 font-medium mt-1">Taman Penitipan Anak (TPA) Robbani</p>
        </div>

        @if(session('info'))
        <div class="mb-4 p-3 bg-cyan-50 border border-cyan-200 text-cyan-800 text-xs rounded-xl text-center">
            {{ session('info') }}
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email Admin</label>
                <input type="email" name="email" value="{{ old('email', 'tpa@sitrobbani.sch.id') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm">
                @error('email')
                <p class="text-rose-600 text-xs mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Password</label>
                <input type="password" name="password" required placeholder="Masukkan password admin" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none text-sm">
                @error('password')
                <p class="text-rose-600 text-xs mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                    <input type="checkbox" name="remember" class="rounded text-pink-600 focus:ring-pink-500">
                    Ingat Saya
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl font-bold text-sm text-white bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 hover:from-pink-700 hover:to-cyan-700 shadow-lg shadow-pink-500/25 transition">
                Masuk ke Dashboard Admin &rarr;
            </button>
        </form>

        <div class="mt-8 pt-4 border-t border-slate-100 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-pink-600 transition">
                &larr; Kembali ke Website Utama
            </a>
        </div>

    </div>

</body>
</html>
