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
    Route::middleware('admin')->group(function () {
        Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
        Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin-profile.edit');
        Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin-profile.update');
        Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin-profile.destroy');

        Route::post('admin/upload', [ExcelController::class, 'fileUpload'])->name('admin-file-upload');

        Route::get('admin/tables', [DashboardController::class, 'tables'])->name('admin-tables');

        Route::get('admin/subjects', [DashboardController::class, 'subjects'])->name('admin-subjects');

        Route::get('admin/add-subject', [DashboardController::class, 'addSubjectView'])->name('admin-add-subject-view');
        Route::post('admin/add-subject', [DashboardController::class, 'addSubject'])->name('admin-add-subject');

        Route::get('admin/upload', function () {
            return view('upload');
        })->name('admin-upload');

        Route::get('admin/fetch', [DashboardController::class, 'fetchView'])->name('admin-fetch');
        Route::post('admin/fetch', [ExcelController::class, 'readDbData'])->name('admin-fetch-data');

        Route::get('admin/semester', function () {
            return view('semester');
        })->name('admin-semester');

        Route::get('admin/year', function () {
            return view('year');
        })->name('admin-year');

        //Upload PO Attainment level
        Route::get('admin/co_po_relation', function () {
            return view('co_po_relation');
        })->name('admin-co_po_relation');

        //Update PO Attainment Level
        Route::get('admin/validation', function () {
            return view('validation');
        })->name('admin-validation');

        Route::get('admin/read', [ExcelController::class, 'readDbData'])->name('admin-readDbData');

        Route::get('manage-faculty', function () {
            return view('manage-faculty');
        })->name('manage-faculty');
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

        //Update PO Attainment Level

        Route::get('validation', function () {
            return view('validation');
        })->name('validation');

        Route::get('read', [ExcelController::class, 'readDbData'])->name('readDbData');
    });
});

require __DIR__ . '/auth.php';
