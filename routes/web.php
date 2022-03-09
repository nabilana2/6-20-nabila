<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index', [
        "title" => "Beranda"
    ]);
});

Route::get('/about', function () {
    return view('About',[
        "title" => "About",
        "nama" => "Nabila Nur Apriliyanti",
        "email" => "Nabilaapriliyanti@gmail.com",
        "gambar" => "Foto Almet.jpg"
    ]);
});
Route::get('/gallery', function () {
        return view('gallery', [
            "title" => "Gallery",
        ]);
});
//Route::resource('/contacts', ContactController::class);
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

Auth::routes();

Route::group(['middleware'=> ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/{id}/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contacts/{id}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

