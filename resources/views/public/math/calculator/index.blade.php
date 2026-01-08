@extends('layouts.public')

@section('title', 'Scientific Calculator - Emteka')

@section('content')
<div class="relative min-h-[calc(100vh-4rem)] bg-slate-950 py-12">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-primary/10 via-slate-950 to-slate-950"></div>
    
    <div class="relative mx-auto max-w-lg px-4">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-white">Scientific Calculator</h1>
            <p class="text-slate-400">Calculate anything, anytime.</p>
        </div>

        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/50 shadow-2xl backdrop-blur-xl">
            <!-- Screen -->
            <div class="relative border-b border-white/5 bg-slate-950 p-6">
                <div id="calc-history" class="mb-2 flex min-h-[4rem] flex-col-reverse items-end space-y-1 overflow-hidden">
                    <!-- History items will appear here -->
                </div>
                <div id="calc-display" class="w-full break-all text-right text-5xl font-light text-white tracking-wide min-h-[4rem]">
                    <!-- Display Value -->
                </div>
            </div>

            <!-- Keypad -->
            <div class="grid grid-cols-4 gap-1 p-4 sm:gap-2">
                <!-- Scientific Row 1 -->
                <button data-scientific="sin" class="btn-calc-secondary">sin</button>
                <button data-scientific="cos" class="btn-calc-secondary">cos</button>
                <button data-scientific="tan" class="btn-calc-secondary">tan</button>
                <button data-scientific="log" class="btn-calc-secondary">log</button>

                <!-- Scientific Row 2 -->
                <button data-scientific="sqrt" class="btn-calc-secondary">√</button>
                <button data-operation="^" class="btn-calc-secondary">^</button>
                <button data-scientific="ln" class="btn-calc-secondary">ln</button>
                <button data-clear class="btn-calc-danger">AC</button>
                
                <!-- Main Numbers & Ops -->
                <button data-number class="btn-calc-primary">7</button>
                <button data-number class="btn-calc-primary">8</button>
                <button data-number class="btn-calc-primary">9</button>
                <button data-operation="/" class="btn-calc-accent">÷</button>

                <button data-number class="btn-calc-primary">4</button>
                <button data-number class="btn-calc-primary">5</button>
                <button data-number class="btn-calc-primary">6</button>
                <button data-operation="*" class="btn-calc-accent">×</button>

                <button data-number class="btn-calc-primary">1</button>
                <button data-number class="btn-calc-primary">2</button>
                <button data-number class="btn-calc-primary">3</button>
                <button data-operation="-" class="btn-calc-accent">-</button>

                <button data-number class="btn-calc-primary">0</button>
                <button data-number class="btn-calc-primary">.</button>
                <button data-delete class="btn-calc-secondary">DEL</button>
                <button data-operation="+" class="btn-calc-accent">+</button>

                <button data-equals class="col-span-4 mt-2 rounded-2xl bg-gradient-to-r from-primary to-secondary p-4 text-xl font-bold text-white shadow-lg transition-transform active:scale-95">=</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .btn-calc-primary {
        @apply flex h-16 items-center justify-center rounded-2xl bg-slate-800 text-xl font-medium text-white transition-all hover:bg-slate-700 active:scale-95;
    }
    .btn-calc-secondary {
        @apply flex h-16 items-center justify-center rounded-2xl bg-slate-900 text-sm font-semibold text-slate-400 transition-all hover:bg-slate-800 active:scale-95;
    }
    .btn-calc-accent {
        @apply flex h-16 items-center justify-center rounded-2xl bg-slate-800 text-xl font-bold text-primary transition-all hover:bg-slate-700 active:scale-95;
    }
    .btn-calc-danger {
        @apply flex h-16 items-center justify-center rounded-2xl bg-red-500/10 text-sm font-bold text-red-500 transition-all hover:bg-red-500/20 active:scale-95;
    }
</style>
@endpush

@push('scripts')
    @vite(['resources/js/calculator.js'])
@endpush
@endsection
