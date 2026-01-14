<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | MASJID PRO SYSTEM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="h-full flex items-center justify-center p-6 text-slate-800">

    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-red-600 rounded-[2rem] shadow-xl shadow-red-200 mb-6">
                <span class="text-white text-3xl font-[900]">M</span>
            </div>

            <h1 class="text-4xl font-[900] tracking-tighter text-slate-900 uppercase leading-none">
                MASJID<span class="text-red-600">PRO</span>
            </h1>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.5em] mt-4">Management Central Access</p>
        </div>

        <div class="bg-white border border-slate-200 p-10 rounded-[3rem] shadow-xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 bg-red-600"></div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-100 p-4 rounded-2xl mb-6">
                    <p class="text-red-600 text-[10px] font-black uppercase tracking-widest text-center">
                        {{ $errors->first() }}
                    </p>
                </div>
                @endif

                <div>
                    <label for="email" class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Administrator Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition placeholder:text-slate-300"
                        placeholder="admin@masjid.com"
                        required
                        autofocus>
                </div>

                <div>
                    <label for="password" class="text-[10px] font-black uppercase text-slate-400 block mb-3 tracking-widest">Secret Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-5 text-slate-800 font-bold outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition placeholder:text-slate-300"
                        placeholder="••••••••"
                        required>
                </div>

                <div class="flex items-center justify-between px-2">
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-red-600 focus:ring-red-600 cursor-pointer">
                        <span class="text-[10px] font-black uppercase text-slate-400 group-hover:text-slate-600 transition">Ingat Sesi</span>
                    </label>
                    <a href="#" class="text-[10px] font-black uppercase text-slate-300 hover:text-red-600 transition">Lupa Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-slate-900 text-white font-black py-6 rounded-3xl uppercase text-xs tracking-[0.4em] hover:bg-red-600 hover:scale-[1.02] active:scale-[0.98] transition shadow-xl shadow-slate-200">
                    Masuk Ke Sistem ⚡
                </button>
            </form>
        </div>

        <p class="text-center mt-10 text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-loose">
            &copy; {{ date('Y') }} DKM Digital Transformation.<br>
            Made for excellence.
        </p>
    </div>

</body>

</html>