<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\InstagramAuthController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Models\Page;
use App\Models\Portfolio;
use Spatie\Analytics\Period;
use Instagram\User\BusinessDiscovery;
use Illuminate\Support\Facades\Session;
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

Route::get('/', [PageController::class, 'getIndex']);

Route::post('/contact', [MailController::class, 'contactPost'])->name('contactPost');

Route::resource('/admin/pages', PageController::class)->middleware('auth');

Route::get('/admin/analytics', [AdminController::class, 'analytics'])->middleware('auth');

Route::resource('/admin/settings', SettingsController::class)->middleware('auth');

Route::get('/admin/page/create', function() {
    return view('pages.create')->middleware('auth');
});

Route::get('/admin/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::get('/admin/media', [MediaController::class, 'index'])->middleware('auth');
Route::post('/admin/media', [MediaController::class, 'uploadImage']);

Route::resource('/admin/navigation', NavigationController::class)->middleware('auth');

Route::resource('/admin/portfolio', PortfolioController::class)->middleware('auth');


Route::post('/admin/dashboard', [AdminController::class, 'createToDo']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/admin/users/', [AdminController::class, 'usersIndex'])->middleware('auth')->name('users.index');

Route::get('/admin/instagram/', [AdminController::class, 'instagramIndex'])->middleware('auth');

Route::get('instagram-get-auth', [InstagramAuthController::class, 'show'])->middleware('auth');

Route::get('/admin/profile/', [AdminController::class, 'userProfile'])->middleware('auth')->name('users.profile');

require __DIR__.'/auth.php';

Route::get('/admin/pages/{page}/editor', [PageController::class, 'editor'])->middleware('auth');

Route::get('/{slug}', [PageController::class, 'getPage'])->where('slug', '.*');






