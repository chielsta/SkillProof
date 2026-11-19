<x-layouts.auth title="Daftar — SkillProof">
    <div class="text-center sm:text-left">
        <h1 class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-[#1C1917]">Buat akun baru</h1>
        <p class="mt-1.5 text-xs sm:text-sm text-stone-600">Isi data berikut untuk memulai persiapan portofolio magangmu.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-xs font-semibold text-stone-700">Nama lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900 @error('name') border-red-300 @enderror"
                   placeholder="Nama Lengkap">
            @error('name')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-xs font-semibold text-stone-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900 @error('email') border-red-300 @enderror"
                   placeholder="nama@email.com">
            @error('email')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-xs font-semibold text-stone-700">Password</label>
            <input id="password" type="password" name="password" required
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900 @error('password') border-red-300 @enderror"
                   placeholder="Minimal 8 karakter">
            @error('password')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-xs font-semibold text-stone-700">Konfirmasi password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900"
                   placeholder="Ketik ulang password">
        </div>

        <button type="submit"
                class="w-full rounded-full bg-[#1C1917] py-3 text-xs sm:text-sm font-semibold text-white shadow-2xs hover:bg-stone-800 transition-colors focus:outline-none focus:ring-2 focus:ring-stone-900 focus:ring-offset-2">
            Daftar Akun
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-stone-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="font-semibold text-stone-950 underline underline-offset-4 hover:text-stone-700">
            Masuk
        </a>
    </div>
</x-layouts.auth>
