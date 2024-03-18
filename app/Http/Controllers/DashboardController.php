<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\ExcelUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function index()
    {
        $x = 'Courses';
        $modelClass = 'App\\Models\\' . $x;
        $totalCourses = Courses::count();
        $totalFaculty = User::where('is_faculty', 1)->count();
        return view('admin-dashboard', ['courses' => $modelClass::orderBy('updated_at', 'desc')->paginate(10), 'courseCount' => $totalCourses, 'totalFaculty' => $totalFaculty]);
    }

    public function userDashboard()
    {
        $x = 'Courses';
        $modelClass = 'App\\Models\\' . $x;
        return view('user-dashboard', ['courses' => $modelClass::orderBy('updated_at', 'desc')->get()]);
    }
    public function fetchView()
    {
        $courses = Courses::orderBy('cname', 'asc')->get();
        return view('fetch', ['courses' => $courses]);
    }
    public function fetchData(Request $r)
    {
        dd($r->all());
    }

    public function addSubject(Request $request)
    {
        $courses = Courses::create([
            'cid' => $request->cid,
            'cname' => $request->cname,
        ]);

        if ($courses)
            return back()->with('success', 'Subject created successfully !');
        else
            return back()->with('error', 'Some error occured in creating subject !');
    }

    public function tables()
    {
        $tables = Schema::getAllTables();
        return view('tables', ['tables' => $tables]);
    }

    public function manageSubjects()
    {
        return view('manage-subjects', ['courses' => Courses::orderBy('cname', 'asc')->paginate(10)]);
    }

    public function manageFaculty(){
        return view('manage-faculty', ['faculty' => User::where('is_faculty', 1)->get()]);
    }

    // public function addFaculty(Request $r){
    //     // dd($r->all());
    //     $r->validate([
    //         'id' => 'required|numeric|max:9999999999',
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|lowercase|email|max:255|unique:users,email',
    //         'password' => ['required', 'string', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'id' => $r->id,
    //         'name' => $r->name,
    //         'email' => $r->email,
    //         'password' => Hash::make($r->password),
    //     ]);

    //     if($user)
    //         return back()->with('success', 'Faculty added Successfully !');
    //     else
    //         return back()->with('error', 'Some error occured in adding faculty!');
    // }

    public function addFaculty(Request $r){
        $r->validate([
            'id' => 'required|numeric|max:9999999999',
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email',
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'regno' => $r->id,
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);

        if($user)
            return back()->with('success', 'Faculty added Successfully !');
        else
            return back()->with('error', 'Some error occured in adding faculty!');
    }



    // ajax requests

    public function getCourseInfo($cid)
    {
        try {
            $courseInfo = Courses::where('cid', $cid)->get();
            return response()->json($courseInfo);
        } catch (\Exception $e) {
            return response()->json('Some error occured in fetching course details');
        }
    }
    public function getFacultyInfo($fid)
    {
        try {
            $facultyInfo = User::where('is_faculty', 1)->where('regno', $fid)->get();
            return response()->json($facultyInfo);
        } catch (\Exception $e) {
            return response()->json('Some error occured in fetching faculty details');
        }
    }
}
