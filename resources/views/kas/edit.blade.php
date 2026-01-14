@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase">Update <span class="text-red-600">Data Kas</span></h2>
        <a href="{{ route('kas.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-red-600 transition">← Batal & Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('kas.update', $kas->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Keterangan</label>
                <input type="text" name="keterangan" value="{{ $kas->keterangan }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none transition" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Tipe</label>
                    <select name="tipe" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none">
                        <option value="masuk" {{ $kas->tipe == 'masuk' ? 'selected' : '' }}>UANG MASUK</option>
                        <option value="keluar" {{ $kas->tipe == 'keluar' ? 'selected' : '' }}>UANG KELUAR</option>
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nominal (Rp)</label>
                    <input type="number" name="nominal" value="{{ $kas->nominal }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none" required>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $kas->tanggal->format('Y-m-d') }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none" required>
            </div>

            <button type="submit" class="w-full bg-red-600 text-white font-black py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-red-100">
                Update Transaksi Sekarang
            </button>
        </form>
    </div>
</div>
@endsection