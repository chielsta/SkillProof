<x-layouts.app title="Hasil Analisis Lowongan">
    <div class="space-y-6">
        {{-- Breadcrumb / Back --}}
        <div class="flex items-center justify-between">
            <a href="{{ route('analisis-lowongan.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800">
                &larr; Kembali ke Daftar Lowongan
            </a>

            <form method="POST" action="{{ route('analisis-lowongan.destroy', $position) }}" onsubmit="return confirm('Hapus lowongan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700">
                    Hapus Lowongan
                </button>
            </form>
        </div>

        {{-- Stepper Progress --}}
        <div class="flex items-center justify-center gap-2 sm:gap-4 rounded-2xl border border-slate-200/80 bg-white p-3.5 shadow-2xs text-xs font-semibold">
            <div class="flex items-center gap-2 px-3 py-1.5 text-slate-500">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] text-slate-600">&#10003;</span>
                <span>Input Deskripsi</span>
            </div>
            <span class="text-slate-300">&rarr;</span>
            <div class="flex items-center gap-2 rounded-xl bg-blue-50 px-3 py-1.5 text-blue-700 border border-blue-100">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-[10px] text-white">2</span>
                <span>Hasil Analisis</span>
            </div>
            <span class="text-slate-300">&rarr;</span>
            <a href="{{ route('skill-saya.index', ['position_id' => $position->id]) }}" class="flex items-center gap-2 px-3 py-1.5 text-slate-400 hover:text-blue-600">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] text-slate-500">3</span>
                <span>Lanjut ke Pemetaan Bukti &rarr;</span>
            </a>
        </div>

        {{-- Detail Header Card --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 pb-5 border-b border-slate-100">
                <div>
                    <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-semibold text-blue-700 border border-blue-100">
                        {{ $position->company ?? 'Perusahaan' }}
                    </span>
                    <h1 class="mt-2 text-xl font-bold tracking-tight text-slate-900">{{ $position->title }}</h1>
                    @if ($position->source_url)
                        <a href="{{ $position->source_url }}" target="_blank" class="mt-1 inline-flex items-center gap-1 text-xs text-blue-600 hover:underline">
                            Lihat Tautan Asal Lowongan
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                    @endif
                </div>

                <a href="{{ route('skill-saya.index', ['position_id' => $position->id]) }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors shrink-0">
                    Petakan ke Skill Saya &rarr;
                </a>
            </div>

            {{-- Hasil Analisis Skills --}}
            <div class="mt-6">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">Hasil Analisis Kebutuhan Skill</h2>
                        <p class="text-xs text-slate-500">Ditemukan {{ $position->skillRequirements->count() }} skill & teknologi dari deskripsi lowongan.</p>
                    </div>
                </div>

                @if ($position->skillRequirements->isEmpty())
                    <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-xs text-amber-800">
                        Tidak ada skill teknis spesifik yang terdeteksi secara otomatis. Silakan periksa kembali deskripsi lowongan.
                    </div>
                @else
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach ($position->skillRequirements as $req)
                            <div class="flex items-center gap-2 rounded-xl border border-blue-200 bg-blue-50/70 px-3.5 py-2 text-xs font-semibold text-blue-800 shadow-2xs">
                                <span>{{ $req->skill_name }}</span>
                                <span class="rounded-md bg-white px-1.5 py-0.5 text-[10px] font-medium text-slate-500 border border-blue-100">
                                    {{ ucfirst($req->category ?? 'tech') }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Teks Asli Deskripsi --}}
            <div class="mt-8 pt-6 border-t border-slate-100">
                <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Teks Deskripsi Lowongan</h3>
                <div class="rounded-xl bg-slate-50 p-4 text-xs text-slate-600 leading-relaxed font-mono whitespace-pre-wrap">
{{ $position->description }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
