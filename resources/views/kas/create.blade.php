@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase">Tambah <span class="text-red-600">Transaksi</span></h2>
        <a href="{{ route('kas.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-red-600 transition">← Kembali ke List</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('kas.store') }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Keterangan Transaksi</label>
                <input type="text" name="keterangan" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none transition" placeholder="Contoh: Infaq Jumat" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Tipe Kas</label>
                    <select name="tipe" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none">
                        <option value="masuk">UANG MASUK</option>
                        <option value="keluar">UANG KELUAR</option>
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nominal (Rp)</label>
                    <input type="number" name="nominal" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Kategori</label>
                    <input type="text" name="kategori_kas" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none" placeholder="Kas Umum" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-500 outline-none" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-red-600 text-white font-black py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-red-100">
                Simpan Transaksi Sekarang
            </button>
        </form>
    </div>
</div>
@endsection