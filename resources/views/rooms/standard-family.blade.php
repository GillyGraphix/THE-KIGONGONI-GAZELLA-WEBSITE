@extends('layouts.app')

@section('content')

{{-- ── READ DATE PARAMS FROM URL ────────────────────────────── --}}
@php
    $checkin  = request('checkin', '');
    $checkout = request('checkout', '');
    $guests   = request('guests', 'Family (4+)');

    $checkinFormatted  = $checkin  ? \Carbon\Carbon::parse($checkin)->format('D, d M Y')  : null;
    $checkoutFormatted = $checkout ? \Carbon\Carbon::parse($checkout)->format('D, d M Y') : null;

    $nights = 0;
    if ($checkin && $checkout) {
        $nights = \Carbon\Carbon::parse($checkin)->diffInDays(\Carbon\Carbon::parse($checkout));
    }

    $bookingParams = http_build_query([
        'checkin'    => $checkin,
        'checkout'   => $checkout,
        'guests'     => $guests,
        'room_type'  => 'Standard Family Room',
        'room_price' => 100,
    ]);
@endphp

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
<div class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">
            <a href="/" class="hover:text-kigongoniOrange transition">{{ __('Home') }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="/#rooms" class="hover:text-kigongoniOrange transition">{{ __('Accommodation') }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-kigongoniOrange">{{ __('Standard Family Room') }}</span>
        </nav>
    </div>
</div>

{{-- ============================================================
     MAIN CONTENT
============================================================ --}}
<div class="bg-white dark:bg-gray-900 transition-colors duration-300 min-h-screen">
    <div class="container mx-auto px-4 py-12 max-w-7xl">

        {{-- ── DATES ALREADY SELECTED BANNER ─────────────────────── --}}
        @if($checkinFormatted && $checkoutFormatted)
        <div class="mb-8 bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 border border-kigongoniBlue/20 dark:border-kigongoniBlue/40 rounded-2xl px-6 py-4 flex flex-wrap items-center justify-between gap-4" data-aos="fade-down">
            <div class="flex flex-wrap items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-kigongoniBlue flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">{{ __('Check-In') }}</p>
                        <p class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkinFormatted }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-kigongoniOrange flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">{{ __('Check-Out') }}</p>
                        <p class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkoutFormatted }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-emerald-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">{{ __('Guests') }}</p>
                        <p class="text-sm font-black text-kigongoniBlue dark:text-white">{{ __($guests) }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-1.5 bg-kigongoniOrange/10 border border-kigongoniOrange/30 rounded-full px-4 py-1.5">
                    <svg class="w-3.5 h-3.5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <span class="text-xs font-black text-kigongoniOrange">{{ $nights }} {{ $nights > 1 ? __('Nights') : __('Night') }}</span>
                </div>
            </div>
            <button type="button" onclick="toggleInlineCal()" class="text-xs font-black text-kigongoniOrange hover:underline uppercase tracking-widest flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                {{ __('Change Dates') }}
            </button>
        </div>
        @endif

        {{-- ── INLINE CHANGE-DATES CALENDAR ────────────────────── --}}
        <div id="inline-cal-panel" class="hidden mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-kigongoniOrange/30 dark:border-kigongoniOrange/40 overflow-hidden">
                <div class="bg-kigongoniBlue px-6 py-4 flex items-center justify-between">
                    <div>
                        <p class="text-kigongoniOrange text-[10px] font-black uppercase tracking-[0.3em] mb-0.5">{{ __('Select New Dates') }}</p>
                        <h3 class="text-white font-black uppercase text-sm tracking-wide">{{ __('Standard Family Room') }}</h3>
                    </div>
                    <button type="button" onclick="toggleInlineCal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-8 items-start">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <button type="button" id="inline-cal-prev" class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-kigongoniOrange hover:text-white flex items-center justify-center transition text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <span id="inline-cal-title" class="text-sm font-black text-kigongoniBlue dark:text-white uppercase tracking-wide"></span>
                                <button type="button" id="inline-cal-next" class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-kigongoniOrange hover:text-white flex items-center justify-center transition text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-7 mb-1">
                                @foreach(['Su','Mo','Tu','We','Th','Fr','Sa'] as $d)
                                <div class="text-center text-[9px] font-black text-gray-400 uppercase py-1">{{ __($d) }}</div>
                                @endforeach
                            </div>
                            <div id="inline-cal-grid" class="grid grid-cols-7 gap-1"></div>
                            <div class="flex gap-4 mt-3 px-1">
                                <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500"><span class="w-3 h-3 rounded-sm bg-kigongoniBlue/10 border border-kigongoniBlue/40 inline-block"></span> {{ __('Low') }} $100</div>
                                <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange/20 border border-kigongoniOrange/50 inline-block"></span> {{ __('High') }} $140</div>
                                <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange inline-block"></span> {{ __('Selected') }}</div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 space-y-3 border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Check-In') }}</span><span id="inline-checkin-display" class="text-sm font-black text-kigongoniBlue dark:text-white">— {{ __('Select date') }}</span></div>
                                <div class="w-full h-px bg-gray-100 dark:bg-gray-600"></div>
                                <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Check-Out') }}</span><span id="inline-checkout-display" class="text-sm font-black text-kigongoniBlue dark:text-white">— {{ __('Select date') }}</span></div>
                                <div class="w-full h-px bg-gray-100 dark:bg-gray-600"></div>
                                <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Nights') }}</span><span id="inline-nights-display" class="text-sm font-black text-kigongoniOrange">—</span></div>
                                <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Total') }}</span><span id="inline-total-display" class="text-lg font-black text-kigongoniOrange">—</span></div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-kigongoniBlue dark:text-gray-400 uppercase mb-2 tracking-wider">{{ __('Guests') }}</label>
                                <select id="inline-guests" class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-xl p-3 focus:ring-2 focus:ring-kigongoniOrange focus:outline-none transition text-sm cursor-pointer font-bold">
                                    <option value="1 Adult">{{ __('1 Adult') }}</option>
                                    <option value="2 Adults">{{ __('2 Adults') }}</option>
                                    <option value="3 Adults">{{ __('3 Adults') }}</option>
                                    <option value="Family (4+)" selected>{{ __('Family (4+)') }}</option>
                                </select>
                            </div>
                            <p id="inline-mode-label" class="text-center text-xs font-black text-kigongoniOrange uppercase tracking-widest bg-kigongoniOrange/8 rounded-lg py-2">{{ __('Select your check-in date') }}</p>
                            <button type="button" id="inline-confirm-btn"
                                class="w-full flex items-center justify-center gap-2 bg-kigongoniOrange text-white font-black py-4 rounded-xl hover:bg-kigongoniBlue transition duration-300 uppercase tracking-widest text-sm shadow-lg opacity-50 cursor-not-allowed"
                                disabled>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ __('Confirm New Dates') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================================
             TOP HERO BANNER
        ============================================================ --}}
        <div class="relative rounded-3xl overflow-hidden mb-10 shadow-2xl" data-aos="fade-up">
            <div class="absolute inset-0">
                <img src="{{ asset('images/rooms/standard-family/main.jpg') }}"
                     onerror="this.src='https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1400&q=80'"
                     alt="" class="w-full h-full object-cover object-center scale-105"
                     style="filter: brightness(0.55) saturate(1.2);">
            </div>
            <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(0,0,0,0.60) 0%, rgba(0,0,0,0.20) 50%, rgba(0,0,0,0.55) 100%);"></div>
            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-transparent via-kigongoniOrange to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-64 h-32 opacity-20" style="background: radial-gradient(ellipse at bottom left, rgba(239,74,37,0.8) 0%, transparent 70%);"></div>

            <div class="relative z-10 p-8 md:p-10">
                <div class="flex flex-col lg:flex-row lg:items-stretch gap-6">

                    {{-- LEFT --}}
                    <div class="flex-1 rounded-2xl p-6 flex flex-col justify-between gap-6"
                         style="background: rgba(255,255,255,0.08); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.18); box-shadow: 0 8px 32px rgba(0,0,0,0.2);">
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="h-px w-8 bg-kigongoniOrange"></div>
                                <span class="text-kigongoniOrange text-xs font-black uppercase tracking-[0.3em]">{{ __('Accommodation') }} </span>
                            </div>
                            <h1 class="text-5xl md:text-6xl font-black text-white uppercase tracking-tight leading-none mb-5">
                                {{ __('Standard') }}<br>
                                <span class="text-kigongoniOrange" style="text-shadow: 0 0 40px rgba(239,74,37,0.5);">{{ __('Family Room') }}</span>
                            </h1>
                            <div class="flex flex-wrap gap-2 mb-5">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border border-green-400/40 text-green-300" style="background: rgba(74,222,128,0.12); backdrop-filter: blur(8px);">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse inline-block"></span>{{ __('Available Now') }}
                                </span>
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border border-white/20 text-white/80" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ __('Max 4 Guests') }}
                                </span>
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border border-white/20 text-white/80" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                    ~45 m²
                                </span>
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border border-white/20 text-white/80" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    {{ __('Breakfast Included') }}
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 pt-4 border-t border-white/10">
                            @foreach([
                                ['A/C',       'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                                ['Wi-Fi',     'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0'],
                                ['TV',        'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                                ['Shower',    'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                                ['Net',       'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                                ['Breakfast', 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
                                ['Wardrobe',  'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
                                ['Laundry',   'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                                ['Ext. Cable','M9 3v4m6-4v4M7 7h10v3a5 5 0 01-10 0V7z m5 5v9'],
                            ] as [$label, $path])
                            <div class="flex flex-col items-center gap-1.5">
                                <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2);">
                                    <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/></svg>
                                </div>
                                <span class="text-[9px] text-white/60 font-bold uppercase tracking-wide">{{ __($label) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- RIGHT: Pricing glass card --}}
                    <div class="flex-shrink-0 lg:w-80 rounded-2xl p-6 flex flex-col gap-4"
                         style="background: rgba(255,255,255,0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.22); box-shadow: 0 8px 32px rgba(0,0,0,0.25);">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white/40 text-[10px] font-black uppercase tracking-[0.3em] mb-0.5">{{ __('Starting From') }}</p>
                                <div class="flex items-start gap-0.5">
                                    <span class="text-kigongoniOrange text-xl font-black mt-1.5">$</span>
                                    <span id="price-display" class="text-white font-black leading-none drop-shadow-lg" style="font-size:64px;line-height:1;">100</span>
                                </div>
                                <p class="text-white/40 text-[10px] uppercase tracking-widest font-bold mt-0.5">{{ __('Per Night · Incl. Breakfast') }}</p>
                            </div>
                            <div class="w-16 h-16 rounded-2xl flex flex-col items-center justify-center flex-shrink-0"
                                 style="background: rgba(239,74,37,0.2); border: 1px solid rgba(239,74,37,0.4); backdrop-filter: blur(8px);">
                                <svg class="w-7 h-7 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                <span class="text-kigongoniOrange text-[9px] font-black uppercase mt-0.5">{{ __('Room') }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="rounded-xl p-3" style="background: rgba(96,165,250,0.12); border: 1px solid rgba(96,165,250,0.3); backdrop-filter: blur(8px);">
                                <div class="flex items-center gap-1.5 mb-1.5"><div class="w-2 h-2 rounded-full bg-blue-400"></div><p class="text-blue-300 text-[10px] font-black uppercase tracking-wide">{{ __('Low Season') }}</p></div>
                                <p class="text-white font-black text-xl leading-none">$100</p>
                                <p class="text-white/30 text-[9px] font-bold mt-0.5">{{ __('Jan 1 — Apr 30') }}</p>
                            </div>
                            <div class="rounded-xl p-3" style="background: rgba(239,74,37,0.15); border: 1px solid rgba(239,74,37,0.4); backdrop-filter: blur(8px);">
                                <div class="flex items-center gap-1.5 mb-1.5"><div class="w-2 h-2 rounded-full bg-kigongoniOrange"></div><p class="text-kigongoniOrange text-[10px] font-black uppercase tracking-wide">{{ __('High Season') }}</p></div>
                                <p class="text-kigongoniOrange font-black text-xl leading-none">$140</p>
                                <p class="text-white/30 text-[9px] font-bold mt-0.5">{{ __('May 1 — Dec 31') }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex items-center gap-2 rounded-lg px-3 py-2" style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"><svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="text-white/70 text-[10px] font-bold uppercase leading-tight">{{ __('Free Cancel') }}</span></div>
                            <div class="flex items-center gap-2 rounded-lg px-3 py-2" style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"><svg class="w-4 h-4 text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg><span class="text-white/70 text-[10px] font-bold uppercase leading-tight">{{ __('Breakfast Incl.') }}</span></div>
                            <div class="flex items-center gap-2 rounded-lg px-3 py-2" style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"><svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="text-white/70 text-[10px] font-bold uppercase leading-tight">{{ __('24/7 Support') }}</span></div>
                            <div class="flex items-center gap-2 rounded-lg px-3 py-2" style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"><svg class="w-4 h-4 text-orange-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg><span class="text-white/70 text-[10px] font-bold uppercase leading-tight">{{ __('Mto wa Mbu') }}</span></div>
                        </div>
                        <div class="flex flex-col gap-2 mt-auto">
                            @if($checkinFormatted && $checkoutFormatted)
                                <a href="{{ route('booking.checkout', 3) }}?{{ $bookingParams }}"
                                   class="flex items-center justify-center gap-2 bg-kigongoniOrange text-white font-black py-3.5 rounded-xl hover:bg-white hover:text-kigongoniOrange transition duration-300 uppercase tracking-widest text-xs shadow-xl border-2 border-transparent hover:border-kigongoniOrange w-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ __('Book Now') }} — {{ $nights }} {{ $nights > 1 ? __('Nights') : __('Night') }}
                                </a>
                            @else
                                <a href="#booking-calendar"
                                   class="flex items-center justify-center gap-2 bg-kigongoniOrange text-white font-black py-3.5 rounded-xl hover:bg-white hover:text-kigongoniOrange transition duration-300 uppercase tracking-widest text-xs shadow-xl border-2 border-transparent hover:border-kigongoniOrange w-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ __('Select Your Dates') }}
                                </a>
                            @endif
                            <a href="https://wa.me/255768219703?text={{ urlencode(__('Hello, I would like to book the Standard Family room')) }}" target="_blank"
                               class="flex items-center justify-center gap-2 font-black py-3 rounded-xl hover:bg-green-500/30 hover:border-green-400/60 hover:text-green-300 transition duration-300 uppercase tracking-widest text-xs w-full text-white/70"
                               style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.2);">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.025.507 3.933 1.395 5.61L.057 23.882l6.396-1.315A11.949 11.949 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.784 9.784 0 01-5.031-1.388l-.361-.214-3.735.768.793-3.635-.235-.374A9.773 9.773 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
                                {{ __('WhatsApp Us') }}
                            </a>
                        </div>
                        <p id="season-note" class="text-center text-white/30 text-[10px] font-black uppercase tracking-widest"></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ ABOUT THIS ROOM ============ --}}
        <div class="mb-10" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-4"><div class="w-8 h-1 bg-kigongoniOrange rounded-full"></div><h2 class="text-xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('About This Room') }}</h2></div>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-base">{{ __('The Standard Family Room at Kigongoni Gazella Hotel is our most spacious standard offering — a warm, generously sized retreat designed for families of up to four guests. Featuring two comfortable double beds, this room gives every family member their own space to relax after an unforgettable day on safari.') }}</p>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-base mt-4">{{ __('At approximately 45 m², there is plenty of room for everyone to unwind, unpack, and feel truly at home. Whether you are exploring the Serengeti, Lake Manyara, or the Ngorongoro Crater, this family room is your perfect Tanzanian home away from home — comfortable, welcoming, and full of warmth.') }}</p>
        </div>

        {{-- ============ GALLERY ============ --}}
        <div class="grid grid-cols-4 grid-rows-2 gap-3 h-[420px] md:h-[500px] mb-12 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="col-span-4 md:col-span-2 md:row-span-2 relative overflow-hidden group cursor-pointer" onclick="openLightbox(0)">
                <img src="{{ asset('images/rooms/standard-family/main.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1000&q=80'" alt="{{ __('Main View') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition duration-300 flex items-center justify-center"><svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition duration-300 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div>
                <div class="absolute bottom-4 left-4 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">{{ __('Main View') }}</div>
            </div>
            <div class="col-span-2 md:col-span-1 relative overflow-hidden group cursor-pointer" onclick="openLightbox(1)">
                <img src="{{ asset('images/rooms/standard-family/bathroom.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=600&q=80'" alt="{{ __('Bathroom') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition duration-300"></div>
                <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">{{ __('Bathroom') }}</div>
            </div>
            <div class="col-span-2 md:col-span-1 relative overflow-hidden group cursor-pointer" onclick="openLightbox(2)">
                <img src="{{ asset('images/rooms/standard-family/desk.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=600&q=80'" alt="{{ __('Desk Area') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition duration-300"></div>
                <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">{{ __('Desk Area') }}</div>
            </div>
            <div class="col-span-2 md:col-span-1 relative overflow-hidden group cursor-pointer" onclick="openLightbox(3)">
                <img src="{{ asset('images/rooms/standard-family/view.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=600&q=80'" alt="{{ __('Room View') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition duration-300"></div>
                <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">{{ __('Room View') }}</div>
            </div>
            <div class="col-span-2 md:col-span-1 relative overflow-hidden group cursor-pointer" onclick="openLightbox(4)">
                <img src="{{ asset('images/rooms/standard-family/window.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1595599872002-9154efcf5b8e?auto=format&fit=crop&w=600&q=80'" alt="{{ __('Window') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition duration-300 flex items-center justify-center"><span class="text-white text-sm font-black opacity-0 group-hover:opacity-100 uppercase tracking-widest drop-shadow-lg">{{ __('See All') }}</span></div>
                <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">{{ __('Window') }}</div>
            </div>
        </div>

        {{-- ============ DETAILS + AMENITIES ============ --}}
        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            <div class="lg:col-span-2 space-y-8">

                {{-- Amenities --}}
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-3 mb-5"><div class="w-8 h-1 bg-kigongoniOrange rounded-full"></div><h2 class="text-xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Room Amenities') }}</h2></div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach([
                            ['Air Conditioning','M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                            ['Free Wi-Fi','M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0'],
                            ['Flat Screen TV','M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                            ['Hot Shower','M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                            ['Breakfast Incl.','M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
                            ['Mosquito Net','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                            ['Wardrobe','M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
                            ['Solar Power Backup','M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z'],
                            ['Electric Kettle','M4 19h16M7 19v-2a4 4 0 014-4h2a4 4 0 014 4v2M9 11V7m4 4V5m4 6V8'],
                            ['Laundry (Extra Fee)','M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                            ['Extension Cable','M9 3v4m6-4v4M7 7h10v3a5 5 0 01-10 0V7z m5 5v9'],
                            ['2 Double Beds','M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        ] as [$name, $path])
                        <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 hover:border-kigongoniOrange transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-kigongoniOrange/10 flex items-center justify-center flex-shrink-0 group-hover:bg-kigongoniOrange/20 transition">
                                <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/></svg>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ __($name) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Room Details --}}
                <div data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center gap-3 mb-5"><div class="w-8 h-1 bg-kigongoniOrange rounded-full"></div><h2 class="text-xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Room Details') }}</h2></div>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                        <table class="w-full text-sm">
                            <tbody>
                                <tr class="border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50"><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs w-40">{{ __('Room Size') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white">~45 m²</td></tr>
                                <tr class="border-b border-gray-100 dark:border-gray-700"><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs">{{ __('Bed Type') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white">{{ __('2 Double Beds (Queen/King)') }}</td></tr>
                                <tr class="border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50"><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs">{{ __('Max Guests') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white">{{ __('4 Adults') }}</td></tr>
                                <tr class="border-b border-gray-100 dark:border-gray-700"><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs">{{ __('Check-In') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white">{{ __('From 2:00 PM') }}</td></tr>
                                <tr class="border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50"><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs">{{ __('Check-Out') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white">{{ __('By 11:00 AM') }}</td></tr>
                                <tr><td class="px-5 py-3.5 font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-xs">{{ __('Smoking') }}</td><td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-white"><span class="inline-flex items-center gap-1.5 text-red-600 dark:text-red-400"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>{{ __('Not Permitted') }}</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Policies --}}
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-3 mb-5"><div class="w-8 h-1 bg-kigongoniOrange rounded-full"></div><h2 class="text-xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Policies') }}</h2></div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="flex gap-3 p-4 bg-green-50 dark:bg-green-900/10 rounded-xl border border-green-100 dark:border-green-800"><svg class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><div><p class="text-xs font-black text-green-700 dark:text-green-400 uppercase tracking-wider mb-1">{{ __('Free Cancellation') }}</p><p class="text-xs text-gray-600 dark:text-gray-400">{{ __('Cancel up to 48 hours before arrival at no charge.') }}</p></div></div>
                        <div class="flex gap-3 p-4 bg-blue-50 dark:bg-blue-900/10 rounded-xl border border-blue-100 dark:border-blue-800"><svg class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><div><p class="text-xs font-black text-blue-700 dark:text-blue-400 uppercase tracking-wider mb-1">{{ __('Breakfast Included') }}</p><p class="text-xs text-gray-600 dark:text-gray-400">{{ __('Complimentary breakfast served daily 7:00 AM – 10:00 AM.') }}</p></div></div>
                        <div class="flex gap-3 p-4 bg-orange-50 dark:bg-orange-900/10 rounded-xl border border-orange-100 dark:border-orange-800"><svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg><div><p class="text-xs font-black text-kigongoniOrange uppercase tracking-wider mb-1">{{ __('24/7 Front Desk') }}</p><p class="text-xs text-gray-600 dark:text-gray-400">{{ __('Our team is available around the clock for your needs.') }}</p></div></div>
                        <div class="flex gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700"><svg class="w-5 h-5 text-gray-500 dark:text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg><div><p class="text-xs font-black text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-1">{{ __('Payment') }}</p><p class="text-xs text-gray-600 dark:text-gray-400">{{ __('Cash & mobile payments accepted at check-in.') }}</p></div></div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Sticky Booking Card (desktop) --}}
            <div class="hidden lg:block">
                <div id="booking-calendar" class="sticky top-28 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden" data-aos="fade-left">
                    <div class="bg-kigongoniBlue dark:bg-gray-900 p-5 text-white">
                        <p class="text-xs font-black uppercase tracking-[0.3em] text-kigongoniOrange mb-1">{{ __('Book This Room') }}</p>
                        <h3 class="text-xl font-black uppercase">{{ __('Standard Family') }}</h3>
                    </div>
                    <div class="p-4">
                        @if($checkinFormatted && $checkoutFormatted)
                        <div class="mb-4 bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 rounded-xl p-4 space-y-2.5 border border-kigongoniBlue/15 dark:border-kigongoniBlue/30">
                            <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Check-In') }}</span><span class="text-xs font-black text-kigongoniBlue dark:text-white">{{ $checkinFormatted }}</span></div>
                            <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Check-Out') }}</span><span class="text-xs font-black text-kigongoniBlue dark:text-white">{{ $checkoutFormatted }}</span></div>
                            <div class="flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Guests') }}</span><span class="text-xs font-black text-kigongoniBlue dark:text-white">{{ __($guests) }}</span></div>
                            <div class="border-t border-kigongoniBlue/10 dark:border-kigongoniBlue/30 pt-2.5 flex justify-between items-center"><span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Nights') }}</span><span class="text-sm font-black text-kigongoniOrange">{{ $nights }} {{ $nights > 1 ? __('nights') : __('night') }}</span></div>
                        </div>
                        <a href="{{ route('booking.checkout', 3) }}?{{ $bookingParams }}"
                           class="w-full flex items-center justify-center gap-2 bg-kigongoniOrange text-white font-black py-3.5 rounded-xl hover:bg-kigongoniBlue transition duration-300 uppercase tracking-widest text-xs shadow-lg mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ __('Confirm Booking') }}
                        </a>
                        @else
                        <div class="flex items-center justify-between mb-3">
                            <button id="cal-prev" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-600 dark:text-gray-300"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
                            <span id="cal-title" class="text-sm font-black text-kigongoniBlue dark:text-white uppercase tracking-wide"></span>
                            <button id="cal-next" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-600 dark:text-gray-300"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
                        </div>
                        <div class="grid grid-cols-7 mb-1">
                            @foreach(['Su','Mo','Tu','We','Th','Fr','Sa'] as $d)
                            <div class="text-center text-[9px] font-black text-gray-400 uppercase py-1">{{ __($d) }}</div>
                            @endforeach
                        </div>
                        <div id="cal-grid" class="grid grid-cols-7 gap-0.5"></div>
                        <div class="flex gap-3 my-3 px-1">
                            <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniBlue/10 border border-kigongoniBlue/40 inline-block"></span> {{ __('Low') }} $100</div>
                            <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange/20 border border-kigongoniOrange/50 inline-block"></span> {{ __('High') }} $140</div>
                            <div class="flex items-center gap-1.5 text-[10px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange inline-block"></span> {{ __('Selected') }}</div>
                        </div>
                        <div id="date-summary" class="hidden bg-gray-50 dark:bg-gray-700/50 rounded-xl p-3 mb-3 text-xs">
                            <div class="flex justify-between mb-1"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Check-In') }}</span><span id="summary-checkin" class="font-black text-kigongoniBlue dark:text-white">—</span></div>
                            <div class="flex justify-between mb-1"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Check-Out') }}</span><span id="summary-checkout" class="font-black text-kigongoniBlue dark:text-white">—</span></div>
                            <div class="border-t border-gray-200 dark:border-gray-600 mt-2 pt-2 flex justify-between"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Total') }}</span><span id="summary-total" class="font-black text-kigongoniOrange text-base">—</span></div>
                        </div>
                        <div class="mb-3">
                            <label class="block text-xs font-bold text-kigongoniBlue dark:text-gray-400 uppercase mb-1.5 tracking-wider">{{ __('Guests') }}</label>
                            <select id="cal-guests" class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-lg p-2.5 focus:ring-2 focus:ring-kigongoniOrange focus:outline-none transition text-sm cursor-pointer">
                                <option value="1 Adult">{{ __('1 Adult') }}</option>
                                <option value="2 Adults">{{ __('2 Adults') }}</option>
                                <option value="3 Adults">{{ __('3 Adults') }}</option>
                                <option value="Family (4+)" selected>{{ __('Family (4+)') }}</option>
                            </select>
                        </div>
                        <button id="cal-book-btn" class="w-full bg-kigongoniOrange text-white font-black py-3.5 rounded-xl hover:bg-kigongoniBlue transition duration-300 uppercase tracking-widest text-xs shadow-lg mb-3">{{ __('Check Availability') }}</button>
                        @endif
                        <div class="text-center">
                            <p class="text-[10px] text-gray-400 dark:text-gray-500">{{ __('Or call us directly') }}</p>
                            <a href="tel:+255768219703" class="text-kigongoniBlue dark:text-kigongoniOrange font-black text-sm hover:text-kigongoniOrange transition">+255 768 219 703</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ MOBILE BOOKING CARD ============ --}}
        <div class="block lg:hidden mb-10" data-aos="fade-up">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="bg-kigongoniBlue dark:bg-gray-900 p-5 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.3em] text-kigongoniOrange mb-1">{{ __('Book This Room') }}</p>
                    <h3 class="text-xl font-black uppercase">{{ __('Standard Family Room') }}</h3>
                </div>
                <div class="p-4">
                    @if($checkinFormatted && $checkoutFormatted)
                    <div class="mb-4 bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 rounded-xl p-4 space-y-2.5 border border-kigongoniBlue/15 dark:border-kigongoniBlue/30">
                        <div class="flex justify-between items-center"><span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ __('Check-In') }}</span><span class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkinFormatted }}</span></div>
                        <div class="flex justify-between items-center"><span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ __('Check-Out') }}</span><span class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkoutFormatted }}</span></div>
                        <div class="flex justify-between items-center"><span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ __('Guests') }}</span><span class="text-sm font-black text-kigongoniBlue dark:text-white">{{ __($guests) }}</span></div>
                        <div class="border-t border-kigongoniBlue/10 dark:border-kigongoniBlue/30 pt-2.5 flex justify-between items-center"><span class="text-sm font-bold text-gray-500 dark:text-gray-400">{{ __('Nights') }}</span><span class="text-base font-black text-kigongoniOrange">{{ $nights }} {{ $nights > 1 ? __('nights') : __('night') }}</span></div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('booking.checkout', 3) }}?{{ $bookingParams }}"
                           class="w-full flex items-center justify-center gap-2 bg-kigongoniOrange text-white font-black py-4 rounded-xl hover:bg-kigongoniBlue transition duration-300 uppercase tracking-widest text-sm shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ __('Confirm Booking') }}
                        </a>
                    </div>
                    @else
                    <div class="flex items-center justify-between mb-3">
                        <button id="cal-prev-mob" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-600 dark:text-gray-300"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
                        <span id="cal-title-mob" class="text-sm font-black text-kigongoniBlue dark:text-white uppercase tracking-wide"></span>
                        <button id="cal-next-mob" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-600 dark:text-gray-300"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
                    </div>
                    <div class="grid grid-cols-7 mb-1">
                        @foreach(['Su','Mo','Tu','We','Th','Fr','Sa'] as $day)
                        <div class="text-center text-[10px] font-black text-gray-400 uppercase py-1">{{ __($day) }}</div>
                        @endforeach
                    </div>
                    <div id="cal-grid-mob" class="grid grid-cols-7 gap-1 mb-4"></div>
                    <div class="flex flex-wrap gap-4 mb-4 px-1">
                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniBlue/10 border border-kigongoniBlue/40 inline-block"></span> {{ __('Low') }} $100</div>
                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange/20 border border-kigongoniOrange/50 inline-block"></span> {{ __('High') }} $140</div>
                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-gray-500 dark:text-gray-400"><span class="w-3 h-3 rounded-sm bg-kigongoniOrange inline-block"></span> {{ __('Selected') }}</div>
                    </div>
                    <div id="date-summary-mob" class="hidden bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 mb-4 text-sm">
                        <div class="flex justify-between mb-2"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Check-In') }}</span><span id="summary-checkin-mob" class="font-black text-kigongoniBlue dark:text-white">—</span></div>
                        <div class="flex justify-between mb-2"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Check-Out') }}</span><span id="summary-checkout-mob" class="font-black text-kigongoniBlue dark:text-white">—</span></div>
                        <div class="border-t border-gray-200 dark:border-gray-600 mt-2 pt-3 flex justify-between items-center"><span class="text-gray-500 dark:text-gray-400 font-semibold">{{ __('Total') }}</span><span id="summary-total-mob" class="font-black text-kigongoniOrange text-lg">—</span></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-kigongoniBlue dark:text-gray-400 uppercase mb-2 tracking-wider">{{ __('Guests') }}</label>
                        <select id="cal-guests-mob" class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-xl p-3 focus:ring-2 focus:ring-kigongoniOrange focus:outline-none transition text-sm cursor-pointer">
                            <option value="1 Adult">{{ __('1 Adult') }}</option>
                            <option value="2 Adults">{{ __('2 Adults') }}</option>
                            <option value="3 Adults">{{ __('3 Adults') }}</option>
                            <option value="Family (4+)" selected>{{ __('Family (4+)') }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button id="cal-book-btn-mob" class="w-full bg-kigongoniOrange text-white font-black py-4 rounded-xl hover:bg-kigongoniBlue transition duration-300 uppercase tracking-widest text-sm shadow-lg">{{ __('Check Availability') }}</button>
                        <a href="https://wa.me/255768219703?text={{ urlencode(__('Hello, I would like to book the Standard Family room')) }}" target="_blank"
                           class="w-full flex items-center justify-center gap-2 bg-green-500/10 border border-green-500/30 text-green-700 dark:text-green-400 font-black py-3.5 rounded-xl hover:bg-green-500/20 transition duration-300 uppercase tracking-widest text-sm">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.025.507 3.933 1.395 5.61L.057 23.882l6.396-1.315A11.949 11.949 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.784 9.784 0 01-5.031-1.388l-.361-.214-3.735.768.793-3.635-.235-.374A9.773 9.773 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
                            {{ __('WhatsApp Us') }}
                        </a>
                        <div class="text-center pt-1">
                            <p class="text-[11px] text-gray-400 dark:text-gray-500 mb-1">{{ __('Or call us directly') }}</p>
                            <a href="tel:+255768219703" class="text-kigongoniBlue dark:text-kigongoniOrange font-black text-base hover:text-kigongoniOrange transition">+255 768 219 703</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ============ BACK BUTTON ============ --}}
        <div class="border-t border-gray-100 dark:border-gray-700 pt-8 flex items-center justify-start" data-aos="fade-up">
            <a href="/#rooms" class="inline-flex items-center gap-2 text-kigongoniBlue dark:text-gray-400 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange font-bold text-sm uppercase tracking-widest transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                {{ __('Back to All Rooms') }}
            </a>
        </div>
    </div>
