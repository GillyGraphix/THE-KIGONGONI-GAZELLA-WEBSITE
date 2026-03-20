@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 pt-24 pb-16 transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Kichwa cha Habari --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-kigongoniBlue dark:text-white mb-4">{{ __('faq.title') }}</h1>
            <div class="w-24 h-1 bg-kigongoniOrange mx-auto rounded-full"></div>
            <p class="text-gray-500 dark:text-gray-400 mt-4">{{ __('faq.subtitle') }}</p>
        </div>

        {{-- Orodha ya Maswali na Majibu --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-12 text-gray-700 dark:text-gray-300 leading-relaxed space-y-8">

            {{-- Swali la 1 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q1_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q1_answer') }}
                </p>
            </div>

            {{-- Swali la 2 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q2_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q2_answer') }}
                </p>
            </div>

            {{-- Swali la 3 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q3_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q3_answer') }}
                </p>
            </div>

            {{-- Swali la 4 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q4_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q4_answer') }}
                </p>
            </div>

            {{-- Swali la 5 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q5_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q5_answer') }}
                </p>
            </div>

            {{-- Swali la 6 --}}
            <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0">
                <h3 class="text-xl font-semibold text-kigongoniBlue dark:text-white mb-2 flex items-start gap-2">
                    <span class="text-kigongoniOrange">Q:</span>
                    {{ __('faq.q6_question') }}
                </h3>
                <p class="ml-6">
                    <strong class="text-kigongoniOrange dark:text-kigongoniOrange">A:</strong>
                    {{ __('faq.q6_answer') }}
                </p>
            </div>

            {{-- Contact Banner --}}
            <div class="mt-8 p-6 bg-kigongoniBlue dark:bg-gray-950 rounded-xl text-center">
                <h4 class="text-lg font-bold text-white mb-2">{{ __('faq.still_questions') }}</h4>
                <p class="text-gray-300 text-sm mb-4">{{ __('faq.reception_available') }}</p>
                <a href="https://wa.me/255768219703" target="_blank"
                   class="inline-flex items-center gap-2 bg-kigongoniOrange text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-600 transition duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.077 4.928C17.191 3.041 14.683 2 12.006 2 6.798 2 2.548 6.193 2.54 11.393c-.003 1.751.456 3.466 1.33 5.004L2.34 21.381c-.103.394.258.75.648.648l4.967-1.478c1.52.83 3.222 1.266 4.973 1.266h.004c5.2 0 9.454-4.195 9.462-9.396.004-2.51-.971-4.868-2.857-6.754l-.009-.008zm-7.071 14.29c-1.438 0-2.846-.385-4.065-1.107l-.292-.173-2.942.875.876-2.868-.191-.301c-.781-1.234-1.193-2.655-1.19-4.111.007-3.649 2.973-6.612 6.628-6.612 1.768 0 3.431.689 4.682 1.94 1.25 1.25 1.939 2.913 1.937 4.682-.005 3.648-2.971 6.615-6.621 6.615h-.002zm3.629-4.953c-.199-.1-1.179-.581-1.361-.647-.182-.066-.315-.1-.448.099-.133.199-.515.647-.632.779-.117.133-.234.149-.433.05-.199-.1-.84-.309-1.599-.986-.589-.525-.987-1.174-1.103-1.372-.117-.199-.013-.306.088-.405.09-.089.199-.233.298-.35.1-.116.133-.199.199-.332.066-.133.033-.249-.017-.348-.05-.1-.448-1.077-.614-1.475-.162-.385-.326-.333-.448-.339-.116-.006-.249-.006-.382-.006s-.35.05-.532.249c-.182.199-.695.679-.695 1.657 0 .978.712 1.923.811 2.056.099.133 1.399 2.133 3.39 2.991 1.99.858 1.99.573 2.349.537.359-.036 1.159-.473 1.322-.93.163-.457.163-.848.114-.93-.049-.082-.182-.133-.382-.232z"/></svg>
                    {{ __('faq.whatsapp_us') }}
                </a>
            </div>

            {{-- Button ya Kurudi Nyumbani --}}
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