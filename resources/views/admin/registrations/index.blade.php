@extends('admin.layouts.app')

@section('title', 'Data Pendaftaran Online')

@section('content')

<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="font-display text-2xl font-bold text-slate-900">Pendaftaran Online Orang Tua</h2>
            <p class="text-sm text-slate-500">Kelola dan ubah status pendaftaran anak yang masuk via website.</p>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs">
        <form action="{{ route('admin.registrations.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama anak / ortu / hp..." class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-pink-500 outline-none">
            </div>
            <div>
                <select name="status" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white focus:ring-2 focus:ring-pink-500 outline-none">
                    <option value="">-- Semua Status --</option>
                    <option value="Menunggu Konfirmasi" {{ request('status') === 'Menunggu Konfirmasi' ? 'selected' : '' }}>⏳ Menunggu Konfirmasi</option>
                    <option value="Dikonfirmasi" {{ request('status') === 'Dikonfirmasi' ? 'selected' : '' }}>✓ Dikonfirmasi</option>
                    <option value="Ditolak" {{ request('status') === 'Ditolak' ? 'selected' : '' }}>✕ Ditolak</option>
                </select>
            </div>
            <div>
                <select name="branch" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white focus:ring-2 focus:ring-pink-500 outline-none">
                    <option value="">-- Semua Cabang --</option>
                    <option value="Pusat" {{ request('branch') === 'Pusat' ? 'selected' : '' }}>TPA Pusat</option>
                    <option value="Cabang" {{ request('branch') === 'Cabang' ? 'selected' : '' }}>TPA Cabang</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="w-full py-2 px-4 rounded-xl font-bold text-xs text-white bg-pink-600 hover:bg-pink-700 transition">
                    Filter
                </button>
                <a href="{{ route('admin.registrations.index') }}" class="py-2 px-3 rounded-xl font-bold text-xs text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        @if($registrations->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold uppercase text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="p-4">ID Reg</th>
                        <th class="p-4">Anak</th>
                        <th class="p-4">Tgl Lahir / Usia</th>
                        <th class="p-4">Orang Tua</th>
                        <th class="p-4">WhatsApp</th>
                        <th class="p-4">Cabang</th>
                        <th class="p-4">Status & Update</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($registrations as $reg)
                    <tr class="hover:bg-slate-50/50">
                        <td class="p-4 font-bold text-slate-900">#ROB-{{ str_pad($reg->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-4">
                            <span class="font-bold text-slate-900 block">{{ $reg->child_name }}</span>
                            <span class="text-xs text-slate-400">Panggilan: {{ $reg->child_nickname ?? '-' }} ({{ $reg->gender }})</span>
                        </td>
                        <td class="p-4 text-xs">
                            <span class="font-medium text-slate-700 block">{{ $reg->birth_date->format('d/m/Y') }}</span>
                            <span class="text-slate-400">({{ $reg->birth_date->age }} thn)</span>
                        </td>
                        <td class="p-4 font-semibold text-slate-800">{{ $reg->parent_name }}</td>
                        <td class="p-4">
                            <a href="https://wa.me/62{{ preg_replace('/[^0-9]/', '', $reg->phone) }}?text=Halo%20{{ urlencode($reg->parent_name) }},%20mengenai%20pendaftaran%20ananda%20{{ urlencode($reg->child_name) }}%20di%20TPA%20Robbani..." 
                               target="_blank" 
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold text-xs transition">
                                📱 {{ $reg->phone }}
                            </a>
                        </td>
                        <td class="p-4"><span class="px-2.5 py-1 rounded bg-purple-50 text-purple-700 text-xs font-semibold">{{ $reg->branch }}</span></td>
                        <td class="p-4">
                            <form action="{{ route('admin.registrations.update-status', $reg) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="px-2.5 py-1 rounded-lg text-xs font-bold border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <option value="Menunggu Konfirmasi" {{ $reg->status === 'Menunggu Konfirmasi' ? 'selected' : '' }}>⏳ Menunggu Konfirmasi</option>
                                    <option value="Dikonfirmasi" {{ $reg->status === 'Dikonfirmasi' ? 'selected' : '' }}>✓ Dikonfirmasi</option>
                                    <option value="Ditolak" {{ $reg->status === 'Ditolak' ? 'selected' : '' }}>✕ Ditolak</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-4 text-center">
                            <form action="{{ route('admin.registrations.destroy', $reg) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $registrations->links() }}
        </div>
        @else
        <p class="text-center text-slate-400 py-12 text-sm">Tidak ada data pendaftaran yang ditemukan.</p>
        @endif
    </div>

</div>

@endsection
