{{-- ============================================================
     HOME PAGE - KIGONGONI GAZELLA HOTEL
     Single language (English) version
============================================================ --}}
@extends('layouts.app')

@section('content')
    {{-- ============================================================
         HERO SECTION - KIGONGONI GAZELLA HOTEL (PICHA 6 ZINAZOBADILIKA)
         WITH ARROWS & SMOOTH TRANSITIONS
    ============================================================ --}}
    <section class="relative h-[100vh] min-h-[700px] flex items-center justify-center text-center text-white overflow-hidden" id="hero-section">

        {{-- Background Slides - Picha 6 Zinazobadilika --}}
        @php
            $hero1 = asset('images/hero/hero-1.jpg');
            $hero2 = asset('images/hero/hero-2.jpg');
            $hero3 = asset('images/hero/hero-3.jpg');
            $hero4 = asset('images/hero/hero-4.jpg');
            $hero5 = asset('images/hero/hero-5.jpg');
            $hero6 = asset('images/hero/hero-6.jpg');
        @endphp
        <div class="absolute inset-0 z-0">
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-100 scale-110 transition-all duration-[2000ms] ease-in-out"
                 style="background-image: url('{{ $hero1 }}');"></div>
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 scale-110 transition-all duration-[2000ms] ease-in-out"
                 data-bg="{{ $hero2 }}"></div>
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 scale-110 transition-all duration-[2000ms] ease-in-out"
                 data-bg="{{ $hero3 }}"></div>
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 scale-110 transition-all duration-[2000ms] ease-in-out"
                 data-bg="{{ $hero4 }}"></div>
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 scale-110 transition-all duration-[2000ms] ease-in-out"
                 data-bg="{{ $hero5 }}"></div>
            <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 scale-110 transition-all duration-[2000ms] ease-in-out"
                 data-bg="{{ $hero6 }}"></div>

            {{-- Rich layered overlay --}}
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80 dark:from-black/80 dark:via-black/50 dark:to-black/90 transition-colors duration-300"></div>
            {{-- Bottom warm glow --}}
            <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-kigongoniBlue/60 to-transparent dark:from-gray-900/80"></div>
        </div>

        {{-- Navigation Arrows --}}
        <button id="hero-prev" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-kigongoniOrange/80 text-white w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center backdrop-blur-sm border border-white/20 transition-all duration-300 hover:scale-110 focus:outline-none group">
            <svg class="w-6 h-6 md:w-8 md:h-8 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button id="hero-next" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-kigongoniOrange/80 text-white w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center backdrop-blur-sm border border-white/20 transition-all duration-300 hover:scale-110 focus:outline-none group">
            <svg class="w-6 h-6 md:w-8 md:h-8 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Decorative corner accents --}}
        <div class="absolute top-8 left-8 w-16 h-16 border-t-2 border-l-2 border-kigongoniOrange/70 z-10 hidden md:block"></div>
        <div class="absolute top-8 right-8 w-16 h-16 border-t-2 border-r-2 border-kigongoniOrange/70 z-10 hidden md:block"></div>
        <div class="absolute bottom-24 left-8 w-16 h-16 border-b-2 border-l-2 border-kigongoniOrange/40 z-10 hidden md:block"></div>
        <div class="absolute bottom-24 right-8 w-16 h-16 border-b-2 border-r-2 border-kigongoniOrange/40 z-10 hidden md:block"></div>

        {{-- Main Content --}}
        <div class="relative z-10 px-4 max-w-5xl mx-auto">

            {{-- Top badge --}}
            <div class="flex items-center justify-center gap-3 mb-6" data-aos="fade-down" data-aos-duration="800">
                <div class="h-px w-10 bg-kigongoniOrange/80"></div>
                <span class="text-[10px] md:text-xs font-black uppercase tracking-[0.4em] text-kigongoniOrange drop-shadow-lg">
                    ✦ Mto wa Mbu, Tanzania ✦
                </span>
                <div class="h-px w-10 bg-kigongoniOrange/80"></div>
            </div>

            {{-- Hotel Name --}}
            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000">
                <h1 class="font-black uppercase leading-none mb-2 drop-shadow-2xl">
                    <span class="block text-[13vw] md:text-[90px] lg:text-[105px] tracking-[0.12em] text-white"
                          style="text-shadow: 0 0 60px rgba(239,74,37,0.25), 0 4px 30px rgba(0,0,0,0.6);">
                        KIGONGONI
                    </span>
                    <span class="block text-[7vw] md:text-[46px] lg:text-[54px] tracking-[0.5em] md:tracking-[0.7em] text-kigongoniOrange"
                          style="text-shadow: 0 0 40px rgba(239,74,37,0.5), 0 2px 20px rgba(0,0,0,0.4);">
                        GAZELLA
                    </span>
                    <span class="block text-[4vw] md:text-[22px] lg:text-[55px] tracking-[0.35em] text-white/80 font-light mt-1">
                        HOTEL
                    </span>
                </h1>
            </div>

            {{-- Divider --}}
            <div class="flex items-center justify-center gap-4 my-7" data-aos="zoom-in" data-aos-delay="350">
                <div class="h-px flex-1 max-w-[80px] bg-gradient-to-r from-transparent to-kigongoniOrange/80"></div>
                <svg class="w-5 h-5 text-kigongoniOrange" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L9.5 9.5H2L7.5 14L5 21.5L12 17L19 21.5L16.5 14L22 9.5H14.5L12 2Z"/>
                </svg>
                <div class="h-px flex-1 max-w-[80px] bg-gradient-to-l from-transparent to-kigongoniOrange/80"></div>
            </div>

            {{-- Tagline --}}
            <div data-aos="fade-up" data-aos-delay="450" data-aos-duration="1000">
                <p class="text-base md:text-xl lg:text-2xl mb-3 font-light tracking-widest text-white/90 drop-shadow-md">
                    Stay in Comfort,
                    <span class="text-kigongoniOrange font-bold">Leave with a Smile</span>
                </p>
                <p class="text-sm md:text-base text-white/60 mb-10 tracking-[0.2em] uppercase font-light">
                    Your ultimate destination for relaxation and adventure
                </p>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="600">
                <a href="#rooms"
                   class="inline-flex items-center gap-3 bg-kigongoniOrange text-white px-9 py-4 font-black text-xs md:text-sm hover:bg-white hover:text-kigongoniOrange hover:scale-105 transition-all duration-300 shadow-[0_8px_30px_rgba(239,74,37,0.45)] uppercase tracking-[0.2em] border-2 border-kigongoniOrange">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Explore Our Rooms
                </a>
                <a href="#booking"
                   class="inline-flex items-center gap-3 bg-transparent text-white px-9 py-4 font-black text-xs md:text-sm hover:bg-white/10 transition-all duration-300 uppercase tracking-[0.2em] border-2 border-white/50 hover:border-white">
                    Book Your Stay
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            {{-- Quick Info Strip --}}
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-3 mt-12" data-aos="fade-up" data-aos-delay="750">
                <div class="flex items-center gap-2 text-white/60 text-[11px] uppercase tracking-widest font-semibold">
                    <div class="w-1.5 h-1.5 rounded-full bg-kigongoniOrange"></div>
                    Near Lake Manyara National Park
                </div>
                <div class="flex items-center gap-2 text-white/60 text-[11px] uppercase tracking-widest font-semibold">
                    <div class="w-1.5 h-1.5 rounded-full bg-kigongoniOrange"></div>
                    Free Wi-Fi
                </div>
                <div class="flex items-center gap-2 text-white/60 text-[11px] uppercase tracking-widest font-semibold">
                    <div class="w-1.5 h-1.5 rounded-full bg-kigongoniOrange"></div>
                    24/7 Reception
                </div>
                <div class="flex items-center gap-2 text-white/60 text-[11px] uppercase tracking-widest font-semibold">
                    <div class="w-1.5 h-1.5 rounded-full bg-kigongoniOrange"></div>
                    Restaurant & Bar
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2" data-aos="fade-up" data-aos-delay="900">
            <span class="text-[9px] uppercase tracking-[0.3em] text-white/40 font-semibold">Scroll</span>
            <div class="w-px h-10 bg-gradient-to-b from-white/40 to-transparent animate-pulse"></div>
        </div>

        {{-- Slide indicators --}}
        <div class="absolute bottom-8 right-8 z-10 flex gap-2 hidden md:flex">
            <div class="slide-dot w-6 h-1 bg-kigongoniOrange rounded-full transition-all duration-300"></div>
            <div class="slide-dot w-2 h-1 bg-white/30 rounded-full transition-all duration-300"></div>
            <div class="slide-dot w-2 h-1 bg-white/30 rounded-full transition-all duration-300"></div>
            <div class="slide-dot w-2 h-1 bg-white/30 rounded-full transition-all duration-300"></div>
            <div class="slide-dot w-2 h-1 bg-white/30 rounded-full transition-all duration-300"></div>
            <div class="slide-dot w-2 h-1 bg-white/30 rounded-full transition-all duration-300"></div>
        </div>
    </section>

    {{-- ============================================================
         BOOKING BAR — CUSTOM CALENDAR DATE PICKER
    ============================================================ --}}
    <div id="booking" class="container mx-auto -mt-16 relative z-20 px-4 scroll-mt-24" data-aos="fade-up" data-aos-delay="600">
        <div class="bg-white dark:bg-gray-800 p-6 md:p-8 shadow-2xl rounded-xl border-b-8 border-kigongoniBlue dark:border-kigongoniOrange transform transition hover:scale-[1.01] duration-300">
            <div class="grid md:grid-cols-4 gap-5 items-end">

                {{-- CHECK-IN --}}
                <div class="relative" id="checkin-wrapper">
                    <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase mb-2 tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Check-In
                    </label>
                    <div class="kgz-date-trigger w-full border-2 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-xl p-3 cursor-pointer flex items-center justify-between gap-2 hover:border-kigongoniOrange transition-all duration-200 focus-within:border-kigongoniOrange group"
                         id="checkin-trigger" tabindex="0" role="button" aria-label="Select check-in date">
                        <div class="flex items-center gap-2 flex-1 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-kigongoniBlue/10 dark:bg-kigongoniOrange/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-kigongoniBlue dark:text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider leading-none mb-0.5">Arrival</p>
                                <p class="text-sm font-black text-gray-400 dark:text-gray-500 truncate" id="checkin-display">Select date</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-600 flex-shrink-0 group-hover:text-kigongoniOrange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <input type="hidden" name="checkin" id="checkin-value">
                </div>

                {{-- CHECK-OUT --}}
                <div class="relative" id="checkout-wrapper">
                    <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase mb-2 tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Check-Out
                    </label>
                    <div class="kgz-date-trigger w-full border-2 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-xl p-3 cursor-pointer flex items-center justify-between gap-2 hover:border-kigongoniOrange transition-all duration-200 group"
                         id="checkout-trigger" tabindex="0" role="button" aria-label="Select check-out date">
                        <div class="flex items-center gap-2 flex-1 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-kigongoniOrange/10 dark:bg-kigongoniOrange/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider leading-none mb-0.5">Departure</p>
                                <p class="text-sm font-black text-gray-400 dark:text-gray-500 truncate" id="checkout-display">Select date</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-600 flex-shrink-0 group-hover:text-kigongoniOrange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <input type="hidden" name="checkout" id="checkout-value">
                </div>

                {{-- GUESTS — Custom Dropdown --}}
                <div class="relative" id="guests-wrapper">
                    <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase mb-2 tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Guests
                    </label>
                    {{-- Trigger --}}
                    <div class="kgz-date-trigger w-full border-2 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-xl p-3 cursor-pointer flex items-center justify-between gap-2 hover:border-kigongoniOrange transition-all duration-200 group"
                         id="guests-trigger" tabindex="0" role="button" aria-haspopup="listbox" aria-label="Select number of guests">
                        <div class="flex items-center gap-2 flex-1 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider leading-none mb-0.5">Room Guests</p>
                                <p class="text-sm font-black text-kigongoniBlue dark:text-white truncate" id="guests-display">2 Adults</p>
                            </div>
                        </div>
                        <svg id="guests-chevron" class="w-4 h-4 text-gray-300 dark:text-gray-600 flex-shrink-0 group-hover:text-kigongoniOrange transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <input type="hidden" name="guests" id="guests-value" value="2 Adults">

                    {{-- Dropdown Panel --}}
                    <div id="guests-dropdown" class="kgz-guests-dropdown hidden">
                        <div class="kgz-guests-header">
                            <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Select Guests</span>
                        </div>
                        <ul role="listbox" class="kgz-guests-list">
                            <li class="kgz-guest-option" data-value="1 Adult" role="option" tabindex="0">
                                <div class="kgz-guest-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <p class="kgz-guest-label">1 Adult</p>
                                    <p class="kgz-guest-sub">Solo traveler</p>
                                </div>
                                <svg class="kgz-guest-check hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </li>
                            <li class="kgz-guest-option kgz-guest-selected" data-value="2 Adults" role="option" tabindex="0">
                                <div class="kgz-guest-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                                <div>
                                    <p class="kgz-guest-label">2 Adults</p>
                                    <p class="kgz-guest-sub">Couple / Duo</p>
                                </div>
                                <svg class="kgz-guest-check" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </li>
                            <li class="kgz-guest-option" data-value="3 Adults" role="option" tabindex="0">
                                <div class="kgz-guest-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div>
                                    <p class="kgz-guest-label">3 Adults</p>
                                    <p class="kgz-guest-sub">Group of three</p>
                                </div>
                                <svg class="kgz-guest-check hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </li>
                            <li class="kgz-guest-option" data-value="Family (4+)" role="option" tabindex="0">
                                <div class="kgz-guest-icon kgz-guest-icon-family">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div>
                                    <p class="kgz-guest-label">Family (4+)</p>
                                    <p class="kgz-guest-sub">Perfect for families</p>
                                </div>
                                <svg class="kgz-guest-check hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- SELECT YOUR ROOM BUTTON --}}
                <button type="button" id="select-room-btn"
                    class="relative overflow-hidden bg-kigongoniBlue text-white font-black py-3.5 px-6 rounded-xl hover:bg-kigongoniOrange transition-all duration-300 shadow-lg uppercase tracking-widest text-sm flex justify-center items-center gap-2 group border-2 border-kigongoniBlue hover:border-kigongoniOrange">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Select Your Room
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </button>
            </div>

            {{-- Validation message --}}
            <div id="booking-error" class="hidden mt-4 flex items-center gap-2 text-red-500 text-xs font-bold bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg px-4 py-2.5">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span id="booking-error-text"></span>
            </div>
        </div>

        {{-- CALENDAR POPUP --}}
        <div id="kgz-calendar" class="kgz-calendar hidden">
            <div class="kgz-cal-header">
                <button type="button" id="cal-prev-month" class="kgz-cal-nav" aria-label="Previous month">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <div class="kgz-cal-title">
                    <span id="cal-month-name"></span>
                    <span id="cal-year-name"></span>
                </div>
                <button type="button" id="cal-next-month" class="kgz-cal-nav" aria-label="Next month">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            <div class="kgz-cal-mode-label" id="cal-mode-label">Select Check-In Date</div>
            <div class="kgz-cal-days-header">
                <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
            </div>
            <div class="kgz-cal-grid" id="cal-grid"></div>
            <div class="kgz-cal-footer">
                <div class="kgz-cal-legend">
                    <span class="kgz-legend-checkin"></span> Check-In
                    <span class="kgz-legend-checkout"></span> Check-Out
                    <span class="kgz-legend-range"></span> Stay
                </div>
                <button type="button" id="cal-close-btn" class="kgz-cal-close-btn">Done</button>
            </div>
        </div>
    </div>

    {{-- ============================================================
         ABOUT SECTION
    ============================================================ --}}
    <section id="about" class="py-24 bg-white dark:bg-gray-900 overflow-hidden transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-1 bg-kigongoniOrange"></div>
                    <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase text-sm">Welcome to KIGONGONI GAZELLA HOTEL</h3>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-kigongoniBlue dark:text-white mb-6 leading-tight uppercase tracking-tight">Your Ultimate Safari Gateway</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed text-lg">
                    Experience the perfect blend of authentic Tanzanian hospitality and modern comfort at Kigongoni Gazella Hotel in Mto wa Mbu. Whether you are gearing up for a thrilling Serengeti safari or unwinding after exploring the Ngorongoro Crater, our serene environment is your ultimate gateway. Enjoy exquisite local cuisine, relax in elegant rooms, and let our warm staff make your stay unforgettable. Book your sanctuary with us today and let your true safari journey begin.
                </p>
                <a href="#rooms" class="inline-flex items-center gap-2 border-2 border-kigongoniBlue dark:border-kigongoniOrange text-kigongoniBlue dark:text-kigongoniOrange font-bold py-3 px-8 rounded hover:bg-kigongoniBlue hover:text-white dark:hover:bg-kigongoniOrange dark:hover:text-white transition duration-300 shadow-sm uppercase text-sm tracking-wider">
                    Discover More
                </a>
            </div>
            <div class="lg:w-1/2 relative" data-aos="fade-left">
                <img src="{{ asset('images/about/about-img.jpg') }}" alt="Kigongoni Hotel View" class="rounded-xl shadow-2xl w-full h-auto object-cover border-8 border-gray-50 dark:border-gray-800 transition-colors duration-300">
                <div class="absolute -bottom-8 -left-8 bg-kigongoniOrange text-white p-6 rounded-xl shadow-2xl border-4 border-white dark:border-gray-900 hidden md:flex flex-col items-center justify-center w-40 h-40 transform hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="400">
                    <p class="text-4xl font-black mb-1">24/7</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-center leading-tight">Security & <br> Reception</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         ACCOMMODATION SECTION
    ============================================================ --}}
    <section id="rooms" class="py-24 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Accommodation</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Our Elegant Rooms</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Selected dates summary bar (shown after user selects dates) --}}
            <div id="dates-summary-bar" class="hidden mb-10 bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 border border-kigongoniBlue/20 dark:border-kigongoniBlue/40 rounded-xl px-6 py-4 flex flex-wrap items-center justify-between gap-4" data-aos="fade-up">
                <div class="flex flex-wrap items-center gap-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Check-In:</span>
                        <span class="text-sm font-black text-kigongoniBlue dark:text-white" id="summary-checkin">—</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Check-Out:</span>
                        <span class="text-sm font-black text-kigongoniBlue dark:text-white" id="summary-checkout">—</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nights:</span>
                        <span class="text-sm font-black text-kigongoniOrange" id="summary-nights">—</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Guests:</span>
                        <span class="text-sm font-black text-kigongoniBlue dark:text-white" id="summary-guests">—</span>
                    </div>
                </div>
                <a href="#booking" class="text-xs font-black text-kigongoniOrange hover:underline uppercase tracking-widest flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Change
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- STANDARD DOUBLE ROOM --}}
                <div id="room-double" class="room-card relative bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="100">
                    {{-- RECOMMENDED BADGE --}}
                    <div id="badge-double" class="recommended-badge hidden absolute inset-0 z-20 pointer-events-none rounded-xl"
                         style="box-shadow: 0 0 0 3px #ef4a25, 0 0 30px rgba(239,74,37,0.35); background: transparent;">
                        <div class="absolute top-3 left-1/2 -translate-x-1/2 flex items-center gap-2 px-4 py-2 rounded-full font-black text-white text-xs uppercase tracking-widest shadow-2xl"
                             style="background: rgba(239,74,37,0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.3); white-space: nowrap;">
                            <svg class="w-3.5 h-3.5 text-yellow-300 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            ✦ Recommended for You
                        </div>
                    </div>
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ asset('images/rooms/double-room.jpg') }}"
                             alt="Standard Double Room"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 right-4 bg-kigongoniBlue/90 backdrop-blur-sm text-white px-4 py-2 rounded-lg font-black text-lg shadow-lg">
                            $50 <span class="text-[11px] font-semibold uppercase tracking-wider block text-center -mt-1 text-kigongoniOrange">Per Night</span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col h-[calc(100%-256px)]">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Standard Double Room</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-1">A peaceful retreat for couples or solo travelers. Featuring a cozy double bed, en-suite hot shower, air conditioning, complimentary Wi-Fi, and a hearty breakfast every morning — everything you need after a thrilling day on safari.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('rooms.standard-double') }}"
                               class="room-btn room-link block text-center font-black py-4 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300"
                               data-room="standard-double">View Room</a>
                        </div>
                    </div>
                </div>

                {{-- STANDARD TRIPLE ROOM --}}
                <div id="room-triple" class="room-card relative bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="200">
                    {{-- RECOMMENDED BADGE --}}
                    <div id="badge-triple" class="recommended-badge hidden absolute inset-0 z-20 pointer-events-none rounded-xl"
                         style="box-shadow: 0 0 0 3px #ef4a25, 0 0 30px rgba(239,74,37,0.35); background: transparent;">
                        <div class="absolute top-3 left-1/2 -translate-x-1/2 flex items-center gap-2 px-4 py-2 rounded-full font-black text-white text-xs uppercase tracking-widest shadow-2xl"
                             style="background: rgba(239,74,37,0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.3); white-space: nowrap;">
                            <svg class="w-3.5 h-3.5 text-yellow-300 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            ✦ Recommended for You
                        </div>
                    </div>
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ asset('images/rooms/triple-room.jpg') }}"
                             alt="Standard Triple Room"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 right-4 bg-kigongoniBlue/90 backdrop-blur-sm text-white px-4 py-2 rounded-lg font-black text-lg shadow-lg">
                            $80 <span class="text-[11px] font-semibold uppercase tracking-wider block text-center -mt-1 text-kigongoniOrange">Per Night</span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col h-[calc(100%-256px)]">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Standard Triple Room</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-1">Thoughtfully designed for groups of three, this spacious room combines one double bed and one single bed. Enjoy the same premium comfort — A/C, Wi-Fi, hot shower, and breakfast — with room for everyone to unwind.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('rooms.standard-triple') }}"
                               class="room-btn room-link block text-center font-black py-4 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300"
                               data-room="standard-triple">View Room</a>
                        </div>
                    </div>
                </div>

                {{-- STANDARD FAMILY ROOM --}}
                <div id="room-family" class="room-card relative bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="300">
                    {{-- RECOMMENDED BADGE --}}
                    <div id="badge-family" class="recommended-badge hidden absolute inset-0 z-20 pointer-events-none rounded-xl"
                         style="box-shadow: 0 0 0 3px #ef4a25, 0 0 30px rgba(239,74,37,0.35); background: transparent;">
                        <div class="absolute top-3 left-1/2 -translate-x-1/2 flex items-center gap-2 px-4 py-2 rounded-full font-black text-white text-xs uppercase tracking-widest shadow-2xl"
                             style="background: rgba(239,74,37,0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.3); white-space: nowrap;">
                            <svg class="w-3.5 h-3.5 text-yellow-300 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            ✦ Recommended for You
                        </div>
                    </div>
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ asset('images/rooms/family-room.jpg') }}"
                             alt="Standard Family Room"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 right-4 bg-kigongoniBlue/90 backdrop-blur-sm text-white px-4 py-2 rounded-lg font-black text-lg shadow-lg">
                            $100 <span class="text-[11px] font-semibold uppercase tracking-wider block text-center -mt-1 text-kigongoniOrange">Per Night</span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col h-[calc(100%-256px)]">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Standard Family Room</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-1">Our most generous room, built for families of up to four. Two full double beds, a spacious ~45 m² layout, and all the comforts of home. The perfect base for families exploring the Serengeti, Ngorongoro, and Lake Manyara.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('rooms.standard-family') }}"
                               class="room-btn room-link block text-center font-black py-4 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300"
                               data-room="standard-family">View Room</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         MEETINGS & EVENTS SECTION
    ============================================================ --}}
    <section id="meetings" class="py-24 bg-white dark:bg-gray-900 relative overflow-hidden transition-colors duration-300 scroll-mt-20">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gray-50 dark:bg-gray-800 transform skew-x-12 translate-x-32 -z-10 transition-colors duration-300"></div>
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative" data-aos="fade-right">
                <img src="{{ asset('images/meetings/meeting-img.jpg') }}" alt="Meeting Room" class="rounded-xl shadow-2xl w-full h-auto object-cover border-8 border-white dark:border-gray-800 relative z-10 transition-colors duration-300">
                <div class="absolute -top-6 -right-6 bg-kigongoniBlue dark:bg-gray-800 text-white p-6 rounded-xl shadow-2xl border-4 border-white dark:border-gray-900 z-20 flex flex-col items-center justify-center w-36 h-36 transform hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="300">
                    <svg class="w-10 h-10 text-kigongoniOrange mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <p class="text-3xl font-black">50+</p>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-center mt-1 text-gray-300">Capacity</p>
                </div>
            </div>
            <div class="lg:w-1/2" data-aos="fade-left">
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase text-sm">Meetings & Events</h3>
                    <div class="w-12 h-1 bg-kigongoniOrange"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-kigongoniBlue dark:text-white mb-6 leading-tight uppercase tracking-tight">Business with a Touch of Nature</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed text-lg">Elevate your corporate events, workshops, or board meetings in our fully equipped conference facility.</p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> High-Speed Wi-Fi
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Projector
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Audio and Sound System
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Quality Furniture
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Notepad and Stationery
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Display board
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Air conditioning
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Catering Setup
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Phone Zone
                    </div>
                    <div class="flex items-center gap-3 text-kigongoniBlue dark:text-gray-300 font-semibold text-sm uppercase tracking-wide">
                        <svg class="w-6 h-6 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Restrooms
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         RESTAURANT & BAR SECTION
    ============================================================ --}}
    <section id="restaurant" class="relative py-24 text-white overflow-hidden bg-kigongoniBlue dark:bg-gray-900 transition-colors duration-300 scroll-mt-20">
        @php $bgImage = asset('images/restaurant/restaurant-bg.jpg'); @endphp
        <div class="absolute inset-0 bg-cover bg-center bg-fixed transform scale-105"
             style="background-image: url('{{ $bgImage }}');">
            <div class="absolute inset-0 bg-kigongoniBlue dark:bg-gray-900 opacity-90 transition-colors duration-300"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-down">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Taste The Wilderness</h3>
                <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight text-white mb-6">Dining & Drinks</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-300 max-w-2xl mx-auto text-sm leading-relaxed">
                    Whether you want a quick warm breakfast before your morning game drive, a relaxed lunch in the open air, or a chilled drink to end the day, we have the perfect spot for you.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden group hover:-translate-y-2 transition-all duration-300 shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/restaurant/indoor-dining.jpg') }}" alt="Indoor Dining" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">Breakfast & Tea</div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-2xl font-black mb-3 uppercase tracking-wide text-white">Indoor Dining</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">A cozy indoor setting perfect for your morning tea, coffee, and hearty breakfast before heading out to the national parks. Start your day energized in a warm, welcoming atmosphere.</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden group hover:-translate-y-2 transition-all duration-300 shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/restaurant/outdoor-dining.jpg') }}" alt="Outdoor Restaurant" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">Lunch & Dinner</div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-2xl font-black mb-3 uppercase tracking-wide text-white">Outdoor Restaurant</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">Enjoy delicious meals in the fresh air. Our open-space restaurant allows you to taste local and continental dishes while feeling the gentle, natural breeze of Mto wa Mbu.</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden group hover:-translate-y-2 transition-all duration-300 shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-56 overflow-hidden relative">
                        <img src="{{ asset('images/restaurant/mini-bar.jpg') }}" alt="Mini Bar" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">Drinks & Relax</div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-2xl font-black mb-3 uppercase tracking-wide text-white">The Mini Bar</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">The perfect spot to unwind after a long day of safari. Grab a cold beer, a glass of wine, or a soft drink, sit back, and share your adventures with friends and family.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         EXTRA SERVICES SECTION
    ============================================================ --}}
    <section id="services" class="py-24 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Enhance Your Stay</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Extra Services</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-sm leading-relaxed">
                    We go beyond just accommodation. Enjoy our seamless on-site amenities designed to make your safari experience completely stress-free and enjoyable.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700 flex flex-col" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden h-56">
                        <img src="{{ asset('images/services/supermarket/1.jpg') }}"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=800&q=80'"
                             alt="Mini Supermarket" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-kigongoniBlue/20 group-hover:bg-kigongoniBlue/0 transition duration-300"></div>
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">Shopping</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Mini Supermarket</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-grow">Forgot something? No worries. Grab your snacks, toiletries, drinks, and safari essentials right here at the hotel without the hassle of stepping out.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('services.supermarket') }}" class="room-btn block text-center font-black py-3 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300">View More →</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700 flex flex-col" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden h-56">
                        <img src="{{ asset('images/services/shuttle.jpg') }}"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80'"
                             alt="Airport Shuttle" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-kigongoniBlue/20 group-hover:bg-kigongoniBlue/0 transition duration-300"></div>
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">PickUp-DropOff</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Airport Shuttle</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-grow">Start and end your journey with ease. We offer reliable, comfortable, and safe transfers from Kilimanjaro International Airport (JRO) and Arusha Airport (ARK) right to our doorstep.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('services.shuttle') }}" class="room-btn block text-center font-black py-3 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300">View More →</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 dark:border-gray-700 flex flex-col" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden h-56">
                        <img src="{{ asset('images/services/bicycle.jpg') }}"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=800&q=80'"
                             alt="Village Cycling" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-kigongoniBlue/20 group-hover:bg-kigongoniBlue/0 transition duration-300"></div>
                        <div class="absolute top-4 left-4 bg-kigongoniOrange text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">Pedaling</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-xl font-black text-kigongoniBlue dark:text-white mb-3 uppercase tracking-wide">Village Cycling Experience</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed flex-grow">Explore Mto wa Mbu like a local! Rent our high-quality mountain bikes and cycle through banana plantations, local villages, and along the beautiful Lake Manyara shores.</p>
                        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('services.bicycle') }}" class="room-btn block text-center font-black py-3 rounded-xl border-2 uppercase tracking-widest text-xs transition-all duration-300">View More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         REVIEWS SECTION
    ============================================================ --}}
    <section id="reviews" class="py-24 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">What Our Guests Say</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Guest Reviews</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
            </div>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mb-14" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 bg-white dark:bg-gray-900 rounded-2xl px-6 py-4 shadow-md border border-gray-100 dark:border-gray-700">
                    <svg viewBox="0 0 48 48" class="w-9 h-9 flex-shrink-0"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                    <div>
                        <div class="flex items-center gap-1 mb-0.5">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                        <p class="text-xs font-black text-kigongoniBlue dark:text-white uppercase tracking-wider">Excellent</p>
                        <p class="text-[10px] text-gray-400 dark:text-gray-500 font-medium">Based on Google Reviews</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white dark:bg-gray-900 rounded-2xl px-6 py-4 shadow-md border border-gray-100 dark:border-gray-700">
                    <div class="w-9 h-9 flex-shrink-0 rounded-full bg-[#34E0A1] flex items-center justify-center"><svg viewBox="0 0 24 24" class="w-6 h-6" fill="white"><circle cx="12" cy="12" r="10"/><circle cx="8.5" cy="12" r="2.5" fill="#00AF87"/><circle cx="15.5" cy="12" r="2.5" fill="#00AF87"/><circle cx="8.5" cy="12" r="1" fill="white"/><circle cx="15.5" cy="12" r="1" fill="white"/></svg></div>
                    <div>
                        <div class="flex items-center gap-1 mb-0.5">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-[#34E0A1]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                        <p class="text-xs font-black text-kigongoniBlue dark:text-white uppercase tracking-wider">Excellent</p>
                        <p class="text-[10px] text-gray-400 dark:text-gray-500 font-medium">Based on TripAdvisor</p>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-7 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start justify-between mb-4"><div class="flex items-center gap-3"><div class="w-11 h-11 rounded-full bg-kigongoniBlue flex items-center justify-center text-white font-black text-base flex-shrink-0">S</div><div><p class="font-black text-sm text-kigongoniBlue dark:text-white">Sarah M.</p><p class="text-[10px] text-gray-400 dark:text-gray-500">Nairobi, Kenya</p></div></div><svg viewBox="0 0 48 48" class="w-5 h-5 flex-shrink-0 mt-1"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg></div>
                    <div class="flex gap-0.5 mb-3">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">Kigongoni Gazella exceeded all my expectations. The room was spotless, the staff incredibly warm, and the breakfast was delicious. Perfect location as a base for Lake Manyara and Ngorongoro. Will definitely return!</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 font-semibold uppercase tracking-widest">March 2025</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-7 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-start justify-between mb-4"><div class="flex items-center gap-3"><div class="w-11 h-11 rounded-full bg-kigongoniOrange flex items-center justify-center text-white font-black text-base flex-shrink-0">J</div><div><p class="font-black text-sm text-kigongoniBlue dark:text-white">James K.</p><p class="text-[10px] text-gray-400 dark:text-gray-500">London, UK</p></div></div><div class="w-5 h-5 rounded-full bg-[#34E0A1] flex items-center justify-center flex-shrink-0 mt-1"><svg viewBox="0 0 24 24" class="w-3 h-3" fill="white"><circle cx="8.5" cy="12" r="2.5"/><circle cx="15.5" cy="12" r="2.5"/><circle cx="8.5" cy="12" r="1" fill="#34E0A1"/><circle cx="15.5" cy="12" r="1" fill="#34E0A1"/></svg></div></div>
                    <div class="flex gap-0.5 mb-3">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-[#34E0A1]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">Fantastic value for money! We used this as our Serengeti safari base and it was perfect. Very comfortable beds, hot shower every morning, and the staff went out of their way to help arrange our game drives. Highly recommend.</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 font-semibold uppercase tracking-widest">February 2025</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-7 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start justify-between mb-4"><div class="flex items-center gap-3"><div class="w-11 h-11 rounded-full bg-emerald-600 flex items-center justify-center text-white font-black text-base flex-shrink-0">A</div><div><p class="font-black text-sm text-kigongoniBlue dark:text-white">Amina R.</p><p class="text-[10px] text-gray-400 dark:text-gray-500">Dar es Salaam, TZ</p></div></div><svg viewBox="0 0 48 48" class="w-5 h-5 flex-shrink-0 mt-1"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg></div>
                    <div class="flex gap-0.5 mb-3">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">Tulikaa na familia yetu kwa wiki moja — vyumba vizuri sana, chakula kitamu na wafanyakazi wema kupita kiasi. Mtoto wangu alisema ni safari yake nzuri zaidi! Tutarudi tena bila shaka.</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 font-semibold uppercase tracking-widest">January 2025</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-7 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="250">
                    <div class="flex items-start justify-between mb-4"><div class="flex items-center gap-3"><div class="w-11 h-11 rounded-full bg-purple-600 flex items-center justify-center text-white font-black text-base flex-shrink-0">M</div><div><p class="font-black text-sm text-kigongoniBlue dark:text-white">Marco T.</p><p class="text-[10px] text-gray-400 dark:text-gray-500">Milan, Italy</p></div></div><div class="w-5 h-5 rounded-full bg-[#34E0A1] flex items-center justify-center flex-shrink-0 mt-1"><svg viewBox="0 0 24 24" class="w-3 h-3" fill="white"><circle cx="8.5" cy="12" r="2.5"/><circle cx="15.5" cy="12" r="2.5"/><circle cx="8.5" cy="12" r="1" fill="#34E0A1"/><circle cx="15.5" cy="12" r="1" fill="#34E0A1"/></svg></div></div>
                    <div class="flex gap-0.5 mb-3">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-[#34E0A1]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">The best base for a northern Tanzania circuit. Clean, affordable, great food. The staff helped us plan our entire itinerary — Ngorongoro, Serengeti and Lake Manyara — all from right here in Mto wa Mbu. Superb hospitality!</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 font-semibold uppercase tracking-widest">December 2024</p>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-7 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 md:col-span-2 lg:col-span-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start justify-between mb-4"><div class="flex items-center gap-3"><div class="w-11 h-11 rounded-full bg-sky-600 flex items-center justify-center text-white font-black text-base flex-shrink-0">L</div><div><p class="font-black text-sm text-kigongoniBlue dark:text-white">Lena W.</p><p class="text-[10px] text-gray-400 dark:text-gray-500">Amsterdam, Netherlands</p></div></div><svg viewBox="0 0 48 48" class="w-5 h-5 flex-shrink-0 mt-1"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg></div>
                    <div class="flex gap-0.5 mb-3">@for($s=0;$s<5;$s++)<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">Such a hidden gem in Mto wa Mbu! Incredibly warm welcome, comfortable family room for all four of us. Loved the evening atmosphere and the local flavors at dinner. The whole team made us feel right at home in Tanzania.</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500 font-semibold uppercase tracking-widest">November 2024</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         TRAVEL DISTANCE SECTION
    ============================================================ --}}
    <section id="getting-here" class="py-24 bg-kigongoniBlue dark:bg-gray-900 relative overflow-hidden transition-colors duration-300">
        <div class="absolute inset-0 opacity-[0.04]" style="background-image: repeating-linear-gradient(45deg, #ef4a25 0, #ef4a25 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-kigongoniOrange/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">How to Reach Us</h3>
                <h2 class="text-4xl font-black text-white uppercase tracking-tight">Getting Here</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
                <p class="text-white/60 mt-5 text-sm max-w-xl mx-auto leading-relaxed">Kigongoni Gazella Hotel is conveniently located in Mto wa Mbu — the gateway to Tanzania's greatest safari parks.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-14">
                <div class="bg-white/8 backdrop-blur-sm border border-white/15 rounded-2xl p-8 hover:bg-white/12 transition duration-300 group" data-aos="fade-right" data-aos-delay="100">
                    <div class="flex items-center gap-4 mb-6"><div class="w-14 h-14 rounded-xl bg-kigongoniOrange/20 border border-kigongoniOrange/30 flex items-center justify-center flex-shrink-0 group-hover:bg-kigongoniOrange/30 transition"><svg class="w-7 h-7 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg></div><div><p class="text-kigongoniOrange text-[10px] font-black uppercase tracking-[0.3em] mb-0.5">International</p><h4 class="text-white font-black text-lg uppercase tracking-wide leading-tight">Kilimanjaro Airport</h4><p class="text-white/40 text-xs font-semibold">JRO / KIA</p></div></div>
                    <div class="flex items-end gap-3 mb-2"><span class="text-[72px] font-black text-white leading-none counter" data-target="170">0</span><div class="mb-3"><span class="text-kigongoniOrange font-black text-2xl">km</span></div></div>
                    <div class="relative h-1.5 bg-white/10 rounded-full mb-4 overflow-hidden"><div class="distance-bar h-full bg-kigongoniOrange rounded-full" style="width:0%" data-width="85%"></div></div>
                    <div class="flex items-center justify-between"><span class="text-white/50 text-xs font-semibold uppercase tracking-wider flex items-center gap-2"><svg class="w-4 h-4 text-kigongoniOrange/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Approx. 3 hours by road</span><span class="text-kigongoniOrange text-[10px] font-black uppercase tracking-wider bg-kigongoniOrange/15 px-2.5 py-1 rounded-full border border-kigongoniOrange/30">Int'l Flights</span></div>
                </div>
                <div class="bg-white/8 backdrop-blur-sm border border-white/15 rounded-2xl p-8 hover:bg-white/12 transition duration-300 group" data-aos="fade-left" data-aos-delay="100">
                    <div class="flex items-center gap-4 mb-6"><div class="w-14 h-14 rounded-xl bg-kigongoniOrange/20 border border-kigongoniOrange/30 flex items-center justify-center flex-shrink-0 group-hover:bg-kigongoniOrange/30 transition"><svg class="w-7 h-7 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg></div><div><p class="text-kigongoniOrange text-[10px] font-black uppercase tracking-[0.3em] mb-0.5">Domestic</p><h4 class="text-white font-black text-lg uppercase tracking-wide leading-tight">Arusha Airport</h4><p class="text-white/40 text-xs font-semibold">ARK · Kisongo</p></div></div>
                    <div class="flex items-end gap-3 mb-2"><span class="text-[72px] font-black text-white leading-none counter" data-target="108">0</span><div class="mb-3"><span class="text-kigongoniOrange font-black text-2xl">km</span></div></div>
                    <div class="relative h-1.5 bg-white/10 rounded-full mb-4 overflow-hidden"><div class="distance-bar h-full bg-kigongoniOrange rounded-full" style="width:0%" data-width="54%"></div></div>
                    <div class="flex items-center justify-between"><span class="text-white/50 text-xs font-semibold uppercase tracking-wider flex items-center gap-2"><svg class="w-4 h-4 text-kigongoniOrange/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Approx. 2 hours by road</span><span class="text-kigongoniOrange text-[10px] font-black uppercase tracking-wider bg-kigongoniOrange/15 px-2.5 py-1 rounded-full border border-kigongoniOrange/30">Domestic</span></div>
                </div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <p class="text-white/40 text-xs uppercase tracking-[0.3em] font-semibold mb-4">Also accessible from</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <span class="text-white/60 text-xs font-semibold flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full"><svg class="w-3 h-3 text-kigongoniOrange" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>Lake Manyara Airport — 6 km</span>
                    <span class="text-white/60 text-xs font-semibold flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full"><svg class="w-3 h-3 text-kigongoniOrange" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>Arusha City Centre — 110 km</span>
                    <span class="text-white/60 text-xs font-semibold flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-2 rounded-full"><svg class="w-3 h-3 text-kigongoniOrange" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>Ngorongoro Crater — 80 km</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         GALLERY SECTION
    ============================================================ --}}
    <section id="gallery" class="py-24 bg-white dark:bg-gray-900 overflow-hidden transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Discover Our Space</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Photo Gallery</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 auto-rows-[250px]">
                <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/gallery/front-1.jpg') }}" alt="Hotel Exterior" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/30 transition-all duration-300 flex items-center justify-center"><svg class="w-10 h-10 text-white opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div>
                </div>
                <div class="relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/gallery/front-2.jpg') }}" alt="Room Interior" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/30 transition-all duration-300 flex items-center justify-center"><svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div>
                </div>
                <div class="relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('images/gallery/front-3.jpg') }}" alt="Restaurant" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/30 transition-all duration-300 flex items-center justify-center"><svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div>
                </div>
                <div class="md:col-span-2 relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('images/gallery/front-4.jpg') }}" alt="Lounge Area" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/30 transition-all duration-300 flex items-center justify-center"><svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div>
                </div>
            </div>
            <div class="flex justify-center mt-12" data-aos="fade-up">
                <a href="{{ route('gallery') }}" class="group inline-flex items-center gap-3 bg-white dark:bg-gray-800 border-2 border-kigongoniBlue dark:border-kigongoniOrange text-kigongoniBlue dark:text-kigongoniOrange font-black uppercase tracking-widest text-xs px-10 py-4 rounded-xl hover:bg-kigongoniBlue dark:hover:bg-kigongoniOrange hover:text-white dark:hover:text-white shadow-md hover:shadow-xl transition-all duration-300">
                    View All Photos
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================
         LOCATION & ATTRACTIONS SECTION
    ============================================================ --}}
    <section id="location" class="py-24 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Prime Location</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Explore The Surroundings</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
            </div>
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <h4 class="text-2xl font-black text-kigongoniBlue dark:text-white mb-6 uppercase tracking-wide">The Heart of the Safari Circuit</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">Situated in Mto wa Mbu, Kigongoni Gazella Hotel offers the perfect starting point for your Northern Tanzania adventures.</p>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Lake Manyara National Park</span><span class="text-kigongoniOrange font-black">~5 km</span></div>
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Tarangire National Park</span><span class="text-kigongoniOrange font-black">~70 km</span></div>
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Ngorongoro Crater</span><span class="text-kigongoniOrange font-black">~80 km</span></div>
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Meserani Snake Park</span><span class="text-kigongoniOrange font-black">~90 km</span></div>
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Lake Eyasi</span><span class="text-kigongoniOrange font-black">~90 km</span></div>
                        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 transition duration-300"><span class="font-bold text-kigongoniBlue dark:text-gray-200">Serengeti National Park</span><span class="text-kigongoniOrange font-black">~200 km</span></div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full h-[500px] lg:h-[600px]" data-aos="fade-left">
                    <div class="w-full h-full rounded-2xl overflow-hidden shadow-xl border-8 border-white dark:border-gray-900 relative">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11825.27506779689!2d35.889131350594845!3d-3.3862423122213188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1834274a9d069017%3A0x1511472b59042140!2sKigongoni%20Gazella%20Hotel%20LTD!5e0!3m2!1sen!2stz!4v1773263141717!5m2!1sen!2stz"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            class="absolute inset-0 w-full h-full filter dark:invert-[90%] dark:hue-rotate-180 transition-all duration-300"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         CONTACT SECTION
    ============================================================ --}}
    <section id="contact" class="py-24 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">Get in touch</h3>
                <h2 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Contact us</h2>
                <div class="w-24 h-1.5 bg-kigongoniOrange mx-auto mt-6 rounded-full"></div>
            </div>
            <div class="max-w-2xl mx-auto" data-aos="fade-up">
                <h4 class="text-2xl font-black text-kigongoniBlue dark:text-white mb-6 uppercase tracking-wide">We're here to help</h4>
                <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">Have questions about your stay, need assistance with booking, or want to arrange a special event? Our team is ready to assist you.</p>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-kigongoniOrange/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Address</p>
                            <p class="font-black text-kigongoniBlue dark:text-white">Kigongoni Gazella Hotel, Mto wa Mbu, Tanzania</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-kigongoniOrange/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Phone</p>
                            <p class="font-black text-kigongoniBlue dark:text-white">+255 768 219 703</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-kigongoniOrange/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</p>
                            <p class="font-black text-kigongoniBlue dark:text-white">booking@kigongonigazella.co.tz</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<style>
    :root {
        --navbar-height: 72px;
        --kgz-blue: #123960;
        --kgz-orange: #ef4a25;
    }

    #about, #rooms, #meetings, #restaurant, #services, #reviews, #getting-here, #gallery, #location, #contact, #booking {
        scroll-margin-top: var(--navbar-height);
    }

    /* ─── ROOM BUTTON ─────────────────────────────── */
    .room-btn {
        background: #f8fafc;
        color: #123960;
        border-color: #e2e8f0;
    }
    .dark .room-btn {
        background: #1f2937;
        color: #ffffff;
        border-color: #374151;
    }
    .group:hover .room-btn {
        background: #123960;
        color: #ffffff;
        border-color: #123960;
        letter-spacing: 0.18em;
        box-shadow: 0 8px 24px rgba(18,57,96,0.25);
    }
    .dark .group:hover .room-btn {
        background: #ef4a25;
        color: #ffffff;
        border-color: #ef4a25;
        box-shadow: 0 8px 24px rgba(239,74,37,0.3);
    }

    /* ─── RECOMMENDED BADGE ──────────────────────── */
    .recommended-badge {
        animation: badgePulse 2s ease-in-out infinite;
    }
    .recommended-badge.hidden { display: none !important; }
    @keyframes badgePulse {
        0%, 100% { box-shadow: 0 0 0 3px #ef4a25, 0 0 20px rgba(239,74,37,0.3); }
        50%       { box-shadow: 0 0 0 4px #ef4a25, 0 0 40px rgba(239,74,37,0.55); }
    }
    /* Lift the recommended room card slightly */
    .room-card.is-recommended {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(239,74,37,0.25), 0 4px 16px rgba(0,0,0,0.1) !important;
        border-color: rgba(239,74,37,0.4) !important;
        transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.4s ease, border-color 0.3s ease;
    }

    /* ─── DISTANCE CARD BG ────────────────────────── */
    .bg-white\/8  { background: rgba(255,255,255,0.08); }
    .bg-white\/12 { background: rgba(255,255,255,0.12); }

    /* ─── DISTANCE BAR ANIMATION ──────────────────── */
    .distance-bar {
        transition: width 1.8s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* ─── HERO SLIDE TRANSITIONS ─────────────────── */
    .hero-slide {
        transition: opacity 2000ms cubic-bezier(0.4, 0, 0.2, 1), transform 8000ms cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hero-slide.opacity-100 { transform: scale(1.15); }
    .hero-slide.opacity-0   { transform: scale(1); }

    /* ─── DATE TRIGGER ACTIVE STATE ──────────────── */
    .kgz-date-trigger.active {
        border-color: var(--kgz-orange);
        box-shadow: 0 0 0 3px rgba(239,74,37,0.15);
    }
    .kgz-date-trigger.has-value .date-display,
    .kgz-date-trigger.has-value p:last-child {
        color: #123960 !important;
        font-weight: 900;
    }
    .dark .kgz-date-trigger.has-value p:last-child {
        color: #ffffff !important;
    }

    /* ══════════════════════════════════════════════════
       KGZ CUSTOM CALENDAR
    ══════════════════════════════════════════════════ */
    .kgz-calendar {
        position: absolute;
        top: calc(100% + 12px);
        left: 0;
        right: 0;
        max-width: 360px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 25px 60px rgba(18,57,96,0.22), 0 8px 20px rgba(0,0,0,0.1);
        border: 1px solid rgba(18,57,96,0.1);
        overflow: hidden;
        z-index: 9999;
        animation: calSlideDown 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .dark .kgz-calendar {
        background: #1f2937;
        border-color: rgba(255,255,255,0.1);
        box-shadow: 0 25px 60px rgba(0,0,0,0.5);
    }
    @keyframes calSlideDown {
        from { opacity: 0; transform: translateY(-10px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    .kgz-calendar.hidden { display: none; }

    /* Header */
    .kgz-cal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 20px 12px;
        background: linear-gradient(135deg, var(--kgz-blue) 0%, #1a4f80 100%);
    }
    .kgz-cal-title {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 1.2;
    }
    .kgz-cal-title #cal-month-name {
        font-size: 15px;
        font-weight: 900;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
    .kgz-cal-title #cal-year-name {
        font-size: 11px;
        font-weight: 700;
        color: rgba(255,255,255,0.6);
        letter-spacing: 0.15em;
    }
    .kgz-cal-nav {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        color: #ffffff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        flex-shrink: 0;
    }
    .kgz-cal-nav:hover {
        background: var(--kgz-orange);
        border-color: var(--kgz-orange);
        transform: scale(1.1);
    }
    .kgz-cal-nav svg { width: 14px; height: 14px; }

    /* Mode label */
    .kgz-cal-mode-label {
        text-align: center;
        font-size: 10px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        padding: 8px 16px;
        background: rgba(239,74,37,0.08);
        color: var(--kgz-orange);
        border-bottom: 1px solid rgba(239,74,37,0.1);
    }
    .dark .kgz-cal-mode-label {
        background: rgba(239,74,37,0.15);
    }

    /* Days header */
    .kgz-cal-days-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        padding: 10px 12px 6px;
        gap: 2px;
    }
    .kgz-cal-days-header span {
        text-align: center;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #9ca3af;
        padding: 4px 0;
    }
    .dark .kgz-cal-days-header span { color: #6b7280; }

    /* Grid */
    .kgz-cal-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 3px;
        padding: 4px 12px 12px;
    }

    /* Day cells */
    .kgz-day {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.18s ease;
        color: #374151;
        position: relative;
        user-select: none;
        -webkit-user-select: none;
    }
    .dark .kgz-day { color: #d1d5db; }

    .kgz-day:hover:not(.kgz-day-past):not(.kgz-day-empty) {
        background: rgba(239,74,37,0.12);
        color: var(--kgz-orange);
        transform: scale(1.05);
    }
    .kgz-day-past {
        color: #d1d5db !important;
        cursor: not-allowed;
        opacity: 0.5;
    }
    .dark .kgz-day-past { color: #4b5563 !important; }

    .kgz-day-today {
        font-weight: 900;
        color: var(--kgz-blue) !important;
    }
    .kgz-day-today::after {
        content: '';
        position: absolute;
        bottom: 3px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--kgz-orange);
    }
    .dark .kgz-day-today { color: #93c5fd !important; }

    /* Check-in selected */
    .kgz-day-checkin {
        background: var(--kgz-blue) !important;
        color: #ffffff !important;
        border-radius: 10px 0 0 10px;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(18,57,96,0.4);
        z-index: 2;
    }
    /* Check-out selected */
    .kgz-day-checkout {
        background: var(--kgz-orange) !important;
        color: #ffffff !important;
        border-radius: 0 10px 10px 0;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(239,74,37,0.4);
        z-index: 2;
    }
    /* Same day check-in and checkout */
    .kgz-day-checkin.kgz-day-checkout {
        border-radius: 10px;
        background: var(--kgz-orange) !important;
    }
    /* Range between */
    .kgz-day-range {
        background: rgba(239,74,37,0.1) !important;
        border-radius: 0;
        color: var(--kgz-blue) !important;
    }
    .dark .kgz-day-range {
        background: rgba(239,74,37,0.18) !important;
        color: #fbd5ca !important;
    }

    /* Footer */
    .kgz-cal-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px 14px;
        border-top: 1px solid #f3f4f6;
    }
    .dark .kgz-cal-footer { border-top-color: #374151; }
    .kgz-cal-legend {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #9ca3af;
    }
    .kgz-legend-checkin, .kgz-legend-checkout, .kgz-legend-range {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 4px;
        flex-shrink: 0;
    }
    .kgz-legend-checkin  { background: var(--kgz-blue); }
    .kgz-legend-checkout { background: var(--kgz-orange); }
    .kgz-legend-range    { background: rgba(239,74,37,0.15); border: 1px solid rgba(239,74,37,0.3); }

    .kgz-cal-close-btn {
        font-size: 11px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        background: var(--kgz-blue);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 7px 16px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .kgz-cal-close-btn:hover {
        background: var(--kgz-orange);
        transform: scale(1.03);
    }

    /* Dates Summary Bar */
    #dates-summary-bar { display: flex; }

    /* ══════════════════════════════════════════════════
       KGZ GUESTS DROPDOWN
    ══════════════════════════════════════════════════ */
    .kgz-guests-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        right: 0;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 20px 50px rgba(18,57,96,0.18), 0 6px 16px rgba(0,0,0,0.08);
        border: 1px solid rgba(18,57,96,0.08);
        overflow: hidden;
        z-index: 9998;
        animation: calSlideDown 0.22s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .dark .kgz-guests-dropdown {
        background: #1f2937;
        border-color: rgba(255,255,255,0.1);
        box-shadow: 0 20px 50px rgba(0,0,0,0.45);
    }
    .kgz-guests-dropdown.hidden { display: none; }
    .kgz-guests-header {
        display: flex; align-items: center; gap: 8px;
        padding: 12px 16px 10px;
        background: linear-gradient(135deg, var(--kgz-blue) 0%, #1a4f80 100%);
        font-size: 10px; font-weight: 900; text-transform: uppercase;
        letter-spacing: 0.15em; color: rgba(255,255,255,0.9);
    }
    .kgz-guests-header svg { width: 14px; height: 14px; flex-shrink: 0; }
    .kgz-guests-list { list-style: none; margin: 0; padding: 6px; }
    .kgz-guest-option {
        display: flex; align-items: center; gap: 12px;
        padding: 10px 12px; border-radius: 12px; cursor: pointer;
        transition: all 0.18s ease; margin-bottom: 2px;
    }
    .kgz-guest-option:hover { background: rgba(239,74,37,0.07); }
    .dark .kgz-guest-option:hover { background: rgba(239,74,37,0.12); }
    .kgz-guest-option:last-child { margin-bottom: 0; }
    .kgz-guest-selected { background: rgba(18,57,96,0.07) !important; }
    .dark .kgz-guest-selected { background: rgba(239,74,37,0.15) !important; }
    .kgz-guest-icon {
        width: 36px; height: 36px; border-radius: 10px;
        background: rgba(18,57,96,0.08);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; transition: all 0.18s;
    }
    .kgz-guest-icon svg { width: 16px; height: 16px; color: #123960; }
    .dark .kgz-guest-icon { background: rgba(255,255,255,0.08); }
    .dark .kgz-guest-icon svg { color: #93c5fd; }
    .kgz-guest-icon-family { background: rgba(239,74,37,0.1) !important; }
    .kgz-guest-icon-family svg { color: var(--kgz-orange) !important; }
    .kgz-guest-selected .kgz-guest-icon { background: var(--kgz-blue); }
    .kgz-guest-selected .kgz-guest-icon svg { color: #ffffff; }
    .dark .kgz-guest-selected .kgz-guest-icon { background: var(--kgz-orange); }
    .kgz-guest-label { font-size: 13px; font-weight: 900; color: #123960; line-height: 1.2; margin: 0; }
    .dark .kgz-guest-label { color: #f9fafb; }
    .kgz-guest-selected .kgz-guest-label { color: var(--kgz-blue); }
    .dark .kgz-guest-selected .kgz-guest-label { color: var(--kgz-orange); }
    .kgz-guest-sub { font-size: 10px; font-weight: 600; color: #9ca3af; margin: 0; text-transform: uppercase; letter-spacing: 0.06em; }
    .kgz-guest-check { width: 16px; height: 16px; color: var(--kgz-orange); margin-left: auto; flex-shrink: 0; }
    .kgz-guest-check.hidden { display: none; }
    #guests-trigger.active { border-color: var(--kgz-orange); box-shadow: 0 0 0 3px rgba(239,74,37,0.15); }
    #guests-chevron.rotated { transform: rotate(180deg); }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ============================================================
    // HERO SLIDER
    // ============================================================
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.slide-dot');
    const prevBtn = document.getElementById('hero-prev');
    const nextBtn = document.getElementById('hero-next');
    let current = 0, slideInterval;

    slides.forEach(slide => {
        const bg = slide.getAttribute('data-bg');
        if (bg) {
            slide.style.backgroundImage = `url('${bg}')`;
            slide.style.backgroundSize = 'cover';
            slide.style.backgroundPosition = 'center';
        }
    });

    function goToSlide(n) {
        slides[current].classList.remove('opacity-100'); slides[current].classList.add('opacity-0');
        if (dots[current]) { dots[current].classList.remove('w-6','bg-kigongoniOrange'); dots[current].classList.add('w-2','bg-white/30'); }
        current = n;
        slides[current].classList.remove('opacity-0'); slides[current].classList.add('opacity-100');
        if (dots[current]) { dots[current].classList.add('w-6','bg-kigongoniOrange'); dots[current].classList.remove('w-2','bg-white/30'); }
    }
    function nextSlide() { goToSlide((current + 1) % slides.length); }
    function prevSlide() { goToSlide((current - 1 + slides.length) % slides.length); }
    function startAuto() { if (slideInterval) clearInterval(slideInterval); slideInterval = setInterval(nextSlide, 6000); }
    function stopAuto()  { if (slideInterval) { clearInterval(slideInterval); slideInterval = null; } }

    prevBtn && prevBtn.addEventListener('click', () => { stopAuto(); prevSlide(); startAuto(); });
    nextBtn && nextBtn.addEventListener('click', () => { stopAuto(); nextSlide(); startAuto(); });
    const heroSection = document.getElementById('hero-section');
    if (heroSection) { heroSection.addEventListener('mouseenter', stopAuto); heroSection.addEventListener('mouseleave', startAuto); }
    startAuto();

    // ============================================================
    // SMOOTH SCROLL
    // ============================================================
    function getNavbarHeight() {
        const nav = document.querySelector('nav') || document.querySelector('header') || document.querySelector('[class*="navbar"]');
        return nav ? nav.offsetHeight : 70;
    }
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const id = this.getAttribute('href').slice(1);
            if (!id) return;
            const target = document.getElementById(id);
            if (!target) return;
            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.pageYOffset - (getNavbarHeight() + 16);
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    // ============================================================
    // ANIMATED COUNTERS & DISTANCE BARS
    // ============================================================
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseInt(el.dataset.target, 10);
            const duration = 1800;
            const start = performance.now();
            function tick(now) {
                const elapsed = now - start;
                const progress = Math.min(elapsed / duration, 1);
                const ease = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                el.textContent = Math.round(ease * target);
                if (progress < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
            counterObserver.unobserve(el);
        });
    }, { threshold: 0.3 });
    document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));

    const barObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.querySelectorAll('.distance-bar').forEach(bar => {
                setTimeout(() => { bar.style.width = bar.dataset.width; }, 300);
            });
            barObserver.unobserve(entry.target);
        });
    }, { threshold: 0.2 });
    const gettingHere = document.getElementById('getting-here');
    if (gettingHere) barObserver.observe(gettingHere);

    // ============================================================
    // ✅ CUSTOM CALENDAR DATE PICKER
    // ============================================================
    const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    const today  = new Date(); today.setHours(0,0,0,0);

    let calViewYear  = today.getFullYear();
    let calViewMonth = today.getMonth();
    let calMode      = 'checkin';  // 'checkin' | 'checkout'
    let selectedCheckin  = null;
    let selectedCheckout = null;

    const calEl        = document.getElementById('kgz-calendar');
    const calGrid      = document.getElementById('cal-grid');
    const calMonthName = document.getElementById('cal-month-name');
    const calYearName  = document.getElementById('cal-year-name');
    const calModeLabel = document.getElementById('cal-mode-label');
    const calPrev      = document.getElementById('cal-prev-month');
    const calNext      = document.getElementById('cal-next-month');
    const calCloseBtn  = document.getElementById('cal-close-btn');

    const checkinTrigger  = document.getElementById('checkin-trigger');
    const checkoutTrigger = document.getElementById('checkout-trigger');
    const checkinDisplay  = document.getElementById('checkin-display');
    const checkoutDisplay = document.getElementById('checkout-display');
    const checkinValue    = document.getElementById('checkin-value');
    const checkoutValue   = document.getElementById('checkout-value');
    const bookingError    = document.getElementById('booking-error');
    const bookingErrorTxt = document.getElementById('booking-error-text');

    // ── Format a Date object nicely
    function formatDate(d) {
        if (!d) return '';
        return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
    }
    // ── Format to YYYY-MM-DD for value
    function formatISO(d) {
        if (!d) return '';
        const y = d.getFullYear();
        const m = String(d.getMonth()+1).padStart(2,'0');
        const dd = String(d.getDate()).padStart(2,'0');
        return `${y}-${m}-${dd}`;
    }
    // ── Two dates same day?
    function sameDay(a, b) {
        return a && b && a.getFullYear()===b.getFullYear() && a.getMonth()===b.getMonth() && a.getDate()===b.getDate();
    }

    // ── Render the calendar grid for current view month/year
    function renderCalendar() {
        calMonthName.textContent = MONTHS[calViewMonth];
        calYearName.textContent  = calViewYear;
        calModeLabel.textContent = calMode === 'checkin' ? 'Select Check-In Date' : 'Select Check-Out Date';

        const firstDay = new Date(calViewYear, calViewMonth, 1).getDay();
        const daysInMonth = new Date(calViewYear, calViewMonth+1, 0).getDate();

        calGrid.innerHTML = '';

        // Empty cells before first day
        for (let i = 0; i < firstDay; i++) {
            const empty = document.createElement('div');
            empty.className = 'kgz-day kgz-day-empty';
            calGrid.appendChild(empty);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const dateObj = new Date(calViewYear, calViewMonth, d);
            dateObj.setHours(0,0,0,0);

            const cell = document.createElement('div');
            cell.className = 'kgz-day';
            cell.textContent = d;

            const isPast = dateObj < today;
            const isToday = sameDay(dateObj, today);
            const isCheckin  = sameDay(dateObj, selectedCheckin);
            const isCheckout = sameDay(dateObj, selectedCheckout);
            const isInRange  = selectedCheckin && selectedCheckout && dateObj > selectedCheckin && dateObj < selectedCheckout;

            if (isPast) {
                cell.classList.add('kgz-day-past');
            } else {
                // In checkout mode, disable dates before or equal to checkin
                if (calMode === 'checkout' && selectedCheckin && dateObj <= selectedCheckin) {
                    cell.classList.add('kgz-day-past');
                } else {
                    cell.addEventListener('click', () => onDayClick(dateObj));
                }
            }

            if (isToday)    cell.classList.add('kgz-day-today');
            if (isCheckin)  cell.classList.add('kgz-day-checkin');
            if (isCheckout) cell.classList.add('kgz-day-checkout');
            if (isInRange)  cell.classList.add('kgz-day-range');

            calGrid.appendChild(cell);
        }
    }

    // ── Handle day click
    function onDayClick(dateObj) {
        if (calMode === 'checkin') {
            selectedCheckin  = dateObj;
            selectedCheckout = null;  // Reset checkout when checkin changes
            checkinDisplay.textContent = formatDate(dateObj);
            checkinValue.value = formatISO(dateObj);
            // Update trigger visual
            checkinTrigger.classList.add('has-value');
            checkoutDisplay.textContent = 'Select date';
            checkoutValue.value = '';
            checkoutTrigger.classList.remove('has-value');
            // Auto-switch to checkout mode
            calMode = 'checkout';
            renderCalendar();
        } else {
            if (selectedCheckin && dateObj <= selectedCheckin) return; // Safety
            selectedCheckout = dateObj;
            checkoutDisplay.textContent = formatDate(dateObj);
            checkoutValue.value = formatISO(dateObj);
            checkoutTrigger.classList.add('has-value');
            renderCalendar();
            // Auto-close after short delay
            setTimeout(closeCalendar, 300);
        }
    }

    // ── Open calendar
    function openCalendar(mode) {
        calMode = mode;
        // Position calendar below the appropriate trigger
        const wrapper = mode === 'checkin'
            ? document.getElementById('checkin-wrapper')
            : document.getElementById('checkout-wrapper');

        const bookingContainer = document.getElementById('booking');
        bookingContainer.style.position = 'relative';
        bookingContainer.appendChild(calEl);

        const wrapperRect   = wrapper.getBoundingClientRect();
        const containerRect = bookingContainer.getBoundingClientRect();
        const leftOffset    = wrapperRect.left - containerRect.left;

        calEl.style.top  = (wrapper.offsetTop + wrapper.offsetHeight + 8) + 'px';
        calEl.style.left = Math.max(0, leftOffset) + 'px';
        calEl.style.right = 'auto';

        // If calendar would go off-screen right, align right instead
        if (leftOffset + 360 > containerRect.width) {
            calEl.style.left  = 'auto';
            calEl.style.right = '0';
        }

        // Navigate to month of selected date if available
        if (mode === 'checkin' && selectedCheckin) {
            calViewYear  = selectedCheckin.getFullYear();
            calViewMonth = selectedCheckin.getMonth();
        } else if (mode === 'checkout' && selectedCheckout) {
            calViewYear  = selectedCheckout.getFullYear();
            calViewMonth = selectedCheckout.getMonth();
        } else if (mode === 'checkout' && selectedCheckin) {
            calViewYear  = selectedCheckin.getFullYear();
            calViewMonth = selectedCheckin.getMonth();
        } else {
            calViewYear  = today.getFullYear();
            calViewMonth = today.getMonth();
        }

        renderCalendar();
        calEl.classList.remove('hidden');

        // Highlight active trigger
        checkinTrigger.classList.toggle('active', mode === 'checkin');
        checkoutTrigger.classList.toggle('active', mode === 'checkout');
    }

    function closeCalendar() {
        calEl.classList.add('hidden');
        checkinTrigger.classList.remove('active');
        checkoutTrigger.classList.remove('active');
    }

    // ── Trigger click handlers
    checkinTrigger.addEventListener('click', () => {
        if (!calEl.classList.contains('hidden') && calMode === 'checkin') {
            closeCalendar();
        } else {
            openCalendar('checkin');
        }
    });
    checkoutTrigger.addEventListener('click', () => {
        if (!calEl.classList.contains('hidden') && calMode === 'checkout') {
            closeCalendar();
        } else {
            openCalendar('checkout');
        }
    });

    // Keyboard accessibility
    checkinTrigger.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openCalendar('checkin'); } });
    checkoutTrigger.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openCalendar('checkout'); } });

    // Navigation buttons
    calPrev.addEventListener('click', () => {
        calViewMonth--;
        if (calViewMonth < 0) { calViewMonth = 11; calViewYear--; }
        renderCalendar();
    });
    calNext.addEventListener('click', () => {
        calViewMonth++;
        if (calViewMonth > 11) { calViewMonth = 0; calViewYear++; }
        renderCalendar();
    });
    calCloseBtn.addEventListener('click', closeCalendar);

    // Close calendar on outside click
    document.addEventListener('click', (e) => {
        if (!calEl.classList.contains('hidden') &&
            !calEl.contains(e.target) &&
            !checkinTrigger.contains(e.target) &&
            !checkoutTrigger.contains(e.target)) {
            closeCalendar();
        }
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeCalendar();
    });

    // ============================================================
    // ✅ CUSTOM GUESTS DROPDOWN
    // ============================================================
    const guestsTrigger   = document.getElementById('guests-trigger');
    const guestsDropdown  = document.getElementById('guests-dropdown');
    const guestsDisplay   = document.getElementById('guests-display');
    const guestsHiddenVal = document.getElementById('guests-value');
    const guestsChevron   = document.getElementById('guests-chevron');

    function openGuestsDropdown() {
        closeCalendar();
        guestsDropdown.classList.remove('hidden');
        guestsTrigger.classList.add('active');
        guestsChevron.classList.add('rotated');
    }
    function closeGuestsDropdown() {
        guestsDropdown.classList.add('hidden');
        guestsTrigger.classList.remove('active');
        guestsChevron.classList.remove('rotated');
    }

    guestsTrigger && guestsTrigger.addEventListener('click', () => {
        guestsDropdown.classList.contains('hidden') ? openGuestsDropdown() : closeGuestsDropdown();
    });
    guestsTrigger && guestsTrigger.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openGuestsDropdown(); }
    });

    document.querySelectorAll('.kgz-guest-option').forEach(option => {
        option.addEventListener('click', () => {
            const val = option.dataset.value;
            guestsDisplay.textContent = val;
            guestsHiddenVal.value = val;
            document.querySelectorAll('.kgz-guest-option').forEach(o => {
                o.classList.remove('kgz-guest-selected');
                o.querySelector('.kgz-guest-check').classList.add('hidden');
            });
            option.classList.add('kgz-guest-selected');
            option.querySelector('.kgz-guest-check').classList.remove('hidden');
            closeGuestsDropdown();
        });
        option.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); option.click(); }
        });
    });

    // Close guests on outside click
    document.addEventListener('click', e => {
        const gw = document.getElementById('guests-wrapper');
        if (gw && !guestsDropdown.classList.contains('hidden') && !gw.contains(e.target)) {
            closeGuestsDropdown();
        }
    });

    // ============================================================
    // ✅ SELECT YOUR ROOM BUTTON
    // ============================================================
    const selectRoomBtn   = document.getElementById('select-room-btn');
    const bookingErrorDiv = document.getElementById('booking-error');
    const bookingErrorText = document.getElementById('booking-error-text');

    function showError(msg) {
        bookingErrorDiv.classList.remove('hidden');
        bookingErrorText.textContent = msg;
        setTimeout(() => bookingErrorDiv.classList.add('hidden'), 4000);
    }

    selectRoomBtn && selectRoomBtn.addEventListener('click', function () {
        if (!selectedCheckin) {
            showError('Please select a Check-In date.');
            openCalendar('checkin');
            return;
        }
        if (!selectedCheckout) {
            showError('Please select a Check-Out date.');
            openCalendar('checkout');
            return;
        }
        if (selectedCheckout <= selectedCheckin) {
            showError('Check-Out date must be after Check-In date.');
            openCalendar('checkout');
            return;
        }

        const guests  = guestsHiddenVal ? guestsHiddenVal.value : '2 Adults';
        const diffTime = selectedCheckout - selectedCheckin;
        const nights  = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        const summaryBar = document.getElementById('dates-summary-bar');
        document.getElementById('summary-checkin').textContent  = formatDate(selectedCheckin);
        document.getElementById('summary-checkout').textContent = formatDate(selectedCheckout);
        document.getElementById('summary-nights').textContent   = nights + (nights === 1 ? ' Night' : ' Nights');
        document.getElementById('summary-guests').textContent   = guests;
        summaryBar && summaryBar.classList.remove('hidden');

        const checkinISO  = formatISO(selectedCheckin);
        const checkoutISO = formatISO(selectedCheckout);
        const params = `?checkin=${checkinISO}&checkout=${checkoutISO}&guests=${encodeURIComponent(guests)}`;

        document.querySelectorAll('.room-link').forEach(link => {
            link.href = link.href.split('?')[0] + params;
        });

        const roomsSection = document.getElementById('rooms');
        if (roomsSection) {
            const top = roomsSection.getBoundingClientRect().top + window.pageYOffset - (getNavbarHeight() + 16);
            window.scrollTo({ top, behavior: 'smooth' });
        }

        // ── Show Recommended Badge based on guests ────────────────
        const guestToRoom = {
            '1 Adult':      'double',
            '2 Adults':     'double',
            '3 Adults':     'triple',
            'Family (4+)':  'family',
        };

        const recommendedKey = guestToRoom[guests] || 'double';

        // Hide all badges & remove lift class first
        ['double', 'triple', 'family'].forEach(key => {
            const badge = document.getElementById('badge-' + key);
            const card  = document.getElementById('room-' + key);
            if (badge) badge.classList.add('hidden');
            if (card)  card.classList.remove('is-recommended');
        });

        // Show the correct badge after a short delay (after scroll lands)
        setTimeout(() => {
            const badge = document.getElementById('badge-' + recommendedKey);
            const card  = document.getElementById('room-' + recommendedKey);
            if (badge) badge.classList.remove('hidden');
            if (card)  card.classList.add('is-recommended');
        }, 700);
    });

    // Close all on Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') { closeCalendar(); closeGuestsDropdown(); }
    });

}); // END DOMContentLoaded
</script>
@endsection