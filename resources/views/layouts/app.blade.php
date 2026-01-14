<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKM - MANAGEMENT SYSTEM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.01em;
            font-style: normal;
            /* Memastikan semua tegak */
        }

        /* Sidebar Link Active: Merah ke Putih Tegak */
        .active-link {
            border-right: 4px solid #ef4444;
            background: linear-gradient(to right, rgba(239, 68, 68, 0.08), rgba(255, 255, 255, 0));
            color: #dc2626 !important;
            font-weight: 700;
        }

        .nav-item {
            transition: all 0.2s ease-in-out;
        }

        /* Menghapus paksa semua potensi italic dari library lain */
        .italic,
        i,
        em {
            font-style: normal !important;
        }
    </style>
</head>

<body class="h-full text-slate-600 antialiased">
    <div class="flex h-full">
        <aside class="w-72 bg-white border-r border-slate-200/60 flex flex-col shadow-sm">
            <div class="p-10">
                <h1 class="text-3xl font-[900] tracking-tighter text-slate-900 leading-none">
                    MASJID<span class="text-red-600">PRO</span>
                </h1>
                <div class="h-1.5 w-8 bg-red-600 mt-2 rounded-full"></div>
                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.4em] mt-3">Admin Console</p>
            </div>

            <nav class="flex-1 px-6 space-y-1">
                <p class="px-4 text-[10px] font-black text-slate-300 uppercase tracking-widest mb-4">Navigation</p>

                @php
                $menus = [
                ['dashboard', 'Dashboard'],
                ['kas*', 'Kas Masjid'],
                ['logistik*', 'Logistik & Stok'],
                ['kegiatan*', 'Agenda Kegiatan'],
                ['pengurus*', 'Data Pengurus']
                ];
                @endphp

                @foreach($menus as $m)
                <a href="{{ route(str_replace('*', '.index', $m[0])) }}"
                    class="nav-item flex items-center p-4 text-[12px] font-bold uppercase tracking-wider hover:text-red-600 {{ Request::is($m[0]) ? 'active-link' : 'text-slate-500' }}">
                    {{ $m[1] }}
                </a>
                @endforeach

                <a href="{{ route('profile.edit') }}" class="nav-item flex items-center p-4 text-[12px] font-bold uppercase tracking-wider hover:text-red-600 {{ Request::is($m[0]) ? 'active-link' : 'text-slate-500' }}">Edit Profil</a>

                <div class=" pt-6 mt-6 border-t border-slate-50">
                    <p class="px-4 text-[10px] font-black text-slate-300 uppercase tracking-widest mb-4">Reports</p>
                    <a href="{{ route('laporan.cetak') }}" target="_blank" class="flex items-center p-4 text-[12px] font-bold uppercase tracking-wider text-red-600 hover:bg-red-50 rounded-2xl transition-all">
                        Cetak Laporan
                    </a>
                </div>
            </nav>

            <div class="p-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full flex items-center justify-center bg-slate-900 text-white py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest hover:bg-red-600 transition-all duration-300 shadow-lg shadow-slate-200">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-[#fafafa] p-16">
            @if(session('success'))
            <div class="mb-10 flex items-center p-5 bg-white border-l-4 border-red-500 shadow-sm rounded-r-3xl">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-red-600 mr-4 font-bold">
                    ✓
                </div>
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Status</p>
                    <p class="text-sm font-bold text-slate-800 uppercase">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <div class="animate-in fade-in zoom-in-95 duration-500">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>