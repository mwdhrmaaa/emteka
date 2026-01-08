@php
    $id = Str::slug($title);
@endphp

<div class="rounded-2xl border border-white/10 bg-slate-900/50 backdrop-blur-md transition-all hover:bg-slate-900/70">
    <button onclick="toggleAccordion('{{ $id }}')" class="flex w-full items-center justify-between p-6 text-left focus:outline-none">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg {{ $iconBg }} {{ $iconColor }}">
                <span class="font-bold">{{ $icon }}</span>
            </div>
            <h2 class="text-xl font-bold text-white">{{ $title }}</h2>
        </div>
        <svg id="icon-{{ $id }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <div id="{{ $id }}" class="hidden px-6 pb-6">
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($formulas as $formula)
            <div class="rounded-lg bg-slate-950/50 p-4">
                <p class="text-xs font-medium uppercase text-slate-500">{{ $formula['title'] }}</p>
                <p class="mt-1 font-mono text-lg text-white">{{ $formula['eq'] }}</p>
                @if(isset($formula['desc']))
                <p class="mt-2 border-t border-white/5 pt-2 text-xs text-slate-400 font-mono">{{ $formula['desc'] }}</p>
                @endif
                @if(isset($formula['raw']) && !empty($formula['raw']))
                <a href="{{ route('public.math.solver', ['eq' => $formula['raw']]) }}" class="mt-3 block w-full rounded bg-white/5 py-1.5 text-center text-xs font-bold text-primary transition-colors hover:bg-primary hover:text-white">
                    Try in Solver
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
