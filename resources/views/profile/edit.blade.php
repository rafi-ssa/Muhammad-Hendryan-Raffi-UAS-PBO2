@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">Profil <span class="text-red-600">Admin</span></h2>
            <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.5em] mt-3">Pengaturan Akses Pusat</p>
        </div>
        <div class="hidden md:block">
            <span class="bg-slate-100 text-slate-500 text-[10px] font-[900] px-4 py-2 rounded-full uppercase tracking-widest border border-slate-200">
                Level: Super Administrator
            </span>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-white border-l-4 border-red-500 p-5 rounded-r-2xl mb-8 shadow-sm flex items-center">
        <span class="mr-3 text-red-500 font-bold">✓</span>
        <p class="text-slate-800 text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</p>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm text-center">
                <div class="w-24 h-24 bg-slate-50 border-4 border-white shadow-xl rounded-[2rem] mx-auto mb-6 flex items-center justify-center">
                    <span class="text-3xl font-[900] text-red-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <h3 class="text-xl font-[900] text-slate-900 uppercase tracking-tight">{{ Auth::user()->name }}</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ Auth::user()->email }}</p>
            </div>

            <div class="bg-slate-900 p-8 rounded-[2.5rem] shadow-xl">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Keamanan Akun</p>
                <p class="text-xs text-slate-300 leading-relaxed font-bold uppercase tracking-tight">
                    Pastikan password Anda memiliki kombinasi huruf, angka, dan simbol untuk keamanan maksimal sistem Masjid Pro.
                </p>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white border border-slate-200 p-10 rounded-[3rem] shadow-sm">
                <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-6">
                        <h4 class="text-[10px] font-[900] text-slate-900 uppercase tracking-[0.3em] border-b border-slate-100 pb-4">Informasi Dasar</h4>

                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" required>
                        </div>

                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Alamat Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" required>
                        </div>
                    </div>

                    <div class="space-y-6 pt-4">
                        <h4 class="text-[10px] font-[900] text-slate-900 uppercase tracking-[0.3em] border-b border-slate-100 pb-4">Ganti Password (Kosongkan jika tidak diubah)</h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Password Baru</label>
                                <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="••••••••">
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold focus:border-red-600 outline-none transition" placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-red-600 text-white font-[900] py-6 rounded-3xl uppercase text-[11px] tracking-[0.3em] hover:bg-slate-900 transition shadow-lg shadow-red-100">
                            Simpan Perubahan Profil ⚡
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection