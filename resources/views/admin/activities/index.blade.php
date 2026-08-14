@extends('admin.layouts.app')

@section('title', 'Kelola Kegiatan Harian')

@section('content')

<div class="space-y-8" x-data="{ addModal: false }">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-display text-2xl font-bold text-slate-900">Program & Kegiatan Harian</h2>
            <p class="text-sm text-slate-500">Tambah, ubah, atau hapus kegiatan harian anak di TPA Robbani.</p>
        </div>
        <button @click="addModal = true" class="px-5 py-3 rounded-2xl font-bold text-xs text-white bg-pink-600 hover:bg-pink-700 shadow-md transition">
            + Tambah Kegiatan Baru
        </button>
    </div>

    <!-- Modal Form Tambah -->
    <div x-show="addModal" x-transition class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-lg w-full shadow-2xl space-y-4">
            <h3 class="font-display text-xl font-bold text-slate-900">Tambah Kegiatan Baru</h3>
            
            <form action="{{ route('admin.activities.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Judul Kegiatan</label>
                    <input type="text" name="title" required placeholder="Contoh: Belajar Hijaiyah & Doa Harian" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Kegiatan</label>
                    <textarea name="desc" rows="3" required placeholder="Penjelasan singkat..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Gradien Warna Card</label>
                    <select name="color" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm bg-white">
                        <option value="from-pink-500 to-rose-500">Pink / Rose</option>
                        <option value="from-purple-500 to-indigo-500">Purple / Indigo</option>
                        <option value="from-cyan-500 to-blue-500">Cyan / Blue</option>
                        <option value="from-amber-400 to-orange-500">Amber / Orange</option>
                        <option value="from-emerald-500 to-teal-600">Emerald / Teal</option>
                    </select>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="addModal = false" class="px-5 py-2.5 rounded-xl font-bold text-xs text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-xs text-white bg-pink-600 hover:bg-pink-700 shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Activity Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($activities as $act)
        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
            <div>
                <h3 class="font-display font-bold text-lg text-slate-900 mb-2">{{ $act->title }}</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4">{{ $act->desc }}</p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400">Urutan: #{{ $act->order }}</span>
                <form action="{{ route('admin.activities.destroy', $act) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs font-bold text-rose-600 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
