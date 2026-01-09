@extends('layouts.public')

@section('title', 'Emteka - Master Mathematics')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden pt-16 pb-32">
    <!-- Abstract Background -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-primary/20 via-slate-950 to-slate-950"></div>
    <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-secondary/20 blur-3xl"></div>
    <div class="absolute top-1/2 -left-24 h-64 w-64 rounded-full bg-primary/20 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="mx-auto max-w-4xl text-5xl font-bold tracking-tight text-white sm:text-7xl">
            Mathematics, <span class="bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Simplified.</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-300">
            A complete suite of tools to help you destroy math problems. Scientific calculator, comprehensive formulas, and smart solver all in one place.
        </p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('public.math.calculator') }}" class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg bg-white px-8 py-3 font-semibold text-slate-950 transition-all hover:bg-slate-200">
                <span class="relative">Open Calculator</span>
            </a>
            <a href="{{ route('public.math.formulas') }}" class="text-sm font-semibold leading-6 text-white transition-colors hover:text-primary">
                Browse Formulas <span aria-hidden="true">→</span>
            </a>
        </div>
        
        <!-- Feature Grid Preview -->
        <div class="mt-20 grid grid-cols-1 gap-8 sm:grid-cols-3">
            <a href="{{ route('public.math.calculator') }}" class="group block relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:border-primary/50 hover:bg-white/10">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-primary/20 text-primary">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white">Scientific Calculator</h3>
                <p class="mt-2 text-sm text-slate-400">Advanced operations, history, and real-time graphing capabilities.</p>
            </a>
            
            <a href="{{ route('public.math.solver') }}" class="group block relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:border-secondary/50 hover:bg-white/10">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-secondary/20 text-secondary">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white">Smart Solver</h3>
                <p class="mt-2 text-sm text-slate-400">Step-by-step solutions for Algebra, Calculus, and more.</p>
            </a>

            <a href="{{ route('public.math.formulas') }}" class="group block relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:border-primary/50 hover:bg-white/10">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-primary/20 text-primary">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white">Formula Library</h3>
                <p class="mt-2 text-sm text-slate-400">Huge collection of mathematical formulas and constants.</p>
            </a>
        </div>
    </div>
</div>
@endsection
