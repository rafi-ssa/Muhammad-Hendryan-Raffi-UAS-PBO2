<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Inventaris & Kas Masjid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {

            /* Memaksa elemen dengan class no-print untuk hilang total */
            .no-print {
                display: none !important;
            }

            /* Menghilangkan margin default browser agar laporan bersih */
            @page {
                margin: 0;
            }

            body {
                background-color: white !important;
                padding: 0 !important;
            }

            .max-w-4xl {
                max-width: 100% !important;
                width: 100% !important;
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>

<body class="bg-slate-50 py-10">

    <div class="max-w-4xl mx-auto bg-white p-10 shadow-xl rounded-xl border border-slate-200">

        <div class="flex justify-end mb-6 no-print">
            <button onclick="window.print()" class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold uppercase text-xs tracking-widest hover:bg-emerald-700 transition">
                🖨️ Cetak Laporan / Simpan PDF
            </button>
        </div>

        <div class="text-center border-b-4 border-slate-900 pb-6 mb-8">
            <h1 class="text-3xl font-black uppercase tracking-tighter italic">Laporan Konsolidasi <span class="text-emerald-600">Masjid</span></h1>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mt-1">Sistem Manajemen Masjid Digital v1.0</p>
            <p class="text-xs text-slate-400 mt-2 italic">Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }}</p>
        </div>

        <div class="mb-10">
            <h2 class="text-lg font-black uppercase italic mb-4 border-l-4 border-emerald-500 pl-3">I. Ringkasan Keuangan</h2>
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-slate-50 rounded-lg border border-slate-200 text-center">
                    <p class="text-[10px] font-bold text-slate-500 uppercase italic">Total Pemasukan</p>
                    <p class="text-sm font-black text-emerald-600">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</p>
                </div>
                <div class="p-4 bg-slate-50 rounded-lg border border-slate-200 text-center">
                    <p class="text-[10px] font-bold text-slate-500 uppercase italic">Total Pengeluaran</p>
                    <p class="text-sm font-black text-red-600">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</p>
                </div>
                <div class="p-4 bg-slate-900 rounded-lg text-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase italic">Saldo Akhir Kas</p>
                    <p class="text-sm font-black text-white">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="mb-10">
            <h2 class="text-lg font-black uppercase italic mb-4 border-l-4 border-emerald-500 pl-3">II. Status Stok & Aset</h2>
            <table class="w-full text-xs text-left border-collapse border border-slate-200">
                <thead>
                    <tr class="bg-slate-100 italic font-black uppercase text-slate-600">
                        <th class="border border-slate-200 p-3">Nama Barang</th>
                        <th class="border border-slate-200 p-3 text-center">Stok Tersedia</th>
                        <th class="border border-slate-200 p-3 text-center">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stokAset as $stok)
                    <tr>
                        <td class="border border-slate-200 p-3 font-bold">{{ $stok->nama_kategori }}</td>
                        <td class="border border-slate-200 p-3 text-center font-black text-emerald-600">{{ $stok->stok_sekarang }}</td>
                        <td class="border border-slate-200 p-3 text-center uppercase text-slate-400">{{ $stok->satuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-10">
            <h2 class="text-lg font-black uppercase italic mb-4 border-l-4 border-emerald-500 pl-3">III. Logistik Masuk Terakhir</h2>
            <table class="w-full text-[10px] text-left border-collapse border border-slate-200">
                <thead>
                    <tr class="bg-slate-100 italic font-black uppercase text-slate-600">
                        <th class="border border-slate-200 p-2">Barang</th>
                        <th class="border border-slate-200 p-2">Jumlah</th>
                        <th class="border border-slate-200 p-2">Pemberi</th>
                        <th class="border border-slate-200 p-2 text-center">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logistik->take(10) as $item)
                    <tr>
                        <td class="border border-slate-200 p-2 font-bold">{{ $item->kategori->nama_kategori ?? 'N/A' }}</td>
                        <td class="border border-slate-200 p-2">{{ $item->jumlah_masuk }}</td>
                        <td class="border border-slate-200 p-2 italic text-slate-500">{{ $item->pemberi ?? 'Hamba Allah' }}</td>
                        <td class="border border-slate-200 p-2 text-center">{{ $item->tanggal_tiba }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-20 grid grid-cols-2 gap-20 text-center">
            <div>
                <p class="text-[10px] font-bold uppercase mb-16">Dibuat Oleh,</p>
                <p class="font-black border-b border-slate-900 inline-block uppercase italic">Sekretaris DKM</p>
            </div>
            <div>
                <p class="text-[10px] font-bold uppercase mb-16">Mengetahui,</p>
                <p class="font-black border-b border-slate-900 inline-block uppercase italic">Ketua DKM</p>
            </div>
        </div>

    </div>

</body>

</html>