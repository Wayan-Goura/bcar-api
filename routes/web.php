<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Web\{
    HomeController,
    CarController,
    TourController,
    GalleryController,
    ContactController,
    BookCarController,
    BookTourController,
    ReviewController
};

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    CarController as AdminCarController,
    TourController as AdminTourController,
    BookCarController as AdminBookCarController,
    BookTourController as AdminBookTourController
};

/*
|--------------------------------------------------------------------------
| PUBLIC WEB
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Cars (Web)
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Tours (Web)
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');

// Gallery & Contact
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Booking (Public Form Submit)
Route::post('/book-car', [BookCarController::class, 'store'])->name('book.car');
Route::post('/book-tour', [BookTourController::class, 'store'])->name('book.tour');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |------------------------------------------------------------------
        | Dashboard
        |------------------------------------------------------------------
        */
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |------------------------------------------------------------------
        | Master Data
        |------------------------------------------------------------------
        */
        Route::resource('/cars', AdminCarController::class);
        Route::resource('/tours', AdminTourController::class);

        /*
        |------------------------------------------------------------------
        | Booking Data - CAR
        |------------------------------------------------------------------
        */
        Route::get('/book-cars', [AdminBookCarController::class, 'index'])
            ->name('book-cars.index');

        Route::post('/book-cars/{id}/approve', [AdminBookCarController::class, 'approve'])
            ->name('book-cars.approve');

        Route::post('/book-cars/{id}/complete', [AdminBookCarController::class, 'complete'])
            ->name('book-cars.complete');

        Route::delete('/book-cars/{id}', [AdminBookCarController::class, 'cancel'])
            ->name('book-cars.cancel');

        /*
        |------------------------------------------------------------------
        | Booking Data - TOUR
        |------------------------------------------------------------------
        */
        Route::get('/book-tours', [AdminBookTourController::class, 'index'])
            ->name('book-tours.index');

        Route::post('/book-tours/{id}/approve', [AdminBookTourController::class, 'approve'])
            ->name('book-tours.approve');

        Route::post('/book-tours/{id}/complete', [AdminBookTourController::class, 'complete'])
            ->name('book-tours.complete');

        Route::delete('/book-tours/{id}', [AdminBookTourController::class, 'cancel'])
            ->name('book-tours.cancel');

        /*
        |------------------------------------------------------------------
        | Logout
        |------------------------------------------------------------------
        */
        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });
