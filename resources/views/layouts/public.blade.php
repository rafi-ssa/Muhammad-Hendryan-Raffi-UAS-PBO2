<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASJID PRO | Portal Informasi Publik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center shadow-lg shadow-red-200">
                    <span class="text-white font-[900]">M</span>
                </div>
                <span class="text-xl font-[900] tracking-tighter uppercase">Masjid<span class="text-red-600">Pro</span></span>
            </div>

            <div class="hidden md:flex items-center gap-10">
                <a href="#kas" class="text-[10px] font-black uppercase tracking-widest hover:text-red-600 transition">Keuangan</a>
                <a href="#agenda" class="text-[10px] font-black uppercase tracking-widest hover:text-red-600 transition">Agenda</a>
                <a href="#pengurus" class="text-[10px] font-black uppercase tracking-widest hover:text-red-600 transition">Pengurus</a>
            </div>

            @if (Route::has('login'))
            @auth
            <a href="{{ route('dashboard') }}" class="bg-slate-900 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-600 transition">Panel Admin →</a>
            @else
            <a href="{{ route('login') }}" class="bg-red-600 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-900 transition shadow-lg shadow-red-100">Login Admin</a>
            @endauth
            @endif
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-100 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em] mb-4">© {{ date('Y') }} Masjid Pro Digital Transformation</p>
            <div class="flex justify-center gap-6">
                <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                <span class="w-2 h-2 bg-slate-200 rounded-full"></span>
                <span class="w-2 h-2 bg-slate-200 rounded-full"></span>
            </div>
        </div>
    </footer>
</body>

</html>