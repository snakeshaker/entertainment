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
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Admin\TechSupportController;
use App\Http\Controllers\Frontend\ReservationController;

//MAIN PAGE
Route::get('/', [WelcomeController::class, 'index'])->name('mainpage');
//CATEGORIES OF ENTERTAINMENT
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories/store-review', [CategoryController::class, 'storeReview'])->name('categories.store.review');
//FOOD MENU
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menus/{foodCategory}', [MenuController::class, 'show'])->name('menus.show');
//CART
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//REVIEWS
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
//CONTACTS
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
//NEWS
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
//TECH SUPPORT
Route::get('/tech-support', [TechSupportController::class, 'index'])->name('tech-support.index');
Route::post('/tech-support/store', [TechSupportController::class, 'store'])->name('tech-support.store');
//RESERVATION
Route::get('/reservation/step-one', [ReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [ReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [ReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [ReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

//CABINET
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//ADMIN
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
    Route::resource('/songs', \App\Http\Controllers\Admin\SongController::class);
});

require __DIR__.'/auth.php';
