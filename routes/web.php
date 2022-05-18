<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Frontend\WelcomeController::class, 'index'])->name('mainpage');
Route::get('/categories', [\App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [\App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories/store-review', [\App\Http\Controllers\Frontend\CategoryController::class, 'storeReview'])->name('categories.store.review');
Route::get('/menus', [\App\Http\Controllers\Frontend\MenuController::class, 'index'])->name('menus.index');
Route::get('/cart', [\App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart.index');
Route::get('/reviews', [\App\Http\Controllers\Frontend\ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews/store', [\App\Http\Controllers\Frontend\ReviewController::class, 'store'])->name('reviews.store');
Route::get('/contacts', [\App\Http\Controllers\Frontend\ContactsController::class, 'index'])->name('contacts.index');
Route::get('/news', [\App\Http\Controllers\Frontend\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [\App\Http\Controllers\Frontend\NewsController::class, 'show'])->name('news.show');
Route::get('/tech-support', [\App\Http\Controllers\Frontend\TechSupportController::class, 'index'])->name('tech-support.index');
Route::post('/tech-support/store', [\App\Http\Controllers\Frontend\TechSupportController::class, 'store'])->name('tech-support.store');
Route::get('/reservation/step-one', [\App\Http\Controllers\Frontend\ReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [\App\Http\Controllers\Frontend\ReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [\App\Http\Controllers\Frontend\ReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [\App\Http\Controllers\Frontend\ReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [\App\Http\Controllers\Frontend\WelcomeController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/menus', \App\Http\Controllers\Admin\MenuController::class);
    Route::resource('/tables', \App\Http\Controllers\Admin\TableController::class);
    Route::resource('/reservations', \App\Http\Controllers\Admin\ReservationController::class);
    Route::resource('/reviews', \App\Http\Controllers\Admin\ReviewController::class);
    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('/tech-support', \App\Http\Controllers\Admin\TechSupportController::class);
    Route::resource('/food-categories', \App\Http\Controllers\Admin\FoodCategoryController::class);
});

require __DIR__.'/auth.php';
