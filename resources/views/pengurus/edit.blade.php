@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">Update <span class="text-blue-600">Profil Personel</span></h2>
        <a href="{{ route('pengurus.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-blue-600 transition mt-4 inline-block">← Batal & Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $pengurus->nama_lengkap }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ $pengurus->jabatan }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">No. WhatsApp</label>
                    <input type="text" name="no_hp" value="{{ $pengurus->no_hp }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Alamat Tinggal</label>
                <textarea name="alamat" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition resize-none">{{ $pengurus->alamat }}</textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-blue-100">
                Simpan Perubahan Data 💾
            </button>
        </form>
    </div>
</div>
@endsection