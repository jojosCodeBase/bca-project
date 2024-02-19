<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\ExcelUpload;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function fetchView(){
        $courses = Courses::all();
        return view('fetch', ['courses' => $courses]);
    }
    public function fetchData(Request $r){
        $data = ExcelUpload::where('cid', $r->cid)->get();
        return back()->with('data', $data);
    }
}