</div>

{{-- LIGHTBOX --}}
<div id="lightbox" class="fixed inset-0 bg-black/95 z-[100] hidden flex items-center justify-center p-4" onclick="closeLightbox(event)">
    <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white/70 hover:text-white transition"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
    <button onclick="prevImage()" class="absolute left-4 text-white/70 hover:text-white transition"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"/></svg></button>
    <img id="lightbox-img" src="" alt="" class="max-h-[85vh] max-w-[90vw] rounded-xl object-contain shadow-2xl" onclick="event.stopPropagation()">
    <button onclick="nextImage()" class="absolute right-4 text-white/70 hover:text-white transition"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/></svg></button>
    <div id="lightbox-counter" class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/60 text-sm font-bold uppercase tracking-widest"></div>
</div>

@endsection

@section('scripts')
<script>
const checkoutRoute = "{{ route('booking.checkout', 3) }}";

// ─── Season Pricing ──────────────────────────────────────────
const PRICES = { low: 100, high: 140 };

function getDayPrice(date) {
    const m = date.getMonth() + 1;
    return (m >= 1 && m <= 4) ? PRICES.low : PRICES.high;
}
function isLowSeason(date) {
    const m = date.getMonth() + 1;
    return m >= 1 && m <= 4;
}

(function() {
    const today = new Date();
    const low = isLowSeason(today);
    const priceEl = document.getElementById('price-display');
    if (priceEl) priceEl.textContent = low ? PRICES.low : PRICES.high;
    const noteEl = document.getElementById('season-note');
    if (noteEl) noteEl.textContent = low
        ? "🟦 {{ __('Low Season — Jan · Feb · Mar · Apr') }}"
        : "🟠 {{ __('High Season — May · Jun · Jul · Aug · Sep · Oct · Nov · Dec') }}";
})();

