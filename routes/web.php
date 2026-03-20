<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;

// ─────────────────────────────────────────────
// KUBADILI LUGHA
// ─────────────────────────────────────────────
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'sw'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');

// ─────────────────────────────────────────────
// HOME PAGE
// ─────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ─────────────────────────────────────────────
// BOOKING SYSTEM ROUTES
// ─────────────────────────────────────────────
// availability (imebaki kama ilivyokuwa — itumike kama mtu anakuja moja kwa moja)
Route::get('/availability', [BookingController::class, 'availability'])->name('booking.availability');

// checkout — inahitaji room_id kwenye URL path
// room_id 1 = Standard Double, 2 = Standard Triple, 3 = Standard Family
Route::get('/checkout/{room_id}', [BookingController::class, 'checkout'])->name('booking.checkout');

Route::post('/book/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');

// ─────────────────────────────────────────────
// ROOMS — Detail pages za vyumba
// ─────────────────────────────────────────────
Route::get('/rooms/standard-double', function () {
    return view('rooms.standard-double');
})->name('rooms.standard-double');

Route::get('/rooms/standard-triple', function () {
    return view('rooms.standard-triple');
})->name('rooms.standard-triple');

Route::get('/rooms/standard-family', function () {
    return view('rooms.standard-family');
})->name('rooms.standard-family');

// ─────────────────────────────────────────────
// SERVICES — Detail pages za huduma za ziada
// ─────────────────────────────────────────────
Route::get('/services/supermarket', function () {
    return view('services.supermarket');
})->name('services.supermarket');

Route::get('/services/shuttle', function () {
    return view('services.shuttle');
})->name('services.shuttle');

Route::get('/services/bicycle', function () {
    return view('services.bicycle');
})->name('services.bicycle');

// ─────────────────────────────────────────────
// GALLERY
// ─────────────────────────────────────────────
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/download', [GalleryController::class, 'downloadImage'])->name('gallery.download');

// ─────────────────────────────────────────────
// ADMIN — Kubadili bei za vyumba
// ─────────────────────────────────────────────
Route::get('/admin/pricing', [PricingController::class, 'index'])
    ->name('admin.pricing');

Route::put('/admin/pricing', [PricingController::class, 'update'])
    ->name('admin.pricing.update');

// ─────────────────────────────────────────────
// LEGAL & INFO PAGES — Privacy, Terms, FAQ
// ─────────────────────────────────────────────
Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('terms');
})->name('terms');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');