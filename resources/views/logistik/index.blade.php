@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-4xl font-[900] text-slate-900 uppercase tracking-tighter leading-none">
                LOGISTIK <span class="text-red-600">& STOK</span>
            </h1>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.5em] mt-2">Inventory Management System</p>
        </div>

        <a href="{{ route('logistik.create') }}"
            class="inline-flex items-center justify-center bg-slate-900 text-white font-bold px-8 py-4 rounded-2xl uppercase text-[10px] tracking-widest hover:bg-red-600 transition shadow-xl shadow-slate-200">
            + Tambah Logistik Masuk
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white border border-slate-200 p-8 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Transaksi</p>
            <h3 class="text-2xl font-[900] text-slate-800 uppercase tracking-tight">{{ $logistik->count() }} Record</h3>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-white border-l-4 border-red-500 p-5 rounded-r-2xl mb-8 shadow-sm flex items-center">
        <span class="mr-3 text-red-500 font-bold text-lg">✓</span>
        <p class="text-slate-800 text-[10px] font-black uppercase tracking-widest">
            {{ session('success') }}
        </p>
    </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b border-slate-100">Kategori Barang</th>
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b border-slate-100">Jumlah</th>
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b border-slate-100">Pemberi / Vendor</th>
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b border-slate-100">Tanggal Tiba</th>
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest border-b border-slate-100">Status</th>
                        <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-right border-b border-slate-100">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($logistik as $item)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-6">
                            <span class="text-sm font-bold text-slate-800 block uppercase tracking-tight">
                                {{ $item->kategori->nama_kategori ?? 'N/A' }}
                            </span>
                            <span class="text-[9px] text-slate-400 uppercase font-bold tracking-wider">
                                ID: #LOG-{{ $item->id }}
                            </span>
                        </td>
                        <td class="p-6">
                            <span class="font-bold text-red-600 text-sm">
                                {{ $item->jumlah_masuk }}
                            </span>
                            <span class="text-[10px] text-slate-400 uppercase ml-1 font-bold">{{ $item->kategori->satuan ?? '' }}</span>
                        </td>
                        <td class="p-6 text-xs font-bold text-slate-500 uppercase tracking-tight">
                            {{ $item->pemberi ?? 'Hamba Allah' }}
                        </td>
                        <td class="p-6 text-xs font-bold text-slate-400 uppercase tracking-tighter">
                            {{ \Carbon\Carbon::parse($item->tanggal_tiba)->format('d M Y') }}
                        </td>
                        <td class="p-6">
                            @if($item->status == 'diterima')
                            <span class="bg-blue-50 text-blue-600 text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-widest border border-blue-100">Diterima</span>
                            @else
                            <span class="bg-orange-50 text-orange-600 text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-widest border border-orange-100">Rencana</span>
                            @endif
                        </td>
                        <td class="p-6">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('logistik.edit', $item->id) }}" class="p-2 bg-slate-50 text-slate-400 hover:text-blue-600 rounded-lg transition border border-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('logistik.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-50 text-slate-400 hover:text-red-500 rounded-lg transition border border-slate-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-20 text-center">
                            <p class="text-[10px] font-black uppercase text-slate-300 tracking-[0.3em]">Gudang Kosong</p>
                            <p class="text-xs text-slate-400 mt-2 font-bold">Belum ada logistik yang tercatat.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection