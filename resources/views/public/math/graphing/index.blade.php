@extends('layouts.public')

@section('title', 'Graphing Calculator - Emteka')

@section('content')
<div class="relative min-h-[calc(100vh-4rem)] bg-slate-950 px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 flex flex-col items-center justify-between gap-4 md:flex-row">
            <div>
                <h1 class="text-3xl font-bold text-white">Graphing Calculator</h1>
                <p class="mt-1 text-slate-400">Visualize mathematics in real-time.</p>
            </div>
            
            <div class="flex w-full items-center gap-2 md:w-auto">
                 <input type="text" id="function-input" 
                    placeholder="Enter function (e.g. x^2, sin(x))" 
                    value="sin(x)"
                    class="w-full rounded-xl border border-white/10 bg-slate-900/50 px-4 py-2 font-mono text-white placeholder-slate-500 focus:border-primary/50 focus:outline-none focus:ring-2 focus:ring-primary/20 md:w-80">
                <button id="plot-btn" class="rounded-xl bg-primary px-6 py-2 font-bold text-white transition-all hover:bg-primary/90 active:scale-95">
                    Plot
                </button>
            </div>
        </div>

        <div id="error-message" class="mb-4 hidden rounded-lg border border-red-500/20 bg-red-500/10 p-4 text-red-400"></div>

        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/50 p-4 shadow-2xl backdrop-blur-xl">
             <div id="chart-container" class="h-[500px] w-full text-white"></div>
        </div>
        
        <div class="mt-8 flex flex-wrap justify-center gap-2">
            <button onclick="document.getElementById('function-input').value = 'x^2'; document.getElementById('plot-btn').click();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Parabola (x^2)
            </button>
            <button onclick="document.getElementById('function-input').value = 'sin(x)'; document.getElementById('plot-btn').click();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Sine Wave
            </button>
             <button onclick="document.getElementById('function-input').value = 'tan(x)'; document.getElementById('plot-btn').click();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Tangent
            </button>
            <button onclick="document.getElementById('function-input').value = 'log(x)'; document.getElementById('plot-btn').click();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Logarithmic
            </button>
        </div>
    </div>
</div>

@push('scripts')
   <script src="{{ asset('js/vendor/d3.min.js') }}"></script>
   <script src="{{ asset('js/vendor/function-plot.js') }}"></script>
   <script src="{{ asset('js/grapher.js') }}"></script>
@endpush
@endsection
