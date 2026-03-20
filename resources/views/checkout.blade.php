@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />

<style>
    .ts-control { border: none !important; padding: 0.75rem !important; border-radius: 0.5rem !important; background: transparent !important; box-shadow: none !important; cursor: pointer !important; }
    .ts-wrapper.single .ts-control { background-color: transparent !important; }
    .dark .ts-control, .dark .ts-control input, .dark .ts-control .item { color: white !important; }
    .dark .ts-dropdown { background-color: #374151 !important; border-color: #4b5563 !important; color: white !important; }
    .dark .ts-dropdown .option, .dark .ts-dropdown [data-selectable] { color: white !important; }
    .dark .ts-dropdown .option.active, .dark .ts-dropdown .active { background-color: #4b5563 !important; color: white !important; }
    .dark .ts-dropdown .ts-dropdown-content { color: white !important; }
    .dark .ts-wrapper input::placeholder { color: #9ca3af !important; }
    .fi { border-radius: 2px; box-shadow: 0 0 1px rgba(0,0,0,0.3); }
    #requestCheckbox { accent-color: #ef4a25; }

    .ts-field-wrapper { position: relative; min-height: 50px; }
    .ts-field-wrapper > select { visibility: hidden; position: absolute; inset: 0; width: 100%; height: 100%; }
    .ts-field-wrapper .ts-wrapper { position: absolute !important; inset: 0; width: 100% !important; }
    .ts-field-wrapper .ts-control { height: 100% !important; min-height: 50px !important; }

    /* ── SUCCESS OVERLAY ─────────────────────────────────────── */
    #success-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    #success-overlay.show {
        display: flex;
        animation: overlayFadeIn 0.4s ease;
    }
    @keyframes overlayFadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    .success-card {
        animation: cardSlideUp 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    @keyframes cardSlideUp {
        from { opacity: 0; transform: translateY(40px) scale(0.95); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    /* Checkmark circle animation */
    .check-circle {
        animation: popIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both;
    }
    @keyframes popIn {
        from { transform: scale(0); opacity: 0; }
        to   { transform: scale(1); opacity: 1; }
    }
    /* Ping dots */
    @keyframes ping { 75%, 100% { transform: scale(2); opacity: 0; } }
    .animate-ping { animation: ping 1.5s cubic-bezier(0,0,0.2,1) infinite; }
</style>

{{-- ============================================================
     SUCCESS OVERLAY — inaonekana baada ya submit
============================================================ --}}
<div id="success-overlay">
    <div class="success-card bg-white dark:bg-gray-800 rounded-3xl shadow-2xl max-w-lg w-full mx-auto overflow-hidden">

        <div class="p-8 sm:p-10 text-center">

            {{-- Animated checkmark --}}
            <div class="check-circle w-20 h-20 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-6 relative">
                <div class="absolute inset-0 rounded-full bg-green-400/20 animate-ping"></div>
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            {{-- Title --}}
            <h2 class="text-2xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight mb-2">
                {{ __('Request Sent!') }}
            </h2>
            <p class="text-kigongoniOrange font-black text-sm uppercase tracking-widest mb-6">
                {{ __('✦ Kigongoni Gazella Hotel ✦') }}
            </p>

            {{-- Message --}}
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-2xl p-5 mb-6 text-left space-y-3">
                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                    {{ __('Thank you,') }} <span id="success-name" class="font-black text-kigongoniBlue dark:text-white"></span>! 🎉
                </p>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                    {{ __('We have received your reservation request. Our team will get back to you shortly to confirm your booking.') }}
                </p>
                <div class="pt-2 space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-gray-500 dark:text-gray-400">{{ __('Check your email:') }}</span>
                        <span id="success-email" class="font-bold text-kigongoniBlue dark:text-white truncate"></span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <svg class="w-4 h-4 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-gray-500 dark:text-gray-400">{{ __("Or we'll call you at:") }}</span>
                        <span id="success-phone" class="font-bold text-kigongoniBlue dark:text-white"></span>
                    </div>
                </div>
            </div>

            {{-- Booking summary mini --}}
            <div class="grid grid-cols-3 gap-3 mb-6">
                <div class="bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 rounded-xl p-3 text-center">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('Room') }}</p>
                    <p id="success-room" class="text-xs font-black text-kigongoniBlue dark:text-white leading-tight"></p>
                </div>
                <div class="bg-kigongoniOrange/5 dark:bg-kigongoniOrange/10 rounded-xl p-3 text-center">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('Check-In') }}</p>
                    <p id="success-checkin" class="text-xs font-black text-kigongoniBlue dark:text-white leading-tight"></p>
                </div>
                <div class="bg-kigongoniOrange/5 dark:bg-kigongoniOrange/10 rounded-xl p-3 text-center">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('Check-Out') }}</p>
                    <p id="success-checkout" class="text-xs font-black text-kigongoniBlue dark:text-white leading-tight"></p>
                </div>
            </div>

            {{-- spacer --}}
            <div class="mb-6"></div>

            {{-- Button --}}
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 bg-kigongoniBlue text-white font-black py-3.5 px-8 rounded-xl hover:bg-kigongoniOrange transition duration-300 uppercase tracking-widest text-xs shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                {{ __('Back to Home') }}
            </a>
        </div>
    </div>
