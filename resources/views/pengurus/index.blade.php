@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
        <div>
            <h2 class="text-5xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">Struktur <span class="text-red-600">DKM</span></h2>
            <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.5em] mt-3">Data Pengurus & Personel Masjid</p>
        </div>
        <a href="{{ route('pengurus.create') }}" class="bg-slate-900 text-white font-bold uppercase text-[10px] px-10 py-4 rounded-2xl hover:bg-red-600 transition shadow-xl shadow-slate-200 tracking-widest">
            + Tambah Personel
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($pengurus as $p)
        <div class="bg-white border border-slate-200 p-8 rounded-[2.5rem] relative group hover:shadow-md transition-all">
            <div class="mb-6">
                <p class="text-[9px] font-black uppercase text-red-600 tracking-[0.2em] mb-1">{{ $p->jabatan }}</p>
                <h3 class="text-2xl font-[900] text-slate-900 uppercase tracking-tighter">{{ $p->nama_lengkap }}</h3>
            </div>

            <div class="space-y-4 mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center">
                        <span class="text-[10px] font-black text-slate-400">WA</span>
                    </div>
                    <span class="text-sm font-bold text-slate-600 tracking-tight">{{ $p->no_hp }}</span>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center shrink-0">
                        <span class="text-[10px] font-black text-slate-400">AL</span>
                    </div>
                    <span class="text-[11px] font-bold text-slate-400 uppercase leading-relaxed tracking-tight">
                        {{ Str::limit($p->alamat, 60) }}
                    </span>
                </div>
            </div>

            <div class="flex gap-6 border-t border-slate-50 pt-6">
                <a href="{{ route('pengurus.edit', $p->id) }}" class="text-slate-400 hover:text-blue-600 font-bold text-[10px] uppercase tracking-widest transition">Edit Profil</a>
                <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                    @csrf @method('DELETE')
                    <button class="text-slate-300 hover:text-red-600 font-bold text-[10px] uppercase tracking-widest transition">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection