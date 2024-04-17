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

        Route::get('manage-subjects', [DashboardController::class, 'manageSubjects'])->name('manage-subjects');
        Route::post('manage-subjects/add', [DashboardController::class, 'addSubject'])->name('add-subject');
        Route::post('manage-subjects/update', [DashboardController::class, 'updateSubject'])->name('update.subject.info');


        Route::post('upload', [ExcelController::class, 'fileUpload'])->name('admin-file-upload');

        Route::get('upload', [DashboardController::class, 'uploadView'])->name('admin-upload');

        Route::get('fetch', [DashboardController::class, 'fetchView'])->name('admin-fetch');
        Route::post('fetch', [ExcelController::class, 'readDbData'])->name('admin-fetch-data');

        Route::get('semester', function () {
            return view('semester');
        })->name('admin-semester');

        Route::get('year', function () {
            return view('year');
        })->name('admin-year');

        //Upload PO Attainment level
        Route::get('co_po_relation', [DashboardController::class, 'coPoRelation'])->name('admin-co_po_relation');


        //Update PO Attainment Level
        Route::get('validation', function () {
            return view('validation');
        })->name('admin-validation');


        Route::get('manage-faculty', [DashboardController::class, 'manageFaculty'])->name('manage-faculty');
        Route::post('manage-faculty/add', [DashboardController::class, 'addFaculty'])->name('add-faculty');

        Route::get('read', [ExcelController::class, 'readDbData'])->name('admin-readDbData');



        // ajax requests
        Route::get('getCourseInfo/{id}', [DashboardController::class, 'getCourseInfo']);
        Route::get('getFacultyInfo/{id}', [DashboardController::class, 'getFacultyInfo']);


        Route::get('co-attainment/{cid}/{batch}', [DashboardController::class, 'getCOAttainment'])->name('co.attainment');

        Route::get('final-co-attainment/{cid}/{batch}', [DashboardController::class, 'getFinalCOAttainment'])->name('final.co.attainment');

        Route::get('po-attainment/{cid}/{batch}', [DashboardController::class, 'getPOAttainment'])->name('po.attainment');
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

        Route::get('forgot-password', function () {
            return view('forgot-password');
        })->name('forgot-password');

        Route::get('assign-subject', function () {
            return view('assign-subject');
        })->name('assign-subject');

    });

    // ajax requests
    Route::get('get_CO_PO_Relation/{courseId}', [DashboardController::class, 'getCoPoRelation']);
    Route::post('update-co-po-relation', [DashboardController::class, 'updateCoPoRelation'])->name('update-co-po-relation');
    Route::get('/course/search', [DashboardController::class, 'searchCourses']);

    Route::get('/test', [DashboardController::class, 'liveSearch'])->name('liveSearch');
});

require __DIR__ . '/auth.php';
