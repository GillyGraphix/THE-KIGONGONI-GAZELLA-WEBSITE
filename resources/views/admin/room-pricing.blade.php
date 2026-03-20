@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300 py-12">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header --}}
        <div class="mb-10">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-1 bg-kigongoniOrange rounded-full"></div>
                <span class="text-kigongoniOrange text-xs font-black uppercase tracking-[0.3em]">Admin Panel</span>
            </div>
            <h1 class="text-4xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">Room Pricing</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Manage low season and high season rates for each room type.</p>
        </div>

        {{-- Success message --}}
        @if(session('success'))
        <div class="mb-6 flex items-center gap-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-400 px-5 py-4 rounded-xl">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="font-semibold text-sm">{{ session('success') }}</span>
        </div>
        @endif

        <form action="{{ route('admin.pricing.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Room 1: Standard Double Room --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="bg-kigongoniBlue dark:bg-gray-900 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-white font-black uppercase tracking-wide text-sm">Standard Double Room</h2>
                    <span class="text-xs text-gray-400 font-semibold uppercase tracking-widest">Room Type 1</span>
                </div>
                <div class="p-6 grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase tracking-wider mb-2">
                            Low Season Rate (USD / night)
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="standard_double_low" min="0" step="1"
                                   value="{{ old('standard_double_low', $pricing['standard_double']['low'] ?? 50) }}"
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1.5">Applies during off-peak months</p>
                    </div>
                    <div>
                        <label class="block text-xs font-black text-kigongoniOrange uppercase tracking-wider mb-2">
                            High Season Rate (USD / night)
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="standard_double_high" min="0" step="1"
                                   value="{{ old('standard_double_high', $pricing['standard_double']['high'] ?? 80) }}"
                                   class="w-full border-2 border-kigongoniOrange/40 dark:border-kigongoniOrange/30 bg-orange-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1.5">Applies during peak safari season</p>
                    </div>
                </div>
            </div>

            {{-- Room 2: Standard Triple --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="bg-kigongoniBlue dark:bg-gray-900 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-white font-black uppercase tracking-wide text-sm">Standard Triple</h2>
                    <span class="text-xs text-gray-400 font-semibold uppercase tracking-widest">Room Type 2</span>
                </div>
                <div class="p-6 grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase tracking-wider mb-2">Low Season Rate (USD / night)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="standard_triple_low" min="0" step="1"
                                   value="{{ old('standard_triple_low', $pricing['standard_triple']['low'] ?? 75) }}"
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-black text-kigongoniOrange uppercase tracking-wider mb-2">High Season Rate (USD / night)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="standard_triple_high" min="0" step="1"
                                   value="{{ old('standard_triple_high', $pricing['standard_triple']['high'] ?? 110) }}"
                                   class="w-full border-2 border-kigongoniOrange/40 dark:border-kigongoniOrange/30 bg-orange-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Room 3: Deluxe Family Suite --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="bg-kigongoniBlue dark:bg-gray-900 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-white font-black uppercase tracking-wide text-sm">Deluxe Family Suite</h2>
                    <span class="text-xs text-kigongoniOrange font-black uppercase tracking-widest">Best Value</span>
                </div>
                <div class="p-6 grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black text-kigongoniBlue dark:text-gray-300 uppercase tracking-wider mb-2">Low Season Rate (USD / night)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="deluxe_suite_low" min="0" step="1"
                                   value="{{ old('deluxe_suite_low', $pricing['deluxe_suite']['low'] ?? 120) }}"
                                   class="w-full border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-black text-kigongoniOrange uppercase tracking-wider mb-2">High Season Rate (USD / night)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">$</span>
                            <input type="number" name="deluxe_suite_high" min="0" step="1"
                                   value="{{ old('deluxe_suite_high', $pricing['deluxe_suite']['high'] ?? 200) }}"
                                   class="w-full border-2 border-kigongoniOrange/40 dark:border-kigongoniOrange/30 bg-orange-50 dark:bg-gray-700 dark:text-white rounded-xl pl-8 pr-4 py-3 focus:ring-2 focus:ring-kigongoniOrange focus:border-kigongoniOrange focus:outline-none transition font-bold text-lg">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Save Button --}}
            <div class="flex items-center justify-between pt-2">
                <p class="text-xs text-gray-400 dark:text-gray-500 font-semibold">
                    Changes take effect immediately on the website.
                </p>
                <button type="submit"
                    class="inline-flex items-center gap-3 bg-kigongoniOrange text-white font-black px-10 py-4 rounded-xl hover:bg-kigongoniBlue transition duration-300 shadow-xl uppercase tracking-widest text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    Save All Prices
                </button>
            </div>
        </form>
    </div>
</div>
@endsection