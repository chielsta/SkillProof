<x-layouts.app title="Kelola Portofolio">
    <div class="space-y-6" x-data="{ addModalOpen: false }">
        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Portofolio Publik</h1>
                <p class="mt-1 text-sm text-slate-500">Tampilkan proyek terbaikmu untuk dibagikan ke recruiter atau rekan sejawat.</p>
            </div>

            <a href="{{ route('portofolio.public', $user->username) }}" target="_blank"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm hover:bg-blue-700 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
                Buka Tautan Publik &rarr;
            </a>
        </div>

        {{-- Profile Header Card (Mockup 05) --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
            <div class="flex flex-col sm:flex-row items-center sm:items-start justify-between gap-6">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 text-center sm:text-left">
                    {{-- Avatar --}}
                    <div class="h-20 w-20 shrink-0 rounded-full bg-blue-100 border-2 border-blue-200 flex items-center justify-center text-blue-700 font-bold text-2xl shadow-sm">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-slate-900">{{ $user->name }}</h2>
                        <p class="text-xs font-semibold text-blue-600">{{ $user->field ?? 'Web Developer' }}</p>

                        <p class="mt-2 text-xs text-slate-600 max-w-xl leading-relaxed">
                            {{ $user->bio ?: 'Mahasiswa yang tertarik pada pengembangan aplikasi web, khususnya menggunakan Laravel. Saat ini sedang mempersiapkan diri untuk peluang magang.' }}
                        </p>

                        {{-- Social Links --}}
                        <div class="mt-3 flex items-center justify-center sm:justify-start gap-3 text-slate-500">
                            @if ($user->github_url)
                                <a href="{{ $user->github_url }}" target="_blank" class="hover:text-slate-900 transition-colors" title="GitHub">
                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                </a>
                            @endif
                            @if ($user->linkedin_url)
                                <a href="{{ $user->linkedin_url }}" target="_blank" class="hover:text-blue-600 transition-colors" title="LinkedIn">
                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            @endif
                            @if ($user->website_url)
                                <a href="{{ $user->website_url }}" target="_blank" class="hover:text-slate-900 transition-colors" title="Website">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" /></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <a href="{{ route('pengaturan.index') }}"
                   class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-colors shrink-0">
                    Edit Profil
                </a>
            </div>
        </div>

        {{-- Projects Section Header --}}
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900">Proyek Unggulan di Portofolio ({{ $portfolioProjects->count() }})</h3>
            <button type="button" @click="addModalOpen = true"
                    class="rounded-xl bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-blue-700 transition-colors">
                + Tambah Proyek
            </button>
        </div>

        {{-- Grid Proyek Portofolio (Mockup 05) --}}
        @if ($portfolioProjects->isEmpty())
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
                <p class="text-xs text-slate-500 mb-3">Belum ada proyek yang ditambahkan ke portofolio publik.</p>
                <button type="button" @click="addModalOpen = true" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                    Pilih Proyek Unggulan
                </button>
            </div>
        @else
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($portfolioProjects as $item)
                    @php $proj = $item->project; @endphp
                    <div class="flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
                        <div>
                            {{-- Visual Card Header / Placeholder Canvas --}}
                            <div class="h-28 rounded-xl bg-gradient-to-br from-slate-900 to-slate-800 p-4 text-white flex flex-col justify-between mb-4">
                                <span class="text-[10px] font-mono tracking-wider text-slate-400 uppercase">Proyek Pilihan</span>
                                <h4 class="font-bold text-sm text-white line-clamp-1">{{ $proj->title }}</h4>
                            </div>

                            <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                {{ $proj->description ?: 'Tidak ada deskripsi.' }}
                            </p>

                            {{-- Skills --}}
                            <div class="mt-3 flex flex-wrap gap-1.5">
                                @foreach ($proj->skills as $sk)
                                    <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                        {{ $sk->skill_name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Footer Actions & Links --}}
                        <div class="mt-5 flex items-center justify-between pt-3 border-t border-slate-100 text-xs">
                            <div class="flex items-center gap-3">
                                @if ($proj->repo_url)
                                    <a href="{{ $proj->repo_url }}" target="_blank" class="font-semibold text-slate-700 hover:text-blue-600">
                                        Repository
                                    </a>
                                @endif
                                @if ($proj->demo_url)
                                    <a href="{{ $proj->demo_url }}" target="_blank" class="font-semibold text-blue-600 hover:text-blue-700">
                                        Live Demo
                                    </a>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('portofolio.remove', $proj->id) }}" onsubmit="return confirm('Keluarkan proyek dari portofolio publik?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-400 hover:text-rose-600 text-[11px]">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Modal Tambah Proyek ke Portofolio --}}
        <div x-show="addModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4" style="display: none;">
            <div @click.outside="addModalOpen = false" class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900">Pilih Proyek untuk Portofolio</h3>
                    <button type="button" @click="addModalOpen = false" class="text-slate-400 hover:text-slate-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('portofolio.add') }}" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label for="select_proj" class="block text-xs font-semibold text-slate-700 mb-1">Daftar Proyek Anda:</label>
                        <select id="select_proj" name="project_id" required
                                class="w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($allProjects as $p)
                                <option value="{{ $p->id }}">{{ $p->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                        <button type="button" @click="addModalOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                            Batal
                        </button>
                        <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
