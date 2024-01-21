<?php


use Illuminate\Support\Facades\Route;
use App\Http\Kernel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\FirsthallController;
use App\Http\Controllers\SecondhallController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});




Route::resource('admin', AdminController::class)->middleware(['auth', 'verified', 'rolesChecker:admin'])->name('admin', 'index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'firsthall' => FirsthallController::class,
        'secondhall' => SecondhallController::class,
        'order' => OrderController::class,
        'cart' => CartController::class,
        'dashboard' => DashboardController::class,
    ]);


    // Route::get('/dashboard', function () {
//     return view('layouts.dashboard');
// })->middleware(['auth', 'verified', 'rolesChecker:admin,customer'])->name('dashboard');



// Route::middleware('auth', 'rolesChecker:admin')->group(function() {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// });
// Route::get('/admin', function () {
//     return view('layouts.adminpanel');
// })->middleware(['auth', 'verified', 'rolesChecker:admin'])->name('admin');


});




require __DIR__.'/auth.php';
