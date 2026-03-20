@extends('layouts.app')

@section('content')

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
<div class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
    <div class="container mx-auto px-4 py-3 max-w-7xl">
        <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">
            <a href="/" class="hover:text-kigongoniOrange transition">{{ __('Home') }}</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-kigongoniOrange">{{ __('Available Rooms') }}</span>
        </nav>
    </div>
</div>

{{-- ============================================================
     MAIN CONTENT - AVAILABILITY PAGE
     NIMEONGEZA DATA HALISI ZA VYUMBA KWA MAELEZO KAMILI
============================================================ --}}
<div class="pt-10 pb-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 max-w-7xl">
        
        {{-- Search Summary - Tumia data kutoka kwenye request --}}
        @php
            $checkin = request('checkin', '2024-06-15');
            $checkout = request('checkout', '2024-06-17');
            $guests = request('guests', 2);
            
            // Hesabu idadi ya siku
            $checkinDate = new DateTime($checkin);
            $checkoutDate = new DateTime($checkout);
            $nights = $checkoutDate->diff($checkinDate)->days;
        @endphp
        
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md mb-8 border-l-4 border-kigongoniOrange flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-bold mb-1">{{ __('Your Search Details') }}</p>
                <div class="flex flex-wrap items-center gap-3 text-kigongoniBlue dark:text-white font-black text-lg">
                    <span>{{ $checkin }}</span>
                    <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    <span>{{ $checkout }}</span>
                    
                    {{-- Badge ya idadi ya siku na wageni --}}
                    <div class="flex items-center gap-2 ml-0 sm:ml-4">
                        <span class="text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full">
                            {{ $nights }} {{ __('Night') }}{{ $nights > 1 ? 's' : '' }}
                        </span>
                        <span class="text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full">
                            {{ $guests }} {{ __('Guest') }}{{ $guests > 1 ? 's' : '' }}
                        </span>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('home') }}#booking" class="text-sm font-bold text-center text-kigongoniOrange hover:text-white hover:bg-kigongoniOrange transition border-2 border-kigongoniOrange px-5 py-2.5 rounded-lg uppercase tracking-widest">
                {{ __('Change Dates') }}
            </a>
        </div>

        <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight mb-8">{{ __('Available Rooms') }}</h2>

        <div class="space-y-6">
            
            {{-- ============================================================
                 ROOM 1: STANDARD DOUBLE ROOM (MAELEZO KAMILI)
                 Nimeweka picha halisi na details za kutosha
            ============================================================= --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow duration-300">
                
                {{-- Room Image - Picha ya horizontal iliyopunguzwa ukubwa --}}
                <div class="md:w-2/5 h-56 md:h-auto relative">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" 
                         alt="Standard Double Room" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-green-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                        {{ __('Available') }}
                    </div>
                    {{-- Badge ya idadi ya wageni wanaoweza kulala --}}
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>
                        <span>2 {{ __('Adults') }}</span>
                    </div>
                </div>
                
                {{-- Room Details & Pricing --}}
                <div class="p-8 md:w-3/5 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-start gap-4 mb-4">
                            <div>
                                <h3 class="text-2xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Standard Double Room') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('Cozy and comfortable room with modern amenities') }}</p>
                            </div>
                            
                            {{-- Sehemu ya Bei --}}
                            <div class="sm:text-right shrink-0 bg-gray-50 dark:bg-gray-900/50 p-3 sm:p-0 sm:bg-transparent rounded-lg">
                                <p class="text-[10px] uppercase font-bold text-kigongoniOrange tracking-wider mb-1">
                                    {{ __('Avg. Rate Per Night') }}
                                </p>
                                <p class="text-3xl font-black text-kigongoniBlue dark:text-white leading-none">
                                    $89 
                                    <span class="text-sm text-gray-500 font-bold uppercase tracking-widest">/night</span>
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold mt-1">
                                    {{ __('Total') }}: <span class="text-kigongoniOrange">${{ 89 * $nights }}</span> {{ __('for') }} {{ $nights }} {{ __('nights') }}
                                </p>
                            </div>
                        </div>
                        
                        {{-- Room Features - Maelezo kamili ya chumba --}}
                        <div class="space-y-3 mb-6">
                            {{-- Size na bed type --}}
                            <div class="flex items-center gap-4 text-sm">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5h-4m4 0v4m0-4l-5 5M4 16v4m0-4h4m-4 0l5 5m11-5v4m0-4h-4m4 0l-5-5"/></svg>
                                    <span class="font-medium">{{ __('Room Size') }}: <span class="font-bold">25m²</span></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    <span class="font-medium">{{ __('Bed Type') }}: <span class="font-bold">{{ __('1 Queen Bed') }}</span></span>
                                </div>
                            </div>
                            
                            {{-- Features in detail --}}
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Free Wi-Fi') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Air Conditioning') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Private Bathroom') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Flat-screen TV') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Mini Fridge') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-sm">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ __('Safe Box') }}</span>
                                </div>
                            </div>
                            
                            {{-- Maelezo ya ziada --}}
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg text-sm text-gray-600 dark:text-gray-300 mt-3">
                                <p>{{ __('Enjoy a comfortable stay in our Standard Double Room featuring a queen-sized bed, en-suite bathroom with complimentary toiletries, and a work desk. Perfect for couples or solo travelers.') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Action Bar --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-5 mt-auto gap-4">
                        <div class="flex items-center gap-2 text-green-600 dark:text-green-400 w-full sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[11px] font-black uppercase tracking-widest">{{ __('Free Cancellation') }}</span>
                        </div>
                        
                        {{-- Book Now Button --}}
                        <a href="{{ route('booking.checkout', ['room_id' => 1, 'checkin' => $checkin, 'checkout' => $checkout, 'guests' => $guests]) }}" 
                           class="w-full sm:w-auto text-center bg-kigongoniOrange text-white font-black py-3.5 px-8 rounded-xl hover:bg-kigongoniBlue dark:hover:bg-white dark:hover:text-kigongoniOrange transition duration-300 shadow-lg hover:shadow-xl uppercase tracking-widest text-xs flex items-center justify-center gap-2 group">
                            {{ __('Book Room') }}
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 ROOM 2: DELUXE ROOM (MFANO MWINGINE)
            ============================================================= --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow duration-300">
                
                {{-- Room Image --}}
                <div class="md:w-2/5 h-56 md:h-auto relative">
                    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" 
                         alt="Deluxe Room" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-green-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                        {{ __('Available') }}
                    </div>
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>
                        <span>3 {{ __('Adults') }}</span>
                    </div>
                </div>
                
                <div class="p-8 md:w-3/5 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-start gap-4 mb-4">
                            <div>
                                <h3 class="text-2xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Deluxe Room') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('Spacious room with garden view and premium amenities') }}</p>
                            </div>
                            
                            <div class="sm:text-right shrink-0 bg-gray-50 dark:bg-gray-900/50 p-3 sm:p-0 sm:bg-transparent rounded-lg">
                                <p class="text-[10px] uppercase font-bold text-kigongoniOrange tracking-wider mb-1">{{ __('Avg. Rate Per Night') }}</p>
                                <p class="text-3xl font-black text-kigongoniBlue dark:text-white leading-none">$129 <span class="text-sm text-gray-500 font-bold uppercase tracking-widest">/night</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold mt-1">{{ __('Total') }}: <span class="text-kigongoniOrange">${{ 129 * $nights }}</span> {{ __('for') }} {{ $nights }} {{ __('nights') }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-4 text-sm">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5h-4m4 0v4m0-4l-5 5M4 16v4m0-4h4m-4 0l5 5m11-5v4m0-4h-4m4 0l-5-5"/></svg>
                                    <span class="font-medium">{{ __('Room Size') }}: <span class="font-bold">35m²</span></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    <span class="font-medium">{{ __('Bed Type') }}: <span class="font-bold">{{ __('1 King Bed') }}</span></span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Free Wi-Fi') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Air Conditioning') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Balcony') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Coffee Machine') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Garden View') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Luxury Toiletries') }}</div>
                            </div>
                            
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg text-sm text-gray-600 dark:text-gray-300 mt-3">
                                <p>{{ __('Our Deluxe Room offers extra space, a private balcony overlooking our tropical gardens, and premium amenities including a Nespresso machine and luxury bath products.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-5 mt-auto gap-4">
                        <div class="flex items-center gap-2 text-green-600 dark:text-green-400 w-full sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[11px] font-black uppercase tracking-widest">{{ __('Free Cancellation') }}</span>
                        </div>
                        
                        <a href="{{ route('booking.checkout', ['room_id' => 2, 'checkin' => $checkin, 'checkout' => $checkout, 'guests' => $guests]) }}" 
                           class="w-full sm:w-auto text-center bg-kigongoniOrange text-white font-black py-3.5 px-8 rounded-xl hover:bg-kigongoniBlue dark:hover:bg-white dark:hover:text-kigongoniOrange transition duration-300 shadow-lg hover:shadow-xl uppercase tracking-widest text-xs flex items-center justify-center gap-2 group">
                            {{ __('Book Room') }}
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 ROOM 3: FAMILY SUITE (MFANO WA CHUMBA KIKUBWA)
            ============================================================= --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow duration-300">
                
                <div class="md:w-2/5 h-56 md:h-auto relative">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80" 
                         alt="Family Suite" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-green-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                        {{ __('Available') }}
                    </div>
                    <div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>
                        <span>4 {{ __('Adults') }} + 2 {{ __('Children') }}</span>
                    </div>
                </div>
                
                <div class="p-8 md:w-3/5 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-start gap-4 mb-4">
                            <div>
                                <h3 class="text-2xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide">{{ __('Family Suite') }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('Spacious two-bedroom suite for the whole family') }}</p>
                            </div>
                            
                            <div class="sm:text-right shrink-0 bg-gray-50 dark:bg-gray-900/50 p-3 sm:p-0 sm:bg-transparent rounded-lg">
                                <p class="text-[10px] uppercase font-bold text-kigongoniOrange tracking-wider mb-1">{{ __('Avg. Rate Per Night') }}</p>
                                <p class="text-3xl font-black text-kigongoniBlue dark:text-white leading-none">$249 <span class="text-sm text-gray-500 font-bold uppercase tracking-widest">/night</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold mt-1">{{ __('Total') }}: <span class="text-kigongoniOrange">${{ 249 * $nights }}</span> {{ __('for') }} {{ $nights }} {{ __('nights') }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-4 text-sm">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5h-4m4 0v4m0-4l-5 5M4 16v4m0-4h4m-4 0l5 5m11-5v4m0-4h-4m4 0l-5-5"/></svg>
                                    <span class="font-medium">{{ __('Room Size') }}: <span class="font-bold">65m²</span></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    <span class="font-medium">{{ __('Beds') }}: <span class="font-bold">{{ __('1 King + 2 Singles') }}</span></span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Free Wi-Fi') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Air Conditioning') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Two Bedrooms') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Living Room') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('Kitchenette') }}</div>
                                <div class="flex items-center gap-1.5 text-sm"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __('2 Bathrooms') }}</div>
                            </div>
                            
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg text-sm text-gray-600 dark:text-gray-300 mt-3">
                                <p>{{ __('Perfect for families or groups, our Family Suite features two separate bedrooms, a spacious living area, and a kitchenette. Includes complimentary breakfast for all guests.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-5 mt-auto gap-4">
                        <div class="flex items-center gap-2 text-green-600 dark:text-green-400 w-full sm:w-auto">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[11px] font-black uppercase tracking-widest">{{ __('Free Cancellation') }}</span>
                        </div>
                        
                        <a href="{{ route('booking.checkout', ['room_id' => 3, 'checkin' => $checkin, 'checkout' => $checkout, 'guests' => $guests]) }}" 
                           class="w-full sm:w-auto text-center bg-kigongoniOrange text-white font-black py-3.5 px-8 rounded-xl hover:bg-kigongoniBlue dark:hover:bg-white dark:hover:text-kigongoniOrange transition duration-300 shadow-lg hover:shadow-xl uppercase tracking-widest text-xs flex items-center justify-center gap-2 group">
                            {{ __('Book Room') }}
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- BUTTON YA KURUDI NYUMA --}}
        <div class="mt-8 flex justify-start">
            <a href="javascript:history.back()" class="inline-flex items-center justify-center gap-2 px-6 py-4 text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange transition bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                {{ __('Go Back') }}
            </a>
        </div>

    </div>
</div>
@endsection