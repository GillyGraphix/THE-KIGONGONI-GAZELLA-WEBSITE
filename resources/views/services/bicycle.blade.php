@extends('layouts.app')

@section('content')

    {{-- ============================================================
         HERO SECTION YA BICYCLE RENTING
    ============================================================ --}}
    <section class="relative h-[40vh] min-h-[400px] flex items-center justify-center text-center text-white overflow-hidden mt-[var(--navbar-height)]">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/services/bicycle-hero.jpg') }}" 
                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=1600&q=80'"
                 alt="Bicycle Renting Hero" 
                 class="w-full h-full object-cover filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-b from-kigongoniBlue/80 via-kigongoniBlue/50 to-kigongoniBlue/90"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 px-4" data-aos="fade-up">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-kigongoniOrange"></div>
                <span class="text-xs font-black uppercase tracking-[0.3em] text-kigongoniOrange">{{ __('Explore Local Life') }}</span>
                <div class="h-px w-8 bg-kigongoniOrange"></div>
            </div>
            <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-4 drop-shadow-lg">{{ __('Village Cycling Experience') }}</h1>
            <p class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto tracking-wide">
                {{ __("Pedal through the vibrant streets of Mto wa Mbu, discover hidden trails, and connect with nature at your own pace.") }}
            </p>
        </div>
    </section>

    {{-- ============================================================
         MAELEZO NA HIGHLIGHT YA OFA YA BURE
    ============================================================ --}}
    <section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-5xl">
            
            {{-- Back Button --}}
            <a href="{{ url('/') }}#services" class="inline-flex items-center gap-2 text-sm font-bold text-kigongoniBlue dark:text-gray-300 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange mb-10 transition duration-300 uppercase tracking-wider group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ __('Back to Services') }}
            </a>

            <div class="flex flex-col lg:flex-row gap-12 items-start">
                
                {{-- Maelezo ya Uzoefu --}}
                <div class="lg:w-7/12" data-aos="fade-right">
                    <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide mb-6">{{ __('Pedal Through Paradise') }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        {{ __("Mto wa Mbu is a cultural melting pot and a paradise for cyclists. Leave the safari car behind for a few hours and breathe in the fresh air as you ride through lush banana plantations, traditional homesteads, and colorful local markets.") }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-8">
                        {{ __("Whether you want to cycle all the way to the shores of Lake Manyara to spot flamingos, or just want a leisurely ride around the village to grab a local brew, our mountain bikes are perfect for the terrain. It's the most authentic way to experience the daily life of the local community.") }}
                    </p>

                    <h3 class="text-lg font-bold text-kigongoniOrange uppercase tracking-widest mb-4">{{ __('Where to ride?') }}</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-kigongoniOrange/10 text-kigongoniOrange flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-kigongoniBlue dark:text-gray-200">{{ __('Lake Manyara Shores') }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('A scenic, flat ride leading you to beautiful views and bird-watching spots.') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-kigongoniOrange/10 text-kigongoniOrange flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-kigongoniBlue dark:text-gray-200">{{ __('Mto wa Mbu Village Tour') }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Navigate the vibrant village, interact with locals, and see the famous banana farms.') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-kigongoniOrange/10 text-kigongoniOrange flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-kigongoniBlue dark:text-gray-200">{{ __('Local Artisans Market') }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('A short ride perfect for picking up souvenirs and supporting local craftsmen.') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- Kadi Maalum ya Wageni (Guest Perk) --}}
                <div class="lg:w-5/12 w-full" data-aos="fade-left">
                    <div class="bg-kigongoniBlue dark:bg-gray-800 rounded-2xl p-8 shadow-2xl relative overflow-hidden text-center border-t-8 border-kigongoniOrange transform hover:-translate-y-2 transition duration-300">
                        {{-- Watermark Icon Background --}}
                        <svg class="absolute -bottom-10 -right-10 w-48 h-48 text-white opacity-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM5 12c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8.5c-1.9 0-3.5-1.6-3.5-3.5s1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5zm5.8-10l2.4-2.4.8.8c1.3 1.3 3 2.1 5.1 2.1V9c-1.5 0-2.7-.6-3.6-1.5l-1.9-1.9c-.5-.4-1-.7-1.6-.7s-1.1.2-1.4.5L6 10.8v4.4h1.5v-3.4l3.4-3.4z"/>
                            <path d="M19 12c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8.5c-1.9 0-3.5-1.6-3.5-3.5s1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5z"/>
                        </svg>

                        <div class="w-16 h-16 bg-kigongoniOrange text-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                        </div>
                        
                        <h3 class="text-kigongoniOrange text-xs font-black uppercase tracking-[0.3em] mb-2">{{ __('Exclusive Perk') }}</h3>
                        <h4 class="text-3xl font-black text-white mb-4 leading-tight">{{ __('Complimentary For Our Guests') }}</h4>
                        
                        <p class="text-gray-300 text-sm leading-relaxed mb-8">
                            {{ __('As a valued guest staying at Kigongoni Gazella Hotel, you have exclusive access to our bicycles completely free of charge! It is our way of making your stay extra special.') }}
                        </p>

                        <div class="bg-white/10 rounded-xl p-4 mb-8">
                            <div class="flex items-center justify-between text-white text-sm font-semibold border-b border-white/10 pb-3 mb-3">
                                <span>{{ __('Status:') }}</span>
                                <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-xs uppercase tracking-wider border border-green-500/30">{{ __('100% Free') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-white text-sm font-semibold border-b border-white/10 pb-3 mb-3">
                                <span>{{ __('Eligibility:') }}</span>
                                <span class="text-gray-300">{{ __('In-House Guests Only') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-white text-sm font-semibold">
                                <span>{{ __('Availability:') }}</span>
                                <span class="text-gray-300">{{ __('Subject to Availability') }}</span>
                            </div>
                        </div>

                        <a href="{{ url('/') }}#contact" class="inline-flex items-center justify-center gap-2 w-full bg-kigongoniOrange text-white font-black py-4 rounded-xl hover:bg-white hover:text-kigongoniBlue transition duration-300 shadow-xl uppercase tracking-widest text-sm group">
                            {{ __('Ask Reception to Book') }}
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <p class="text-[10px] text-gray-400 mt-4 uppercase tracking-widest">{{ __('Please book at the front desk 1 hour prior.') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection