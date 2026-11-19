<x-layouts.app title="Daftar Lowongan">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Analisis Lowongan</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola dan analisis lowongan magang untuk mengidentifikasi kebutuhan skill.</p>
        </div>

        <a href="{{ route('analisis-lowongan.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Analisis Lowongan Baru
        </a>
    </div>

    {{-- Daftar Lowongan --}}
    @if ($positions->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600 mb-3">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <h3 class="text-sm font-bold text-slate-800">Belum ada lowongan tersimpan</h3>
            <p class="mt-1 text-xs text-slate-500 max-w-sm mx-auto">
                Mulai dengan menyalin deskripsi lowongan magang dari JobStreet, LinkedIn, atau portal karir lainnya.
            </p>
            <div class="mt-5">
                <a href="{{ route('analisis-lowongan.create') }}" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                    Input Lowongan Sekarang
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($positions as $pos)
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
                    <div>
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">{{ $pos->title }}</h3>
                                <p class="text-xs text-slate-500 font-medium">{{ $pos->company ?? 'Perusahaan' }}</p>
                            </div>
                            <span class="rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                {{ $pos->status === 'active' ? 'Aktif' : 'Arsip' }}
                            </span>
                        </div>

                        <p class="mt-3 text-xs text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $pos->description }}
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-xs text-slate-500">
                            <span class="inline-flex items-center gap-1 font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md">
                                {{ $pos->skill_requirements_count }} Skill
                            </span>
                            <span>&bull;</span>
                            <span>{{ $pos->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-3">
                        <a href="{{ route('analisis-lowongan.show', $pos) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">
                            Hasil Analisis &rarr;
                        </a>

                        <form method="POST" action="{{ route('analisis-lowongan.destroy', $pos) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-slate-400 hover:text-rose-600 transition-colors">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layouts.app>
