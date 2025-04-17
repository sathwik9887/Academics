<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.post');
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission');
Route::get('/courses', [CourseController::class, 'index'])->name('course');
Route::get('/course/{id}', [CourseController::class, 'show', 'id'])->name('course.show');

Route::get('/academics/{id}', [AcademicsController::class, 'show'])->name('academics.show');
Route::post('/academics', [NewsletterController::class, 'send'])->name('newsletter.send');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::put('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout-session', [CheckoutController::class, 'createCheckoutSession'])->name('checkout.session');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/success', function () {
    return redirect()->route('home')->with('success', '✅ Payment Successful!');
})->name('checkout.success');

Route::get('/cancel', function () {
    return redirect()->route('home')->with('error', '❌ Payment Cancelled.');
})->name('checkout.cancel');
Route::middleware([RedirectIfAuthenticated::class])->group(function() {
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'showLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'showRegister'])->name('register.post');
Route::get('/forget', [AuthController::class, 'forgetPassword'])->name('forget');
Route::post('/forget', [AuthController::class, 'processforgetPassword'])->name('forget.post');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});





