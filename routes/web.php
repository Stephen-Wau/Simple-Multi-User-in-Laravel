<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\AuthController::class, 'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::get('/reset', [App\Http\Controllers\AuthController::class, 'reset'])->name('auth.reset');
Route::post('/forgot', [App\Http\Controllers\AuthController::class, 'forgot'])->name('auth.forgot');
Route::get('/password/{email}/{token}', [App\Http\Controllers\AuthController::class, 'password'])->name('auth.password');
Route::post('/renew', [App\Http\Controllers\AuthController::class, 'renew'])->name('auth.renew');

//Group untuk admin
Route::group(['middleware' => 'auth:admin'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard.index');

        #Route Food
        Route::get('/food', [App\Http\Controllers\Admin\FoodController::class, 'index'])->name('admin.food.index');
        Route::get('/food/add', [App\Http\Controllers\Admin\FoodController::class, 'add'])->name('admin.food.add');
        Route::post('/food/store', [App\Http\Controllers\Admin\FoodController::class, 'store'])->name('admin.food.store');
        Route::get('/food/edit/{id}', [App\Http\Controllers\Admin\FoodController::class, 'edit'])->name('admin.food.edit');
        Route::post('/food/update', [App\Http\Controllers\Admin\FoodController::class, 'update'])->name('admin.food.update');
        Route::get('/food/delete/{id}', [App\Http\Controllers\Admin\FoodController::class, 'delete'])->name('admin.food.delete');

        #Route Food
        Route::get('/barang', [App\Http\Controllers\Admin\barangController::class, 'index'])->name('admin.barang.index');
        Route::get('/barang/add', [App\Http\Controllers\Admin\barangController::class, 'add'])->name('admin.barang.add');
        Route::post('/barang/store', [App\Http\Controllers\Admin\barangController::class, 'store'])->name('admin.barang.store');
        Route::get('/barang/edit/{id}', [App\Http\Controllers\Admin\barangController::class, 'edit'])->name('admin.barang.edit');
        Route::post('/barang/update', [App\Http\Controllers\Admin\barangController::class, 'update'])->name('admin.barang.update');
        Route::get('/barang/delete/{id}', [App\Http\Controllers\Admin\barangController::class, 'delete'])->name('admin.barang.delete');

    });
});

//Group untuk admin-food
Route::group(['middleware' => 'auth:admin-food'], function (){
    Route::prefix('admin-food')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Food\DashboardController::class, 'index'])
            ->name('dashboard.index');

        #Route Food
        Route::get('/food', [App\Http\Controllers\Food\FoodController::class, 'index'])->name('admin-food.food.index');
        Route::get('/food/add', [App\Http\Controllers\Food\FoodController::class, 'add'])->name('admin-food.food.add');
        Route::post('/food/store', [App\Http\Controllers\Food\FoodController::class, 'store'])->name('admin-food.food.store');
        Route::get('/food/edit/{id}', [App\Http\Controllers\Food\FoodController::class, 'edit'])->name('admin-food.food.edit');
        Route::post('/food/update', [App\Http\Controllers\Food\FoodController::class, 'update'])->name('admin-food.food.update');
        Route::get('/food/delete/{id}', [App\Http\Controllers\Food\FoodController::class, 'delete'])->name('admin-food.food.delete');

    });
});

//Group untuk admin-barang
Route::group(['middleware' => 'auth:admin-barang'], function (){
    Route::prefix('admin-barang')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Barang\DashboardController::class, 'index'])
            ->name('dashboard.index');

        #Route Barang
        Route::get('/barang', [App\Http\Controllers\Barang\BarangController::class, 'indexx'])->name('admin-barang.barang.indexx');
        Route::get('/barang', [App\Http\Controllers\Barang\BarangController::class, 'index'])->name('admin-barang.barang.index');
        Route::get('/barang/add', [App\Http\Controllers\Barang\BarangController::class, 'add'])->name('admin-barang.barang.add');
        Route::post('/barang/store', [App\Http\Controllers\Barang\BarangController::class, 'store'])->name('admin-barang.barang.store');
        Route::get('/barang/edit/{id}', [App\Http\Controllers\Barang\BarangController::class, 'edit'])->name('admin-barang.barang.edit');
        Route::post('/barang/update', [App\Http\Controllers\Barang\BarangController::class, 'update'])->name('admin-barang.barang.update');
        Route::get('/barang/delete/{id}', [App\Http\Controllers\Barang\BarangController::class, 'delete'])->name('admin-barang.barang.delete');
        Route::get('/barang/export', [App\Http\Controllers\Barang\BarangController::class, 'export'])->name('admin-barang.barang.export');

    });
});

//Group untuk superadmin
Route::group(['middleware' => 'auth:superadmin'], function (){
    Route::prefix('superadmin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Superadmin\DashboardController::class, 'index'])
            ->name('superadmin.dashboard.index');

        #Route Pengguna
        Route::get('/pengguna', [App\Http\Controllers\Superadmin\PenggunaController::class, 'index'])->name('superadmin.pengguna.index');
        Route::get('/pengguna/add', [App\Http\Controllers\Superadmin\PenggunaController::class, 'add'])->name('superadmin.pengguna.add');
        Route::post('/pengguna/store', [App\Http\Controllers\Superadmin\PenggunaController::class, 'store'])->name('superadmin.pengguna.store');
        Route::get('/pengguna/edit/{id}', [App\Http\Controllers\Superadmin\PenggunaController::class, 'edit'])->name('superadmin.pengguna.edit');
        Route::post('/pengguna/update', [App\Http\Controllers\Superadmin\PenggunaController::class, 'update'])->name('superadmin.pengguna.update');
        Route::get('/pengguna/delete/{id}', [App\Http\Controllers\Superadmin\PenggunaController::class, 'delete'])->name('superadmin.pengguna.delete');
        Route::get('/pengguna/search', [App\Http\Controllers\Superadmin\PenggunaController::class, 'search'])->name('superadmin.pengguna.search');

       
    
    });
});

//Route untuk download & Upload
Route::get('download/{filename}', function($filename) {
    $file_path = storage_path('app/public/' . $filename);
    if (file_exists($file_path)) {
        return Response::download($file_path, $filename, ['Content-Length: ' . filesize($file_path)]);
    } else {
        exit('File yang ada request tidak ditemukan di server kami!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download_file');


Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage_file');



