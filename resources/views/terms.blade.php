@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 pt-24 pb-16 transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Kichwa cha Habari --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-kigongoniBlue dark:text-white mb-4">{{ __('terms.title') }}</h1>
            <div class="w-24 h-1 bg-kigongoniOrange mx-auto rounded-full"></div>
            <p class="text-gray-500 dark:text-gray-400 mt-4">{{ __('terms.last_updated') }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-12 text-gray-700 dark:text-gray-300 leading-relaxed space-y-8">

            {{-- 1 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s1_title') }}</h2>
                <p>{{ __('terms.s1_body') }}</p>
            </section>

            {{-- 2 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s2_title') }}</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>{{ __('terms.s2_li1_label') }}</strong> {{ __('terms.s2_li1_text') }}</li>
                    <li><strong>{{ __('terms.s2_li2_label') }}</strong> {{ __('terms.s2_li2_text') }}</li>
                    <li><strong>{{ __('terms.s2_li3_label') }}</strong> {{ __('terms.s2_li3_text') }}</li>
                </ul>
            </section>

            {{-- 3 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s3_title') }}</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>{{ __('terms.s3_li1_label') }}</strong> {{ __('terms.s3_li1_text') }}</li>
                    <li><strong>{{ __('terms.s3_li2_label') }}</strong> {{ __('terms.s3_li2_text') }}</li>
                    <li><strong>{{ __('terms.s3_li3_label') }}</strong> {{ __('terms.s3_li3_text') }}</li>
                </ul>
            </section>

            {{-- 4 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s4_title') }}</h2>
                <p class="mb-2">{{ __('terms.s4_intro') }}</p>
                <ul class="list-disc pl-5 space-y-2">
                    <li>{{ __('terms.s4_li2') }}</li>
                    <li>{{ __('terms.s4_li3') }}</li>
                </ul>
            </section>

            {{-- 5 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s5_title') }}</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>{{ __('terms.s5_li1_label') }}</strong> {{ __('terms.s5_li1_text') }}</li>
                    <li><strong>{{ __('terms.s5_li2_label') }}</strong> {{ __('terms.s5_li2_text') }}</li>
                    <li><strong>{{ __('terms.s5_li3_label') }}</strong> {{ __('terms.s5_li3_text') }}</li>
                </ul>
            </section>

            {{-- 6 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s6_title') }}</h2>
                <p>{{ __('terms.s6_body') }}</p>
            </section>

            {{-- 7 --}}
            <section>
                <h2 class="text-2xl font-semibold text-kigongoniBlue dark:text-white mb-3">{{ __('terms.s7_title') }}</h2>
                <p>{{ __('terms.s7_intro') }}</p>
                <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-100 dark:border-gray-700">
                    <p><strong>Kigongoni Gazella Hotel</strong></p>
                    <p>{{ __('terms.s7_location') }}</p>
                    <p>Email: <a href="booking@kigongonigazella.co.tz" class="text-kigongoniOrange hover:underline">booking@kigongonigazella.co.tz</a></p>
                    <p>{{ __('terms.s7_phone') }}</p>
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