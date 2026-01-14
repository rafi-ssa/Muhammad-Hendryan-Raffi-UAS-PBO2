@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">Tambah <span class="text-red-600">Personel</span></h2>
        <a href="{{ route('pengurus.index') }}" class="text-slate-400 font-bold uppercase text-[10px] tracking-widest hover:text-red-600 transition mt-4 inline-block">← Kembali ke Struktur</a>
    </div>

    <div class="bg-white border border-slate-200 p-12 rounded-[3rem] shadow-sm">
        <form action="{{ route('pengurus.store') }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="Sesuai KTP" required>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Jabatan</label>
                    <input type="text" name="jabatan" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="Contoh: Bendahara" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">No. WhatsApp</label>
                    <input type="text" name="no_hp" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="0812..." required>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Alamat Tinggal</label>
                <textarea name="alamat" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition resize-none" placeholder="Alamat lengkap..."></textarea>
            </div>

            <button type="submit" class="w-full bg-red-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-red-100">
                Daftarkan Pengurus Baru 👤
            </button>
        </form>
    </div>
</div>
@endsection