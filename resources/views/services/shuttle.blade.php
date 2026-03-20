@extends('layouts.app')

@section('content')

    {{-- ============================================================
         HERO SECTION YA AIRPORT SHUTTLE
    ============================================================ --}}
    <section class="relative h-[40vh] min-h-[400px] flex items-center justify-center text-center text-white overflow-hidden mt-[var(--navbar-height)]">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/services/shuttle-hero.jpg') }}"
                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=1600&q=80'"
                 alt="Airport Shuttle Hero"
                 class="w-full h-full object-cover filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-b from-kigongoniBlue/80 via-kigongoniBlue/50 to-kigongoniBlue/90"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 px-4" data-aos="fade-up">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-kigongoniOrange"></div>
                <span class="text-xs font-black uppercase tracking-[0.3em] text-kigongoniOrange">{{ __('Seamless Transfers') }}</span>
                <div class="h-px w-8 bg-kigongoniOrange"></div>
            </div>
            <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-4 drop-shadow-lg">{{ __('Airport Shuttle') }}</h1>
            <p class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto tracking-wide">
                {{ __("Start and end your safari adventure with our reliable, comfortable, and safe airport transfer services.") }}
            </p>
        </div>
    </section>

    {{-- ============================================================
         MAELEZO NA BEI ZA USAFIRI
    ============================================================ --}}
    <section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-5xl">

            {{-- Back Button --}}
            <a href="{{ url('/') }}#services" class="inline-flex items-center gap-2 text-sm font-bold text-kigongoniBlue dark:text-gray-300 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange mb-10 transition duration-300 uppercase tracking-wider group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ __('Back to Services') }}
            </a>

            <div class="flex flex-col lg:flex-row gap-12 items-start">

                {{-- Maelezo --}}
                <div class="lg:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide mb-6">{{ __('Arrive In Comfort') }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        {{ __("After a long flight, the last thing you want to worry about is navigating unfamiliar roads or haggling with local taxis. Our dedicated airport shuttle service ensures a smooth transition from the terminal directly to the welcoming doors of Kigongoni Gazella Hotel.") }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        {{ __("Our professional drivers will be waiting for you at the arrivals lounge with a nameboard, ready to assist with your luggage and drive you safely in our well-maintained, air-conditioned vehicles.") }}
                    </p>
                    <ul class="space-y-3 mt-6">
                        <li class="flex items-center gap-3 text-sm font-bold text-kigongoniBlue dark:text-gray-300 uppercase tracking-wide">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Meet & Greet Service') }}
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-kigongoniBlue dark:text-gray-300 uppercase tracking-wide">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Air-Conditioned Vehicles') }}
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-kigongoniBlue dark:text-gray-300 uppercase tracking-wide">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Experienced & Safe Drivers') }}
                        </li>
                    </ul>
                </div>

                {{-- Bei (Pricing Cards) --}}
                <div class="lg:w-1/2 w-full grid sm:grid-cols-2 gap-6" data-aos="fade-left">

                    {{-- KIA Route --}}
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-lg transition duration-300 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-kigongoniOrange/10 rounded-bl-full -z-10 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="w-12 h-12 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center mb-4 shadow-sm text-kigongoniOrange">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </div>
                        <h3 class="text-sm font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">{{ __('Route 1') }}</h3>
                        <h4 class="text-xl font-bold text-kigongoniBlue dark:text-white mb-2 leading-tight">Kilimanjaro Int'l Airport (KIA)</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-6 flex items-center gap-1">
                            <svg class="w-3 h-3 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ __('Approx. 3 Hours') }}
                        </p>
                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex items-end gap-1">
                            <span class="text-3xl font-black text-kigongoniOrange">$200</span>
                            <span class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">/ {{ __('Trip') }}</span>
                        </div>
                    </div>

                    {{-- Kisongo Route --}}
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-lg transition duration-300 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-kigongoniOrange/10 rounded-bl-full -z-10 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="w-12 h-12 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center mb-4 shadow-sm text-kigongoniOrange">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </div>
                        <h3 class="text-sm font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">{{ __('Route 2') }}</h3>
                        <h4 class="text-xl font-bold text-kigongoniBlue dark:text-white mb-2 leading-tight">Arusha Airport (Kisongo)</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-6 flex items-center gap-1">
                            <svg class="w-3 h-3 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ __('Approx. 2 Hours') }}
                        </p>
                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex items-end gap-1">
                            <span class="text-3xl font-black text-kigongoniOrange">$100</span>
                            <span class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">/ {{ __('Trip') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         WASILIANA NASI — BADALA YA FOMU
    ============================================================ --}}
    <section class="py-16 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-3xl">

            <div class="text-center mb-10" data-aos="fade-up">
                <h3 class="text-kigongoniOrange font-bold tracking-[0.2em] uppercase mb-2 text-sm">{{ __('Ready to Book?') }}</h3>
                <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">{{ __('Contact Us Directly') }}</h2>
                <div class="w-20 h-1.5 bg-kigongoniOrange mx-auto mt-5 rounded-full"></div>
                <p class="mt-5 text-gray-600 dark:text-gray-400 text-sm leading-relaxed max-w-xl mx-auto">
                    {{ __('To book your airport shuttle, simply reach out to us via phone, WhatsApp, or email. Our team will confirm your transfer details promptly.') }}
                </p>
            </div>

            <div class="grid sm:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">

                {{-- Simu / WhatsApp --}}
                <a href="tel:+255768219703"
                   class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-14 h-14 rounded-full bg-kigongoniOrange/10 flex items-center justify-center mb-4 group-hover:bg-kigongoniOrange transition-all duration-300">
                        <svg class="w-6 h-6 text-kigongoniOrange group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">{{ __('Phone') }}</p>
                    <p class="font-black text-kigongoniBlue dark:text-white text-sm">+255 768 219 703</p>
                </a>

                {{-- WhatsApp --}}
                <a href="https://wa.me/255768219703" target="_blank"
                   class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-14 h-14 rounded-full bg-green-50 dark:bg-green-900/20 flex items-center justify-center mb-4 group-hover:bg-green-500 transition-all duration-300">
                        <svg class="w-6 h-6 text-green-500 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">WhatsApp</p>
                    <p class="font-black text-kigongoniBlue dark:text-white text-sm">+255 768 219 703</p>
                </a>

                {{-- Email --}}
                <a href="mailto:info@kigongonigazella.com"
                   class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-14 h-14 rounded-full bg-kigongoniBlue/10 dark:bg-kigongoniBlue/20 flex items-center justify-center mb-4 group-hover:bg-kigongoniBlue transition-all duration-300">
                        <svg class="w-6 h-6 text-kigongoniBlue dark:text-blue-300 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">{{ __('Email') }}</p>
                    <p class="font-black text-kigongoniBlue dark:text-white text-sm break-all">gazellakigongoni@gmail.com</p>
                </a>

            </div>

            {{-- Note ya chini --}}
            <div class="mt-10 bg-kigongoniBlue/5 dark:bg-kigongoniBlue/20 border border-kigongoniBlue/15 dark:border-kigongoniBlue/30 rounded-2xl px-6 py-5 flex items-start gap-4" data-aos="fade-up" data-aos-delay="200">
                <div class="w-10 h-10 rounded-full bg-kigongoniOrange/15 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-kigongoniOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-black text-kigongoniBlue dark:text-white uppercase tracking-wide mb-1">{{ __('What to Include in Your Message') }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ __('Please mention your') }} <span class="font-bold text-kigongoniBlue dark:text-white">{{ __('full name') }}</span>,
                        <span class="font-bold text-kigongoniBlue dark:text-white">{{ __('pickup location') }}</span> Kilimanjaro Internationa Airport(JRO) or ArushaAirport(ARK),
                        <span class="font-bold text-kigongoniBlue dark:text-white">{{ __('arrival date & time') }}</span>,
                        {{ __('and your') }} <span class="font-bold text-kigongoniBlue dark:text-white">{{ __('flight number') }}</span>
                        {{ __('so we can prepare your transfer in advance.') }}
                    </p>
                </div>
            </div>

        </div>
    </section>

@endsection