<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950 text-white antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Emteka - Math Companion')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Outfit', 'sans-serif'],
                        },
                        colors: {
                            primary: '#8b5cf6', // Violet 500
                            secondary: '#ec4899', // Pink 500
                            surface: '#1e293b', // Slate 800
                        }
                    }
                }
            }
        </script>
    @endif
    
    @stack('styles')
</head>
<body class="flex min-h-full flex-col">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Left: Logo & Nav -->
                <div class="flex items-center gap-8">
                    <a href="{{ route('public.home') }}" class="flex items-center gap-2">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-primary to-secondary">
                            <span class="text-lg font-bold text-white">E</span>
                        </div>
                        <span class="text-xl font-bold tracking-tight">Emteka</span>
                    </a>
                    
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ route('public.home') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('public.home') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                           Home
                        </a>
                        <a href="{{ route('public.math.calculator') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('public.math.calculator*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                           Calculator
                        </a>
                        <a href="{{ route('public.math.solver') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('public.math.solver*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                           Solver
                        </a>
                        <a href="{{ route('public.math.formulas') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('public.math.formulas*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                           Formulas
                        </a>
                        <a href="{{ route('public.math.graphing') }}" 
                           class="rounded-md px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('public.math.graphing*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                           Graphing
                        </a>
                    </div>
                </div>

                <!-- Right: Language Switcher -->
                <div class="flex items-center gap-2">
                    <div class="flex items-center rounded-full border border-white/10 bg-white/5 p-1">
                        <a href="{{ route('public.lang.switch', 'en') }}" class="rounded-full px-3 py-1 text-xs font-bold transition-all {{ app()->getLocale() == 'en' ? 'bg-primary text-white shadow-lg' : 'text-slate-400 hover:text-white' }}">EN</a>
                        <a href="{{ route('public.lang.switch', 'id') }}" class="rounded-full px-3 py-1 text-xs font-bold transition-all {{ app()->getLocale() == 'id' ? 'bg-primary text-white shadow-lg' : 'text-slate-400 hover:text-white' }}">ID</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-slate-950 py-8">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm text-slate-500">&copy; {{ date('Y') }} Emteka. Built for Math Lovers.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
