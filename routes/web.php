<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactController::class, 'index'])->name('contact');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('{contact_id}/update', [ContactController::class, 'update'])->name('contact.update');
Route::get('/{contact_id}/delete', [ContactController::class, 'delete'])->name('contact.delete');
Route::get('/search', [ContactController::class, 'search'])->name('contact.search');