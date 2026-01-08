@extends('layouts.public')

@section('title', 'Math Formulas - Emteka')

@section('content')
<div class="bg-slate-950 py-12">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold text-white">Mathematical Formulas</h1>
            <p class="mt-2 text-slate-400">Click on a category to reveal the formulas.</p>
        </div>

        <div class="space-y-4">
            <!-- Algebra -->
            @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Algebra',
                'icon' => 'x',
                'iconBg' => 'bg-blue-500/20',
                'iconColor' => 'text-blue-400',
                'formulas' => [
                    ['title' => 'Quadratic Formula', 'eq' => 'x = (-b ± √(b² - 4ac)) / 2a', 'desc' => 'a,b,c: coefficients'],
                    ['title' => 'Difference of Squares', 'eq' => 'a² - b² = (a - b)(a + b)', 'desc' => 'a,b: terms'],
                    ['title' => 'Slope Intercept', 'eq' => 'y = mx + b', 'desc' => 'm: slope, b: y-intercept'],
                    ['title' => 'Arithmetic Series', 'eq' => 'Sn = n/2(2a + (n-1)d)', 'desc' => 'Sn: Sum, a: first term, d: diff, n: count'],
                    ['title' => 'Geometric Series', 'eq' => 'Sn = a(1-r^n)/(1-r)', 'desc' => 'r: common ratio'],
                    ['title' => 'Exponent Product', 'eq' => 'a^m · a^n = a^(m+n)', 'desc' => 'a: base, m,n: powers'],
                ]
            ])

            <!-- Geometry -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Geometry',
                'icon' => '▱',
                'iconBg' => 'bg-emerald-500/20',
                'iconColor' => 'text-emerald-400',
                'formulas' => [
                    ['title' => 'Area of Circle', 'eq' => 'A = πr²', 'desc' => 'A: Area, r: radius'],
                    ['title' => 'Pythagorean Theorem', 'eq' => 'a² + b² = c²', 'desc' => 'a,b: legs, c: hypotenuse'],
                    ['title' => 'Volume of Cylinder', 'eq' => 'V = πr²h', 'desc' => 'V: Volume, r: radius, h: height'],
                    ['title' => 'Area of Triangle', 'eq' => 'A = ½bh', 'desc' => 'b: base, h: height'],
                    ['title' => 'Volume of Sphere', 'eq' => 'V = 4/3πr³', 'desc' => 'r: radius'],
                    ['title' => 'Volume of Cone', 'eq' => 'V = ⅓πr²h', 'desc' => 'r: radius, h: height'],
                ]
            ])

            <!-- Trigonometry -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Trigonometry',
                'icon' => 'θ',
                'iconBg' => 'bg-purple-500/20',
                'iconColor' => 'text-purple-400',
                'formulas' => [
                    ['title' => 'Identity', 'eq' => 'sin²θ + cos²θ = 1', 'desc' => 'θ: angle'],
                    ['title' => 'Sine Rule', 'eq' => 'a/sinA = b/sinB = c/sinC', 'desc' => 'a,b,c: sides, A,B,C: opposite angles'],
                    ['title' => 'Cosine Rule', 'eq' => 'c² = a² + b² - 2ab cosC', 'desc' => 'C: angle opposite side c'],
                    ['title' => 'Tangent Identity', 'eq' => 'tanθ = sinθ/cosθ', 'desc' => 'θ: angle'],
                    ['title' => 'Double Angle', 'eq' => 'sin(2θ) = 2sinθcosθ', 'desc' => 'θ: angle'],
                ]
            ])

             <!-- Calculus -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Calculus',
                'icon' => '∫',
                'iconBg' => 'bg-pink-500/20',
                'iconColor' => 'text-pink-400',
                'formulas' => [
                    ['title' => 'Power Rule', 'eq' => 'd/dx(x^n) = nx^(n-1)', 'desc' => 'n: constant power'],
                    ['title' => 'Integration by Parts', 'eq' => '∫udv = uv - ∫vdu', 'desc' => 'u,v: differentiable functions'],
                    ['title' => 'Product Rule', 'eq' => '(uv)\' = u\'v + uv\'', 'desc' => 'u,v: functions of x'],
                    ['title' => 'Quotient Rule', 'eq' => '(u/v)\' = (u\'v - uv\')/v²', 'desc' => 'u,v: functions of x'],
                    ['title' => 'Chain Rule', 'eq' => 'dy/dx = dy/du · du/dx', 'desc' => 'y: func of u, u: func of x'],
                ]
            ])

             <!-- Statistics -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Statistics',
                'icon' => 'σ',
                'iconBg' => 'bg-orange-500/20',
                'iconColor' => 'text-orange-400',
                'formulas' => [
                    ['title' => 'Mean', 'eq' => 'μ = (Σx) / n', 'desc' => 'μ: mean, Σx: sum of values, n: count'],
                    ['title' => 'Probability', 'eq' => 'P(A) = n(A) / n(S)', 'desc' => 'P(A): Prob. of A, n(S): Sample space'],
                    ['title' => 'Variance', 'eq' => 'σ² = Σ(x - μ)² / n', 'desc' => 'σ²: variance, μ: mean'],
                    ['title' => 'Standard Deviation', 'eq' => 'σ = √Variance', 'desc' => 'σ: std deviation'],
                ]
            ])

            <!-- Logarithms -->
            @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Logarithms',
                'icon' => 'ln',
                'iconBg' => 'bg-teal-500/20',
                'iconColor' => 'text-teal-400',
                'formulas' => [
                    ['title' => 'Product Rule', 'eq' => 'log(ab) = log(a) + log(b)', 'desc' => 'a,b: positive real numbers'],
                    ['title' => 'Power Rule', 'eq' => 'log(a^b) = b · log(a)', 'desc' => 'b: exponent'],
                    ['title' => 'Quotient Rule', 'eq' => 'log(a/b) = log(a) - log(b)', 'desc' => 'a,b: positive real numbers'],
                ]
            ])

            <!-- Physics -->
            @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Physics',
                'icon' => '⚡',
                'iconBg' => 'bg-yellow-500/20',
                'iconColor' => 'text-yellow-400',
                'formulas' => [
                    ['title' => 'Newton\'s Second Law', 'eq' => 'F = m · a', 'desc' => 'F: Force, m: Mass, a: Acceleration'],
                    ['title' => 'Kinetic Energy', 'eq' => 'KE = ½mv²', 'desc' => 'm: Mass, v: Velocity'],
                    ['title' => 'Einstein\'s Energy', 'eq' => 'E = mc²', 'desc' => 'E: Energy, m: Mass, c: Speed of Light'],
                    ['title' => 'Ohm\'s Law', 'eq' => 'V = I · R', 'desc' => 'V: Voltage, I: Current, R: Resistance'],
                    ['title' => 'Electric Power', 'eq' => 'P = V · I', 'desc' => 'P: Power, V: Voltage, I: Current'],
                    ['title' => 'Density', 'eq' => 'ρ = m / V', 'desc' => 'ρ: Density, m: Mass, V: Volume'],
                ]
            ])

             <!-- Finance -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Finance',
                'icon' => '$',
                'iconBg' => 'bg-green-500/20',
                'iconColor' => 'text-green-400',
                'formulas' => [
                    ['title' => 'Simple Interest', 'eq' => 'I = P · r · t', 'desc' => 'I: Interest, P: Principal, r: Rate, t: Time'],
                    ['title' => 'Compound Interest', 'eq' => 'A = P(1 + r/n)^(nt)', 'desc' => 'A: Final Amount, n: Compounding freq'],
                    ['title' => 'Future Value', 'eq' => 'FV = PV(1 + r)^t', 'desc' => 'FV: Future Val, PV: Present Val'],
                ]
            ])

        </div>
    </div>
</div>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endsection
