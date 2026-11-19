<x-layouts.app title="Edit Proyek">
    <div class="max-w-3xl space-y-6">
        <div>
            <a href="{{ route('proyek.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800 mb-2">
                &larr; Kembali ke Daftar Proyek
            </a>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Edit Proyek</h1>
            <p class="mt-1 text-sm text-slate-500">Perbarui informasi, status, dan tautan bukti proyek ini.</p>
        </div>

        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-2xs">
            <form method="POST" action="{{ route('proyek.update', $proyek) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-xs font-semibold text-slate-700">Judul Proyek <span class="text-rose-500">*</span></label>
                    <input id="title" type="text" name="title" required value="{{ old('title', $proyek->title) }}"
                           class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-700">Deskripsi Proyek</label>
                    <textarea id="description" name="description" rows="4"
                              class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $proyek->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-700">Status Pengerjaan <span class="text-rose-500">*</span></label>
                        <select id="status" name="status" required
                                class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 focus:border-blue-500 focus:outline-none">
                            <option value="planning" {{ old('status', $proyek->status) === 'planning' ? 'selected' : '' }}>Rencana (Planning)</option>
                            <option value="in_progress" {{ old('status', $proyek->status) === 'in_progress' ? 'selected' : '' }}>Sedang Dikerjakan (In Progress)</option>
                            <option value="completed" {{ old('status', $proyek->status) === 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                        </select>
                    </div>

                    <div>
                        <label for="skills" class="block text-xs font-semibold text-slate-700">Teknologi / Skill (Pisahkan dengan koma)</label>
                        <input id="skills" type="text" name="skills" value="{{ old('skills', implode(', ', $proyek->skill_names)) }}"
                               class="mt-1.5 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100">
                    <h3 class="text-xs font-bold text-slate-800 mb-3">Tautan & Bukti Karya</h3>
                    <div class="space-y-3">
                        <div>
                            <label for="repo_url" class="block text-xs font-medium text-slate-600">Tautan Repositori (GitHub / GitLab)</label>
                            <input id="repo_url" type="url" name="repo_url" value="{{ old('repo_url', $proyek->repo_url) }}"
                                   placeholder="https://github.com/..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="demo_url" class="block text-xs font-medium text-slate-600">Tautan Live Demo</label>
                            <input id="demo_url" type="url" name="demo_url" value="{{ old('demo_url', $proyek->demo_url) }}"
                                   placeholder="https://..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="doc_url" class="block text-xs font-medium text-slate-600">Tautan Dokumentasi</label>
                            <input id="doc_url" type="url" name="doc_url" value="{{ old('doc_url', $proyek->doc_url) }}"
                                   placeholder="https://..."
                                   class="mt-1 block w-full rounded-xl border border-slate-200 px-3.5 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <form method="POST" action="{{ route('proyek.destroy', $proyek) }}" onsubmit="return confirm('Hapus proyek ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700">
                            Hapus Proyek Ini
                        </button>
                    </form>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('proyek.index') }}" class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                            Batal
                        </a>
                        <button type="submit" class="rounded-xl bg-blue-600 px-5 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
