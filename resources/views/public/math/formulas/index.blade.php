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
                    ['title' => 'Quadratic Formula', 'eq' => 'x = (-b ± √(b² - 4ac)) / 2a'],
                    ['title' => 'Difference of Squares', 'eq' => 'a² - b² = (a - b)(a + b)'],
                    ['title' => 'Slope Intercept', 'eq' => 'y = mx + b'],
                    ['title' => 'Arithmetic Series', 'eq' => 'Sn = n/2(2a + (n-1)d)'],
                    ['title' => 'Geometric Series', 'eq' => 'Sn = a(1-r^n)/(1-r)'],
                    ['title' => 'Exponent Product', 'eq' => 'a^m · a^n = a^(m+n)'],
                ]
            ])

            <!-- Geometry -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Geometry',
                'icon' => '▱',
                'iconBg' => 'bg-emerald-500/20',
                'iconColor' => 'text-emerald-400',
                'formulas' => [
                    ['title' => 'Area of Circle', 'eq' => 'A = πr²'],
                    ['title' => 'Pythagorean Theorem', 'eq' => 'a² + b² = c²'],
                    ['title' => 'Volume of Cylinder', 'eq' => 'V = πr²h'],
                    ['title' => 'Area of Triangle', 'eq' => 'A = ½bh'],
                    ['title' => 'Volume of Sphere', 'eq' => 'V = 4/3πr³'],
                    ['title' => 'Volume of Cone', 'eq' => 'V = ⅓πr²h'],
                ]
            ])

            <!-- Trigonometry -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Trigonometry',
                'icon' => 'θ',
                'iconBg' => 'bg-purple-500/20',
                'iconColor' => 'text-purple-400',
                'formulas' => [
                    ['title' => 'Identity', 'eq' => 'sin²θ + cos²θ = 1'],
                    ['title' => 'Sine Rule', 'eq' => 'a/sinA = b/sinB = c/sinC'],
                    ['title' => 'Cosine Rule', 'eq' => 'c² = a² + b² - 2ab cosC'],
                    ['title' => 'Tangent Identity', 'eq' => 'tanθ = sinθ/cosθ'],
                    ['title' => 'Double Angle', 'eq' => 'sin(2θ) = 2sinθcosθ'],
                ]
            ])

             <!-- Calculus -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Calculus',
                'icon' => '∫',
                'iconBg' => 'bg-pink-500/20',
                'iconColor' => 'text-pink-400',
                'formulas' => [
                    ['title' => 'Power Rule', 'eq' => 'd/dx(x^n) = nx^(n-1)'],
                    ['title' => 'Integration by Parts', 'eq' => '∫udv = uv - ∫vdu'],
                    ['title' => 'Product Rule', 'eq' => '(uv)\' = u\'v + uv\''],
                    ['title' => 'Quotient Rule', 'eq' => '(u/v)\' = (u\'v - uv\')/v²'],
                    ['title' => 'Chain Rule', 'eq' => 'dy/dx = dy/du · du/dx'],
                ]
            ])

             <!-- Statistics -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Statistics',
                'icon' => 'σ',
                'iconBg' => 'bg-orange-500/20',
                'iconColor' => 'text-orange-400',
                'formulas' => [
                    ['title' => 'Mean', 'eq' => 'μ = (Σx) / n'],
                    ['title' => 'Probability', 'eq' => 'P(A) = n(A) / n(S)'],
                    ['title' => 'Variance', 'eq' => 'σ² = Σ(x - μ)² / n'],
                    ['title' => 'Standard Deviation', 'eq' => 'σ = √Variance'],
                ]
            ])

            <!-- Logarithms -->
            @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Logarithms',
                'icon' => 'ln',
                'iconBg' => 'bg-teal-500/20',
                'iconColor' => 'text-teal-400',
                'formulas' => [
                    ['title' => 'Product Rule', 'eq' => 'log(ab) = log(a) + log(b)'],
                    ['title' => 'Power Rule', 'eq' => 'log(a^b) = b · log(a)'],
                    ['title' => 'Quotient Rule', 'eq' => 'log(a/b) = log(a) - log(b)'],
                ]
            ])

            <!-- Physics -->
            @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Physics',
                'icon' => '⚡',
                'iconBg' => 'bg-yellow-500/20',
                'iconColor' => 'text-yellow-400',
                'formulas' => [
                    ['title' => 'Newton\'s Second Law', 'eq' => 'F = m · a'],
                    ['title' => 'Kinetic Energy', 'eq' => 'KE = ½mv²'],
                    ['title' => 'Einstein\'s Energy', 'eq' => 'E = mc²'],
                    ['title' => 'Ohm\'s Law', 'eq' => 'V = I · R'],
                    ['title' => 'Electric Power', 'eq' => 'P = V · I'],
                    ['title' => 'Density', 'eq' => 'ρ = m / V'],
                ]
            ])

             <!-- Finance -->
             @include('public.math.formulas.partials.accordion-item', [
                'title' => 'Finance',
                'icon' => '$',
                'iconBg' => 'bg-green-500/20',
                'iconColor' => 'text-green-400',
                'formulas' => [
                    ['title' => 'Simple Interest', 'eq' => 'I = P · r · t'],
                    ['title' => 'Compound Interest', 'eq' => 'A = P(1 + r/n)^(nt)'],
                    ['title' => 'Future Value', 'eq' => 'FV = PV(1 + r)^t'],
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
