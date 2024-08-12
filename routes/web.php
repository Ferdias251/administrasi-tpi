<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StockIkanController;
use Filament\Http\Middleware\Authenticate;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StockIkanController::class, 'index'])->name('stock-ikan1');

Route::get('/download-pdf', [DownloadController::class, 'downloadpdf'])->name('download-pdf');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::get('/stock-ikan', [StockIkanController::class, 'index'])->name('stock-ikan');


Route::get('/admin-dashboard', function () {
    return redirect()->route('filament.pages.dashboard');
})->middleware(['web', Authenticate::class])->name('admin-login');
