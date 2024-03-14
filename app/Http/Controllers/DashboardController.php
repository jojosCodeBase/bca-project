<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\ExcelUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index(){
        $x = 'Courses';
        $modelClass = 'App\\Models\\' . $x;

        return view('admin-dashboard', ['courses' => $modelClass::orderBy('updated_at', 'desc')->paginate(10)]);
    }

    public function userDashboard(){
        $x = 'Courses';
        $modelClass = 'App\\Models\\' . $x;
        return view('user-dashboard', ['courses' => $modelClass::orderBy('updated_at', 'desc')->get()]);
    }
    public function fetchView(){
        $courses = Courses::orderBy('cname', 'asc')->get();
        return view('fetch', ['courses' => $courses]);
    }
    public function fetchData(Request $r){
        dd($r->all());
    }

    public function addSubjectView(){
        return view('add-subject');
    }
    public function addSubject(Request $request){
        $courses = Courses::create([
            'cid' => $request->cid,
            'cname' => $request->cname,
        ]);

        if($courses)
            return back()->with('success', 'Subject created successfully !');
        else
            return back()->with('error', 'Some error occured in creating subject !');
    }

    public function tables(){
        $tables = Schema::getAllTables();
        return view('tables', ['tables' => $tables]);
    }

    public function subjects(){
        return view('subjects', ['courses' => Courses::orderBy('cname', 'asc')->paginate(10)]);
    }
}
