@extends('layouts.public')

@section('title', 'Math Formulas - Emteka')

@section('content')
<div class="bg-slate-950 py-12">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold text-white">{{ __('formulas.title') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('formulas.subtitle') }}</p>
        </div>

        <div class="space-y-4">
            @php
                // Mapping keys to universal equations and types
                // Mapping keys to universal equations and types
                $map = [
                    'algebra' => [
                        'icon' => 'x', 'bg' => 'bg-blue-500/20', 'color' => 'text-blue-400',
                        'eqs' => [
                            'x = (-b ± √(b² - 4ac)) / 2a', 'a² - b² = (a - b)(a + b)', 'y = mx + b',
                            'Sn = n/2(2a + (n-1)d)', 'Sn = a(1-r^n)/(1-r)', 'a^m · a^n = a^(m+n)',
                            '(x+y)^n = Σ (nCk) x^(n-k) y^k'
                        ],
                        'raws' => [
                            'solve(a*x^2+b*x+c=0, x)', 'factor(a^2-b^2)', 'solve(y=m*x+b, x)',
                            'Sn=n/2*(2*a+(n-1)*d)', 'Sn=a*(1-r^n)/(1-r)', 'a^m*a^n',
                            'expand((x+y)^n)'
                        ]
                    ],
                    'geometry' => [
                        'icon' => '▱', 'bg' => 'bg-emerald-500/20', 'color' => 'text-emerald-400',
                        'eqs' => ['A = πr²', 'a² + b² = c²', 'V = πr²h', 'A = ½bh', 'V = 4/3πr³', 'V = ⅓πr²h', 'A = √[s(s-a)(s-b)(s-c)]', 'A = 2πrh + 2πr²', 'A = 4πr²'],
                        'raws' => [
                            'A=pi*r^2', 'a^2+b^2=c^2', 'V=pi*r^2*h', 'A=1/2*b*h', 'V=4/3*pi*r^3', 'V=1/3*pi*r^2*h', 's=(a+b+c)/2; A=sqrt(s*(s-a)*(s-b)*(s-c))', 'A=2*pi*r*h+2*pi*r^2', 'A=4*pi*r^2'
                        ]
                    ],
                    'trigonometry' => [
                         'icon' => 'θ', 'bg' => 'bg-purple-500/20', 'color' => 'text-purple-400',
                         'eqs' => ['sin²θ + cos²θ = 1', 'a/sinA = b/sinB = c/sinC', 'c² = a² + b² - 2ab cosC', 'tanθ = sinθ/cosθ', 'sin(2θ) = 2sinθcosθ', 'sin(α ± β) = sinα cosβ ± cosα sinβ'],
                         'raws' => [
                            'sin(x)^2+cos(x)^2=1', 'a/sin(A)=b/sin(B)', 'c^2=a^2+b^2-2*a*b*cos(C)', 'tan(x)=sin(x)/cos(x)', 'sin(2*x)=2*sin(x)*cos(x)', 'Expand(sin(a+b))'
                         ]
                    ],
                    'calculus' => [
                         'icon' => '∫', 'bg' => 'bg-pink-500/20', 'color' => 'text-pink-400',
                         'eqs' => [
                             'd/dx(x^n) = nx^(n-1)', '∫udv = uv - ∫vdu', '(uv)\' = u\'v + uv\'', '(u/v)\' = (u\'v - uv\')/v²', 'dy/dx = dy/du · du/dx',
                             'd/dx(sin x) = cos x', 'd/dx(cos x) = -sin x', '∫(1/x)dx = ln|x| + C'
                         ],
                         'raws' => [
                            'diff(x^n, x)', 'integrate(u, v)', 'diff(u*v, x)', 'diff(u/v, x)', 'diff(y, x)',
                            'diff(sin(x), x)', 'diff(cos(x), x)', 'integrate(1/x, x)'
                         ]
                    ],
                    'statistics' => [
                        'icon' => 'σ', 'bg' => 'bg-orange-500/20', 'color' => 'text-orange-400',
                        'eqs' => ['μ = (Σx) / n', 'P(A) = n(A) / n(S)', 'σ² = Σ(x - μ)² / n', 'σ = √Variance', 'nPr = n! / (n-r)!', 'nCr = n! / (r!(n-r)!)'],
                        'raws' => [
                            'mean([1,2,3])', 'P=n_A/n_S', 'variance([1,2,3])', 'sqrt(variance([1,2,3]))', 'nPr=n!/(n-r)!', 'nCr=n!/(r!*(n-r)!)'
                        ]
                    ],
                    'logarithms' => [
                        'icon' => 'ln', 'bg' => 'bg-teal-500/20', 'color' => 'text-teal-400',
                        'eqs' => ['log(ab) = log(a) + log(b)', 'log(a^b) = b · log(a)', 'log(a/b) = log(a) - log(b)', 'log_b(x) = log_c(x) / log_c(b)'],
                        'raws' => [
                            'log(a*b)', 'log(a^b)', 'log(a/b)', 'log(x)/log(b)'
                        ]
                    ],
                    'physics' => [
                        'icon' => '⚡', 'bg' => 'bg-yellow-500/20', 'color' => 'text-yellow-400',
                        'eqs' => [
                            'F = m · a', 'KE = ½mv²', 'E = mc²', 'V = I · R', 'P = V · I', 'ρ = m / V',
                            'v = u + at', 's = ut + ½at²', 'PE = mgh', 'P = F / A', 'W = F · d'
                        ],
                        'raws' => [
                            'F=m*a', 'KE=0.5*m*v^2', 'E=m*c^2', 'V=I*R', 'P=V*I', 'rho=m/V',
                            'v=u+a*t', 's=u*t+0.5*a*t^2', 'PE=m*g*h', 'P=F/A', 'W=F*d'
                        ]
                    ],
                    'finance' => [
                        'icon' => '$', 'bg' => 'bg-green-500/20', 'color' => 'text-green-400',
                        'eqs' => ['I = P · r · t', 'A = P(1 + r/n)^(nt)', 'FV = PV(1 + r)^t'],
                        'raws' => [
                            'I=P*r*t', 'A=P*(1+r/n)^(n*t)', 'FV=PV*(1+r)^t'
                        ]
                    ]
                ];
                
                $categories = __('formulas.categories');
            @endphp

            @foreach($categories as $key => $category)
                @if(isset($map[$key]))
                    @php 
                        $info = $map[$key];
                        $formulas = [];
                        foreach($category['formulas'] as $index => $f) {
                            if(isset($info['eqs'][$index])) {
                                $formulas[] = [
                                    'title' => $f['title'],
                                    'eq' => $info['eqs'][$index],
                                    'raw' => $info['raws'][$index] ?? '',
                                    'desc' => $f['desc'] ?? null
                                ];
                            }
                        }
                    @endphp

                    @include('public.math.formulas.partials.accordion-item', [
                        'title' => $category['title'],
                        'icon' => $info['icon'],
                        'iconBg' => $info['bg'],
                        'iconColor' => $info['color'],
                        'formulas' => $formulas
                    ])
                @endif
            @endforeach
        </div>

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
