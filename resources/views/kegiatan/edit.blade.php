@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase">Edit <span class="text-blue-600">Jadwal Agenda</span></h2>
        <a href="{{ route('kegiatan.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-blue-600 transition">← Batal & Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Penceramah / PJ</label>
                <input type="text" name="penceramah" value="{{ $kegiatan->penceramah }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Waktu Mulai</label>
                    <input type="datetime-local" name="waktu_mulai" value="{{ $kegiatan->waktu_mulai->format('Y-m-d\TH:i') }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $kegiatan->lokasi }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-blue-100">
                Simpan Perubahan Agenda 🔄
            </button>
        </form>
    </div>
</div>
@endsection