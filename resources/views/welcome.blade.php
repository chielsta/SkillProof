<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillProof — Platform Portofolio Magang Berbasis Bukti Skill</title>

    {{-- Fonts: Fraunces (Editorial Serif) & Plus Jakarta Sans (Modern Sans) --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,400i,600i|plus-jakarta-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F5] text-[#1C1917] font-sans antialiased selection:bg-[#FCE7F0] selection:text-[#832B4C]">

    {{-- Header / Navbar --}}
    <header class="sticky top-0 z-40 border-b border-[#E7E2DA]/80 bg-[#FAF8F5]/90 backdrop-blur-md">
        <div class="mx-auto flex h-20 max-w-6xl items-center justify-between px-6 sm:px-8">
            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-1.5">
                <span class="font-serif text-2xl font-bold tracking-tight text-[#1C1917]">skillproof</span>
                <span class="h-2 w-2 rounded-full bg-[#E3ECE1] border border-[#C8DAC4] group-hover:bg-[#FCE7F0] transition-colors"></span>
            </a>

            {{-- Nav Links with offset scroll anchors --}}
            <nav class="hidden md:flex items-center gap-8 text-xs font-semibold text-stone-600">
                <a href="#fitur" class="hover:text-stone-900 transition-colors">Fitur Unggulan</a>
                <a href="#mengapa" class="hover:text-stone-900 transition-colors">Mengapa SkillProof</a>
                <a href="#alur-kerja" class="hover:text-stone-900 transition-colors">Alur Kerja</a>
                <a href="#contoh-portofolio" class="hover:text-stone-900 transition-colors">Contoh Portofolio</a>
            </nav>

            {{-- Auth Buttons --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-xs font-semibold text-stone-700 hover:text-stone-950 transition-colors">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-[#1C1917] px-5 py-2.5 text-xs font-semibold text-white shadow-2xs hover:bg-stone-800 transition-all">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#FEF4D1]"></span>
                    Daftar Akun
                </a>
            </div>
        </div>
    </header>

    <main class="space-y-24 sm:space-y-32 py-12 sm:py-20">

        {{-- Hero Section --}}
        <section class="mx-auto max-w-4xl px-6 sm:px-8 text-center">
            {{-- Tagline Ringkas --}}
            <div class="inline-flex items-center gap-2.5 rounded-full border border-[#E7E2DA] bg-white px-4 py-1.5 text-xs text-stone-700 shadow-2xs mb-8">
                <span class="rounded-full bg-[#DEEFF9] px-2.5 py-0.5 text-[10px] font-bold text-[#194E73] uppercase tracking-wider">
                    Platform Magang IT
                </span>
                <span class="font-medium text-stone-600">Platform Portofolio Magang Berbasis Bukti Skill</span>
            </div>

            {{-- Headline Tegas & Ringkas --}}
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-[#1C1917] leading-[1.12]">
                Buktikan skill.
                <span class="block mt-1 font-serif font-normal italic text-[#1C1917]">
                    Bangun portofolio nyata.
                </span>
            </h1>

            {{-- Supporting Text Ringkas --}}
            <p class="mt-6 text-base sm:text-lg text-stone-600 max-w-2xl mx-auto leading-relaxed">
                Persiapkan portofolio magang berdasarkan skill dan bukti proyek yang kamu miliki.
            </p>

            {{-- Pill CTAs --}}
            <div class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-3.5">
                <a href="{{ route('register') }}"
                   class="w-full sm:w-auto rounded-full bg-[#1C1917] px-7 py-3.5 text-xs sm:text-sm font-semibold text-white shadow-xs hover:bg-stone-800 transition-all inline-flex items-center justify-center gap-2">
                    Mulai Sekarang — Gratis
                    <span>&rarr;</span>
                </a>
                <a href="#contoh-portofolio"
                   class="w-full sm:w-auto rounded-full border border-stone-300 bg-white px-6 py-3.5 text-xs sm:text-sm font-semibold text-stone-800 hover:bg-stone-50 transition-all inline-flex items-center justify-center gap-2">
                    Lihat Contoh Portofolio
                </a>
            </div>

            {{-- Transparent Demo Notice --}}
            <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-stone-200/80 bg-white/60 px-4 py-1 text-xs text-stone-500">
                <span>Akun demo pengujian:</span>
                <span class="font-semibold text-stone-800">dinda@example.com</span>
                <span>&bull;</span>
                <span>sandi:</span>
                <span class="font-semibold text-stone-800">password</span>
            </div>
        </section>

        {{-- Section 1: Fitur Unggulan (4 Pastel Feature Cards) --}}
        <section id="fitur" class="scroll-mt-28 mx-auto max-w-6xl px-6 sm:px-8">
            <div class="max-w-2xl mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Fitur Utama</span>
                <h2 class="mt-2 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917]">
                    Semua yang kamu butuhkan untuk persiapan magang.
                </h2>
                <p class="mt-3 text-sm text-stone-600 leading-relaxed">
                    Dirancang sesuai alur persiapan portofolio magang mahasiswa IT, membantu fokus pada bukti karya yang dicari rekruter.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1: Soft Pink --}}
                <div class="flex flex-col justify-between rounded-3xl border border-[#F5BDD0] bg-[#FCE7F0] p-7 transition-transform hover:-translate-y-1 duration-200">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold text-[#832B4C] mb-6">
                            <span>01</span>
                            <span class="rounded-full bg-white/80 px-2.5 py-0.5 text-[10px] uppercase tracking-wider">Analisis</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-[#832B4C] leading-snug">
                            Analisis Kebutuhan Lowongan
                        </h3>
                        <p class="mt-3 text-xs text-stone-700 leading-relaxed">
                            Ekstraksi otomatis skill yang dibutuhkan dari deskripsi magang. Kenali bahasa pemrograman, framework, dan tools yang dicari industri.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-[#F5BDD0]/60">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#832B4C] hover:underline underline-offset-4">
                            Mulai Analisis <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                {{-- Card 2: Baby Blue --}}
                <div class="flex flex-col justify-between rounded-3xl border border-[#BCE0F5] bg-[#DEEFF9] p-7 transition-transform hover:-translate-y-1 duration-200">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold text-[#194E73] mb-6">
                            <span>02</span>
                            <span class="rounded-full bg-white/80 px-2.5 py-0.5 text-[10px] uppercase tracking-wider">Pemetaan</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-[#194E73] leading-snug">
                            Pemetaan Bukti Kemampuan
                        </h3>
                        <p class="mt-3 text-xs text-stone-700 leading-relaxed">
                            Hubungkan skill dengan proyek dan sertifikasi nyata. Ketahui secara transparan skill mana yang sudah terbukti dan mana yang masih kosong.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-[#BCE0F5]/60">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#194E73] hover:underline underline-offset-4">
                            Petakan Skill <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                {{-- Card 3: Pastel Sage Green --}}
                <div class="flex flex-col justify-between rounded-3xl border border-[#C8DAC4] bg-[#E3ECE1] p-7 transition-transform hover:-translate-y-1 duration-200">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold text-[#2D4825] mb-6">
                            <span>03</span>
                            <span class="rounded-full bg-white/80 px-2.5 py-0.5 text-[10px] uppercase tracking-wider">Rekomendasi</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-[#2D4825] leading-snug">
                            Proyek & Rekomendasi
                        </h3>
                        <p class="mt-3 text-xs text-stone-700 leading-relaxed">
                            Bangun proyek terarah untuk mengisi skill gap. Dapatkan ide proyek relevan lengkap dengan tingkat kesulitan dan panduan belajar.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-[#C8DAC4]/60">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#2D4825] hover:underline underline-offset-4">
                            Jelajahi Proyek <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                {{-- Card 4: Butter Yellow --}}
                <div class="flex flex-col justify-between rounded-3xl border border-[#FDE48C] bg-[#FEF4D1] p-7 transition-transform hover:-translate-y-1 duration-200">
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold text-[#74520F] mb-6">
                            <span>04</span>
                            <span class="rounded-full bg-white/80 px-2.5 py-0.5 text-[10px] uppercase tracking-wider">Showcase</span>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-[#74520F] leading-snug">
                            Portofolio Publik
                        </h3>
                        <p class="mt-3 text-xs text-stone-700 leading-relaxed">
                            Halaman showcase profesional siap dibagikan ke rekruter. Tampilkan proyek pilihan beserta bukti GitHub dan live demo dalam tautan unik.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-[#FDE48C]/60">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#74520F] hover:underline underline-offset-4">
                            Lihat Format <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 2: Mengapa SkillProof --}}
        <section id="mengapa" class="scroll-mt-28 mx-auto max-w-6xl px-6 sm:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                {{-- Sisi Kiri (Teks Kontras & Nilai Tambah) --}}
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#FEF4D1] px-3.5 py-1 text-xs font-bold text-[#74520F] border border-[#FDE48C]">
                        Karakter & Bukti
                    </div>

                    <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] leading-snug">
                        Skill bukan sekadar klaim. Harus ada buktinya.
                    </h2>

                    <p class="text-sm text-stone-600 leading-relaxed">
                        Rekruter magang meninjau puluhan resume serupa setiap hari. Klaim "menguasai PHP & Laravel" tanpa bukti karya nyata hanya menjadi teks biasa di atas kertas.
                    </p>

                    <p class="text-sm text-stone-600 leading-relaxed">
                        SkillProof mengubah cara kamu mempersiapkan diri: setiap skill yang kamu cantumkan langsung dihubungkan dengan repositori kode, live demo, atau sertifikat verifikasi.
                    </p>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-start gap-3 text-xs text-stone-700">
                            <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#E3ECE1] text-[#2D4825] font-bold text-[11px]">&#10003;</span>
                            <span><strong>Audit Bukti Transparan:</strong> Mengetahui secara pasti teknologi apa yang sudah memiliki bukti dan apa yang belum.</span>
                        </div>
                        <div class="flex items-start gap-3 text-xs text-stone-700">
                            <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#E3ECE1] text-[#2D4825] font-bold text-[11px]">&#10003;</span>
                            <span><strong>Tautan Bukti Otentik:</strong> Terhubung langsung dengan repositori GitHub, live demo web, dan dokumentasi proyek.</span>
                        </div>
                        <div class="flex items-start gap-3 text-xs text-stone-700">
                            <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#E3ECE1] text-[#2D4825] font-bold text-[11px]">&#10003;</span>
                            <span><strong>Rekomendasi Terarah:</strong> Bangun proyek baru yang tepat sasaran untuk menutup gap skill posisi target.</span>
                        </div>
                    </div>
                </div>

                {{-- Sisi Kanan (Perbandingan Pendekatan: Cara Lama vs Cara SkillProof) --}}
                <div class="lg:col-span-6 space-y-4">
                    {{-- Cara Lama Card --}}
                    <div class="rounded-3xl border border-stone-200 bg-white/70 p-6 shadow-2xs">
                        <div class="flex items-center gap-2 text-stone-400 mb-3">
                            <span class="text-sm font-bold text-red-500">&#10005;</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Cara Biasa</span>
                        </div>
                        <h4 class="text-sm font-bold text-stone-800">Daftar skill panjang tanpa keterkaitan karya</h4>
                        <p class="mt-1 text-xs text-stone-500 leading-relaxed">
                            Mencantumkan belasan teknologi di resume tanpa tautan repositori, membuat rekruter ragu apakah kamu benar-benar pernah membangun aplikasi dengannya.
                        </p>
                    </div>

                    {{-- Cara SkillProof Card --}}
                    <div class="rounded-3xl border border-[#C8DAC4] bg-[#E3ECE1] p-6 shadow-xs">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm font-bold text-[#2D4825]">&#10003;</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2D4825]">Cara SkillProof</span>
                        </div>
                        <h4 class="text-sm font-bold text-[#2D4825]">Pemetaan terstruktur dengan bukti proyek nyata</h4>
                        <p class="mt-1 text-xs text-stone-700 leading-relaxed">
                            Setiap skill target diverifikasi dengan proyek konkret, tautan repositori aktif, dan persentase kesiapan yang jelas bagi rekruter.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2 text-[10px] font-semibold">
                            <span class="rounded-full bg-white px-2.5 py-1 text-[#2D4825] border border-[#C8DAC4]">Ada bukti proyek</span>
                            <span class="rounded-full bg-white px-2.5 py-1 text-[#2D4825] border border-[#C8DAC4]">Live demo siap cek</span>
                            <span class="rounded-full bg-white px-2.5 py-1 text-[#2D4825] border border-[#C8DAC4]">Tautan publik unik</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 3: Alur Kerja (Step-by-Step) --}}
        <section id="alur-kerja" class="scroll-mt-28 mx-auto max-w-6xl px-6 sm:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Proses Bertahap</span>
                <h2 class="mt-2 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917]">
                    Mulai dari skill, berakhir dengan bukti.
                </h2>
                <p class="mt-3 text-sm text-stone-600 leading-relaxed">
                    Empat langkah terarah untuk mempersiapkan portofolio magang yang meyakinkan bagi rekruter.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Step 1 --}}
                <div class="rounded-3xl border border-[#E7E2DA] bg-white p-7 shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#FAF8F5] border border-stone-200 text-xs font-bold text-stone-800 mb-5">
                            01
                        </div>
                        <h3 class="font-bold text-sm text-stone-900 leading-snug">
                            Analisis kebutuhan lowongan
                        </h3>
                        <p class="mt-2 text-xs text-stone-600 leading-relaxed">
                            Tempelkan teks deskripsi lowongan target. Sistem mengekstrak skill teknis yang dibutuhkan secara otomatis.
                        </p>
                    </div>
                    <div class="mt-6 pt-3 border-t border-stone-100 text-[11px] font-medium text-stone-500">
                        Langkah awal terarah
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="rounded-3xl border border-[#E7E2DA] bg-white p-7 shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#DEEFF9] border border-[#BCE0F5] text-xs font-bold text-[#194E73] mb-5">
                            02
                        </div>
                        <h3 class="font-bold text-sm text-stone-900 leading-snug">
                            Petakan bukti kemampuan
                        </h3>
                        <p class="mt-2 text-xs text-stone-600 leading-relaxed">
                            Tautkan skill dengan karya yang sudah kamu kerjakan: proyek kuliah, proyek sampingan, atau sertifikasi.
                        </p>
                    </div>
                    <div class="mt-6 pt-3 border-t border-stone-100 text-[11px] font-medium text-stone-500">
                        Identifikasi kesiapan
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="rounded-3xl border border-[#E7E2DA] bg-white p-7 shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#FEF4D1] border border-[#FDE48C] text-xs font-bold text-[#74520F] mb-5">
                            03
                        </div>
                        <h3 class="font-bold text-sm text-stone-900 leading-snug">
                            Lengkapi skill melalui proyek
                        </h3>
                        <p class="mt-2 text-xs text-stone-600 leading-relaxed">
                            Ambil ide proyek rekomendasi untuk menutup skill yang belum memiliki bukti sebelum mengirim lamaran.
                        </p>
                    </div>
                    <div class="mt-6 pt-3 border-t border-stone-100 text-[11px] font-medium text-stone-500">
                        Tutup skill gap
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="rounded-3xl border border-[#E7E2DA] bg-white p-7 shadow-2xs flex flex-col justify-between">
                    <div>
                        <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#E3ECE1] border border-[#C8DAC4] text-xs font-bold text-[#2D4825] mb-5">
                            04
                        </div>
                        <h3 class="font-bold text-sm text-stone-900 leading-snug">
                            Susun portofolio
                        </h3>
                        <p class="mt-2 text-xs text-stone-600 leading-relaxed">
                            Pilih proyek unggulan dan bagikan tautan portofolio publik yang bersih dan profesional kepada rekruter.
                        </p>
                    </div>
                    <div class="mt-6 pt-3 border-t border-stone-100 text-[11px] font-medium text-stone-500">
                        Siap dibagikan
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 4: Contoh Portofolio Publik --}}
        <section id="contoh-portofolio" class="scroll-mt-28 mx-auto max-w-6xl px-6 sm:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Hasil Nyata</span>
                <h2 class="mt-2 font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917]">
                    Lihat hasil yang bisa kamu tunjukkan.
                </h2>
                <p class="mt-3 text-sm text-stone-600 leading-relaxed">
                    Contoh portofolio siap pakai yang dihasilkan dari pemetaan skill dan proyek nyata.
                </p>
            </div>

            {{-- Live Sample Card for Dinda Putri --}}
            <div class="rounded-3xl border border-[#E7E2DA] bg-white p-8 sm:p-10 shadow-xs max-w-4xl mx-auto">
                <div class="flex flex-col sm:flex-row items-center sm:items-start justify-between gap-6 pb-6 border-b border-stone-100">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 text-center sm:text-left">
                        <div class="h-16 w-16 rounded-full bg-[#DEEFF9] border-2 border-[#BCE0F5] flex items-center justify-center text-[#194E73] font-bold text-xl">
                            D
                        </div>
                        <div>
                            <div class="flex items-center justify-center sm:justify-start gap-2">
                                <h3 class="text-lg font-bold text-stone-900">Dinda Putri</h3>
                                <span class="rounded-full bg-[#E3ECE1] px-2.5 py-0.5 text-[10px] font-bold text-[#2D4825] border border-[#C8DAC4]">
                                    Contoh Demonstrasi
                                </span>
                            </div>
                            <p class="text-xs font-semibold text-blue-600 mt-0.5">Web Developer Intern &bull; Mahasiswa Teknik Informatika</p>
                            <p class="text-xs text-stone-500 mt-1 max-w-md">Tertarik pada pengembangan aplikasi web Laravel & MySQL. Mempersiapkan lamaran magang.</p>
                        </div>
                    </div>

                    <a href="{{ route('portofolio.public', 'dindaputri') }}" target="_blank"
                       class="rounded-full bg-[#1C1917] px-5 py-2.5 text-xs font-semibold text-white hover:bg-stone-800 transition-colors shrink-0 inline-flex items-center gap-1.5">
                        Buka Halaman Portofolio Asli <span>&rarr;</span>
                    </a>
                </div>

                {{-- Sample 3 Projects Grid --}}
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="rounded-2xl border border-stone-200/80 bg-[#FAF8F5] p-4 text-left">
                        <span class="text-[10px] font-mono text-stone-400 uppercase">Proyek 01</span>
                        <h4 class="text-xs font-bold text-stone-900 mt-1">Sistem Kasir (Laravel)</h4>
                        <p class="text-[11px] text-stone-500 mt-1 line-clamp-2">Aplikasi kasir dengan transaksi penjualan dan laporan keuangan.</p>
                        <div class="mt-3 flex flex-wrap gap-1">
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">Laravel</span>
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">MySQL</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-stone-200/80 bg-[#FAF8F5] p-4 text-left">
                        <span class="text-[10px] font-mono text-stone-400 uppercase">Proyek 02</span>
                        <h4 class="text-xs font-bold text-stone-900 mt-1">Personal Portfolio</h4>
                        <p class="text-[11px] text-stone-500 mt-1 line-clamp-2">Website portofolio responsif untuk showcase resume dan karya.</p>
                        <div class="mt-3 flex flex-wrap gap-1">
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">HTML</span>
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">CSS</span>
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">JS</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-stone-200/80 bg-[#FAF8F5] p-4 text-left">
                        <span class="text-[10px] font-mono text-stone-400 uppercase">Proyek 03</span>
                        <h4 class="text-xs font-bold text-stone-900 mt-1">ToDo App (REST API)</h4>
                        <p class="text-[11px] text-stone-500 mt-1 line-clamp-2">REST API manajemen tugas dengan autentikasi berbasis token.</p>
                        <div class="mt-3 flex flex-wrap gap-1">
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">REST API</span>
                            <span class="rounded-md bg-white px-1.5 py-0.5 text-[9px] font-semibold text-stone-600 border border-stone-200">MySQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Final CTA Section --}}
        <section class="mx-auto max-w-5xl px-6 sm:px-8">
            <div class="rounded-3xl border border-[#C8DAC4] bg-[#E3ECE1] p-10 sm:p-14 text-center shadow-2xs">
                <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#2D4825]">
                    Saatnya buktikan kemampuanmu.
                </h2>
                <p class="mt-3 text-xs sm:text-sm text-stone-700 max-w-xl mx-auto leading-relaxed">
                    Mulai persiapkan portofolio magangmu bersama SkillProof.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('register') }}"
                       class="w-full sm:w-auto rounded-full bg-[#1C1917] px-8 py-3.5 text-xs sm:text-sm font-semibold text-white hover:bg-stone-800 transition-all shadow-xs">
                        Buat Akun Gratis &rarr;
                    </a>
                    <a href="{{ route('login') }}"
                       class="w-full sm:w-auto rounded-full border border-stone-400/60 bg-white/80 px-6 py-3.5 text-xs sm:text-sm font-semibold text-stone-800 hover:bg-white transition-all">
                        Masuk ke Akun
                    </a>
                </div>
            </div>
        </section>

    </main>

    {{-- Footer --}}
    <footer class="border-t border-[#E7E2DA] bg-[#FAF8F5] py-12">
        <div class="mx-auto max-w-6xl px-6 sm:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 text-xs text-stone-500">
            <div class="flex items-center gap-2">
                <span class="font-serif text-base font-bold text-stone-900">skillproof.</span>
                <span>&copy; {{ date('Y') }} Platform Kesiapan Portofolio Magang Mahasiswa IT.</span>
            </div>

            <div class="flex items-center gap-5">
                <a href="{{ route('login') }}" class="hover:text-stone-900 transition-colors">Masuk</a>
                <a href="{{ route('register') }}" class="hover:text-stone-900 transition-colors">Daftar</a>
                <a href="{{ route('portofolio.public', 'dindaputri') }}" target="_blank" class="hover:text-stone-900 transition-colors">Contoh Portofolio</a>
            </div>
        </div>
    </footer>

</body>
</html>