// ─── Sticky/Mobile Calendar ────────────────────────────────────
const monthNames = [
    "{{ __('January') }}", "{{ __('February') }}", "{{ __('March') }}", "{{ __('April') }}", 
    "{{ __('May') }}", "{{ __('June') }}", "{{ __('July') }}", "{{ __('August') }}", 
    "{{ __('September') }}", "{{ __('October') }}", "{{ __('November') }}", "{{ __('December') }}"
];
let calYear = new Date().getFullYear(), calMonth = new Date().getMonth();
let checkIn = null, checkOut = null, selectingCheckout = false;

function buildGrid(gridEl, isMobile) {
    if (!gridEl) return;
    gridEl.innerHTML = '';
    const firstDay = new Date(calYear, calMonth, 1).getDay();
    const daysInMonth = new Date(calYear, calMonth + 1, 0).getDate();
    const today = new Date(); today.setHours(0,0,0,0);
    for (let i = 0; i < firstDay; i++) gridEl.appendChild(document.createElement('div'));
    for (let d = 1; d <= daysInMonth; d++) {
        const date = new Date(calYear, calMonth, d); date.setHours(0,0,0,0);
        const price = getDayPrice(date), low = isLowSeason(date);
        const isPast = date < today;
        const isCI = checkIn && date.getTime() === checkIn.getTime();
        const isCO = checkOut && date.getTime() === checkOut.getTime();
        const isInRange = checkIn && checkOut && date > checkIn && date < checkOut;
        const cell = document.createElement('button'); cell.type = 'button'; cell.disabled = isPast;
        let base = isMobile ? 'relative flex flex-col items-center justify-center rounded-lg py-1.5 px-0.5 text-center transition duration-150 w-full ' : 'relative flex flex-col items-center justify-center rounded-lg py-1 px-0.5 text-center transition duration-150 ';
        if (isPast) base += 'opacity-30 cursor-not-allowed ';
        else if (isCI || isCO) base += 'bg-kigongoniOrange text-white shadow-md scale-105 z-10 ';
        else if (isInRange) base += 'bg-kigongoniOrange/30 text-kigongoniOrange dark:text-orange-300 border border-kigongoniOrange/50 ';
        else if (low) base += 'bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 hover:bg-kigongoniOrange/20 hover:border-kigongoniOrange text-gray-700 dark:text-gray-200 border border-kigongoniBlue/20 ';
        else base += 'bg-kigongoniOrange/5 dark:bg-kigongoniOrange/10 hover:bg-kigongoniOrange/20 hover:border-kigongoniOrange text-gray-700 dark:text-gray-200 border border-kigongoniOrange/20 ';
        cell.className = base;
        const pc = (isCI||isCO) ? 'text-white/90' : isInRange ? 'text-kigongoniOrange font-black' : (low ? 'text-kigongoniBlue dark:text-blue-300' : 'text-kigongoniOrange');
        const ns = isMobile ? 'text-[12px]' : 'text-[11px]', ps = isMobile ? 'text-[9px]' : 'text-[8px]';
        cell.innerHTML = `<span class="${ns} font-black leading-none">${d}</span><span class="${ps} font-bold leading-none mt-0.5 ${pc}">$${price}</span>`;
        if (!isPast) cell.addEventListener('click', () => onDayClick(date));
        gridEl.appendChild(cell);
    }
}

