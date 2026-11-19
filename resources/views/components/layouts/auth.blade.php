<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'SkillProof' }}</title>

    {{-- Fonts: Fraunces (Editorial Serif) & Plus Jakarta Sans (Modern Sans) --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,400i,600i|plus-jakarta-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F5] font-sans text-[#1C1917] antialiased selection:bg-[#FCE7F0] selection:text-[#832B4C]">
    <div class="flex min-h-screen items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            {{-- Centered Brand Logo --}}
            <div class="mb-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 group">
                    <span class="font-serif text-3xl font-bold tracking-tight text-[#1C1917]">skillproof</span>
                    <span class="h-2.5 w-2.5 rounded-full bg-[#E3ECE1] border border-[#C8DAC4] group-hover:bg-[#FCE7F0] transition-colors"></span>
                </a>
            </div>

            {{-- Card Container --}}
            <div class="rounded-3xl border border-[#E7E2DA] bg-white p-7 sm:p-9 shadow-2xs">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
