<x-layouts.app title="Pengaturan Akun">
    <div class="max-w-3xl space-y-8">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Pengaturan Akun & Profil</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola informasi profil profesional dan kredensial keamanan akunmu.</p>
        </div>

        {{-- Form Profil --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
            <h2 class="text-sm font-bold text-slate-900 mb-1">Informasi Pribadi & Portofolio</h2>
            <p class="text-xs text-slate-500 mb-5">Data ini akan ditampilkan pada portofolio publik yang kamu bagikan ke recruiter.</p>

            <form method="POST" action="{{ route('pengaturan.profile') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-700">Nama Lengkap <span class="text-rose-500">*</span></label>
                        <input id="name" type="text" name="name" required value="{{ old('name', $user->name) }}"
                               class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="username" class="block text-xs font-semibold text-slate-700">Username Publik <span class="text-rose-500">*</span></label>
                        <div class="mt-1.5 flex rounded-xl border border-slate-200 overflow-hidden focus-within:ring-1 focus-within:ring-blue-500 focus-within:border-blue-500">
                            <span class="bg-slate-50 px-3 py-2 text-xs text-slate-400 border-r border-slate-200 select-none">/p/</span>
                            <input id="username" type="text" name="username" required value="{{ old('username', $user->username) }}"
                                   class="block w-full px-3 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="field" class="block text-xs font-semibold text-slate-700">Bidang Keahlian / Minat Posisi</label>
                    <input id="field" type="text" name="field" value="{{ old('field', $user->field) }}"
                           placeholder="Contoh: Web Developer, Frontend Engineer, Backend Developer"
                           class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="bio" class="block text-xs font-semibold text-slate-700">Ringkasan Diri / Bio Singkat</label>
                    <textarea id="bio" name="bio" rows="3"
                              class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="pt-3 border-t border-slate-100">
                    <h3 class="text-xs font-bold text-slate-800 mb-3">Tautan Sosial & Media</h3>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                        <div>
                            <label for="github_url" class="block text-[11px] font-medium text-slate-600">GitHub URL</label>
                            <input id="github_url" type="url" name="github_url" value="{{ old('github_url', $user->github_url) }}"
                                   placeholder="https://github.com/..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="linkedin_url" class="block text-[11px] font-medium text-slate-600">LinkedIn URL</label>
                            <input id="linkedin_url" type="url" name="linkedin_url" value="{{ old('linkedin_url', $user->linkedin_url) }}"
                                   placeholder="https://linkedin.com/in/..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="website_url" class="block text-[11px] font-medium text-slate-600">Website Pribadi</label>
                            <input id="website_url" type="url" name="website_url" value="{{ old('website_url', $user->website_url) }}"
                                   placeholder="https://..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3 py-1.5 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-3 border-t border-slate-100">
                    <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2 text-xs font-semibold text-white hover:bg-blue-700 shadow-xs">
                        Simpan Profil
                    </button>
                </div>
            </form>
        </div>

        {{-- Form Keamanan Sandi --}}
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
            <h2 class="text-sm font-bold text-slate-900 mb-1">Keamanan & Kata Sandi</h2>
            <p class="text-xs text-slate-500 mb-5">Perbarui kata sandi secara berkala untuk menjaga keamanan akun.</p>

            <form method="POST" action="{{ route('pengaturan.password') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-xs font-semibold text-slate-700">Kata Sandi Saat Ini</label>
                    <input id="current_password" type="password" name="current_password" required
                           class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="password" class="block text-xs font-semibold text-slate-700">Kata Sandi Baru</label>
                        <input id="password" type="password" name="password" required
                               placeholder="Minimal 8 karakter"
                               class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-slate-700">Konfirmasi Kata Sandi Baru</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <div class="flex justify-end pt-3 border-t border-slate-100">
                    <button type="submit" class="rounded-xl border border-slate-200 px-5 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Perbarui Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
