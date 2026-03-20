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
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-kigongoniBlue/30 via-kigongoniBlue/50 to-kigongoniBlue/90"></div>

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
        $jpgPhotos = array_filter($photos, function($photo) {
            $ext = strtolower(pathinfo(parse_url($photo, PHP_URL_PATH), PATHINFO_EXTENSION));
            return in_array($ext, ['jpg', 'jpeg', 'png']);
        });
        $jpgPhotos = array_values($jpgPhotos);
    @endphp

    <section class="py-12 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="flex items-center justify-between mb-8">
                <p class="text-gray-400 dark:text-gray-500 text-[10px] md:text-xs font-semibold uppercase tracking-widest">
                    {{ __('Tap photo to view full size') }}
                </p>
                <span class="text-kigongoniOrange text-[10px] md:text-xs font-black uppercase tracking-widest bg-kigongoniOrange/10 border border-kigongoniOrange/20 px-3 py-1 rounded-full">
                    {{ count($jpgPhotos) }} {{ __('Photos') }}
                </span>
            </div>

            {{-- GRID ILIYOREKEBISHWA: 2 columns kwenye simu, 3-5 kwenye PC --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 md:gap-4" id="gallery-grid">
                @foreach($jpgPhotos as $index => $photo)
                <div class="relative overflow-hidden rounded-lg group shadow-sm cursor-pointer gallery-item aspect-square"
                     data-index="{{ $index }}"
                     data-src="{{ $photo }}"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index % 5) * 50 }}">
                    
                    <img src="{{ $photo }}"
                         alt="{{ __('Kigongoni Gazella Hotel') }}"
                         loading="lazy"
                         class="w-full h-full object-cover block group-hover:scale-110 transition duration-700">
                    
                    {{-- Overlay ya Hover --}}
                    <div class="absolute inset-0 bg-kigongoniBlue/0 group-hover:bg-kigongoniBlue/30 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 border-t border-gray-100 dark:border-gray-800 pt-8 flex justify-center">
                <a href="javascript:history.back()" class="inline-flex items-center justify-center gap-2 px-8 py-3 text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-kigongoniOrange transition bg-gray-50 dark:bg-gray-800 rounded-full border border-gray-200 dark:border-gray-700 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    {{ __('Go Back') }}
                </a>
            </div>

        </div>
    </section>

    {{-- ============================================================
         LIGHTBOX (Inabaki vilevile kwa sababu inafanya kazi vizuri)
    ============================================================ --}}
    <div id="lightbox" class="fixed inset-0 z-[9999] hidden" role="dialog" aria-modal="true">
        <div id="lb-backdrop" class="absolute inset-0 bg-black/90"></div>

        <div class="absolute top-0 left-0 right-0 flex items-center justify-between px-6 py-4 z-20">
            <div class="flex items-center gap-3">
                <div class="w-1 h-6 bg-kigongoniOrange rounded-full"></div>
                <span class="text-white/70 text-[10px] font-black uppercase tracking-[0.3em]">{{ __('Kigongoni Gazella') }}</span>
            </div>
            <div class="flex items-center gap-4">
                <a id="lb-download" href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-kigongoniOrange transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </a>
                <button id="lb-close" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-kigongoniOrange transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <button id="lb-prev" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/20 hover:bg-kigongoniOrange text-white z-20 transition">
            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button id="lb-next" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/20 hover:bg-kigongoniOrange text-white z-20 transition">
            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>

        <div class="relative z-10 flex items-center justify-center w-full h-full p-4">
            <img id="lb-img" src="" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl transition-all duration-300" alt="">
        </div>

        <div class="absolute bottom-4 left-0 right-0 z-20 overflow-x-auto scrollbar-hide px-4">
            <div id="lb-filmstrip" class="flex items-center justify-center gap-2"></div>
        </div>
    </div>

@endsection

@section('scripts')
<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

    .filmstrip-thumb {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        object-fit: cover;
        border-radius: 6px;
        border: 2px solid transparent;
        opacity: 0.5;
        cursor: pointer;
        transition: 0.2s;
    }
    .filmstrip-thumb.active { border-color: #ef4a25; opacity: 1; transform: scale(1.1); }

    #lb-img.entering { opacity: 0; transform: scale(0.95); }
    #lb-img.visible { opacity: 1; transform: scale(1); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const grid = document.getElementById('gallery-grid');
    const items = Array.from(document.querySelectorAll('.gallery-item'));
    const srcs = items.map(el => el.dataset.src);
    let current = 0;

    const lightbox = document.getElementById('lightbox');
    const lbImg = document.getElementById('lb-img');
    const lbClose = document.getElementById('lb-close');
    const lbPrev = document.getElementById('lb-prev');
    const lbNext = document.getElementById('lb-next');
    const filmstrip = document.getElementById('lb-filmstrip');
    const downloadBtn = document.getElementById('lb-download');

    // Tengeneza filmstrip thumbs
    srcs.forEach((src, i) => {
        const img = document.createElement('img');
        img.src = src;
        img.className = 'filmstrip-thumb';
        img.addEventListener('click', () => show(i));
        filmstrip.appendChild(img);
    });

    function show(index) {
        current = (index + srcs.length) % srcs.length;
        lbImg.classList.remove('visible');
        lbImg.classList.add('entering');

        setTimeout(() => {
            lbImg.src = srcs[current];
            lbImg.onload = () => {
                lbImg.classList.remove('entering');
                lbImg.classList.add('visible');
            };
            downloadBtn.href = srcs[current];
            
            // Update thumbs
            filmstrip.querySelectorAll('.filmstrip-thumb').forEach((t, i) => {
                t.classList.toggle('active', i === current);
            });
        }, 150);
    }

    grid.addEventListener('click', e => {
        const item = e.target.closest('.gallery-item');
        if (item) {
            show(parseInt(item.dataset.index));
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    });

    lbClose.addEventListener('click', () => {
        lightbox.classList.add('hidden');
        document.body.style.overflow = '';
    });

    lbPrev.addEventListener('click', () => show(current - 1));
    lbNext.addEventListener('click', () => show(current + 1));

    // Keyboard navigation
    document.addEventListener('keydown', e => {
        if (lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape') lbClose.click();
        if (e.key === 'ArrowLeft') show(current - 1);
        if (e.key === 'ArrowRight') show(current + 1);
    });
});
</script>
@endsection