function renderCalendar() {
    const label = monthNames[calMonth] + ' ' + calYear;
    const tD = document.getElementById('cal-title'); if (tD) { tD.textContent = label; buildGrid(document.getElementById('cal-grid'), false); }
    const tM = document.getElementById('cal-title-mob'); if (tM) { tM.textContent = label; buildGrid(document.getElementById('cal-grid-mob'), true); }
}

function onDayClick(date) {
    const today = new Date(); today.setHours(0,0,0,0);
    if (date < today) return;
    if (!checkIn || (checkIn && checkOut)) { checkIn = date; checkOut = null; selectingCheckout = true; }
    else if (selectingCheckout) {
        if (date.getTime() === checkIn.getTime()) { checkIn = null; checkOut = null; selectingCheckout = false; }
        else if (date < checkIn) { checkIn = date; checkOut = null; }
        else { checkOut = date; selectingCheckout = false; updateSummary(); }
    }
    renderCalendar();
}

function updateSummary() {
    if (!checkIn || !checkOut) { ['date-summary','date-summary-mob'].forEach(id => document.getElementById(id)?.classList.add('hidden')); return; }
    const fmt = d => d.toLocaleDateString('en-GB', { day:'2-digit', month:'short', year:'numeric' });
    let total = 0; let cur = new Date(checkIn);
    while (cur < checkOut) { total += getDayPrice(cur); cur.setDate(cur.getDate() + 1); }
    const nights = Math.round((checkOut - checkIn) / 86400000);
    const totalStr = '$' + total + ' (' + nights + ' ' + (nights > 1 ? "{{ __('nights') }}" : "{{ __('night') }}") + ')';
    const sumD = document.getElementById('date-summary');
    if (sumD) { document.getElementById('summary-checkin').textContent = fmt(checkIn); document.getElementById('summary-checkout').textContent = fmt(checkOut); document.getElementById('summary-total').textContent = totalStr; sumD.classList.remove('hidden'); }
    const sumM = document.getElementById('date-summary-mob');
    if (sumM) { document.getElementById('summary-checkin-mob').textContent = fmt(checkIn); document.getElementById('summary-checkout-mob').textContent = fmt(checkOut); document.getElementById('summary-total-mob').textContent = totalStr; sumM.classList.remove('hidden'); }
}

