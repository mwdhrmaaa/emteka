@extends('layouts.public')

@section('title', 'Problem Solver - Emteka')

@section('content')
<div class="relative min-h-[calc(100vh-4rem)] bg-slate-950 px-4 py-12 sm:px-6 lg:px-8">
    <div class="absolute top-0 left-0 h-64 w-64 rounded-full bg-secondary/10 blur-[100px]"></div>
    <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full bg-primary/10 blur-[100px]"></div>

    <div class="relative mx-auto max-w-2xl">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold text-white">Problem Solver</h1>
            <p class="mt-2 text-slate-400">Step-by-step solutions for your homework.</p>
        </div>

        <!-- Input Area -->
        <div class="mb-8 rounded-2xl border border-white/10 bg-slate-900/50 p-2 backdrop-blur-md transition-all focus-within:border-primary/50 focus-within:bg-slate-900/80 focus-within:ring-2 focus-within:ring-primary/20">
            <div class="relative flex items-center">
                <input type="text" id="equation-input" 
                    placeholder="Enter equation (e.g. 2x + 5 = 15 or x^2 - 4 = 0)" 
                    class="w-full bg-transparent px-6 py-4 text-xl font-medium text-white placeholder-slate-500 focus:outline-none"
                    autocomplete="off">
                <button id="solve-btn" class="mr-2 rounded-xl bg-primary px-6 py-2 font-bold text-white transition-all hover:bg-primary/90 hover:shadow-lg hover:shadow-primary/25 active:scale-95">
                    Solve
                </button>
            </div>
        </div>

        <!-- Variable Inputs (Worksheet Mode) -->
        <div id="variable-inputs" class="mb-8 hidden flex-wrap gap-4 rounded-xl border border-white/5 bg-white/5 p-4 transition-all">
            <!-- Dynamic Inputs will appear here -->
        </div>

        <!-- Examples / Quick Insert -->
        <div class="mb-12 flex flex-wrap justify-center gap-2">
            <button onclick="document.getElementById('equation-input').value = 'solve(x^2+5x+6=0)'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Quadratic
            </button>
            <button onclick="document.getElementById('equation-input').value = 'diff(x^3 + 2x^2)'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Derivative
            </button>
            <button onclick="document.getElementById('equation-input').value = 'integrate(cos(x))'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Integral
            </button>
            <button onclick="document.getElementById('equation-input').value = 'factor(x^2-y^2)'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Factorization
            </button>
            <button onclick="document.getElementById('equation-input').value = 'limit(sin(x)/x, x, 0)'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Limit
            </button>
            <button onclick="document.getElementById('equation-input').value = 'determinant([[1,2],[3,4]])'; window.checkForVariables && window.checkForVariables();" class="rounded-full border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-400 transition-colors hover:bg-white/10 hover:text-white">
                Matrix Det
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const urlParams = new URLSearchParams(window.location.search);
                const eq = urlParams.get('eq');
                if (eq) {
                    const input = document.getElementById('equation-input');
                    input.value = eq;
                    // Trigger variable detection immediately
                    setTimeout(() => {
                        if (window.solverInstance) {
                            window.solverInstance.detectAndSetupVariables(eq);
                        }
                    }, 500);
                }
            });
        </script>

        <!-- Solution Output -->
        <div id="solution-output" class="hidden overflow-hidden rounded-2xl border border-white/10 bg-slate-900/80 shadow-2xl backdrop-blur-xl">
            <div class="border-b border-white/5 bg-slate-950/50 px-6 py-4">
                <h3 class="font-semibold text-white">Solution Steps</h3>
            </div>
            <div id="solution-steps" class="space-y-6 p-6">
                <!-- Dynamic Steps via JS -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
   <script src="{{ asset('js/vendor/nerdamer.core.js') }}"></script>
   <script src="{{ asset('js/vendor/nerdamer.alg.js') }}"></script>
   <script src="{{ asset('js/vendor/nerdamer.calc.js') }}"></script>
   <script src="{{ asset('js/vendor/nerdamer.solve.js') }}"></script>
   <script src="{{ asset('js/vendor/nerdamer.extra.js') }}"></script>
   <script src="{{ asset('js/solver.js') }}"></script>
@endpush
@endsection
