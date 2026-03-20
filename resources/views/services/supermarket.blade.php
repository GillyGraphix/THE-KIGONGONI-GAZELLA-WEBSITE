@extends('layouts.app')

@section('content')

    {{-- ============================================================
         HERO SECTION YA SUPERMARKET
    ============================================================ --}}
    <section class="relative h-[40vh] min-h-[400px] flex items-center justify-center text-center text-white overflow-hidden mt-[var(--navbar-height)]">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/services/supermarket-hero.jpg') }}" alt="Supermarket Hero" class="w-full h-full object-cover filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-b from-kigongoniBlue/80 via-kigongoniBlue/50 to-kigongoniBlue/90"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 px-4" data-aos="fade-up">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-kigongoniOrange"></div>
                <span class="text-xs font-black uppercase tracking-[0.3em] text-kigongoniOrange">{{ __('On-Site Convenience') }}</span>
                <div class="h-px w-8 bg-kigongoniOrange"></div>
            </div>
            <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-4 drop-shadow-lg">{{ __('Mini Supermarket') }}</h1>
            <p class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto tracking-wide">
                {{ __("Everything you need for your safari and stay, right at your fingertips.") }}
            </p>
        </div>
    </section>

    {{-- ============================================================
         MAELEZO NA HUDUMA ZINAZOPATIKANA
    ============================================================ --}}
    <section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-5xl">
            
            {{-- Back Button (Inakurudisha kwenye home kwenye section ya Services) --}}
            <a href="{{ url('/') }}#services" class="inline-flex items-center gap-2 text-sm font-bold text-kigongoniBlue dark:text-gray-300 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange mb-10 transition duration-300 uppercase tracking-wider group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ __('Back to Services') }}
            </a>

            <div class="flex flex-col md:flex-row gap-12 items-start">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-black text-kigongoniBlue dark:text-white uppercase tracking-wide mb-6">{{ __('Shop Without Leaving The Hotel') }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        {{ __("We understand that whether you are just arriving from a long journey or preparing for an early morning game drive, having quick access to essentials is crucial. Our well-stocked mini supermarket is designed to offer you ultimate convenience.") }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ __("From personal care items you might have forgotten, to your favorite snacks, cold beverages, and even local Tanzanian souvenirs to take back home, we have it all curated for our guests.") }}
                    </p>
                </div>

                <div class="md:w-1/2 bg-gray-50 dark:bg-gray-800 p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm" data-aos="fade-left">
                    <h3 class="text-xl font-bold text-kigongoniOrange uppercase tracking-widest mb-6">{{ __('What You Can Find') }}</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-medium">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Safari snacks and packed treats') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-medium">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Cold drinks, juices, and water') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-medium">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Toiletries and personal hygiene products') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-medium">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Basic medical supplies and sunscreens') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-medium">
                            <svg class="w-5 h-5 text-kigongoniOrange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ __('Local crafts, coffee, and tea souvenirs') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         SUPERMARKET GALLERY GRID (PICHA 10)
    ============================================================ --}}
    @php
        // Tunatengeneza Array ya picha 10 zilizoko kwenye folder la supermarket
        $photos = [];
        for($i = 1; $i <= 10; $i++) {
            $photos[] = asset('images/services/supermarket/' . $i . '.jpg');
        }
    @endphp

    <section class="py-16 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="text-center mb-10" data-aos="fade-up">
                <h3 class="text-2xl font-black text-kigongoniBlue dark:text-white uppercase tracking-tight">{{ __('A Glimpse Inside') }}</h3>
                <div class="w-16 h-1 bg-kigongoniOrange mx-auto mt-4 rounded-full mb-8"></div>
            </div>

            <div class="flex items-center justify-between mb-8">
                <p class="text-gray-400 dark:text-gray-500 text-xs font-semibold uppercase tracking-widest">
                    {{ __('Click any photo to view full size') }}
                </p>
                <span class="text-kigongoniOrange text-xs font-black uppercase tracking-widest bg-kigongoniOrange/10 border border-kigongoniOrange/20 px-4 py-1.5 rounded-full">
                    {{ count($photos) }} {{ __('Photos') }}
                </span>
            </div>

            {{-- Masonry Grid --}}
            <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4" id="gallery-grid">
                @foreach($photos as $index => $photo)
                <div class="break-inside-avoid relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item"
                     data-index="{{ $index }}"
                     data-src="{{ $photo }}"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index % 4) * 60 }}">
                    <img src="{{ $photo }}"
                         alt="{{ __('Mini Supermarket View') }}"
                         loading="lazy"
                         class="w-full h-auto block group-hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/35 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-100 transition-all duration-300 w-12 h-12 rounded-full border-2 border-white flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-kigongoniOrange scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ============================================================
         LIGHTBOX (Modal)
    ============================================================ --}}
    <div id="lightbox" class="fixed inset-0 z-[9999] hidden" role="dialog" aria-modal="true">

        {{-- Backdrop --}}
        <div id="lb-backdrop" class="absolute inset-0 bg-black/75"></div>

        {{-- Top bar --}}
        <div class="absolute top-0 left-0 right-0 flex items-center justify-between px-6 py-4 z-20">
            <div class="flex items-center gap-3">
                <div class="w-1 h-6 bg-kigongoniOrange rounded-full"></div>
                <span class="text-white/70 text-xs font-black uppercase tracking-[0.3em]">{{ __('Kigongoni Gazella Hotel') }}</span>
            </div>
            <div class="flex items-center gap-4">
                <span id="lb-counter" class="text-white/50 text-xs font-semibold uppercase tracking-widest hidden sm:inline"></span>
                
                {{-- Download Button inayotumia Route ya Watermark --}}
                <a id="lb-download" href="#" 
                   class="w-9 h-9 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white"
                   title="Download with Watermark">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </a>

                <button id="lb-close"
                    class="w-9 h-9 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Prev --}}
        <button id="lb-prev"
            class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- Next --}}
        <button id="lb-next"
            class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Image --}}
        <div class="relative z-10 flex items-center justify-center w-full h-full px-14 md:px-20 py-20">
            <img id="lb-img" src="" alt="">
        </div>

        {{-- Filmstrip --}}
        <div class="absolute bottom-0 left-0 right-0 z-20 py-3 px-4 bg-gradient-to-t from-black/60 to-transparent">
            <div id="lb-filmstrip" class="flex items-center justify-center gap-2 overflow-x-auto pb-1 scrollbar-hide">
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

    .filmstrip-thumb {
        width: 48px;
        height: 36px;
        flex-shrink: 0;
        object-fit: cover;
        border-radius: 4px;
        border: 2px solid transparent;
        opacity: 0.4;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .filmstrip-thumb:hover  { opacity: 0.75; }
    .filmstrip-thumb.active { border-color: #ef4a25; opacity: 1; }

    #gallery-grid:hover .gallery-item {
        opacity: 0.3;
        transform: scale(0.98);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    #gallery-grid:hover .gallery-item:hover {
        opacity: 1;
        transform: scale(1.01);
        z-index: 2;
        box-shadow: 0 20px 60px rgba(18, 57, 96, 0.35);
    }

    #gallery-grid.lb-dimmed .gallery-item {
        opacity: 0.08 !important;
        transform: scale(1) !important;
        transition: opacity 0.4s ease !important;
        pointer-events: none;
    }

    #lb-img {
        display: block;
        max-width: min(109vw, 1480px);
        max-height: 85vh;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 0 0 1px rgba(255,255,255,0.08), 0 30px 80px rgba(0,0,0,0.75);
        transition: opacity 0.25s ease, transform 0.3s cubic-bezier(0.34, 1.4, 0.64, 1);
    }

    #lb-img.entering { opacity: 0; transform: scale(0.92); }
    #lb-img.visible { opacity: 1; transform: scale(1); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const grid      = document.getElementById('gallery-grid');
    const items     = Array.from(document.querySelectorAll('.gallery-item'));
    const srcs      = items.map(el => el.dataset.src);
    let   current   = 0;

    const lightbox  = document.getElementById('lightbox');
    const lbImg     = document.getElementById('lb-img');
    const lbCounter = document.getElementById('lb-counter');
    const lbClose   = document.getElementById('lb-close');
    const lbPrev    = document.getElementById('lb-prev');
    const lbNext    = document.getElementById('lb-next');
    const filmstrip = document.getElementById('lb-filmstrip');
    const backdrop  = document.getElementById('lb-backdrop');
    const downloadBtn = document.getElementById('lb-download');

    srcs.forEach((src, i) => {
        const img         = document.createElement('img');
        img.src           = src;
        img.className     = 'filmstrip-thumb';
        img.dataset.index = i;
        img.addEventListener('click', () => show(i));
        filmstrip.appendChild(img);
    });

    function show(index) {
        current = (index + srcs.length) % srcs.length;

        lbImg.classList.remove('visible');
        lbImg.classList.add('entering');

        setTimeout(() => {
            lbImg.src = srcs[current];
            if (lbImg.complete && lbImg.naturalWidth > 0) {
                lbImg.classList.remove('entering');
                lbImg.classList.add('visible');
            } else {
                lbImg.onload = () => {
                    lbImg.classList.remove('entering');
                    lbImg.classList.add('visible');
                };
            }
        }, 180);

        lbCounter.textContent = `${current + 1} / ${srcs.length}`;
        
        // Hapa ndipo Download link inabadilika kulingana na picha inayotazamwa
        downloadBtn.href = `/gallery/download?image=${encodeURIComponent(srcs[current])}`;

        filmstrip.querySelectorAll('.filmstrip-thumb').forEach((t, i) => {
            t.classList.toggle('active', i === current);
        });
        const activeThumb = filmstrip.children[current];
        if (activeThumb) {
            activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }
    }

    function open(index) {
        show(index);
        lightbox.classList.remove('hidden');
        grid.classList.add('lb-dimmed');
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lightbox.classList.add('hidden');
        grid.classList.remove('lb-dimmed');
        document.body.style.overflow = '';
    }

    grid.addEventListener('click', e => {
        const item = e.target.closest('.gallery-item');
        if (item) open(parseInt(item.dataset.index));
    });

    lbClose.addEventListener('click', close);
    backdrop.addEventListener('click', close);
    lbPrev.addEventListener('click', () => show(current - 1));
    lbNext.addEventListener('click', () => show(current + 1));

    document.addEventListener('keydown', e => {
        if (lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape')     close();
        if (e.key === 'ArrowLeft')  show(current - 1);
        if (e.key === 'ArrowRight') show(current + 1);
    });

    let touchStartX = 0;
    lightbox.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].clientX;
    }, { passive: true });
    lightbox.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) show(diff > 0 ? current + 1 : current - 1);
    });

});
</script>
@endsection