<?php

use App\Http\Controllers\RakBukuController; 
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
Route::get("/hello", function () {
    return 'hello world';
});

Route::get('/buku', function () {
    $data = [];
    $data['poin'] = 83;
    $data['flag'] = 2;
    $data['sub_judul'] = 'latihan parsing data di view';
    $data['buku'] = ['buku 1', 'buku 2', 'buku 3', 'buku 4', 'buku 5'];
    return view('buku/list', $data);
});

Route::get('biodata', function () {
    return view('biodata');
});

Route::resource('rak_buku', RakBukuController::class);