<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\AdminMiddleware\AdminMiddleware;

// Auth routes
Auth::routes(); // This sets up all the necessary authentication routes

// Redirect root URL to login page
Route::get('/login', function () {
    return redirect()->route('login'); // Redirect to the login route
});

Route::get('/', function(){
    return view('auth.login');
});

// //Login Routes
// // Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/', function () {
    return redirect()->route('index'); // Redirect to the home route
});

// Fallback route
Route::fallback(action: FallbackController::class); 

// Other routes 
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/index', [PageController::class, 'index'])->name('museum.index');
Route::get('/index.blade.php', [PageController::class, 'index'])->name('museum.index'); 
Route::get('/about', [PageController::class, 'about'])->name('museum.about');
Route::get('/about.blade.php', [PageController::class, 'about'])->name('museum.about');
Route::get('/faq', [PageController::class, 'faq'])->name('museum.faq');
Route::get('/faq.blade.php', [PageController::class, 'faq'])->name('museum.faq');
Route::get('/ticket', [PageController::class, 'ticket'])->name('museum.ticket');
Route::get('/ticket.blade.php', [PageController::class, 'ticket'])->name('museum.ticket');
Route::get('/contact', [PageController::class, 'contact'])->name('museum.contact');
Route::get('/contact.blade.php', [PageController::class, 'contact'])->name('museum.contact');
Route::get('/form', [PageController::class, 'form'])->name('museum.form');
Route::get('/form.blade.php', [PageController::class, 'form'])->name('museum.form');
Route::post('/form', [PageController::class, 'store'])->name('form.store');

// Group routes that require admin access
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/showform', [PageController::class, 'showform_page'])->name('showform');
    Route::get('/showform.blade.php', [PageController::class, 'showform_page'])->name('showform');
    Route::get('/readform/{id}', [PageController::class, 'readform_page'])->name('readform.show');
    Route::get('/updateform/{id}', [PageController::class, 'updateform_page'])->name('updateform.show');
    Route::patch('/updateform/{id}', [PageController::class, 'update'])->name('update');
    Route::delete('/showform/{id}', [PageController::class, 'destroy'])->name('delete');
});

// Home route
Route::get('/index', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Auth::routes();

// Route::get('/index', [App\Http\Controllers\PageController::class, 'index'])->name('index');
