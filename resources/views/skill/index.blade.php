<x-layouts.app title="Pemetaan Bukti Skill">
    <div class="space-y-6" x-data="{
        linkModalOpen: false,
        selectedReqId: null,
        selectedSkillName: '',
        openLinkModal(reqId, skillName) {
            this.selectedReqId = reqId;
            this.selectedSkillName = skillName;
            this.linkModalOpen = true;
        }
    }">
        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Pemetaan Bukti Skill</h1>
                <p class="mt-1 text-sm text-slate-500">Lihat kesesuaian antara kebutuhan skill dengan proyek yang kamu miliki.</p>
            </div>

            @if ($positions->count() > 1)
                {{-- Selector posisi magang jika ada lebih dari 1 --}}
                <form method="GET" action="{{ route('skill-saya.index') }}" class="flex items-center gap-2">
                    <label for="pos_select" class="text-xs font-medium text-slate-500 shrink-0">Pilih Lowongan:</label>
                    <select id="pos_select" name="position_id" onchange="this.form.submit()"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 shadow-2xs focus:border-blue-500 focus:outline-none">
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}" {{ $selectedPosition?->id === $pos->id ? 'selected' : '' }}>
                                {{ $pos->title }} ({{ $pos->company }})
                            </option>
                        @endforeach
                    </select>
                </form>
            @endif
        </div>

        @if (!$selectedPosition)
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600 mb-3">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Belum ada posisi magang aktif</h3>
                <p class="mt-1 text-xs text-slate-500">Lakukan analisis lowongan magang terlebih dahulu untuk memetakan bukti skill.</p>
                <div class="mt-5">
                    <a href="{{ route('analisis-lowongan.create') }}" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                        Input Lowongan Baru
                    </a>
                </div>
            </div>
        @else
            {{-- Target Position Banner --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
                <div class="flex items-center gap-3.5">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">{{ $selectedPosition->title }}</h2>
                        <p class="text-xs font-medium text-slate-500">{{ $selectedPosition->company ?? 'Perusahaan' }}</p>
                    </div>
                </div>

                <a href="{{ route('analisis-lowongan.show', $selectedPosition) }}"
                   class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-colors shrink-0 text-center">
                    Lihat Detail Lowongan
                </a>
            </div>

            {{-- Legend Indicators --}}
            <div class="flex flex-wrap items-center gap-6 text-xs font-medium text-slate-600 px-1">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    <span>Sudah ada bukti</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-amber-500"></span>
                    <span>Perlu dilengkapi</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                    <span>Belum ada bukti</span>
                </div>
            </div>

            {{-- Mapping Table --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-2xs">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="border-b border-slate-200 bg-slate-50/80 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th scope="col" class="px-6 py-3.5">Skill / Teknologi</th>
                                <th scope="col" class="px-6 py-3.5">Status</th>
                                <th scope="col" class="px-6 py-3.5">Proyek Terkait</th>
                                <th scope="col" class="px-6 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($skillMapping as $row)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    {{-- Skill Name --}}
                                    <td class="px-6 py-4 font-bold text-slate-900 whitespace-nowrap">
                                        {{ $row['requirement']->skill_name }}
                                        <span class="ml-1.5 text-[10px] font-normal text-slate-400">({{ $row['requirement']->category ?? 'tech' }})</span>
                                    </td>

                                    {{-- Status Badge --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($row['status'] === 'proven')
                                            <span class="inline-flex items-center gap-1.5 font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full text-[11px]">
                                                <svg class="h-3 w-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                                Ada bukti
                                            </span>
                                        @elseif ($row['status'] === 'partial')
                                            <span class="inline-flex items-center gap-1.5 font-semibold text-amber-700 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full text-[11px]">
                                                <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                                Perlu dilengkapi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 font-semibold text-rose-700 bg-rose-50 border border-rose-200 px-2.5 py-1 rounded-full text-[11px]">
                                                <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                                Belum ada bukti
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Proyek Terkait --}}
                                    <td class="px-6 py-4 text-slate-600">
                                        @if ($row['project'])
                                            <span class="font-medium text-slate-800">{{ $row['project']->title }}</span>
                                        @elseif ($row['status'] === 'partial')
                                            <span class="text-slate-400 italic">Belum ada proyek</span>
                                        @else
                                            <span class="text-slate-400">-</span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 text-right whitespace-nowrap">
                                        @if ($row['project'])
                                            <div class="flex items-center justify-end gap-3">
                                                <a href="{{ route('proyek.edit', $row['project']) }}" class="font-semibold text-blue-600 hover:text-blue-700">
                                                    Lihat
                                                </a>
                                                <button type="button" @click="openLinkModal({{ $row['requirement']->id }}, '{{ $row['requirement']->skill_name }}')"
                                                        class="text-slate-400 hover:text-blue-600">
                                                    Ubah
                                                </button>
                                            </div>
                                        @else
                                            <button type="button" @click="openLinkModal({{ $row['requirement']->id }}, '{{ $row['requirement']->skill_name }}')"
                                                    class="rounded-lg bg-blue-50 px-3 py-1 font-semibold text-blue-700 hover:bg-blue-100 border border-blue-100 transition-colors">
                                                + Tautkan
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                                        Tidak ada data skill requirement.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Modal Tautkan Proyek Bukti --}}
        <div x-show="linkModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4" style="display: none;">
            <div @click.outside="linkModalOpen = false" class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900">Tautkan Bukti Proyek</h3>
                    <button type="button" @click="linkModalOpen = false" class="text-slate-400 hover:text-slate-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('skill-saya.link') }}" class="mt-4 space-y-4">
                    @csrf
                    <input type="hidden" name="requirement_id" :value="selectedReqId">

                    <div>
                        <p class="text-xs text-slate-600">
                            Pilih proyek yang membuktikan keahlian: <span class="font-bold text-blue-600" x-text="selectedSkillName"></span>
                        </p>
                    </div>

                    @if ($userProjects->isEmpty())
                        <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-xs text-amber-800">
                            Kamu belum memiliki proyek tercatat. Silakan tambah proyek terlebih dahulu.
                            <div class="mt-2">
                                <a href="{{ route('proyek.create') }}" class="font-semibold text-blue-600 hover:underline">
                                    + Tambah Proyek Baru &rarr;
                                </a>
                            </div>
                        </div>
                    @else
                        <div>
                            <label for="project_id" class="block text-xs font-semibold text-slate-700 mb-1">Pilih Proyek:</label>
                            <select id="project_id" name="project_id" required
                                    class="w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                                <option value="">-- Pilih Salah Satu Proyek --</option>
                                @foreach ($userProjects as $proj)
                                    <option value="{{ $proj->id }}">
                                        {{ $proj->title }} ({{ implode(', ', $proj->skill_names) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                            <button type="button" @click="linkModalOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                Batal
                            </button>
                            <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                                Simpan Bukti
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
