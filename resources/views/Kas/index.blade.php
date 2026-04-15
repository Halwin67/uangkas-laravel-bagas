<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Uang Kas - XII RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen">
    <div class="max-w-6xl mx-auto py-12 px-4">
        
        <div class="bg-[#0d65a0] rounded-3xl p-8 mb-8 shadow-xl text-white relative overflow-hidden">
            <h1 class="text-3xl font-extrabold mb-2">Monitoring Uang Kas</h1>
            <p class="opacity-90">Sistem Pencatatan Keuangan Kelas XII RPL</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
            <form action="" method="GET" class="w-full md:w-1/2 relative">
                <input type="text" name="search" placeholder="Cari nama siswa..." value="{{ request('search') }}"
                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:border-[#0d65a0] outline-none">
            </form>
            <div class="text-sm font-semibold text-slate-500 bg-slate-100 px-4 py-2 rounded-lg">
                Total Data: {{ $data_kas->total() }} Siswa
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Siswa</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Periode</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Tanggal Bayar</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($data_kas as $s)
                    <tr class="hover:bg-blue-50/30 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-100 text-[#0d65a0] rounded-full flex items-center justify-center font-bold">
                                    {{ substr($s->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800 uppercase">{{ $s->nama }}</div>
                                    <div class="text-xs text-slate-400">NIS: {{ $s->nis ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            @if($s->kas->isNotEmpty())
                                <span class="text-sm font-semibold text-slate-600">Bulan {{ $s->kas->first()->bulan }}</span>
                                <span class="block text-xs text-slate-400">{{ $s->kas->first()->tahun }}</span>
                            @else
                                <span class="text-xs text-slate-400 italic">Belum Ada Data</span>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-sm text-slate-600">{{ $s->kas->first()->tanggal_bayar ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-5 text-center">
                            @if($s->kas->isNotEmpty() && $s->kas->first()->status_bayar == 1)
                                <span class="bg-emerald-100 text-emerald-600 px-4 py-1.5 rounded-full text-[10px] font-extrabold uppercase">Lunas</span>
                            @else
                                <span class="bg-red-50 text-red-500 px-4 py-1.5 rounded-full text-[10px] font-extrabold uppercase border border-red-100">Belum Bayar</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="p-10 text-center text-slate-400">Data Kosong...</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $data_kas->links() }}
        </div>
    </div>
</body>
</html>