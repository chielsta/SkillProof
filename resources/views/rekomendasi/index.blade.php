<x-layouts.app title="Rekomendasi Proyek">
    <div class="space-y-6" x-data="{
        detailModalOpen: false,
        activeProject: null,
        openDetail(project) {
            this.activeProject = project;
            this.detailModalOpen = true;
        }
    }">
        {{-- Page Header --}}
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Rekomendasi Proyek</h1>
            <p class="mt-1 text-sm text-slate-500">Proyek berikut disarankan berdasarkan skill yang masih perlu kamu lengkapi.</p>
        </div>

        {{-- Tabs & Filter Bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex rounded-xl bg-slate-100 p-1 max-w-xs">
                <a href="{{ route('rekomendasi.index', ['filter' => 'untuk-kamu']) }}"
                   class="flex-1 rounded-lg py-1.5 px-4 text-xs text-center transition-all {{ $filter === 'untuk-kamu' ? 'bg-white text-blue-600 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900' }}">
                    Untuk Kamu
                </a>
                <a href="{{ route('rekomendasi.index', ['filter' => 'semua']) }}"
                   class="flex-1 rounded-lg py-1.5 px-4 text-xs text-center transition-all {{ $filter === 'semua' ? 'bg-white text-blue-600 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900' }}">
                    Semua Proyek
                </a>
            </div>

            {{-- Skill Filter --}}
            <form method="GET" action="{{ route('rekomendasi.index') }}" class="flex items-center gap-2">
                <input type="hidden" name="filter" value="{{ $filter }}">
                <select name="skill" onchange="this.form.submit()"
                        class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-slate-700 shadow-2xs focus:border-blue-500 focus:outline-none">
                    <option value="">Filter berdasarkan skill (Semua)</option>
                    @foreach (['Laravel', 'MySQL', 'PHP', 'JavaScript', 'HTML', 'CSS', 'REST API', 'WebSocket'] as $sk)
                        <option value="{{ $sk }}" {{ $skillFilter === $sk ? 'selected' : '' }}>{{ $sk }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Informational Banner jika filter Untuk Kamu aktif --}}
        @if ($filter === 'untuk-kamu' && $missingSkills->isNotEmpty())
            <div class="rounded-xl border border-blue-100 bg-blue-50/60 p-4 text-xs text-blue-800 flex items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-blue-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Fokus skill yang perlu dilengkapi: <strong>{{ $missingSkills->implode(', ') }}</strong></span>
                </div>
                <a href="{{ route('rekomendasi.index', ['filter' => 'semua']) }}" class="underline font-semibold hover:text-blue-900 shrink-0">
                    Lihat Semua Katalog
                </a>
            </div>
        @endif

        {{-- Cards List --}}
        <div class="space-y-4">
            @forelse ($catalog as $item)
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5 rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs hover:border-blue-200 transition-all">
                    <div class="flex items-start gap-4 flex-1">
                        {{-- Graphic Box --}}
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl {{ $item->difficulty === 'easy' ? 'bg-emerald-50 text-emerald-600' : ($item->difficulty === 'medium' ? 'bg-amber-50 text-amber-600' : 'bg-purple-50 text-purple-600') }}">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        </div>

                        {{-- Details --}}
                        <div class="flex-1">
                            <h3 class="text-sm font-bold text-slate-900">{{ $item->title }}</h3>

                            {{-- Skill Tags --}}
                            <div class="mt-2 flex flex-wrap gap-1.5">
                                @foreach ($item->skills ?? [] as $sk)
                                    <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                        {{ $sk }}
                                    </span>
                                @endforeach
                            </div>

                            <p class="mt-2 text-xs text-slate-600 leading-relaxed max-w-2xl">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    {{-- Right Difficulty & CTA --}}
                    <div class="flex sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto gap-3 shrink-0 pt-3 sm:pt-0 border-t sm:border-t-0 border-slate-100">
                        @if ($item->difficulty === 'easy')
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-semibold text-emerald-700 border border-emerald-100">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Mudah
                            </span>
                        @elseif ($item->difficulty === 'medium')
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-1 text-[11px] font-semibold text-amber-700 border border-amber-100">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Menengah
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-rose-50 px-2.5 py-1 text-[11px] font-semibold text-rose-700 border border-rose-100">
                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                Sulit
                            </span>
                        @endif

                        <button type="button" @click="openDetail({{ json_encode($item) }})"
                                class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
                    <p class="text-xs text-slate-500">Tidak ada proyek yang sesuai dengan filter.</p>
                    <a href="{{ route('rekomendasi.index', ['filter' => 'semua']) }}" class="mt-2 inline-block text-xs font-semibold text-blue-600 hover:underline">
                        Reset Filter
                    </a>
                </div>
            @endforelse
        </div>

        {{-- Detail Modal --}}
        <div x-show="detailModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4" style="display: none;">
            <div @click.outside="detailModalOpen = false" class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl" x-show="activeProject">
                <div class="flex items-start justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="text-base font-bold text-slate-900" x-text="activeProject?.title"></h3>
                        <p class="text-xs text-slate-500 mt-0.5">Tingkat: <span class="font-semibold capitalize text-slate-700" x-text="activeProject?.difficulty"></span></p>
                    </div>
                    <button type="button" @click="detailModalOpen = false" class="text-slate-400 hover:text-slate-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <div>
                        <h4 class="text-xs font-bold text-slate-800">Deskripsi Proyek</h4>
                        <p class="mt-1 text-xs text-slate-600 leading-relaxed" x-text="activeProject?.description"></p>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-slate-800">Target Skill</h4>
                        <div class="mt-1.5 flex flex-wrap gap-1.5">
                            <template x-for="sk in activeProject?.skills || []">
                                <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100" x-text="sk"></span>
                            </template>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-slate-800">Referensi Belajar</h4>
                        <ul class="mt-1.5 space-y-1.5 text-xs">
                            <template x-for="ref in activeProject?.references || []">
                                <li>
                                    <a :href="ref.url" target="_blank" class="inline-flex items-center gap-1 text-blue-600 hover:underline">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        <span x-text="ref.title"></span>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" @click="detailModalOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Tutup
                    </button>
                    <a :href="'{{ route('proyek.create') }}?title=' + encodeURIComponent(activeProject?.title || '') + '&description=' + encodeURIComponent(activeProject?.description || '') + '&skills=' + encodeURIComponent((activeProject?.skills || []).join(', '))"
                       class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                        + Ambil Jadi Proyek Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
