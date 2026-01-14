@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <div class="flex justify-between items-end">
        <div>
            <h2 class="text-5xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">Agenda <span class="text-red-600">Kegiatan</span></h2>
            <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.5em] mt-3">Jadwal Kajian & Event Masjid</p>
        </div>
        <a href="{{ route('kegiatan.create') }}" class="bg-slate-900 text-white font-bold uppercase text-[10px] px-10 py-4 rounded-2xl hover:bg-red-600 transition shadow-xl shadow-slate-200 tracking-widest">
            + Jadwalkan Kegiatan
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($kegiatan as $k)
        <div class="bg-white border border-slate-200 p-10 rounded-[3rem] relative overflow-hidden group shadow-sm hover:shadow-md transition-all">
            <div class="absolute top-0 right-0 p-8">
                <span class="text-slate-50 text-7xl font-[900] uppercase leading-none select-none">{{ $loop->iteration }}</span>
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                    <p class="text-red-600 text-[10px] font-black uppercase tracking-[0.3em]">{{ $k->waktu_mulai->format('d F Y | H:i') }} WIB</p>
                </div>

                <h3 class="text-3xl font-[900] text-slate-900 uppercase tracking-tighter mb-2">{{ $k->nama_kegiatan }}</h3>
                <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest mb-8">Bersama: <span class="text-slate-600">{{ $k->penceramah }}</span></p>

                <div class="flex gap-6 border-t border-slate-50 pt-8 mt-4">
                    <a href="{{ route('kegiatan.edit', $k->id) }}" class="text-slate-400 hover:text-blue-600 font-bold text-[10px] uppercase tracking-widest transition">Ubah Jadwal</a>
                    <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Batalkan agenda ini?')">
                        @csrf @method('DELETE')
                        <button class="text-slate-300 hover:text-red-600 font-bold text-[10px] uppercase tracking-widest transition">Hapus Agenda</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection