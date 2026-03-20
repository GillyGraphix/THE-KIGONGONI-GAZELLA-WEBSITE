@extends('layouts.app')

@section('content')

    {{-- ============================================================
         BREADCRUMB
    ============================================================ --}}
    <div class="bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4 py-3 max-w-6xl">
            <nav class="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">
                <a href="/" class="hover:text-kigongoniOrange transition">{{ __('Home') }}</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-kigongoniOrange">{{ __('Gallery') }}</span>
            </nav>
        </div>
    </div>

    {{-- ============================================================
         HERO BANNER
    ============================================================ --}}
    <section class="relative h-64 md:h-80 flex items-end overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('/images/gallery/hotel-exterior.jpg');"
             onerror="this.style.backgroundImage='url(https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1600&q=80)'">
            <img src="/images/gallery/hotel-exterior.jpg"
                 onerror="this.parentElement.style.backgroundImage='url(https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1600&q=80)'"
                 class="hidden">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-kigongoniBlue/30 via-kigongoniBlue/50 to-kigongoniBlue/90"></div>

        <div class="absolute top-6 left-6 w-12 h-12 border-t-2 border-l-2 border-kigongoniOrange/60 hidden md:block"></div>
        <div class="absolute top-6 right-6 w-12 h-12 border-t-2 border-r-2 border-kigongoniOrange/60 hidden md:block"></div>

        <div class="container mx-auto px-4 relative z-10 pb-10 max-w-6xl">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-kigongoniOrange text-xs font-black uppercase tracking-[0.3em] mb-2">{{ __('Kigongoni Gazella Hotel') }}</p>
                    <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight leading-none">{{ __('Photo Gallery') }}</h1>
                </div>
                <a href="{{ url('/') }}#gallery"
                   class="hidden md:inline-flex items-center gap-2 text-white/60 hover:text-kigongoniOrange text-xs font-black uppercase tracking-widest transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    {{ __('Back to Home') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================
         GALLERY GRID
    ============================================================ --}}
    @php
        // SEHEMU MPYA: Tunachuja picha na kubakiza zile za JPG/JPEG pekee
        $jpgPhotos = array_filter($photos, function($photo) {
            $ext = strtolower(pathinfo(parse_url($photo, PHP_URL_PATH), PATHINFO_EXTENSION));
            return in_array($ext, ['jpg', 'jpeg']);
        });
        // Tunapanga upya namba za index (0, 1, 2...) ili JavaScript isipate shida
        $jpgPhotos = array_values($jpgPhotos);
    @endphp

    <section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="flex items-center justify-between mb-10">
                <p class="text-gray-400 dark:text-gray-500 text-xs font-semibold uppercase tracking-widest">
                    {{ __('Click any photo to view full size') }}
                </p>
                <span class="text-kigongoniOrange text-xs font-black uppercase tracking-widest bg-kigongoniOrange/10 border border-kigongoniOrange/20 px-4 py-1.5 rounded-full">
                    {{-- Tumebadilisha $photos kuwa $jpgPhotos hapa --}}
                    {{ count($jpgPhotos) }} {{ __('Photos') }}
                </span>
            </div>

            <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4" id="gallery-grid">
                {{-- Tumebadilisha $photos kuwa $jpgPhotos hapa --}}
                @foreach($jpgPhotos as $index => $photo)
                <div class="break-inside-avoid relative overflow-hidden rounded-xl group shadow-md cursor-pointer gallery-item"
                     data-index="{{ $index }}"
                     data-src="{{ $photo }}"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index % 4) * 60 }}">
                    <img src="{{ $photo }}"
                         alt="{{ __('Kigongoni Gazella Hotel') }}"
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

            <div class="mt-12 border-t border-gray-200 dark:border-gray-800 pt-8 flex justify-start">
                <a href="javascript:history.back()" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-kigongoniOrange dark:hover:text-kigongoniOrange transition bg-gray-50 dark:bg-gray-800 hover:bg-white dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    {{ __('Go Back') }}
                </a>
            </div>

        </div>
    </section>

    {{-- ============================================================
         LIGHTBOX
    ============================================================ --}}
    <div id="lightbox" class="fixed inset-0 z-[9999] hidden" role="dialog" aria-modal="true">

        <div id="lb-backdrop" class="absolute inset-0 bg-black/75"></div>

        <div class="absolute top-0 left-0 right-0 flex items-center justify-between px-6 py-4 z-20">
            <div class="flex items-center gap-3">
                <div class="w-1 h-6 bg-kigongoniOrange rounded-full"></div>
                <span class="text-white/70 text-xs font-black uppercase tracking-[0.3em]">{{ __('Kigongoni Gazella Hotel') }}</span>
            </div>
            <div class="flex items-center gap-4">
                <span id="lb-counter" class="text-white/50 text-xs font-semibold uppercase tracking-widest hidden sm:inline"></span>
                
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

        <button id="lb-prev"
            class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button id="lb-next"
            class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-kigongoniOrange transition duration-200 flex items-center justify-center text-white z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <div class="relative z-10 flex items-center justify-center w-full h-full px-14 md:px-20 py-20">
            <img id="lb-img" src="" alt="">
        </div>

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