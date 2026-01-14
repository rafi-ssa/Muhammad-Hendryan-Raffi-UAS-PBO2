@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase">Kemaskini <span class="text-blue-600">Logistik</span></h2>
        <a href="{{ route('logistik.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-blue-600 transition">← Batal & Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('logistik.update', $logistik->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Jenis Barang</label>
                <select name="kategori_stok_id" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition">
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $logistik->kategori_stok_id == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_barang }} ({{ $kat->satuan }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Jumlah Masuk</label>
                    <input type="number" name="jumlah_masuk" value="{{ $logistik->jumlah_masuk }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Status</label>
                    <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition">
                        <option value="diterima" {{ $logistik->status == 'diterima' ? 'selected' : '' }}>DITERIMA</option>
                        <option value="rencana" {{ $logistik->status == 'rencana' ? 'selected' : '' }}>RENCANA</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Pemberi / Donatur</label>
                <input type="text" name="pemberi" value="{{ $logistik->pemberi }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition">
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Tanggal Tiba</label>
                <input type="date" name="tanggal_tiba" value="{{ \Carbon\Carbon::parse($logistik->tanggal_tiba)->format('Y-m-d') }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-blue-600 outline-none transition" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-blue-100">
                Update Data Logistik 🔄
            </button>
        </form>
    </div>
</div>
@endsection