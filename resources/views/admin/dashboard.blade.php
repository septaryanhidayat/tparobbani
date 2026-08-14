@extends('admin.layouts.app')

@section('title', 'Overview Dashboard')

@section('content')

<div class="space-y-8">
    
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-pink-600 via-purple-600 to-cyan-600 rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <span class="px-3 py-1 rounded-full text-xs font-extrabold bg-amber-400 text-purple-950 inline-block mb-2">
                SELAMAT DATANG
            </span>
            <h2 class="font-display text-2xl sm:text-3xl font-extrabold">Dashboard Pengelola TPA Robbani</h2>
            <p class="text-pink-100 text-sm mt-1">Kelola konten website, data pendaftaran online, foto fasilitas, & kontak cabang di satu tempat.</p>
        </div>
        <a href="{{ route('admin.settings.index') }}" class="px-5 py-3 rounded-2xl bg-white text-pink-600 font-bold text-xs shadow-md hover:bg-slate-50 transition">
            ⚙️ Edit Konten Website
        </a>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase">Total Registrasi</span>
                <p class="font-display text-3xl font-extrabold text-slate-900 mt-1">{{ $stats['total_registrations'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xl">
                📋
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase">Menunggu Konfirmasi</span>
                <p class="font-display text-3xl font-extrabold text-amber-600 mt-1">{{ $stats['pending_registrations'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">
                ⏳
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase">Dikonfirmasi</span>
                <p class="font-display text-3xl font-extrabold text-emerald-600 mt-1">{{ $stats['confirmed_registrations'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl">
                ✓
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase">Fasilitas & Foto</span>
                <p class="font-display text-3xl font-extrabold text-cyan-600 mt-1">{{ $stats['facilities_count'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xl">
                🏫
            </div>
        </div>

    </div>

    <!-- Recent Registrations Section -->
    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
            <h3 class="font-display text-lg font-bold text-slate-900">Pendaftaran Online Terbaru</h3>
            <a href="{{ route('admin.registrations.index') }}" class="text-xs font-bold text-pink-600 hover:underline">Lihat Semua &rarr;</a>
        </div>

        @if($recentRegistrations->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold uppercase text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="p-3">ID Reg</th>
                        <th class="p-3">Nama Anak</th>
                        <th class="p-3">Orang Tua</th>
                        <th class="p-3">WhatsApp</th>
                        <th class="p-3">Cabang</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($recentRegistrations as $reg)
                    <tr class="hover:bg-slate-50/50">
                        <td class="p-3 font-bold text-slate-900">#ROB-{{ str_pad($reg->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-3 font-semibold text-slate-800">{{ $reg->child_name }} ({{ $reg->child_nickname ?? '-' }})</td>
                        <td class="p-3">{{ $reg->parent_name }}</td>
                        <td class="p-3">
                            <a href="https://wa.me/62{{ preg_replace('/[^0-9]/', '', $reg->phone) }}" target="_blank" class="text-emerald-600 font-bold hover:underline">
                                📱 {{ $reg->phone }}
                            </a>
                        </td>
                        <td class="p-3"><span class="px-2 py-1 rounded bg-purple-50 text-purple-700 text-xs font-semibold">{{ $reg->branch }}</span></td>
                        <td class="p-3">
                            @if($reg->status === 'Dikonfirmasi')
                            <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">✓ {{ $reg->status }}</span>
                            @elseif($reg->status === 'Ditolak')
                            <span class="px-2.5 py-1 rounded-full bg-rose-100 text-rose-700 text-xs font-bold">✕ {{ $reg->status }}</span>
                            @else
                            <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">⏳ {{ $reg->status }}</span>
                            @endif
                        </td>
                        <td class="p-3 text-xs text-slate-400">{{ $reg->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-slate-400 py-8 text-sm">Belum ada pendaftaran online yang masuk.</p>
        @endif
    </div>

</div>

@endsection
