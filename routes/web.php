<?php

use App\Http\Controllers\ExcelController;
use Maatwebsite\Excel\Facades\Excel;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [ExcelController::class, 'fileUpload'])->name('file-upload');
// Route::post('/upload', function(){
//     return "HEllo";
// })->name('file-upload');

// Route::get('/upload', function(){
//     return "HEllo";
// })->name('get.file-upload');
Route::get('/excel', [ExcelController::class, 'importExcel'])->name('excel.import');
