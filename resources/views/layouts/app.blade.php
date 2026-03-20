<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIGONGONI GAZELLA HOTEL - Mto wa Mbu</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    {{-- CSS ya Flag Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
    
    <script>
        tailwind.config = {
          darkMode: 'class', 
          theme: {
            extend: {
              colors: {
                kigongoniBlue: '#123960',
                kigongoniOrange: '#ef4a25',
              }
            }
          }
        }

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <style>
        /* Tumeacha max-width pekee, tumetoa overflow kuzuia inner scroll */
        html, body {
            max-width: 100%;
        }

        body { font-family: 'Poppins', sans-serif; }
        .mobile-menu-open { overflow: hidden; }
        .hashtag-style { font-variant: small-caps; }
        .fi { border-radius: 2px; box-shadow: 0 0 1px rgba(0,0,0,0.3); }
        
        /* ----------------------------------------------------
           STYLE YA MSTARI UNAOHAMAHAMA (SCROLL SPY)
           ---------------------------------------------------- */
        .nav-link {
            position: relative;
            padding-bottom: 6px;
            display: inline-block;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ef4a25;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .nav-link.active, .dark .nav-link.active {
            color: #ef4a25 !important; 
        }

        /* ----------------------------------------------------
           ANIMATIONS ZA FOOTER GRID NA GLOW
           ---------------------------------------------------- */
        @keyframes moveGrid {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; } 
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.8; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.3); }
        }

        /* ----------------------------------------------------
           WHATSAPP POPUP STYLES
           ---------------------------------------------------- */
        .whatsapp-float-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        .whatsapp-button {
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
            position: relative;
            z-index: 10000;
        }

        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.4);
            background: #20b859;
        }

        .whatsapp-popup {
            position: absolute;
            bottom: 75px;
            right: 0;
            width: 340px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2), 0 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            overflow: hidden;
            z-index: 9999;
        }

        .whatsapp-popup.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .popup-header {
            background: #075E54;
            color: white;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-logo {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            background: white;
            border: 2px solid white;
        }

        .header-title {
            flex: 1;
            font-weight: 600;
            font-size: 15px;
            color: white;
        }

        .popup-close {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .popup-close:hover {
            opacity: 1;
        }

        .popup-body {
            padding: 20px;
        }

        .online-status {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .online-dot {
            width: 8px;
            height: 8px;
            background: #25D366;
            border-radius: 50%;
            display: inline-block;
            position: relative;
        }

        .online-dot::after {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background: rgba(37, 211, 102, 0.3);
            border-radius: 50%;
            top: -2px;
            left: -2px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(2); opacity: 0; }
        }

        .online-text {
            font-size: 13px;
            color: #8696a0;
        }

        .hotel-message {
            background: #f0f9f4;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
            border: 1px solid #dcfce7;
        }

        .greeting-text {
            margin: 0 0 8px 0;
            font-size: 14px;
            color: #1f2e3a;
        }

        .wave {
            font-size: 16px;
            margin-left: 4px;
        }

        .offer-text {
            margin: 0;
            font-size: 14px;
            color: #41525d;
            line-height: 1.5;
        }

        .whatsapp-chat-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #25D366;
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 15px;
            transition: background 0.3s;
            margin-bottom: 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .whatsapp-chat-btn:hover {
            background: #128C7E;
        }

        .popup-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 12px;
            color: #8696a0;
            padding-top: 8px;
            border-top: 1px solid #e9edf0;
        }

        .footer-online {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .online-indicator {
            font-size: 12px;
        }

        .footer-separator {
            color: #d0d9e0;
        }

        .privacy-link {
            color: #075E54;
            text-decoration: none;
            font-weight: 500;
        }

        .privacy-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .whatsapp-popup {
                width: 300px;
                right: 0;
                bottom: 70px;
            }
            .whatsapp-float-container {
                bottom: 20px;
                right: 20px;
            }
            .whatsapp-button {
                width: 55px;
                height: 55px;
            }
        }
    </style>
    
</head>

<body id="home" class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300 relative">

    <nav class="bg-white dark:bg-gray-900 shadow-md sticky top-0 z-50 border-b-4 border-kigongoniOrange transition-colors duration-300">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center max-w-7xl">
            
            <a href="{{ url('/') }}" class="flex items-center">
                <img 
                    src="{{ asset('images/logo.png') }}" 
                    alt="Kigongoni Gazella Logo" 
                    class="h-12 md:h-16 w-auto object-contain transition-all duration-300 hover:scale-105
                           dark:brightness-0 dark:invert"
                >
                <span class="sr-only">Kigongoni Gazella Hotel</span>
            </a>

            {{-- MENU YA DESKTOP --}}
            <ul class="hidden lg:flex space-x-6 font-medium text-kigongoniBlue dark:text-gray-300 text-sm">
                <li><a href="{{ url('/') }}#home" class="nav-link">HOME</a></li>
                <li><a href="{{ url('/') }}#about" class="nav-link">ABOUT</a></li>
                <li><a href="{{ url('/') }}#rooms" class="nav-link">ACCOMMODATION</a></li>
                <li><a href="{{ url('/') }}#meetings" class="nav-link">MEETINGS & EVENTS</a></li>
                <li><a href="{{ url('/') }}#restaurant" class="nav-link">RESTAURANT & BARS</a></li>
                <li><a href="{{ url('/') }}#services" class="nav-link">SERVICES</a></li>
                <li><a href="{{ url('/') }}#gallery" class="nav-link">GALLERY</a></li>
                <li><a href="{{ url('/') }}#contact" class="nav-link">CONTACTS</a></li>
            </ul>

            <div class="flex items-center space-x-3 md:space-x-4">
                
                {{-- DARK MODE TOGGLE --}}
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition">
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>

                <a href="{{ url('/') }}#booking" class="hidden sm:block bg-kigongoniOrange text-white px-5 py-2 rounded-md font-bold hover:bg-kigongoniBlue dark:hover:bg-gray-800 transition duration-300 shadow-md text-sm">
                    BOOK NOW
                </a>
                
                <button id="mobile-menu-button" class="lg:hidden text-kigongoniBlue dark:text-gray-300 focus:outline-none ml-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- MENU YA SIMU (MOBILE) --}}
        <div id="mobile-menu" class="hidden lg:hidden bg-kigongoniBlue dark:bg-gray-900 text-white absolute w-full left-0 top-full shadow-xl">
            <ul class="flex flex-col p-6 space-y-4 font-semibold">
                <li><a href="{{ url('/') }}#home" class="nav-link border-b border-gray-700 pb-2 block">HOME</a></li>
                <li><a href="{{ url('/') }}#about" class="nav-link border-b border-gray-700 pb-2 block">ABOUT</a></li>
                <li><a href="{{ url('/') }}#rooms" class="nav-link border-b border-gray-700 pb-2 block">ACCOMMODATION</a></li>
                <li><a href="{{ url('/') }}#meetings" class="nav-link border-b border-gray-700 pb-2 block">MEETINGS & EVENTS</a></li>
                <li><a href="{{ url('/') }}#restaurant" class="nav-link border-b border-gray-700 pb-2 block">RESTAURANT & BARS</a></li>
                <li><a href="{{ url('/') }}#services" class="nav-link border-b border-gray-700 pb-2 block">SERVICES</a></li>
                <li><a href="{{ url('/') }}#gallery" class="nav-link border-b border-gray-700 pb-2 block">GALLERY</a></li>
                <li><a href="{{ url('/') }}#contact" class="nav-link border-b border-gray-700 pb-2 block">CONTACTS</a></li>
                <li><a href="{{ url('/') }}#booking" class="bg-kigongoniOrange text-center py-3 rounded-md block">BOOK NOW</a></li>
            </ul>
        </div>
    </nav>

    {{-- WRAPPER MPYA KUZUIA WEBSITE KUTANUKA (LAKINI INAACHA MENU IGANDE JUU) --}}
    <div class="overflow-x-hidden w-full">
        <main class="dark:bg-gray-900 transition-colors duration-300">
            @yield('content')
        </main>

        {{-- ============================================================
             FOOTER
        ============================================================ --}}
        <footer id="main-footer" class="bg-kigongoniBlue dark:bg-gray-950 text-gray-300 pt-20 pb-8 mt-20 relative border-t-4 border-kigongoniOrange transition-colors duration-300 overflow-hidden">
            
            {{-- PATTERN YA VIBOX, GRADIENT GLOW, NA SPOTLIGHT --}}
            <div class="absolute inset-0 z-0 pointer-events-none" style="mask-image: radial-gradient(ellipse at top center, black 10%, transparent 80%); -webkit-mask-image: radial-gradient(ellipse at top center, black 10%, transparent 80%);">
                <div class="absolute inset-0 opacity-[0.25]" 
                     style="background-image: linear-gradient(to right, #ffffff 1px, transparent 1px), linear-gradient(to bottom, #ffffff 1px, transparent 1px); 
                            background-size: 50px 50px; 
                            animation: moveGrid 3s linear infinite;">
                </div>
                <div class="absolute inset-0" 
                     style="background: radial-gradient(circle at top center, rgba(239, 74, 37, 2) 0%, transparent 85%); 
                            animation: pulseGlow 1s ease-in-out infinite;">
                </div>
            </div>

            <div class="container mx-auto px-4 max-w-7xl relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                    
                    {{-- Column 1: About, Socials & Reviews --}}
                    <div class="space-y-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Kigongoni Gazella Logo" class="h-16 w-auto brightness-0 invert">
                        <p class="text-sm leading-relaxed text-gray-400 mb-6">
                            Experience the ultimate safari gateway in Mto wa Mbu, Manyara. Kigongoni Gazella Hotel offers unmatched comfort, culture, and nature for an unforgettable stay.
                        </p>
                        
                        <div class="grid grid-cols-2 gap-4">
                            {{-- OUR SOCIALS --}}
                            <div>
                                <h4 class="text-xs font-bold text-white mb-4 uppercase tracking-wider relative inline-block">
                                    OUR SOCIALS
                                    <span class="absolute -bottom-1 left-0 w-1/2 h-0.5 bg-kigongoniOrange rounded-full"></span>
                                </h4>
                                <div class="flex flex-col space-y-3">
                                    {{-- Hotel IG --}}
                                    <a href="https://www.instagram.com/kigongonigazellahotel?igsh=aTQ4enpzdHJxOXQy" target="_blank" class="flex items-center gap-3 group">
                                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-gray-400 group-hover:bg-kigongoniOrange group-hover:text-white transition-all duration-300 group-hover:-translate-y-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                                        </div>
                                        <span class="text-sm text-gray-400 group-hover:text-white transition-colors">Hotel IG</span>
                                    </a>
                                    {{-- Supermarket IG --}}
                                    <a href="https://www.instagram.com/kigongoni_mini_supermarket?igsh=MWJwOW1nODk0YWhybQ==" target="_blank" class="flex items-center gap-3 group">
                                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-gray-400 group-hover:bg-kigongoniOrange group-hover:text-white transition-all duration-300 group-hover:-translate-y-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                                        </div>
                                        <span class="text-sm text-gray-400 group-hover:text-white transition-colors">Supermarket</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Column 2: Quick Links --}}
                    <div>
                        <h3 class="text-lg font-bold text-white mb-6 uppercase tracking-wider relative inline-block">
                            Quick Links
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-kigongoniOrange rounded-full"></span>
                        </h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ url('/') }}#about" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> About Us</a></li>
                            <li><a href="{{ url('/') }}#rooms" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Accommodation</a></li>
                            <li><a href="{{ url('/') }}#gallery" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Gallery</a></li>
                            <li><a href="{{ url('/') }}#contact" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Contact Us</a></li>
                        </ul>
                    </div>

                    {{-- Column 3: Our Services --}}
                    <div>
                        <h3 class="text-lg font-bold text-white mb-6 uppercase tracking-wider relative inline-block">
                            Our Services
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-kigongoniOrange rounded-full"></span>
                        </h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ url('/') }}#restaurant" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Restaurant & Bar</a></li>
                            <li><a href="{{ url('/') }}#meetings" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Meetings & Events</a></li>
                            <li><a href="{{ route('services.shuttle') }}" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Airport Shuttle</a></li>
                            <li><a href="{{ route('services.bicycle') }}" class="text-gray-400 hover:text-kigongoniOrange transition-colors flex items-center gap-2"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Complimentary Bicycles</a></li>
                        </ul>
                    </div>

                    {{-- Column 4: Contact Us --}}
                    <div>
                        <h3 class="text-lg font-bold text-white mb-6 uppercase tracking-wider relative inline-block">
                            Get in Touch
                            <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-kigongoniOrange rounded-full"></span>
                        </h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start gap-3 text-gray-400">
                                <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Mto wa Mbu, Manyara<br>Tanzania</span>
                            </li>
                            <li class="flex items-center gap-3 text-gray-400">
                                <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <a href="tel:+255768219703" class="hover:text-white transition-colors">+255 768 219 703</a>
                            </li>
                            <li class="flex items-center gap-3 text-gray-400">
                                <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <a href="mailto:gazellakigongoni@gmail.com" class="hover:text-white transition-colors">gazellakigongoni@gmail.com</a>
                            </li>
                        </ul>
                    </div>

                </div>

                {{-- SEHEMU YA CHINI --}}
                <div class="mt-16 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-6 text-xs text-gray-400 relative z-10">
                    <div class="flex items-center gap-2">
                        <p>&copy; {{ date('Y') }} Kigongoni Gazella Hotel.</p>
                        <span class="hidden md:inline-block w-px h-4 bg-white/20"></span>
                        <p>All rights reserved.</p>
                    </div>
                    <ul class="flex flex-wrap items-center justify-center gap-2 md:gap-0 md:bg-white/5 md:border md:border-white/10 md:rounded-lg overflow-hidden">
                        <li class="border md:border-none border-white/10 rounded md:rounded-none">
                            <a href="{{ route('privacy') }}" class="block px-4 py-2 hover:bg-white/10 hover:text-kigongoniOrange transition-colors md:border-r md:border-white/10">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="border md:border-none border-white/10 rounded md:rounded-none">
                            <a href="{{ route('terms') }}" class="block px-4 py-2 hover:bg-white/10 hover:text-kigongoniOrange transition-colors md:border-r md:border-white/10">
                                Terms of Service
                            </a>
                        </li>
                        <li class="border md:border-none border-white/10 rounded md:rounded-none">
                            <a href="{{ route('faq') }}" class="block px-4 py-2 hover:bg-white/10 hover:text-kigongoniOrange transition-colors">
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div> {{-- MWISHO WA WRAPPER YA KUZUIA HORIZONTAL SCROLL --}}

    {{-- FLOATING WHATSAPP BUTTON --}}
    <div class="whatsapp-float-container">
        <div class="whatsapp-button" id="whatsappButton">
            <svg viewBox="0 0 24 24" width="30" height="30" fill="currentColor">
                <path d="M19.077 4.928C17.191 3.041 14.683 2 12.006 2 6.798 2 2.548 6.193 2.54 11.393c-.003 1.751.456 3.466 1.33 5.004L2.34 21.381c-.103.394.258.75.648.648l4.967-1.478c1.52.83 3.222 1.266 4.973 1.266h.004c5.2 0 9.454-4.195 9.462-9.396.004-2.51-.971-4.868-2.857-6.754l-.009-.008zm-7.071 14.29c-1.438 0-2.846-.385-4.065-1.107l-.292-.173-2.942.875.876-2.868-.191-.301c-.781-1.234-1.193-2.655-1.19-4.111.007-3.649 2.973-6.612 6.628-6.612 1.768 0 3.431.689 4.682 1.94 1.25 1.25 1.939 2.913 1.937 4.682-.005 3.648-2.971 6.615-6.621 6.615h-.002zm3.629-4.953c-.199-.1-1.179-.581-1.361-.647-.182-.066-.315-.1-.448.099-.133.199-.515.647-.632.779-.117.133-.234.149-.433.05-.199-.1-.84-.309-1.599-.986-.589-.525-.987-1.174-1.103-1.372-.117-.199-.013-.306.088-.405.09-.089.199-.233.298-.35.1-.116.133-.199.199-.332.066-.133.033-.249-.017-.348-.05-.1-.448-1.077-.614-1.475-.162-.385-.326-.333-.448-.339-.116-.006-.249-.006-.382-.006s-.35.05-.532.249c-.182.199-.695.679-.695 1.657 0 .978.712 1.923.811 2.056.099.133 1.399 2.133 3.39 2.991 1.99.858 1.99.573 2.349.537.359-.036 1.159-.473 1.322-.93.163-.457.163-.848.114-.93-.049-.082-.182-.133-.382-.232z"/>
            </svg>
        </div>

        <div class="whatsapp-popup" id="whatsappPopup">
            <div class="popup-header">
                <img src="{{ asset('images/logo.png') }}" alt="Kigongoni Gazella" class="header-logo">
                <span class="header-title">Kigongoni Gazella Hotel</span>
                <button class="popup-close" id="closePopup">✕</button>
            </div>
            <div class="popup-body">
                <div class="online-status">
                    <span class="online-dot"></span>
                    <span class="online-text">Typically replies within minutes</span>
                </div>
                <div class="hotel-message">
                    <p class="greeting-text">
                        Greetings from <strong>Kigongoni Gazella Hotel!</strong> 
                        <span class="wave">👋</span>
                    </p>
                    <p class="offer-text">
                        Welcome! Ready for an unforgettable stay? Enquire today for our best available rates and book your perfect room
                    </p>
                </div>
                <a href="https://wa.me/255768219703?text=Hello%20Kigongoni%20Gazella%20Hotel!%20I'm%20interested%20in%20booking%20a%20room.%20Can%20you%20help%20me%20with%20availability%3F" 
                   target="_blank" 
                   class="whatsapp-chat-btn">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                        <path d="M19.077 4.928C17.191 3.041 14.683 2 12.006 2 6.798 2 2.548 6.193 2.54 11.393c-.003 1.751.456 3.466 1.33 5.004L2.34 21.381c-.103.394.258.75.648.648l4.967-1.478c1.52.83 3.222 1.266 4.973 1.266h.004c5.2 0 9.454-4.195 9.462-9.396.004-2.51-.971-4.868-2.857-6.754l-.009-.008z"/>
                    </svg>
                    <span>WhatsApp Us</span>
                </a>
                <div class="popup-footer">
                    <span class="footer-online">
                        <span class="online-indicator">🟢</span> Online
                    </span>
                    <span class="footer-separator">|</span>
                    <a href="{{ route('privacy') }}" class="privacy-link">Privacy policy</a>
                </div>
            </div>
        </div>
    </div>

    <button id="scrollToTopBtn" class="fixed bottom-24 right-6 bg-kigongoniBlue dark:bg-gray-800 text-white p-3 rounded-full shadow-2xl hover:bg-kigongoniOrange dark:hover:bg-kigongoniOrange hover:-translate-y-2 transition-all duration-300 z-50 opacity-0 invisible translate-y-4 border-2 border-transparent hover:border-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path></svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // ── SCROLL SPY ──────────────────────────────────────────
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('body[id], section[id], div[id]'); 

            function activeScrollMenu() {
                let current = '';
                const scrollPos = window.scrollY;
                sections.forEach(section => {
                    const sectionTop = section.getBoundingClientRect().top + window.scrollY;
                    const sectionHeight = section.offsetHeight;
                    if (scrollPos >= (sectionTop - 150) && scrollPos < (sectionTop + sectionHeight - 150)) {
                        current = section.getAttribute('id');
                    }
                });
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    const href = link.getAttribute('href');
                    if (current && href.endsWith('#' + current)) {
                        link.classList.add('active');
                    }
                });
            }
            window.addEventListener('scroll', activeScrollMenu);
            activeScrollMenu();

            // ── FOOTER SPOTLIGHT ────────────────────────────────────
            const footerArea = document.getElementById('main-footer');
            const spotlight = document.getElementById('footer-spotlight');
            if (footerArea && spotlight) {
                footerArea.addEventListener('mousemove', (e) => {
                    const rect = footerArea.getBoundingClientRect();
                    spotlight.style.setProperty('--mouse-x', `${e.clientX - rect.left}px`);
                    spotlight.style.setProperty('--mouse-y', `${e.clientY - rect.top}px`);
                });
                footerArea.addEventListener('mouseenter', () => { spotlight.classList.replace('opacity-0', 'opacity-100'); });
                footerArea.addEventListener('mouseleave', () => { spotlight.classList.replace('opacity-100', 'opacity-0'); });
            }

            // ── WHATSAPP POPUP ───────────────────────────────────────
            const whatsappBtn  = document.getElementById('whatsappButton');
            const whatsappPopup = document.getElementById('whatsappPopup');
            const closeBtn     = document.getElementById('closePopup');

            if (whatsappBtn && whatsappPopup && closeBtn) {
                whatsappBtn.addEventListener('click', (e) => { e.stopPropagation(); whatsappPopup.classList.toggle('active'); });
                closeBtn.addEventListener('click', (e) => { e.stopPropagation(); whatsappPopup.classList.remove('active'); });
                whatsappPopup.addEventListener('click', (e) => e.stopPropagation());
                document.addEventListener('click', () => whatsappPopup.classList.remove('active'));
            }
            // Mstari wa kuifungua automatically (setTimeout) umeondolewa hapa
        });

        // ── MOBILE MENU ──────────────────────────────────────────────
        const btn  = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => menu.classList.add('hidden'));
        });

        // ── DARK MODE ────────────────────────────────────────────────
        const themeToggleDarkIcon  = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        document.getElementById('theme-toggle').addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else if (localStorage.getItem('color-theme') === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });

        // ── SCROLL TO TOP ────────────────────────────────────────────
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                scrollToTopBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-4');
                scrollToTopBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
            }
        });
        scrollToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });
    </script>

    @yield('scripts')

</body>
</html>