@extends('layouts.public')

@section('content')

<section class="py-24 px-6 text-center">
    <div class="inline-block px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-[0.3em] mb-6">
        Informasi Terpadu Masjid
    </div>
    <h1 class="text-6xl md:text-8xl font-[900] tracking-tighter text-slate-900 uppercase leading-[0.9] mb-8">
        Membangun <br><span class="text-red-600">Transparansi</span>
    </h1>
    <p class="max-w-xl mx-auto text-slate-400 font-bold text-sm uppercase tracking-widest leading-relaxed">
        Selamat datang di portal informasi publik. Kami menyajikan data keuangan, agenda, dan struktur organisasi secara terbuka.
    </p>
</section>

<div class="max-w-7xl mx-auto px-6 space-y-32 pb-20">

    <section id="kas" class="scroll-mt-32">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            <div>
                <h2 class="text-4xl font-[900] tracking-tighter uppercase mb-4 leading-none text-slate-900">Laporan <br><span class="text-red-600">Kas Masjid</span></h2>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest leading-loose mb-8">Data transaksi terbaru dan saldo riil yang tersedia saat ini.</p>
                <div class="p-8 bg-slate-900 rounded-[2.5rem] shadow-2xl shadow-slate-200">
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-2">Total Saldo Saat Ini</p>
                    <p class="text-3xl font-[900] text-white tracking-tighter">Rp {{ number_format($saldoTotal) }}</p>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white border border-slate-100 rounded-[3rem] p-10 shadow-sm">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-50">
                            <th class="py-4 text-[10px] font-black uppercase text-slate-400 tracking-widest">Keterangan</th>
                            <th class="py-4 text-[10px] font-black uppercase text-slate-400 tracking-widest text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($kas_list as $item)
                        <tr>
                            <td class="py-5">
                                <p class="text-sm font-[900] text-slate-900 uppercase tracking-tight">{{ $item->keterangan }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">{{ $item->created_at->format('d M Y') }}</p>
                            </td>
                            <td class="py-5 text-right font-black text-sm tracking-tight {{ $item->tipe == 'masuk' ? 'text-emerald-500' : 'text-red-500' }}">
                                {{ $item->tipe == 'masuk' ? '+' : '-' }} Rp {{ number_format($item->nominal) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="agenda" class="scroll-mt-32">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-[900] tracking-tighter uppercase text-slate-900">Agenda <span class="text-red-600">Kegiatan</span></h2>
            <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.4em] mt-2">Jangan lewatkan kajian dan acara kami</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($agenda as $a)
            <div class="bg-white border border-slate-100 p-8 rounded-[2.5rem] shadow-sm hover:shadow-md transition-all">
                <div class="text-red-600 text-sm font-black mb-4 uppercase tracking-tighter">
                    {{ $a->waktu_mulai->format('d F') }}
                </div>
                <h3 class="text-xl font-[900] uppercase tracking-tight text-slate-900 mb-2 leading-tight">{{ $a->nama_kegiatan }}</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-6">Penceramah: {{ $a->penceramah }}</p>
                <div class="pt-6 border-t border-slate-50 flex items-center gap-2">
                    <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-900">{{ $a->waktu_mulai->format('H:i') }} WIB</span>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest">Belum ada agenda terdekat</p>
            </div>
            @endforelse
        </div>
    </section>

    <section id="pengurus" class="scroll-mt-32">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
            <h2 class="text-4xl font-[900] tracking-tighter uppercase text-slate-900">Struktur <span class="text-red-600">DKM</span></h2>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest md:max-w-xs md:text-right">Melayani umat dengan dedikasi dan keikhlasan.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach($pengurus as $p)
            <div class="group text-center">
                <div class="w-20 h-20 bg-white border border-slate-100 rounded-3xl mx-auto mb-4 flex items-center justify-center shadow-sm group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                    <span class="text-2xl font-[900]">{{ substr($p->nama_lengkap, 0, 1) }}</span>
                </div>
                <h4 class="text-[11px] font-[900] uppercase tracking-tight text-slate-900 leading-tight">{{ $p->nama_lengkap }}</h4>
                <p class="text-[8px] font-black text-red-600 uppercase tracking-widest mt-1">{{ $p->jabatan }}</p>
            </div>
            @endforeach
        </div>
    </section>

</div>
@endsection