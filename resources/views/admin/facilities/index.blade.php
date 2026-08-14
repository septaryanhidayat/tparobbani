@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas & Foto')

@section('content')

<div class="space-y-8" x-data="{ addModal: false, editModal: false, activeFacility: {} }">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-display text-2xl font-bold text-slate-900">Fasilitas Utama & Foto Showcase</h2>
            <p class="text-sm text-slate-500">Tambah/Edit judul, deskripsi, tag highlight, dan ganti foto ruangan kapan saja.</p>
        </div>
        <button @click="addModal = true" class="px-5 py-3 rounded-2xl font-bold text-xs text-white bg-cyan-600 hover:bg-cyan-700 shadow-md transition">
            + Tambah Fasilitas Baru
        </button>
    </div>

    <!-- Modal Form Tambah -->
    <div x-show="addModal" x-transition class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-lg w-full shadow-2xl space-y-4">
            <h3 class="font-display text-xl font-bold text-slate-900">Tambah Fasilitas & Upload Foto</h3>
            
            <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Fasilitas *</label>
                    <input type="text" name="title" required placeholder="Contoh: Kolam Mandi Bola & Area Motorik" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Fasilitas *</label>
                    <textarea name="desc" rows="3" required placeholder="Penjelasan singkat kenyamanan..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tag Highlight</label>
                    <input type="text" name="tag" placeholder="Contoh: Kenyamanan Utama" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Foto Fasilitas (Upload)</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-cyan-50 file:text-cyan-600">
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="addModal = false" class="px-5 py-2.5 rounded-xl font-bold text-xs text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-xs text-white bg-cyan-600 hover:bg-cyan-700 shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Form Edit -->
    <div x-show="editModal" x-transition class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-lg w-full shadow-2xl space-y-4">
            <h3 class="font-display text-xl font-bold text-slate-900">Edit Fasilitas & Ganti Foto</h3>
            
            <form :action="'{{ url('admin/facilities') }}/' + activeFacility.id" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Fasilitas *</label>
                    <input type="text" name="title" x-model="activeFacility.title" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Fasilitas *</label>
                    <textarea name="desc" rows="3" x-model="activeFacility.desc" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tag Highlight</label>
                    <input type="text" name="tag" x-model="activeFacility.tag" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ganti Foto Ruangan (Upload Baru)</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-cyan-50 file:text-cyan-600">
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="editModal = false" class="px-5 py-2.5 rounded-xl font-bold text-xs text-slate-600 bg-slate-100 hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-xs text-white bg-cyan-600 hover:bg-cyan-700 shadow-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Facility Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($facilities as $fac)
        <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs flex flex-col justify-between">
            <div>
                <img src="{{ asset($fac->image) }}" alt="{{ $fac->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold bg-pink-100 text-pink-600 inline-block mb-2">{{ $fac->tag }}</span>
                    <h3 class="font-display font-bold text-lg text-slate-900 mb-2">{{ $fac->title }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ $fac->desc }}</p>
                </div>
            </div>
            <div class="px-6 pb-6 pt-2 flex items-center justify-between border-t border-slate-100">
                <button @click="activeFacility = {{ json_encode($fac) }}; editModal = true" class="text-xs font-bold text-cyan-600 hover:underline">
                    ✏️ Edit Judul, Teks & Foto
                </button>
                <form action="{{ route('admin.facilities.destroy', $fac) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
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
