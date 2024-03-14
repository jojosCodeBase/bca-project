<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        // dd(auth()->user()->is_faculty);
        if (auth()->user()->is_faculty == 0) {
            return redirect()->route('admin-dashboard');
        } elseif (auth()->user()->is_faculty) {
            return redirect()->route('dashboard');
        }
    });
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

        Route::get('profile', [ProfileController::class, 'edit'])->name('admin-profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('admin-profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('admin-profile.destroy');

        Route::get('tables', [DashboardController::class, 'tables'])->name('tables');

        Route::get('subjects', [DashboardController::class, 'subjects'])->name('subjects');

        Route::get('add-subject', [DashboardController::class, 'addSubjectView'])->name('add-subject-view');
        Route::post('add-subject', [DashboardController::class, 'addSubject'])->name('add-subject');

        Route::post('upload', [ExcelController::class, 'fileUpload'])->name('admin-file-upload');

        Route::get('upload', function () {
            return view('upload');
        })->name('admin-upload');

        Route::get('fetch', [DashboardController::class, 'fetchView'])->name('admin-fetch');
        Route::post('fetch', [ExcelController::class, 'readDbData'])->name('admin-fetch-data');

        Route::get('semester', function () {
            return view('semester');
        })->name('admin-semester');

        Route::get('year', function () {
            return view('year');
        })->name('admin-year');

        //Upload PO Attainment level
        Route::get('co_po_relation', function () {
            return view('co_po_relation');
        })->name('admin-co_po_relation');


        //Update PO Attainment Level
        Route::get('validation', function () {
            return view('validation');
        })->name('admin-validation');


        Route::get('manage-faculty', function () {
            return view('manage-faculty');
        })->name('manage-faculty');

        Route::get('read', [ExcelController::class, 'readDbData'])->name('admin-readDbData');
    });


    Route::middleware('faculty')->group(function () {
        Route::get('faculty', function () {
            return 'This is only for faculty !';
        });

        Route::get('dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('upload', [ExcelController::class, 'fileUpload'])->name('file-upload');

        Route::get('upload', function () {
            return view('upload');
        })->name('upload');

        Route::get('fetch', [DashboardController::class, 'fetchView'])->name('fetch');
        Route::post('fetch', [ExcelController::class, 'readDbData'])->name('fetch-data');

        Route::get('semester', function () {
            return view('semester');
        })->name('semester');

        Route::get('year', function () {
            return view('year');
        })->name('year');

        //Upload PO Attainment level
        Route::get('co_po_relation', function () {
            return view('co_po_relation');
        })->name('co_po_relation');

        // Route::get('read', [ExcelController::class, 'readDbData'])->name('readDbData');

        //Update PO Attainment Level

        Route::get('validation', function () {
            return view('validation');
        })->name('validation');

    });
});

require __DIR__ . '/auth.php';
