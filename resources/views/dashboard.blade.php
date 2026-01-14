@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <header>
        <h2 class="text-5xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">
            System <span class="text-red-600">Overview</span>
        </h2>
        <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.4em] mt-3">Monitoring Data Masjid Real-Time</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center mb-6">
                <span class="text-red-600 text-lg">💰</span>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Total Saldo Kas</p>
            <h3 class="text-3xl font-extrabold text-slate-900 tracking-tighter">
                Rp {{ number_format($saldoTotal ?? 0, 0, ',', '.') }}
            </h3>
        </div>

        <div class="bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center mb-6">
                <span class="text-orange-600 text-lg">📦</span>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Logistik Pending</p>
            <h3 class="text-3xl font-extrabold text-slate-900 tracking-tighter">
                {{ $barangRencana ?? 0 }} <span class="text-xs text-slate-400 uppercase tracking-normal">Item</span>
            </h3>
        </div>

        <div class="bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-6">
                <span class="text-blue-600 text-lg">🗓️</span>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Agenda Mendatang</p>
            <h3 class="text-3xl font-extrabold text-slate-900 tracking-tighter">
                {{ count($kegiatan_terdekat ?? []) }} <span class="text-xs text-slate-400 uppercase tracking-normal">Event</span>
            </h3>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <div class="p-8 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-black uppercase text-slate-900 tracking-widest text-sm">Jadwal Agenda Terdekat</h3>
            <a href="{{ route('kegiatan.index') }}" class="text-[10px] font-bold text-red-500 uppercase tracking-widest hover:underline">Lihat Semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black uppercase text-slate-400 tracking-widest">
                        <th class="px-8 py-5">Nama Kegiatan</th>
                        <th class="px-8 py-5">Penceramah / PJ</th>
                        <th class="px-8 py-5">Waktu Pelaksanaan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($kegiatan_terdekat as $k)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <span class="block font-bold text-slate-800 uppercase text-sm tracking-tight">{{ $k->nama_kegiatan }}</span>
                            <span class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">{{ $k->lokasi }}</span>
                        </td>
                        <td class="px-8 py-6 text-slate-500 font-bold uppercase text-xs">
                            {{ $k->penceramah }}
                        </td>
                        <td class="px-8 py-6">
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full font-bold text-[10px] uppercase tracking-widest">
                                {{ $k->waktu_mulai->format('d M, H:i') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-12 text-center text-slate-400 font-bold uppercase text-[10px] tracking-[0.2em]">
                            Belum ada agenda yang terdaftar
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection