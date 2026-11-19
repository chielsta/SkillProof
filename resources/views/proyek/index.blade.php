<x-layouts.app title="Kelola Proyek">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Kelola Proyek Portofolio</h1>
                <p class="mt-1 text-sm text-slate-500">Catat proyek yang telah atau sedang kamu kerjakan beserta bukti repositori dan demo.</p>
            </div>

            <a href="{{ route('proyek.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Proyek Baru
            </a>
        </div>

        @if ($projects->isEmpty())
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600 mb-3">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Belum ada proyek tercatat</h3>
                <p class="mt-1 text-xs text-slate-500 max-w-sm mx-auto">
                    Catat proyek kuliah, tugas akhir, atau proyek sampinganmu untuk membuktikan skill lowongan magang.
                </p>
                <div class="mt-5">
                    <a href="{{ route('proyek.create') }}" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                        Tambah Proyek Pertama
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <div class="flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
                        <div>
                            {{-- Header & Status --}}
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $project->title }}</h3>
                                @if ($project->status === 'completed')
                                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700 border border-emerald-100 shrink-0">
                                        Selesai
                                    </span>
                                @elseif ($project->status === 'in_progress')
                                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[10px] font-semibold text-amber-700 border border-amber-100 shrink-0">
                                        Pengerjaan
                                    </span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600 shrink-0">
                                        Rencana
                                    </span>
                                @endif
                            </div>

                            {{-- Description --}}
                            <p class="mt-2.5 text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                {{ $project->description ?: 'Tidak ada deskripsi proyek.' }}
                            </p>

                            {{-- Skills Tag --}}
                            <div class="mt-3.5 flex flex-wrap gap-1.5">
                                @forelse ($project->skills as $skill)
                                    <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                        {{ $skill->skill_name }}
                                    </span>
                                @empty
                                    <span class="text-[11px] text-slate-400 italic">Belum ada tag skill</span>
                                @endforelse
                            </div>

                            {{-- External Links --}}
                            <div class="mt-4 flex flex-wrap gap-3 text-xs text-slate-500 pt-3 border-t border-slate-100">
                                @if ($project->repo_url)
                                    <a href="{{ $project->repo_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-slate-700 hover:text-blue-600">
                                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                        Repo
                                    </a>
                                @endif
                                @if ($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        Demo
                                    </a>
                                @endif
                                @if ($project->doc_url)
                                    <a href="{{ $project->doc_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-slate-600 hover:text-slate-800">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Dokumen
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="mt-5 flex items-center justify-between pt-3 border-t border-slate-100">
                            <a href="{{ route('proyek.edit', $project) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">
                                Edit Proyek
                            </a>

                            <div class="flex items-center gap-2">
                                <form method="POST" action="{{ route('portofolio.add') }}">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <button type="submit" class="text-xs text-slate-500 hover:text-blue-600 font-medium">
                                        + Portofolio
                                    </button>
                                </form>
                                <span class="text-slate-300">|</span>
                                <form method="POST" action="{{ route('proyek.destroy', $project) }}" onsubmit="return confirm('Hapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-slate-400 hover:text-rose-600 transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>
