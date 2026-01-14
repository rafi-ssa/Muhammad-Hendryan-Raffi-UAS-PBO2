@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <div class="flex justify-between items-end">
        <div>
            <h2 class="text-5xl font-[900] tracking-tighter text-slate-900 uppercase">Arus <span class="text-red-600">Kas</span></h2>
            <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.5em] mt-2">Pencatatan Keuangan Masjid</p>
        </div>
        <a href="{{ route('kas.create') }}" class="bg-slate-900 text-white font-bold uppercase text-[10px] px-10 py-4 rounded-2xl hover:bg-red-600 transition shadow-xl shadow-slate-200 tracking-widest">
            + Tambah Data
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-[10px] font-black uppercase text-slate-400 tracking-widest">
                <tr>
                    <th class="px-8 py-6">Tanggal</th>
                    <th class="px-8 py-6">Keterangan</th>
                    <th class="px-8 py-6">Kategori</th>
                    <th class="px-8 py-6 text-right">Nominal</th>
                    <th class="px-8 py-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($kas as $item)
                <tr class="hover:bg-slate-50/50 transition group">
                    <td class="px-8 py-6 font-bold text-slate-400 text-xs">{{ $item->tanggal->format('d/m/Y') }}</td>
                    <td class="px-8 py-6 font-bold text-slate-800 uppercase tracking-tight">{{ $item->keterangan }}</td>
                    <td class="px-8 py-6">
                        <span class="bg-slate-100 text-slate-500 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-slate-200">
                            {{ $item->kategori_kas }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right font-bold {{ $item->tipe == 'masuk' ? 'text-blue-600' : 'text-red-600' }}">
                        {{ $item->tipe == 'masuk' ? '+' : '-' }} Rp {{ number_format($item->nominal, 0, ',', '.') }}
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('kas.edit', $item->id) }}" class="bg-slate-50 text-slate-400 hover:text-blue-600 p-2 rounded-lg transition border border-slate-100 font-bold text-[10px] uppercase">Edit</a>
                            <form action="{{ route('kas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="bg-slate-50 text-slate-400 hover:text-red-600 p-2 rounded-lg transition border border-slate-100 font-bold text-[10px] uppercase">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection