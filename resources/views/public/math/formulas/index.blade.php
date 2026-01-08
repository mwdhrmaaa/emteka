@extends('layouts.public')

@section('title', 'Math Formulas - Emteka')

@section('content')
<div class="bg-slate-950 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold text-white">Mathematical Formulas</h1>
            <p class="mt-2 text-slate-400">Your quick reference guide to everything math.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Algebra -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500/20 text-blue-400">
                        <span class="font-bold">x</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Algebra</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Quadratic Formula</p>
                        <p class="mt-1 font-mono text-lg text-white">x = (-b ± √(b² - 4ac)) / 2a</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Difference of Squares</p>
                        <p class="mt-1 font-mono text-lg text-white">a² - b² = (a - b)(a + b)</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Slope Intercept</p>
                        <p class="mt-1 font-mono text-lg text-white">y = mx + b</p>
                    </div>
                </div>
            </div>

            <!-- Geometry -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-400">
                        <span class="font-bold">▱</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Geometry</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Area of Circle</p>
                        <p class="mt-1 font-mono text-lg text-white">A = πr²</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Pythagorean Theorem</p>
                        <p class="mt-1 font-mono text-lg text-white">a² + b² = c²</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Volume of Cylinder</p>
                        <p class="mt-1 font-mono text-lg text-white">V = πr²h</p>
                    </div>
                </div>
            </div>

            <!-- Trigonometry -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-500/20 text-purple-400">
                        <span class="font-bold">θ</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Trigonometry</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Identity</p>
                        <p class="mt-1 font-mono text-lg text-white">sin²θ + cos²θ = 1</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Sine Rule</p>
                        <p class="mt-1 font-mono text-lg text-white">a/sinA = b/sinB = c/sinC</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Cosine Rule</p>
                        <p class="mt-1 font-mono text-lg text-white">c² = a² + b² - 2ab cosC</p>
                    </div>
                </div>
            </div>
            
             <!-- Calculus -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-pink-500/20 text-pink-400">
                        <span class="font-bold">∫</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Calculus</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Power Rule</p>
                        <p class="mt-1 font-mono text-lg text-white">d/dx(x^n) = nx^(n-1)</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Integration by Parts</p>
                        <p class="mt-1 font-mono text-lg text-white">∫udv = uv - ∫vdu</p>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-500/20 text-orange-400">
                        <span class="font-bold">σ</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Statistics</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Mean</p>
                        <p class="mt-1 font-mono text-lg text-white">μ = (Σx) / n</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Probability</p>
                        <p class="mt-1 font-mono text-lg text-white">P(A) = n(A) / n(S)</p>
                    </div>
                </div>
            </div>
            <!-- Logarithms -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-teal-500/20 text-teal-400">
                        <span class="font-bold">ln</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Logarithms</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Product Rule</p>
                        <p class="mt-1 font-mono text-lg text-white">log(ab) = log(a) + log(b)</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Power Rule</p>
                        <p class="mt-1 font-mono text-lg text-white">log(a^b) = b · log(a)</p>
                    </div>
                </div>
            </div>

            <!-- Physics -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-500/20 text-yellow-400">
                        <span class="font-bold">⚡</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Physics</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Newton's Second Law</p>
                        <p class="mt-1 font-mono text-lg text-white">F = m · a</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Kinetic Energy</p>
                        <p class="mt-1 font-mono text-lg text-white">KE = ½mv²</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Einstein's Energy</p>
                        <p class="mt-1 font-mono text-lg text-white">E = mc²</p>
                    </div>
                </div>
            </div>

            <!-- Finance -->
            <div class="rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur-md">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-500/20 text-green-400">
                        <span class="font-bold">$</span>
                    </div>
                    <h2 class="text-xl font-bold text-white">Finance</h2>
                </div>
                <div class="space-y-4">
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Simple Interest</p>
                        <p class="mt-1 font-mono text-lg text-white">I = P · r · t</p>
                    </div>
                    <div class="rounded-lg bg-slate-950/50 p-4">
                        <p class="text-xs font-medium uppercase text-slate-500">Compound Interest</p>
                        <p class="mt-1 font-mono text-lg text-white">A = P(1 + r/n)^(nt)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
