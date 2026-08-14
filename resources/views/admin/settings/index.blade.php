@extends('admin.layouts.app')

@section('title', 'Teks & Pengaturan Website')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-display text-2xl font-bold text-slate-900">Kelola Teks, Identitas & Foto Website</h2>
            <p class="text-sm text-slate-500">Ubah judul hero, pengumuman, alamat cabang, nomor WhatsApp, dan semua foto utama secara langsung.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Card 1: Identitas & Announcement -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
            <h3 class="font-display text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span>🏷️</span> Identitas & Banner Pengumuman
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Situs / TPA</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'TPA Robbani') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tagline Lengkap</label>
                    <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Taman Penitipan Anak (TPA) Robbani') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Badge Pengumuman Atas</label>
                    <input type="text" name="announcement_badge" value="{{ old('announcement_badge', $settings['announcement_badge'] ?? 'KUOTA TERBATAS!') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Teks Baris Pengumuman Atas</label>
                    <input type="text" name="announcement_text" value="{{ old('announcement_text', $settings['announcement_text'] ?? 'Pendaftaran TPA Robbani Tahun Ajaran 2025/2026 Telah Dibuka!') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
                </div>
            </div>
        </div>

        <!-- Card 2: Hero Section Text & Images -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
            <h3 class="font-display text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span>🚀</span> Banner Utama (Hero Section)
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Badge Promo Banner</label>
                <input type="text" name="hero_badge" value="{{ old('hero_badge', $settings['hero_badge'] ?? 'BURUAN DAFTAR! KUOTA TERBATAS 2025 / 2026') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Judul Utama (Hero Title)</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? 'Taman Penitipan Anak TPA ROBBANI') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Subtitle Hero</label>
                <textarea name="hero_subtitle" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ganti Foto Hero Anak (Upload)</label>
                    <input type="file" name="hero_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">
                    <p class="text-[10px] text-slate-400 mt-1">Foto saat ini: {{ $settings['hero_image'] ?? 'images/hero-kids.png' }}</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ganti Logo PNG Resmi (Upload)</label>
                    <input type="file" name="logo_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-600 hover:file:bg-purple-100">
                    <p class="text-[10px] text-slate-400 mt-1">Logo saat ini: images/logo.png</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Banner Pembelajaran Showcase -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
            <h3 class="font-display text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span>📖</span> Banner Pembelajaran Interaktif
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Judul Banner Pembelajaran</label>
                <input type="text" name="learning_title" value="{{ old('learning_title', $settings['learning_title'] ?? 'Pendidikan Karakter & Pengenalan Hijaiyah Sejak Dini') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Banner Pembelajaran</label>
                <textarea name="learning_desc" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">{{ old('learning_desc', $settings['learning_desc'] ?? 'Metode pengajaran kami menekankan pada pendekatan yang menyenangkan (play-based learning). Anak diajak belajar huruf dasar dan Hijaiyah tanpa merasa tertekan, diselingi bernyanyi dan cerita islami.') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Foto Banner Pembelajaran / Hijaiyah (Upload)</label>
                <input type="file" name="learning_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-cyan-50 file:text-cyan-600 hover:file:bg-cyan-100">
                <p class="text-[10px] text-slate-400 mt-1">Foto saat ini: {{ $settings['learning_image'] ?? 'images/learning-hijaiyah.png' }}</p>
            </div>
        </div>

        <!-- Card 4: Pricing & Requirements -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
            <h3 class="font-display text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span>💰</span> Biaya & Dokumen Persyaratan
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Uang Pendaftaran (Harga)</label>
                <input type="text" name="registration_fee" value="{{ old('registration_fee', $settings['registration_fee'] ?? 'Rp 200.000') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Daftar Persyaratan Berkas (Pisahkan dengan baris baru / Enter)</label>
                <textarea name="requirements_list" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm font-mono">{{ old('requirements_list', $settings['requirements_list'] ?? '') }}</textarea>
            </div>
        </div>

        <!-- Card 5: TPA Pusat & TPA Cabang Info -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
            <h3 class="font-display text-lg font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span>📍</span> Informasi Kontak & Alamat Cabang
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- TPA Pusat -->
                <div class="space-y-4 p-5 rounded-2xl bg-slate-50 border border-slate-100">
                    <h4 class="font-bold text-slate-900 text-sm">Informasi TPA Pusat</h4>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Nama Cabang Pusat</label>
                        <input type="text" name="pusat_name" value="{{ old('pusat_name', $settings['pusat_name'] ?? 'TPA Pusat') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Alamat Lengkap</label>
                        <input type="text" name="pusat_address" value="{{ old('pusat_address', $settings['pusat_address'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Kecamatan / Kabupaten / Wilayah</label>
                        <input type="text" name="pusat_district" value="{{ old('pusat_district', $settings['pusat_district'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Nomor WA Pusat (Tanpa spasi/strip, ex: 0811747472)</label>
                        <input type="text" name="pusat_phone" value="{{ old('pusat_phone', $settings['pusat_phone'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Format Tampilan No. WA Pusat</label>
                        <input type="text" name="pusat_phone_formatted" value="{{ old('pusat_phone_formatted', $settings['pusat_phone_formatted'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                </div>

                <!-- TPA Cabang -->
                <div class="space-y-4 p-5 rounded-2xl bg-slate-50 border border-slate-100">
                    <h4 class="font-bold text-slate-900 text-sm">Informasi TPA Cabang</h4>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Nama Cabang</label>
                        <input type="text" name="cabang_name" value="{{ old('cabang_name', $settings['cabang_name'] ?? 'TPA Cabang') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Alamat Lengkap</label>
                        <input type="text" name="cabang_address" value="{{ old('cabang_address', $settings['cabang_address'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Kecamatan / Kabupaten / Wilayah</label>
                        <input type="text" name="cabang_district" value="{{ old('cabang_district', $settings['cabang_district'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Nomor WA Cabang (Tanpa spasi/strip, ex: 082378176209)</label>
                        <input type="text" name="cabang_phone" value="{{ old('cabang_phone', $settings['cabang_phone'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Format Tampilan No. WA Cabang</label>
                        <input type="text" name="cabang_phone_formatted" value="{{ old('cabang_phone_formatted', $settings['cabang_phone_formatted'] ?? '') }}" class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jam Operasional Penitipan</label>
                <input type="text" name="operational_hours" value="{{ old('operational_hours', $settings['operational_hours'] ?? 'Senin - Sabtu (07:00 - 17:00 WIB)') }}" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-pink-500 outline-none text-sm">
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-4 rounded-2xl font-bold text-base text-white bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 shadow-xl shadow-pink-500/25 transition transform hover:-translate-y-0.5">
                💾 Simpan Perubahan Konten & Foto
            </button>
        </div>

    </form>

</div>

@endsection
