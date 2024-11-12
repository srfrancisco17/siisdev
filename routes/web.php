<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\TriageController;
use App\Livewire\Counter;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/*
Route::get('/ideas', function () {
    return view('ideas.index');
})->middleware(['auth', 'verified'])->name('idea.index');
*/

Route::get('/ideas', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('idea.create');
Route::post('/ideas/create', [IdeaController::class, 'store'])->name('idea.store');
Route::get('/ideas/edit/{idea}', [IdeaController::class, 'edit'])->name('idea.edit');
Route::put('/ideas/update/{idea}', [IdeaController::class, 'update'])->name('idea.update');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::delete('/ideas/{idea}', [IdeaController::class, 'delete'])->name('idea.delete');
Route::put('/ideas/{idea}', [IdeaController::class, 'synchronizeLikes'])->name('idea.like');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/triage', [TriageController::class, 'index'])->name('triage.index');

Route::get('/counter', Counter::class);

Auth::routes();