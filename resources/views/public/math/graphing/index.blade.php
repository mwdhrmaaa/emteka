@extends('layouts.public')

@section('title', 'Graphing Calculator - Emteka')

@section('content')
<div class="relative min-h-[calc(100vh-4rem)] bg-slate-950 px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Graphing Calculator</h1>
            <p class="mt-1 text-slate-400">Visualize multiple functions and implicit equations.</p>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Sidebar: Expressions -->
            <div class="lg:col-span-1">
                <div class="rounded-xl border border-white/10 bg-slate-900/50 p-4 backdrop-blur-xl">
                    <div id="expressions-list" class="space-y-3">
                        <!-- Expressions will be added here dynamically -->
                    </div>
                    
                    <div class="mt-4 flex gap-2">
                        <button id="add-expr-btn" class="flex flex-1 items-center justify-center gap-2 rounded-lg border border-dashed border-white/20 py-2 text-sm font-medium text-slate-400 transition-colors hover:border-white/40 hover:text-white">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add
                        </button>
                        <button id="reset-btn" class="flex items-center justify-center rounded-lg border border-white/10 bg-red-500/10 px-4 py-2 text-sm font-medium text-red-400 transition-colors hover:bg-red-500/20 hover:text-red-300" title="Reset Graph">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Examples</h3>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="window.addExpression('x^2')" class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-400 transition-colors hover:bg-white/10 hover:text-white">Parabola</button>
                        <button onclick="window.addExpression('sin(x)')" class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-400 transition-colors hover:bg-white/10 hover:text-white">Sine</button>
                        <button onclick="window.addExpression('x^2 + y^2 = 9')" class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-400 transition-colors hover:bg-white/10 hover:text-white">Circle</button>
                        <button onclick="window.addExpression('tan(x)')" class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-400 transition-colors hover:bg-white/10 hover:text-white">Tan</button>
                    </div>
                </div>
            </div>

            <!-- Main: Chart -->
            <div class="lg:col-span-3">
                <div id="error-message" class="mb-4 hidden rounded-lg border border-red-500/20 bg-red-500/10 p-4 text-red-400"></div>

                <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/50 p-1 shadow-2xl backdrop-blur-xl">
                     <div id="chart-container" class="h-[600px] w-full text-white"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
   <script src="{{ asset('js/vendor/d3.min.js') }}"></script>
   <script src="{{ asset('js/vendor/function-plot.js') }}"></script>
   <script src="{{ asset('js/grapher.js') }}"></script>
@endpush
@endsection
