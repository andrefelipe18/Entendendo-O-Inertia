<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Importando o controller, tem que ficar lá em cima, só está aqui para exemplificar
use App\Http\Controllers\PostController;
//Rota para home chamando o controller PostController método index
Route::get('/home', [PostController::class, 'index'])->name('home');

//Rota para o about
Route::get('/about', function() {
    return Inertia::render('About', [
        'name' => 'André Domingues',
    ]);
})->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   Route::get('/dashboard',[PostController::class, 'index'])->name('dashboard');
   Route::get('/dashboard/create',[PostController::class, 'create'])->name('posts.create');
   Route::post('/dashboard/create',[PostController::class, 'store'])->name('posts.store');
   Route::get('/dashboard/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
   Route::put('/dashboard/{post}/edit',[PostController::class, 'update'])->name('posts.update');
   Route::delete('/dashboard/{post}/delete',[PostController::class, 'destroy'])->name('posts.destroy');
});


