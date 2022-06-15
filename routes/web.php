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
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\TechSupportController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\MusicController;
use App\Http\Controllers\Frontend\GalleryController;


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
//MUSIC CATALOGUE
Route::get('/music', [MusicController::class, 'index'])->name('music.index');
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
//GALLERY
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

//CABINET
Route::middleware(['auth'])->group(function (){
    Route::resource('/dashboard', DashboardController::class);
    Route::post('add-to-cart', [CartController::class, 'add']);
    Route::resource('/cart', CartController::class);
    Route::delete('/dashboard/{user}', [DashboardController::class, 'deleteUser'])->name('dashboard.deleteUser');
    Route::resource('/cabinet', UserController::class);
    Route::post('/token', [PaymentController::class, 'getTokenForPayment']);
    Route::get('/success', [PaymentController::class, 'success']);
    Route::get('/failure', [PaymentController::class, 'failure']);
    Route::post('/create-order', [CartController::class, 'createOrder']);
    Route::get('/reserve-all', [ReservationController::class, 'show'])->name('reserve.show');
});

//ADMIN
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    //CRUDS
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
    Route::resource('/orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::resource('/galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactsController::class, 'index'])->name('contacts.index');
    Route::put('/contacts/update', [\App\Http\Controllers\Admin\ContactsController::class, 'update'])->name('contacts.update');
    Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'info'])->name('orders.info');
    //EXPORT EXCEL
    Route::get('users/export/', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.export');
    Route::get('categories/export/', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('categories.export');
    Route::get('menus/export/', [\App\Http\Controllers\Admin\MenuController::class, 'show'])->name('menus.export');
    Route::get('tables/export/', [\App\Http\Controllers\Admin\TableController::class, 'show'])->name('tables.export');
    Route::get('reservations/export/', [\App\Http\Controllers\Admin\ReservationController::class, 'show'])->name('reservations.export');
    Route::get('reviews/export/', [\App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('reviews.export');
    Route::get('news/export/', [\App\Http\Controllers\Admin\NewsController::class, 'show'])->name('news.export');
    Route::get('tech-support/export/', [\App\Http\Controllers\Admin\TechSupportController::class, 'show'])->name('tech-support.export');
    Route::get('food-categories/export/', [\App\Http\Controllers\Admin\FoodCategoryController::class, 'show'])->name('food-categories.export');
    Route::get('songs/export/', [\App\Http\Controllers\Admin\SongController::class, 'show'])->name('songs.export');
    Route::get('orders/export/', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.export');
});

require __DIR__.'/auth.php';
