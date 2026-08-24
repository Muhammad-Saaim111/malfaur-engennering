<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Malfaur Engineering Products — Precision engineering components and industrial products for professional applications across the UK.')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'Malfaur Engineering Products') | UK Engineering Supplier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/malfaur.css') }}">
    @stack('head')
</head>
<body>

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <header id="site-header">
        <div class="container">
            <div class="header-inner">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="logo" aria-label="Malfaur Engineering Products — Home">
                    <img src="{{ asset('images/logo-transparent.png') }}" class="site-logo" alt="Malfaur Engineering">
                </a>

                {{-- Desktop Navigation --}}
                <nav class="main-nav" role="navigation" aria-label="Main navigation">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('products') }}" class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Who We Are</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </nav>

                {{-- CTA --}}
                <div class="header-cta">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Enquire Now
                    </a>
                </div>

                {{-- Hamburger --}}
                <button class="hamburger" id="hamburger" aria-label="Toggle navigation" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    {{-- Mobile Nav --}}
    <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation">
        <div class="mobile-nav-links">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('products') }}" class="mobile-nav-link {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Who We Are</a>
            <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-primary" style="width:100%;justify-content:center;">Enquire Now</a>
    </nav>

    {{-- Page Content --}}
    <main class="page-offset">
        @yield('content')
    </main>

    {{-- ═══════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════ --}}
    <footer id="site-footer">
        <div class="container">
            <div class="footer-grid">

                {{-- Brand --}}
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('images/logo-transparent.png') }}" class="site-logo footer-logo" alt="Malfaur Engineering">
                    </a>
                    <p>Supplying precision engineering components and industrial products to professional customers across the United Kingdom. Quality and reliability at the core of everything we do.</p>
                </div>

                {{-- Navigation --}}
                <div>
                    <p class="footer-col-title">Navigation</p>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Products Catalogue</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">Who We Are</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Products --}}
                <div>
                    <p class="footer-col-title">Products</p>
                    <ul class="footer-links">
                        <li><a href="{{ route('products') }}" class="footer-link">Bearings &amp; Bushings</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Hydraulic Components</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Fasteners &amp; Fixings</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Pneumatic Systems</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Cutting Tools</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Measurement &amp; Gauging</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <p class="footer-col-title">Contact</p>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>United Kingdom<br><em style="font-style:normal;color:rgba(255,255,255,0.3)">Address to be confirmed</em></span>
                    </div>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>enquiries@malfaurengineering.co.uk</span>
                    </div>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+44 (0) 000 000 0000</span>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <p class="footer-copy">&copy; {{ date('Y') }} Malfaur Engineering Products Ltd. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms &amp; Conditions</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/malfaur.js') }}"></script>
    @stack('scripts')
</body>
</html>
