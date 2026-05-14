<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>School Clinic Management System</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
            .bg-gradient { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); }
        </style>
    </head>
    <body class="bg-gradient min-h-screen text-slate-800 antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-emerald-500 selection:text-white">
            <div class="relative w-full max-w-7xl px-6 lg:px-8">
                <header class="flex justify-between items-center py-10">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-emerald-600 rounded-lg flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-emerald-900">Clinic<span class="text-emerald-600">Care</span></span>
                    </div>
                    @if (Route::has('login'))
                        <nav class="flex gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-full bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">Go to Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full text-emerald-700 font-medium hover:bg-emerald-50 transition">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">Join Now</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="grid lg:grid-cols-2 gap-12 items-center py-12 lg:py-24">
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            Smart Healthcare for Schools
                        </div>
                        <h1 class="text-5xl lg:text-7xl font-bold text-slate-900 leading-tight">
                            Your School's <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Health Companion</span>
                        </h1>
                        <p class="text-lg text-slate-600 max-w-lg">
                            A comprehensive management system for school clinics. Track student visits, manage medicine inventory, and ensure a healthier campus environment.
                        </p>
                        <div class="flex gap-4">
                            <a href="{{ route('register') }}" class="px-8 py-4 rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-800 transition shadow-xl shadow-slate-200">Get Started</a>
                            <a href="#features" class="px-8 py-4 rounded-xl bg-white text-slate-900 font-bold border border-slate-200 hover:border-emerald-500 transition">View Features</a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-200 rounded-full blur-3xl opacity-50"></div>
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-teal-200 rounded-full blur-3xl opacity-50"></div>
                        <div class="glass border border-white/50 rounded-3xl p-4 shadow-2xl relative">
                            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=1000" alt="Clinic Interface" class="rounded-2xl w-full shadow-inner">
                            <div class="absolute -bottom-6 -left-6 glass border border-white/50 rounded-2xl p-4 shadow-xl flex items-center gap-3">
                                <div class="w-10 h-10 bg-rose-100 rounded-full flex items-center justify-center text-rose-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-bold">Health First</div>
                                    <div class="text-xs text-slate-500">Student Wellness Tracker</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <section id="features" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center space-y-4 mb-16">
                    <h2 class="text-3xl font-bold text-slate-900">Powerful Features</h2>
                    <p class="text-slate-600">Everything you need to manage your school clinic efficiently.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-500 transition group">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm mb-6 group-hover:bg-emerald-600 group-hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Visit Logging</h3>
                        <p class="text-slate-600">Record symptoms, diagnosis, and treatments for students in seconds.</p>
                    </div>
                    <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-500 transition group">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm mb-6 group-hover:bg-emerald-600 group-hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Inventory Control</h3>
                        <p class="text-slate-600">Manage medicine stock levels with automatic low-stock notifications.</p>
                    </div>
                    <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-500 transition group">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm mb-6 group-hover:bg-emerald-600 group-hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Student Portal</h3>
                        <p class="text-slate-600">Students can securely view their own health history and records.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-12 border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center text-slate-500 text-sm">
                &copy; {{ date('Y') }} ClinicCare Management System. Built with Laravel.
            </div>
        </footer>
    </body>
</html>
