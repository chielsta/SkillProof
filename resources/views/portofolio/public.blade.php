<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }} — Portofolio Proyek | SkillProof</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white" x-data="{ activeTab: 'proyek' }">
    {{-- Minimalist Header --}}
    <header class="border-b border-slate-200/80 bg-white/90 sticky top-0 z-30 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-5xl items-center justify-between px-4 sm:px-6">
            <a href="/" class="flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white shadow-xs">
                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-base font-bold text-slate-900 tracking-tight">SkillProof</span>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}" class="rounded-xl bg-blue-600 px-3.5 py-1.5 text-xs font-semibold text-white hover:bg-blue-700 transition-colors">
                    Buat Portofolio Kamu
                </a>
            </div>
        </div>
    </header>

    {{-- Main Container --}}
    <main class="mx-auto max-w-5xl px-4 py-10 sm:px-6 space-y-8">
        {{-- Profile Card --}}
        <div class="rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs">
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left">
                {{-- Avatar --}}
                <div class="h-24 w-24 shrink-0 rounded-full bg-blue-100 border-4 border-blue-50 flex items-center justify-center text-blue-700 font-bold text-3xl shadow-sm">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="flex-1">
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">{{ $user->name }}</h1>
                    <p class="text-xs font-semibold text-blue-600 mt-0.5">{{ $user->field ?? 'Web Developer' }}</p>

                    <p class="mt-3 text-xs sm:text-sm text-slate-600 max-w-2xl leading-relaxed">
                        {{ $user->bio ?: 'Mahasiswa yang tertarik pada pengembangan aplikasi web, khususnya menggunakan Laravel. Saat ini sedang mempersiapkan diri untuk peluang magang di bidang web development.' }}
                    </p>

                    {{-- Social Tautan --}}
                    <div class="mt-4 flex items-center justify-center sm:justify-start gap-3 text-slate-500">
                        @if ($user->github_url)
                            <a href="{{ $user->github_url }}" target="_blank" class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50/80 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-white hover:text-slate-900 transition-all">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                GitHub
                            </a>
                        @endif
                        @if ($user->linkedin_url)
                            <a href="{{ $user->linkedin_url }}" target="_blank" class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50/80 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-white hover:text-blue-600 transition-all">
                                <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                LinkedIn
                            </a>
                        @endif
                        @if ($user->website_url)
                            <a href="{{ $user->website_url }}" target="_blank" class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50/80 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-white hover:text-slate-900 transition-all">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" /></svg>
                                Website
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabs: Proyek vs Tentang Saya --}}
        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
            <div class="flex gap-2">
                <button type="button" @click="activeTab = 'proyek'"
                        :class="activeTab === 'proyek' ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200' : 'text-slate-600 hover:text-slate-900 border border-transparent'"
                        class="rounded-xl px-4 py-2 text-xs transition-all">
                    Proyek Pilihan ({{ $portfolioProjects->count() }})
                </button>
                <button type="button" @click="activeTab = 'tentang'"
                        :class="activeTab === 'tentang' ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200' : 'text-slate-600 hover:text-slate-900 border border-transparent'"
                        class="rounded-xl px-4 py-2 text-xs transition-all">
                    Tentang Saya
                </button>
            </div>
        </div>

        {{-- Tab Proyek --}}
        <div x-show="activeTab === 'proyek'">
            @if ($portfolioProjects->isEmpty())
                <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center text-xs text-slate-500">
                    Pengguna belum mempublikasikan proyek pilihan.
                </div>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($portfolioProjects as $item)
                        @php $proj = $item->project; @endphp
                        <div class="flex flex-col justify-between rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs hover:border-blue-200 transition-all">
                            <div>
                                <div class="h-32 rounded-xl bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-4 text-white flex flex-col justify-between mb-4 shadow-inner">
                                    <span class="text-[10px] font-mono tracking-wider text-slate-400 uppercase">Showcase</span>
                                    <h3 class="font-bold text-sm text-white line-clamp-1">{{ $proj->title }}</h3>
                                </div>

                                <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                    {{ $proj->description ?: 'Tidak ada deskripsi.' }}
                                </p>

                                <div class="mt-3.5 flex flex-wrap gap-1.5">
                                    @foreach ($proj->skills as $sk)
                                        <span class="rounded-md bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-700 border border-blue-100">
                                            {{ $sk->skill_name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-6 flex flex-wrap items-center gap-3 pt-3 border-t border-slate-100 text-xs">
                                @if ($proj->repo_url)
                                    <a href="{{ $proj->repo_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-slate-700 hover:text-blue-600">
                                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                        Repository
                                    </a>
                                @endif
                                @if ($proj->demo_url)
                                    <a href="{{ $proj->demo_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        Live Demo
                                    </a>
                                @endif
                                @if ($proj->doc_url)
                                    <a href="{{ $proj->doc_url }}" target="_blank" class="inline-flex items-center gap-1 font-semibold text-slate-500 hover:text-slate-700">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Dokumen
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Tab Tentang Saya --}}
        <div x-show="activeTab === 'tentang'" style="display: none;">
            <div class="rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-xs space-y-6">
                <div>
                    <h3 class="text-sm font-bold text-slate-900 mb-2">Tentang Pengembang</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-wrap">{{ $user->bio ?: 'Belum ada informasi biografi.' }}</p>
                </div>

                <div class="pt-4 border-t border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 mb-3">Keahlian & Penguasaan Teknologi</h3>
                    @php
                        $userSkills = $user->projects()->with('skills')->get()->flatMap(fn($p) => $p->skill_names)->unique();
                    @endphp
                    <div class="flex flex-wrap gap-2">
                        @forelse ($userSkills as $skill)
                            <span class="rounded-xl border border-blue-200 bg-blue-50/70 px-3 py-1.5 text-xs font-semibold text-blue-800">
                                {{ $skill }}
                            </span>
                        @empty
                            <span class="text-xs text-slate-400">Belum ada skill yang terdaftar dari proyek.</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-16 border-t border-slate-200 bg-white py-8 text-center text-xs text-slate-400">
        Portofolio didukung oleh <a href="/" class="font-semibold text-blue-600 hover:underline">SkillProof</a>
    </footer>
</body>
</html>
