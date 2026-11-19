@props(['active' => false, 'href' => '#'])

<a href="{{ $href }}"
   class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-semibold transition-all {{ $active ? 'bg-white text-stone-950 shadow-2xs border border-[#C8DAC4]/80' : 'text-stone-700 hover:bg-white/60 hover:text-stone-950' }}">
    <span class="{{ $active ? 'text-[#2D4825]' : 'text-stone-500' }}">
        {{ $icon }}
    </span>
    <span>{{ $slot }}</span>
</a>
