<x-layouts.app title="Dashboard">
    {{-- Header Sambutan & Link Portofolio --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Halo, {{ $user->name }}! 👋</h1>
            <p class="mt-1 text-sm text-slate-500">Yuk, lanjutkan persiapan magangmu hari ini.</p>
        </div>

        <a href="{{ route('portofolio.public', $user->username) }}" target="_blank"
           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 shadow-2xs hover:bg-slate-50 transition-colors">
            <svg class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
            Lihat Portofolio Publik
        </a>
    </div>

    {{-- 4 Stat Cards --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Card 1: Posisi Target --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
            <div class="flex items-center gap-3.5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-slate-900">{{ $totalPositions }}</div>
                    <div class="text-xs font-medium text-slate-500">Posisi Target</div>
                </div>
            </div>
            <div class="mt-3 truncate text-xs text-slate-600 font-medium">
                {{ $activePosition ? $activePosition->title : 'Belum ada posisi target' }}
            </div>
        </div>

        {{-- Card 2: Skill Terpenuhi --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
            <div class="flex items-center gap-3.5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-slate-900">{{ $skillStats['proven'] }}/{{ $skillStats['total'] }}</div>
                    <div class="text-xs font-medium text-slate-500">Skill Terpenuhi</div>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <div class="h-2 flex-1 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-emerald-500" style="width: {{ $progress }}%"></div>
                </div>
                <span class="text-xs font-semibold text-slate-600">{{ $progress }}%</span>
            </div>
        </div>

        {{-- Card 3: Proyek Tercatat --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
            <div class="flex items-center gap-3.5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-slate-900">{{ $totalProjects }}</div>
                    <div class="text-xs font-medium text-slate-500">Proyek Tercatat</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-slate-500">
                Portofolio aktif: {{ $user->portfolioProjects()->count() }} proyek
            </div>
        </div>

        {{-- Card 4: Rekomendasi Baru --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
            <div class="flex items-center gap-3.5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-slate-900">{{ $rekomendasiCount }}</div>
                    <div class="text-xs font-medium text-slate-500">Rekomendasi Proyek</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-slate-500">
                Untuk melengkapi skill yang kurang
            </div>
        </div>
    </div>

    {{-- Main Content Section --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
        {{-- Left Column (7 cols) --}}
        <div class="space-y-6 lg:col-span-7">
            {{-- Posisi Target --}}
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <h2 class="text-sm font-bold text-slate-900">Posisi yang Kamu Targetkan</h2>
                    <a href="{{ route('analisis-lowongan.index') }}" class="text-xs font-medium text-blue-600 hover:text-blue-700">Ubah</a>
                </div>

                @if ($activePosition)
                    <div class="mt-4">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $activePosition->title }}</h3>
                                    <p class="text-xs font-medium text-slate-500">{{ $activePosition->company ?? 'Perusahaan' }}</p>
                                </div>
                            </div>
                            <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-semibold text-blue-700 border border-blue-100">
                                Sedang diproses
                            </span>
                        </div>

                        <p class="mt-3 text-xs text-slate-600 leading-relaxed line-clamp-2">
                            {{ $activePosition->description }}
                        </p>

                        <div class="mt-4 flex items-center justify-between pt-3 border-t border-slate-100">
                            <span class="text-xs text-slate-500">{{ $skillStats['total'] }} skill teridentifikasi</span>
                            <a href="{{ route('analisis-lowongan.show', $activePosition) }}"
                               class="rounded-lg border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @else
                    <div class="mt-4 py-6 text-center">
                        <p class="text-xs text-slate-500 mb-3">Belum ada lowongan magang yang ditargetkan.</p>
                        <a href="{{ route('analisis-lowongan.create') }}" class="inline-flex rounded-lg bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                            + Tambah Lowongan
                        </a>
                    </div>
                @endif
            </div>

            {{-- Langkah Selanjutnya --}}
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
                <h2 class="text-sm font-bold text-slate-900 mb-4">Langkah Selanjutnya</h2>

                <div class="space-y-3">
                    {{-- Langkah 1: Lengkapi Skill --}}
                    @if ($missingRequirements->isNotEmpty())
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-amber-100 bg-amber-50/40 p-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-700">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Lengkapi skill: {{ $missingRequirements->first()->skill_name }}</h4>
                                    <p class="text-[11px] text-slate-500">Belum ada bukti proyek yang relevan.</p>
                                </div>
                            </div>
                            <a href="{{ route('rekomendasi.index') }}" class="shrink-0 rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 border border-blue-100 hover:bg-blue-100 transition-colors">
                                Lihat Rekomendasi
                            </a>
                        </div>
                    @endif

                    {{-- Langkah 2: Tambah Dokumentasi / Proyek Baru --}}
                    <div class="flex items-center justify-between gap-4 rounded-xl border border-slate-100 bg-slate-50/50 p-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">Catat proyek portofolio baru</h4>
                                <p class="text-[11px] text-slate-500">Lengkapi minimal 1 proyek dengan repositori & demo.</p>
                            </div>
                        </div>
                        <a href="{{ route('proyek.create') }}" class="shrink-0 rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 border border-blue-100 hover:bg-blue-100 transition-colors">
                            Tambah Proyek
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column (5 cols) --}}
        <div class="space-y-6 lg:col-span-5">
            {{-- Progress Persiapan (Donut Chart) --}}
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
                <h2 class="text-sm font-bold text-slate-900 mb-4">Progress Persiapan</h2>

                <div class="flex items-center justify-between gap-6">
                    {{-- SVG Donut --}}
                    <div class="relative flex h-32 w-32 shrink-0 items-center justify-center">
                        <svg class="h-full w-full -rotate-90 transform" viewBox="0 0 36 36">
                            {{-- Background ring --}}
                            <path class="text-slate-100" stroke-width="3.8" stroke="currentColor" fill="none"
                                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            {{-- Progress ring --}}
                            <path class="text-emerald-500" stroke-dasharray="{{ $progress }}, 100" stroke-width="3.8" stroke-linecap="round" stroke="currentColor" fill="none"
                                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                        </svg>
                        <div class="absolute text-center">
                            <span class="text-2xl font-extrabold text-slate-900">{{ $progress }}%</span>
                        </div>
                    </div>

                    {{-- Legend --}}
                    <div class="space-y-2 text-xs flex-1">
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-2 text-slate-600">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                                Terpenuhi
                            </span>
                            <span class="font-bold text-slate-800">{{ $skillStats['proven'] }} skill</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-2 text-slate-600">
                                <span class="h-2.5 w-2.5 rounded-full bg-amber-500"></span>
                                Perlu dilengkapi
                            </span>
                            <span class="font-bold text-slate-800">{{ $skillStats['partial'] }} skill</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-2 text-slate-600">
                                <span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                                Belum ada
                            </span>
                            <span class="font-bold text-slate-800">{{ $skillStats['none'] }} skill</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Rekomendasi untuk Kamu --}}
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h2 class="text-sm font-bold text-slate-900">Rekomendasi untuk Kamu</h2>
                    <a href="{{ route('rekomendasi.index') }}" class="text-xs font-medium text-blue-600 hover:text-blue-700">Lihat Semua</a>
                </div>

                @if ($suggestedProject)
                    <div class="mt-4 rounded-xl border border-slate-200/90 bg-[#F8FAFC] p-4.5">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex-1">
                                <h3 class="text-xs font-bold text-slate-900">{{ $suggestedProject->title }}</h3>

                                <div class="mt-2 flex flex-wrap gap-1.5">
                                    @foreach ($suggestedProject->skills ?? [] as $sk)
                                        <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                            {{ $sk }}
                                        </span>
                                    @endforeach
                                </div>

                                <p class="mt-2.5 text-[11px] text-slate-500 leading-relaxed line-clamp-2">
                                    {{ $suggestedProject->description }}
                                </p>
                            </div>

                            <a href="{{ route('rekomendasi.index') }}" class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-blue-600 hover:border-blue-200 transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @else
                    <p class="mt-4 text-xs text-slate-500">Belum ada rekomendasi proyek baru.</p>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
