<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Struk Belanja | SaaS struck</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="bg-[#f8fafc] flex min-h-screen">

    <aside class="w-64 bg-white border-r border-slate-200 flex-shrink-0 hidden md:flex flex-col">
        <div class="p-6">
            <h1 class="text-xl font-bold text-indigo-600 tracking-tight">struck.AI</h1>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium text-slate-600 rounded-lg hover:bg-slate-50 transition-colors">
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg">
                <span>Input Struk</span>
            </a>
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium text-slate-600 rounded-lg hover:bg-slate-50 transition-colors">
                <span>Riwayat Belanja</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <header class="mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Proses Struk Baru</h2>
                <p class="text-slate-500 text-sm">Masukkan teks mentah dari struk belanja lu di bawah ini.</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-slate-700">Ahmad Syahani</span>
                <div
                    class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                    AS</div>
            </div>
        </header>

        <div class="max-w-4xl mx-auto">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="glass rounded-3xl p-8 shadow-sm">
                <form action="{{ route('struk.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="raw_struck_text" class="block text-sm font-semibold text-slate-700 mb-2">Teks Struk
                            Mentah</label>
                        <textarea name="raw_struck_text" id="raw_struck_text" rows="12"
                            class="w-full p-4 rounded-2xl border border-slate-200 bg-white/50 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all placeholder:text-slate-400 text-slate-700 font-mono text-sm"
                            placeholder="Contoh:&#10;Indomaret PENS&#10;Tgl: 19-04-2026&#10;------------------&#10;Kopi Kapal Api  x2  10.000&#10;Roti Aoka      x5  25.000&#10;------------------&#10;TOTAL              35.000"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg shadow-indigo-200 transition-all hover:-translate-y-0.5 active:scale-95">
                            Proses & Simpan ke DB
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Tips Parsing</h3>
                    <ul class="text-sm text-slate-600 space-y-2">
                        <li class="flex items-start">
                            <span class="mr-2 text-indigo-500">✔</span>
                            Pastiin format tanggal terbaca jelas (DD-MM-YYYY).
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-indigo-500">✔</span>
                            Pemisah antara nama barang dan harga minimal pake spasi atau tab.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

</html>