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

Route::get('/', [PageController::class, 'getIndex']);

Route::resource('/admin/pages', PageController::class);

Route::get('/admin/analytics', [AdminController::class, 'analytics']);

Route::resource('/admin/settings', SettingsController::class);

Route::get('/admin/page/create', function() {
    return view('pages.create');
});

Route::get('/admin/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::get('/admin/media', [MediaController::class, 'index']);
Route::post('/admin/media', [MediaController::class, 'uploadImage']);

Route::resource('/admin/navigation', NavigationController::class);

Route::resource('/admin/portfolio', PortfolioController::class);


Route::post('/admin/dashboard', [AdminController::class, 'createToDo']);

Route::get('/admin/dashboard', function () {
    Session::forget('message');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/users/', [AdminController::class, 'usersIndex'])->name('users.index');

Route::get('/admin/profile/', [AdminController::class, 'userProfile'])->name('users.profile');

Route::get('/{slug}', [PageController::class, 'getPage'])->where('slug', '.*');

require __DIR__.'/auth.php';
