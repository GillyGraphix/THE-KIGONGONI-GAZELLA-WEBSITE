@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 pt-24 pb-16 transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Kichwa cha Habari --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-kigongoniBlue dark:text-white mb-4">{{ __('privacy.title') }}</h1>
            <div class="w-24 h-1 bg-kigongoniOrange mx-auto rounded-full"></div>
            <p class="text-gray-500 dark:text-gray-400 mt-4">{{ __('privacy.last_updated') }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-12 text-gray-700 dark:text-gray-300 leading-relaxed space-y-8">

            {{-- 1 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s1_title') }}</h2>
                <p>{{ __('privacy.s1_body') }}</p>
            </section>

            {{-- 2 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s2_title') }}</h2>
                <p class="mb-2">{{ __('privacy.s2_intro') }}</p>
                <ul class="list-disc pl-5 space-y-1">
                    <li><strong>{{ __('privacy.s2_li1_label') }}</strong> {{ __('privacy.s2_li1_text') }}</li>
                    <li><strong>{{ __('privacy.s2_li2_label') }}</strong> {{ __('privacy.s2_li2_text') }}</li>
                </ul>
            </section>

            {{-- 3 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s3_title') }}</h2>
                <p>{{ __('privacy.s3_intro') }}</p>
                <ul class="list-disc pl-5 space-y-1 mt-2">
                    <li>{{ __('privacy.s3_li1') }}</li>
                    <li>{{ __('privacy.s3_li2') }}</li>
                    <li>{{ __('privacy.s3_li3') }}</li>
                    <li>{{ __('privacy.s3_li4') }}</li>
                </ul>
            </section>

            {{-- 4 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s4_title') }}</h2>
                <p>{{ __('privacy.s4_body') }}</p>
            </section>

            {{-- 5 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s5_title') }}</h2>
                <p>{{ __('privacy.s5_body') }}</p>
            </section>

            {{-- 6 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('privacy.s6_title') }}</h2>
                <p>{{ __('privacy.s6_intro') }}</p>
                <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-100 dark:border-gray-700">
                    <p><strong>Kigongoni Gazella Hotel</strong></p>
                    <p>{{ __('privacy.s6_location') }}</p>
                    <p>Email: <a href="mailto:booking@kigongonigazella.co.tz" class="text-kigongoniOrange hover:underline">booking@kigongonigazella.co.tz</a></p>
                    <p>{{ __('privacy.s6_phone') }}</p>
                </div>
            </section>

            {{-- Back Button --}}
            <div class="mt-8 flex justify-center border-t border-gray-100 dark:border-gray-700 pt-8">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-kigongoniBlue dark:text-gray-300 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange font-semibold transition-colors duration-300 group">
                    <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    {{ __('nav.back_home') }}
                </a>
            </div>

        </div>
    </div>
</div>
@endsection