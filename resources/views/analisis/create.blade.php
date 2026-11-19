<x-layouts.app title="Input Analisis Lowongan">
    <div class="space-y-6" x-data="{
        activeTab: 'text',
        desc: '',
        fillExample() {
            document.getElementById('title').value = 'Web Developer Intern';
            document.getElementById('company').value = 'PT Tech Innovate';
            this.desc = 'Kami mencari Web Developer Intern yang memiliki minat dalam pengembangan aplikasi web. Kandidat diharapkan memahami dasar PHP dan Laravel, mampu menggunakan MySQL, serta memiliki pengalaman dengan HTML, CSS, dan JavaScript. Pengalaman dengan Git dan REST API menjadi nilai tambah.';
        }
    }">
        {{-- Page Header --}}
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Analisis Lowongan</h1>
            <p class="mt-1 text-sm text-slate-500">Masukkan deskripsi lowongan magang untuk mengidentifikasi kebutuhan skill.</p>
        </div>

        {{-- Stepper Progress --}}
        <div class="flex items-center justify-center gap-2 sm:gap-4 rounded-2xl border border-slate-200/80 bg-white p-3.5 shadow-2xs text-xs font-semibold">
            <div class="flex items-center gap-2 rounded-xl bg-blue-50 px-3 py-1.5 text-blue-700 border border-blue-100">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-[10px] text-white">1</span>
                <span>Input Deskripsi</span>
            </div>
            <span class="text-slate-300">&rarr;</span>
            <div class="flex items-center gap-2 px-3 py-1.5 text-slate-400">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] text-slate-500">2</span>
                <span>Hasil Analisis</span>
            </div>
            <span class="text-slate-300">&rarr;</span>
            <div class="flex items-center gap-2 px-3 py-1.5 text-slate-400">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-slate-100 text-[10px] text-slate-500">3</span>
                <span>Pemetaan Bukti</span>
            </div>
        </div>

        {{-- Form Container --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            {{-- Left Form (8 cols) --}}
            <div class="lg:col-span-8 rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
                <h2 class="text-sm font-bold text-slate-900">Input Deskripsi Lowongan</h2>
                <p class="mt-1 text-xs text-slate-500">Tempel deskripsi lowongan atau masukkan tautan yang dapat diakses.</p>

                {{-- Tabs --}}
                <div class="mt-4 flex rounded-xl bg-slate-100 p-1 max-w-xs">
                    <button type="button" @click="activeTab = 'text'"
                            :class="activeTab === 'text' ? 'bg-white text-blue-600 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                            class="flex-1 rounded-lg py-1.5 text-xs transition-all">
                        Teks Deskripsi
                    </button>
                    <button type="button" @click="activeTab = 'url'"
                            :class="activeTab === 'url' ? 'bg-white text-blue-600 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                            class="flex-1 rounded-lg py-1.5 text-xs transition-all">
                        Tautan Lowongan
                    </button>
                </div>

                <form method="POST" action="{{ route('analisis-lowongan.store') }}" class="mt-5 space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="title" class="block text-xs font-semibold text-slate-700">Posisi Lowongan <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title" required value="{{ old('title') }}"
                                   placeholder="Contoh: Web Developer Intern"
                                   class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="company" class="block text-xs font-semibold text-slate-700">Nama Perusahaan / Organisasi</label>
                            <input id="company" type="text" name="company" value="{{ old('company') }}"
                                   placeholder="Contoh: PT Tech Innovate"
                                   class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>
                    </div>

                    {{-- URL Input (jika tab URL aktif) --}}
                    <div x-show="activeTab === 'url'" x-transition>
                        <label for="source_url" class="block text-xs font-semibold text-slate-700">Tautan / URL Lowongan</label>
                        <input id="source_url" type="url" name="source_url" value="{{ old('source_url') }}"
                               placeholder="https://www.linkedin.com/jobs/view/..."
                               class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="description" class="block text-xs font-semibold text-slate-700">Deskripsi Lengkap Lowongan <span class="text-rose-500">*</span></label>
                            <span class="text-[11px] text-slate-400" x-text="desc.length + '/5000'"></span>
                        </div>
                        <textarea id="description" name="description" rows="7" required x-model="desc" maxlength="5000"
                                  placeholder="Tempel rincian tanggung jawab dan persyaratan kualifikasi teknologi di sini..."
                                  class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-xs font-bold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                            </svg>
                            Analisis Sekarang
                        </button>
                    </div>
                </form>
            </div>

            {{-- Right Info (4 cols) --}}
            <div class="lg:col-span-4 space-y-4">
                <div class="rounded-2xl border border-blue-100 bg-blue-50/50 p-5">
                    <h3 class="text-xs font-bold text-blue-900">Contoh Deskripsi</h3>
                    <p class="mt-2 text-xs text-blue-700/80 leading-relaxed">
                        Kamu bisa menyalin deskripsi lowongan dari situs seperti JobStreet, LinkedIn, Glints, atau portal karir resmi perusahaan.
                    </p>
                    <button type="button" @click="fillExample()"
                            class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-blue-700 hover:text-blue-900 underline underline-offset-2">
                        <span>Gunakan Contoh Demo</span> &rarr;
                    </button>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-2xs">
                    <h4 class="text-xs font-bold text-slate-800">Petunjuk Analisis</h4>
                    <ul class="mt-2.5 space-y-2 text-xs text-slate-500">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold">&#10003;</span>
                            <span>Pastikan bagian kualifikasi teknologi tercantum dengan jelas.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold">&#10003;</span>
                            <span>Sistem akan mendeteksi bahasa, framework, basis data, dan tools.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold">&#10003;</span>
                            <span>Hasil ekstraksi dapat kamu petakan langsung dengan portofoliomu.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
