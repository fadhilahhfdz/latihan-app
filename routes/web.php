<?php

use App\Http\Controllers\RakBukuController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 
use App\Http\Controllers\LoginRegisterController;

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
Route::get("/", function () {
    return view("welcome");
});

Route::get("/hello", function () {
    return 'hello world';
});

Route::get('/coba/{id}', function (string $id) {
    return view('coba', ['id'=> $id]);
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

Route::view('/biodata', 'biodata');
Route::post('/biodata', function (Request $request) {
    $output = "Nama: . $request->nama. <br>
            Email: . $request->email. <br>
            No. Hp.: $request->no_hp.";
    return $output;
});

Route::resource('rak_buku', RakBukuController::class);

// Register & Login
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});