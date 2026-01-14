@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase">Buat <span class="text-red-600">Agenda Baru</span></h2>
        <a href="{{ route('kegiatan.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-red-600 transition">← Kembali ke Jadwal</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('kegiatan.store') }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="Contoh: Kajian Rutin Maghrib" required>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Penceramah / PJ</label>
                <input type="text" name="penceramah" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="Nama Ustaz / Tokoh" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Waktu Mulai</label>
                    <input type="datetime-local" name="waktu_mulai" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Lokasi</label>
                    <input type="text" name="lokasi" value="Ruang Utama Masjid" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-red-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-red-100">
                Publikasikan Agenda 🗓️
            </button>
        </form>
    </div>
</div>
@endsection