document.getElementById('cal-prev')?.addEventListener('click', () => { calMonth--; if (calMonth < 0) { calMonth = 11; calYear--; } renderCalendar(); });
document.getElementById('cal-next')?.addEventListener('click', () => { calMonth++; if (calMonth > 11) { calMonth = 0; calYear++; } renderCalendar(); });
document.getElementById('cal-prev-mob')?.addEventListener('click', () => { calMonth--; if (calMonth < 0) { calMonth = 11; calYear--; } renderCalendar(); });
document.getElementById('cal-next-mob')?.addEventListener('click', () => { calMonth++; if (calMonth > 11) { calMonth = 0; calYear++; } renderCalendar(); });

function toISO(d) { return d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0'); }

function handleBookClick(guestsId) {
    if (!checkIn || !checkOut) { alert("{{ __('Please select check-in and check-out dates.') }}"); return; }
    const guests = document.getElementById(guestsId)?.value || 'Family (4+)';
    const params = new URLSearchParams({ checkin: toISO(checkIn), checkout: toISO(checkOut), guests, room_type: 'Standard Family Room', room_price: getDayPrice(checkIn) });
    window.location.href = checkoutRoute + '?' + params.toString();
}

document.getElementById('cal-book-btn')?.addEventListener('click', () => handleBookClick('cal-guests'));
document.getElementById('cal-book-btn-mob')?.addEventListener('click', () => handleBookClick('cal-guests-mob'));
renderCalendar();

// ─── Inline Change-Dates Calendar ─────────────────────────────
let inlineYear = new Date().getFullYear(), inlineMonth = new Date().getMonth();
let inlineCheckIn = null, inlineCheckOut = null, inlineSelectingOut = false;

function toggleInlineCal() {
    const panel = document.getElementById('inline-cal-panel');
    const isHidden = panel.classList.contains('hidden');
    panel.classList.toggle('hidden');
    if (isHidden) {
        inlineCheckIn = null; inlineCheckOut = null; inlineSelectingOut = false;
        inlineYear = new Date().getFullYear(); inlineMonth = new Date().getMonth();
        renderInlineCal();
        setTimeout(() => panel.scrollIntoView({ behavior: 'smooth', block: 'start' }), 50);
    }
}

function buildInlineGrid() {
    const grid = document.getElementById('inline-cal-grid'); if (!grid) return;
    grid.innerHTML = '';
    const firstDay = new Date(inlineYear, inlineMonth, 1).getDay();
    const daysInMonth = new Date(inlineYear, inlineMonth + 1, 0).getDate();
    const today = new Date(); today.setHours(0,0,0,0);
    for (let i = 0; i < firstDay; i++) grid.appendChild(document.createElement('div'));
    for (let d = 1; d <= daysInMonth; d++) {
        const date = new Date(inlineYear, inlineMonth, d); date.setHours(0,0,0,0);
        const price = getDayPrice(date), low = isLowSeason(date);
        const isPast = date < today;
        const isCI = inlineCheckIn && date.getTime() === inlineCheckIn.getTime();
        const isCO = inlineCheckOut && date.getTime() === inlineCheckOut.getTime();
        const isInRange = inlineCheckIn && inlineCheckOut && date > inlineCheckIn && date < inlineCheckOut;
        const cell = document.createElement('button'); cell.type = 'button'; cell.disabled = isPast;
        let cls = 'flex flex-col items-center justify-center rounded-lg py-1.5 px-0.5 text-center transition duration-150 w-full ';
        if (isPast) cls += 'opacity-30 cursor-not-allowed ';
        else if (isCI || isCO) cls += 'bg-kigongoniOrange text-white shadow-md scale-105 z-10 ';
        else if (isInRange) cls += 'bg-kigongoniOrange/25 text-kigongoniOrange border border-kigongoniOrange/40 ';
        else if (low) cls += 'bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 hover:bg-kigongoniOrange/20 text-gray-700 dark:text-gray-200 border border-kigongoniBlue/20 hover:border-kigongoniOrange ';
        else cls += 'bg-kigongoniOrange/5 dark:bg-kigongoniOrange/10 hover:bg-kigongoniOrange/20 text-gray-700 dark:text-gray-200 border border-kigongoniOrange/20 hover:border-kigongoniOrange ';
        cell.className = cls;
        const pc = (isCI||isCO) ? 'text-white/90' : (low ? 'text-kigongoniBlue dark:text-blue-300' : 'text-kigongoniOrange');
        cell.innerHTML = `<span class="text-[11px] font-black leading-none">${d}</span><span class="text-[8px] font-bold leading-none mt-0.5 ${pc}">$${price}</span>`;
        if (!isPast) cell.addEventListener('click', () => onInlineDayClick(date));
        grid.appendChild(cell);
    }
}

function renderInlineCal() {
    const title = document.getElementById('inline-cal-title');
    if (title) title.textContent = monthNames[inlineMonth] + ' ' + inlineYear;
    buildInlineGrid(); updateInlineSummary();
}

function onInlineDayClick(date) {
    if (!inlineCheckIn || (inlineCheckIn && inlineCheckOut)) {
        inlineCheckIn = date; inlineCheckOut = null; inlineSelectingOut = true;
        document.getElementById('inline-mode-label').textContent = "{{ __('Now select your check-out date') }}";
    } else if (inlineSelectingOut) {
        if (date.getTime() === inlineCheckIn.getTime()) {
            inlineCheckIn = null; inlineCheckOut = null; inlineSelectingOut = false;
            document.getElementById('inline-mode-label').textContent = "{{ __('Select your check-in date') }}";
        } else if (date < inlineCheckIn) {
            inlineCheckIn = date; inlineCheckOut = null;
            document.getElementById('inline-mode-label').textContent = "{{ __('Now select your check-out date') }}";
        } else {
            inlineCheckOut = date; inlineSelectingOut = false;
            document.getElementById('inline-mode-label').textContent = "{{ __('✓ Dates selected — confirm below') }}";
        }
    }
    renderInlineCal();
}

function updateInlineSummary() {
    const fmt = d => d.toLocaleDateString('en-GB', { day:'numeric', month:'short', year:'numeric' });
    const ciEl = document.getElementById('inline-checkin-display');
    const coEl = document.getElementById('inline-checkout-display');
    const niEl = document.getElementById('inline-nights-display');
    const toEl = document.getElementById('inline-total-display');
    const btn  = document.getElementById('inline-confirm-btn');
    if (ciEl) ciEl.textContent = inlineCheckIn  ? fmt(inlineCheckIn)  : "— {{ __('Select date') }}";
    if (coEl) coEl.textContent = inlineCheckOut ? fmt(inlineCheckOut) : "— {{ __('Select date') }}";
    if (inlineCheckIn && inlineCheckOut) {
        let total = 0; let cur = new Date(inlineCheckIn);
        while (cur < inlineCheckOut) { total += getDayPrice(cur); cur.setDate(cur.getDate() + 1); }
        const nights = Math.round((inlineCheckOut - inlineCheckIn) / 86400000);
        if (niEl) niEl.textContent = nights + ' ' + (nights > 1 ? "{{ __('nights') }}" : "{{ __('night') }}");
        if (toEl) toEl.textContent = '$' + total;
        if (btn)  { btn.disabled = false; btn.classList.remove('opacity-50','cursor-not-allowed'); }
    } else {
        if (niEl) niEl.textContent = '—';
        if (toEl) toEl.textContent = '—';
        if (btn)  { btn.disabled = true; btn.classList.add('opacity-50','cursor-not-allowed'); }
    }
}

document.getElementById('inline-confirm-btn')?.addEventListener('click', () => {
    if (!inlineCheckIn || !inlineCheckOut) return;
    const guests = document.getElementById('inline-guests')?.value || 'Family (4+)';
    const fmt = d => d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0');
    const params = new URLSearchParams({ checkin: fmt(inlineCheckIn), checkout: fmt(inlineCheckOut), guests, room_type: 'Standard Family Room', room_price: getDayPrice(inlineCheckIn) });
    window.location.href = window.location.pathname + '?' + params.toString();
});

document.getElementById('inline-cal-prev')?.addEventListener('click', () => { inlineMonth--; if (inlineMonth < 0) { inlineMonth = 11; inlineYear--; } renderInlineCal(); });
document.getElementById('inline-cal-next')?.addEventListener('click', () => { inlineMonth++; if (inlineMonth > 11) { inlineMonth = 0; inlineYear++; } renderInlineCal(); });

// ─── Lightbox ─────────────────────────────────────────────────
const galleryImages = [
    { src: "{{ asset('images/rooms/standard-family/main.jpg') }}",      fallback: 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80', label: "{{ __('Main View') }}" },
    { src: "{{ asset('images/rooms/standard-family/bathroom.jpg') }}",  fallback: 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=80', label: "{{ __('Bathroom') }}" },
    { src: "{{ asset('images/rooms/standard-family/desk.jpg') }}",      fallback: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80', label: "{{ __('Desk Area') }}" },
    { src: "{{ asset('images/rooms/standard-family/view.jpg') }}",      fallback: 'https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=1200&q=80', label: "{{ __('Room View') }}" },
    { src: "{{ asset('images/rooms/standard-family/window.jpg') }}",    fallback: 'https://images.unsplash.com/photo-1595599872002-9154efcf5b8e?auto=format&fit=crop&w=1200&q=80', label: "{{ __('Window') }}" },
];
let currentImg = 0;

function openLightbox(index) { currentImg = index; showLightboxImage(); document.getElementById('lightbox').classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
function showLightboxImage() {
    const img = document.getElementById('lightbox-img'), item = galleryImages[currentImg];
    img.src = item.src; img.onerror = () => { img.src = item.fallback; img.onerror = null; };
    document.getElementById('lightbox-counter').textContent = item.label + '  ·  ' + (currentImg + 1) + ' / ' + galleryImages.length;
}
function closeLightbox(e) { if (e && e.target !== document.getElementById('lightbox')) return; document.getElementById('lightbox').classList.add('hidden'); document.body.style.overflow = ''; }
function prevImage() { currentImg = (currentImg - 1 + galleryImages.length) % galleryImages.length; showLightboxImage(); }
function nextImage() { currentImg = (currentImg + 1) % galleryImages.length; showLightboxImage(); }
document.addEventListener('keydown', e => {
    if (document.getElementById('lightbox').classList.contains('hidden')) return;
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
    if (e.key === 'Escape') { document.getElementById('lightbox').classList.add('hidden'); document.body.style.overflow = ''; }
});
</script>
@endsection