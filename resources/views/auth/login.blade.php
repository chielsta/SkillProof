<x-layouts.auth title="Masuk — SkillProof">
    <div class="text-center sm:text-left">
        <h1 class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-[#1C1917]">Masuk ke akun</h1>
        <p class="mt-1.5 text-xs sm:text-sm text-stone-600">Masukkan email dan password untuk melanjutkan.</p>
    </div>

    @if (session('status'))
        <div class="mt-4 rounded-2xl bg-[#E3ECE1] border border-[#C8DAC4] p-3 text-xs text-[#2D4825] font-medium">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-xs font-semibold text-stone-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900 @error('email') border-red-300 @enderror"
                   placeholder="nama@email.com">
            @error('email')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-semibold text-stone-700">Password</label>
            </div>
            <input id="password" type="password" name="password" required
                   class="mt-1.5 block w-full rounded-xl border border-[#E7E2DA] bg-[#FAF8F5]/50 px-3.5 py-2.5 text-xs sm:text-sm text-[#1C1917] placeholder:text-stone-400 focus:border-stone-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-stone-900 @error('password') border-red-300 @enderror"
                   placeholder="••••••••">
            @error('password')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 cursor-pointer">
                <input id="remember" type="checkbox" name="remember"
                       class="h-4 w-4 rounded border-stone-300 text-stone-900 focus:ring-stone-900">
                <span class="text-xs text-stone-600 font-medium">Ingat saya</span>
            </label>
        </div>

        <button type="submit"
                class="w-full rounded-full bg-[#1C1917] py-3 text-xs sm:text-sm font-semibold text-white shadow-2xs hover:bg-stone-800 transition-colors focus:outline-none focus:ring-2 focus:ring-stone-900 focus:ring-offset-2">
            Masuk
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-stone-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-stone-950 underline underline-offset-4 hover:text-stone-700">
            Daftar sekarang
        </a>
    </div>

    {{-- Transparent Demo Helper --}}
    <div class="mt-6 rounded-2xl border border-[#C8DAC4] bg-[#E3ECE1]/60 p-3.5 text-center text-xs text-[#2D4825]">
        <p class="font-semibold">Akun Demo Pengujian:</p>
        <p class="mt-0.5 font-mono text-[11px] text-stone-700">dinda@example.com &bull; password</p>
    </div>
</x-layouts.auth>