</div>

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
@php
    $roomRoutes = [
        1 => 'rooms.standard-double',
        2 => 'rooms.standard-triple',
        3 => 'rooms.standard-family',
    ];
    $roomRoute  = $roomRoutes[$room_id] ?? 'home';
    $backParams = http_build_query([
        'checkin'  => request('checkin',  $checkin),
        'checkout' => request('checkout', $checkout),
        'guests'   => request('guests',   $guests),
    ]);
@endphp

<div class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
    <div class="container mx-auto px-4 py-3 max-w-6xl">
        <nav class="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-kigongoniOrange transition">{{ __('Home') }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route($roomRoute) }}?{{ $backParams }}" class="hover:text-kigongoniOrange transition">{{ __($room['name']) }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-kigongoniOrange">{{ __('Booking') }}</span>
        </nav>
    </div>
</div>

{{-- ============================================================
     MAIN CONTENT
============================================================ --}}
<div class="pt-24 pb-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 max-w-6xl">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">{{ __('Complete Your Booking') }}</h2>
            <div class="w-16 h-1 bg-kigongoniOrange mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">

            {{-- KUSHOTO: Fomu --}}
            <div class="lg:col-span-8">
                <form id="booking-form" action="{{ route('booking.submit') }}" method="POST"
                      class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 sm:p-8 border border-gray-100 dark:border-gray-700">
                    @csrf

                    <h3 class="text-lg font-black text-kigongoniBlue dark:text-white uppercase mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-kigongoniOrange text-white flex items-center justify-center text-sm">1</span>
                        {{ __('Guest Information') }}
                    </h3>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">{{ __('First Name') }} *</label>
                            <input type="text" name="first_name" id="first_name" required
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-kigongoniOrange outline-none dark:text-white transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">{{ __('Last Name') }} *</label>
                            <input type="text" name="last_name" id="last_name" required
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-kigongoniOrange outline-none dark:text-white transition shadow-sm">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">{{ __('Email Address') }} *</label>
                            <input type="email" name="email" id="guest_email" required
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-kigongoniOrange outline-none dark:text-white transition shadow-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">{{ __('Nationality') }} *</label>
                            <div class="ts-field-wrapper border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm"
                                 id="nationality-wrapper">
                                <select id="nationality-select" name="nationality" required
                                        placeholder="{{ __('Search your country...') }}"></select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-2">{{ __('Phone Number') }} *</label>
                        <div class="flex items-stretch gap-3">
                            <div class="ts-field-wrapper w-1/3 md:w-3/12 border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm"
                                 id="code-wrapper">
                                <select id="country-code-select" required></select>
                            </div>
                            <div class="w-2/3 md:w-9/12 border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm focus-within:ring-2 focus-within:ring-kigongoniOrange transition overflow-hidden">
                                <input type="tel" id="phone_raw" pattern="[0-9]*" inputmode="numeric"
                                       placeholder="768 219 703" required
                                       class="w-full h-full p-3 bg-transparent outline-none dark:text-white">
                            </div>
                        </div>
                        <input type="hidden" name="phone_full" id="phone_full">
                    </div>

                    <div class="border-t border-gray-100 dark:border-gray-700 pt-6 mb-8">
                        <label class="flex items-start gap-3 cursor-pointer group">
                            <input type="checkbox" id="requestCheckbox"
                                   class="w-5 h-5 rounded border-gray-300 focus:ring-kigongoniOrange transition mt-0.5">
                            <div>
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-kigongoniOrange transition block">{{ __('Special Requests') }}</span>
                                <span class="text-xs text-gray-500">{{ __('Please let us know if you have any special requests or comments (Subject to availability)') }}</span>
                            </div>
                        </label>
                        <div id="requestArea" class="hidden mt-4">
                            <textarea name="special_request" rows="3"
                                      placeholder="{{ __('E.g. Ground floor room, late check-in, dietary requirements...') }}"
                                      class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-kigongoniOrange outline-none dark:text-white resize-none shadow-sm transition"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="room_id"     value="{{ $room_id }}">
                    <input type="hidden" name="checkin"     value="{{ $checkin }}">
                    <input type="hidden" name="checkout"    value="{{ $checkout }}">
                    <input type="hidden" name="guests"      value="{{ $guests }}">
                    <input type="hidden" name="total_price" value="{{ $total_price }}">

                    <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route($roomRoute) }}?{{ $backParams }}"
                           class="w-full sm:w-auto text-center px-6 py-4 text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange flex items-center justify-center gap-2 transition bg-gray-50 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            {{ __('Go Back') }}
                        </a>
                        <button type="submit" id="submit-btn"
                                class="w-full sm:w-auto bg-kigongoniBlue text-white font-black py-4 px-10 rounded-xl hover:bg-kigongoniOrange transition duration-300 shadow-xl uppercase tracking-widest text-sm flex items-center justify-center gap-2 group">
                            {{ __('Confirm & Book') }}
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>
            </div>

            {{-- KULIA: Summary Card --}}
            <div class="lg:col-span-4">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 sticky top-28">
                    <div class="h-48 relative">
                        <img src="{{ $room['image'] }}" alt="{{ __($room['name']) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <p class="text-kigongoniOrange text-[10px] font-black uppercase tracking-widest mb-1">{{ __('Selected Room') }}</p>
                            <h4 class="text-xl font-black text-white uppercase">{{ __($room['name']) }}</h4>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                            <div class="text-center">
                                <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 mb-1">{{ __('Check-in') }}</p>
                                <p class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkin }}</p>
                                <p class="text-[10px] text-gray-400 mt-1">{{ __('From 2:00 PM') }}</p>
                            </div>
                            <div class="flex flex-col items-center flex-1 px-4">
                                <div class="w-full h-px bg-gray-300 dark:bg-gray-600 mb-2 relative">
                                    <div class="absolute inset-0 flex justify-center -mt-3">
                                        <span class="text-[10px] font-black uppercase tracking-wider text-kigongoniOrange bg-white dark:bg-gray-800 px-2 rounded-full border border-gray-200 dark:border-gray-600 shadow-sm whitespace-nowrap">
                                            {{ $nights }} {{ $nights > 1 ? __('Nights') : __('Night') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] uppercase font-bold text-gray-500 dark:text-gray-400 mb-1">{{ __('Check-out') }}</p>
                                <p class="text-sm font-black text-kigongoniBlue dark:text-white">{{ $checkout }}</p>
                                <p class="text-[10px] text-gray-400 mt-1">{{ __('By 11:00 AM') }}</p>
                            </div>
                        </div>
                        <div class="space-y-3 mb-6 pb-6 border-b border-gray-100 dark:border-gray-700">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400 font-bold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    {{ __('Guests') }}
                                </span>
                                <span class="text-sm font-black text-kigongoniBlue dark:text-white">{{ __($guests) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400 font-bold flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    {{ __('Breakfast') }}
                                </span>
                                <span class="text-[10px] font-black uppercase tracking-wider text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded">{{ __('Included') }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-sm font-black uppercase text-kigongoniBlue dark:text-white">{{ __('Total Price') }}</h4>
                                <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mt-1">{{ __('Taxes & Fees Included') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl font-black text-kigongoniOrange leading-none">${{ $total_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── 1. Special Request toggle ─────────────────────────────
    document.getElementById('requestCheckbox').addEventListener('change', function () {
        const area = document.getElementById('requestArea');
        area.classList.toggle('hidden', !this.checked);
        area.classList.toggle('block',   this.checked);
    });

    // ── 2. Phone digits only ──────────────────────────────────
    document.getElementById('phone_raw').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    // ── 3. Build country options ──────────────────────────────
    const countryData = window.intlTelInputGlobals.getCountryData();
    const natSelect   = document.getElementById('nationality-select');
    const codeSelect  = document.getElementById('country-code-select');

    let natHtml  = '<option value="">{{ __("Search Country...") }}</option>';
    let codeHtml = '<option value="">{{ __("Code...") }}</option>';

    countryData.forEach(c => {
        const name = c.name.split(' (')[0].toUpperCase();
        natHtml  += `<option value="${name}" data-iso="${c.iso2}">${name}</option>`;
        const sel = c.iso2 === 'tz' ? 'selected' : '';
        codeHtml += `<option value="+${c.dialCode}" data-iso="${c.iso2}" ${sel}>+${c.dialCode} ${name}</option>`;
    });

    natSelect.innerHTML  = natHtml;
    codeSelect.innerHTML = codeHtml;

    function markReady(id) { document.getElementById(id).classList.add('ts-ready'); }

    // ── 4. TomSelect — Nationality ────────────────────────────
    new TomSelect('#nationality-select', {
        create: false, sortField: { field: 'text', direction: 'asc' }, maxOptions: 250,
        onInitialize() { markReady('nationality-wrapper'); },
        render: {
            option: (d, e) => `<div class="flex items-center gap-3 py-1"><span class="fi fi-${e(d.iso)} text-lg"></span><span class="font-semibold text-sm">${e(d.text)}</span></div>`,
            item:   (d, e) => `<div class="flex items-center gap-3"><span class="fi fi-${e(d.iso)} text-lg"></span><span class="font-bold text-sm">${e(d.text)}</span></div>`,
        },
    });

    // ── 5. TomSelect — Country Code ───────────────────────────
    new TomSelect('#country-code-select', {
        create: false, maxOptions: 250,
        onInitialize() { markReady('code-wrapper'); },
        onChange: () => document.getElementById('phone_raw').focus(),
        render: {
            option: (d, e) => {
                const p = d.text.split(' ');
                return `<div class="flex items-center gap-3 py-1"><span class="fi fi-${e(d.iso)} text-lg"></span><span class="font-bold text-sm text-kigongoniOrange">${e(p[0])}</span><span class="font-semibold text-[10px] text-gray-500 truncate">${e(p.slice(1).join(' '))}</span></div>`;
            },
            item: (d, e) => `<div class="flex items-center gap-2"><span class="fi fi-${e(d.iso)} text-base"></span><span class="font-bold text-sm">${e(d.text.split(' ')[0])}</span></div>`,
        },
    });

    // ── 6. Form submit — show success overlay ─────────────────
    document.getElementById('booking-form').addEventListener('submit', function (e) {
        // MUHIMU: Zuia form isifanye page redirect — overlay ibaki
        e.preventDefault();

        // Combine phone number
        const code   = document.getElementById('country-code-select').value;
        const number = document.getElementById('phone_raw').value;
        document.getElementById('phone_full').value = code + ' ' + number;

        // Fill success overlay with real data
        const firstName = document.getElementById('first_name').value;
        const lastName  = document.getElementById('last_name').value;
        const email     = document.getElementById('guest_email').value;
        const phone     = code + ' ' + number;

        document.getElementById('success-name').textContent     = firstName + ' ' + lastName;
        document.getElementById('success-email').textContent    = email;
        document.getElementById('success-phone').textContent    = phone;
        document.getElementById('success-room').textContent     = '{{ __($room["name"]) }}';
        document.getElementById('success-checkin').textContent  = '{{ $checkin }}';
        document.getElementById('success-checkout').textContent = '{{ $checkout }}';

        // Show overlay
        document.getElementById('success-overlay').classList.add('show');
        document.body.style.overflow = 'hidden';

        // Submit form data kwa AJAX bila kubadilisha page
        const formData = new FormData(document.getElementById('booking-form'));
        fetch('{{ route("booking.submit") }}', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        }).catch(() => {
            // Hata kama fetch ikifail, overlay bado inabaki
        });
    });

});
</script>
@endsection