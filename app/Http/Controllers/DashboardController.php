<?php

namespace App\Http\Controllers;

use App\Models\AttainmentPercentage;
use App\Models\FinalCoAttainment;
use App\Models\MoreThanSixty;
use App\Models\TargetMarks;
use Exception;
use App\Models\User;
use App\Models\Courses;
use App\Models\MaxMarksCO;
use App\Models\ExcelUpload;
use App\Models\CoAttainment;
use App\Models\CoPoRelation;
use App\Models\SubjectMarks;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;

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
    public function uploadView()
    {
        $courses = Courses::orderBy('cname', 'asc')->get();
        return view('upload', ['courses' => $courses]);
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
            return back()->with('success', 'Subject added successfully !');
        else
            return back()->with('error', 'Some error occured in adding subject !');
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

    public function manageFaculty()
    {
        return view('manage-faculty', ['faculty' => User::where('is_faculty', 1)->get()]);
    }
    public function updateSubject(Request $request){
        // dd($request->all());
        $query = Courses::where('cid', $request->subjectId)->update(['cname' => $request->subject_name]);

        if($query){
            return back()->with('success', 'Subject details updated successfully');
        }else{
            return back()->with('error', 'Some error occured in updating subject details');
        }
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

    public function addFaculty(Request $r)
    {
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

        if ($user)
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

    public function getCOAttainment($cid, $batch)
    {
        // Attempt to retrieve data from the specified model
        $data = SubjectMarks::where('cid', $cid)->where('batch', $batch)->get();

        // print_r($data);

        // if ($data->isEmpty())
        //     return back()->with('error', 'No details found for the specified details');

        // Retrieve max marks
        $max_marks = MaxMarksCO::where('cid', $cid)->where('batch', $batch)->first();
        $coAttainment = CoAttainment::where('cid', $cid)->where('batch', $batch)->first();
        $targetMarks = TargetMarks::where('cid', $cid)->where('batch', $batch)->first();
        $more_than_sixty = MoreThanSixty::where('cid', $cid)->where('batch', $batch)->first();
        $attainment_percentage = AttainmentPercentage::where('cid', $cid)->where('batch', $batch)->first();

        // dd($data[0]['q1']);

        return view('co_attainment', ['data' => $data, 'attainment' => $coAttainment, 'max_marks' => $max_marks, 'targetMarks' => $targetMarks, 'more_than_sixty' => $more_than_sixty, 'attainment_percentage' => $attainment_percentage, 'subjectCode' => $cid, 'batch' => $batch]);
        // return view('co_attainment_old', ['data' => $data, 'attainment' => $coAttainment, 'max_marks' => $max_marks, 'subjectCode' => $cid, 'batch' => $batch]);
    }

    public function getFinalCOAttainment($cid, $batch)
    {
        $co_attainment = CoAttainment::where('cid', $cid)->where('batch', $batch)->first();
        $finalCOAttainment = FinalCoAttainment::where('cid', $cid)->where('batch', $batch)->first();
        return view('final_co_attainment', ['finalCOAttainment' => $finalCOAttainment, 'co_attainment' => $co_attainment, 'subjectCode' => $cid, 'batch' => $batch]);
    }
    public function getPOAttainment($cid, $batch)
    {
        $courses = Courses::all();
        // $relation = CoPoRelation::where('cid', $cid)->where('batch', $batch)->get();
        $relation = CoPoRelation::where('cid', $cid)->where('batch', $batch)->get();
        $coAttainment = FinalCoAttainment::where('cid', $cid)->where('batch', $batch)->first();
        return view('po_attainment', compact('relation', 'courses', 'cid', 'batch', 'coAttainment'));
    }

    public function coPoRelation()
    {
        $courses = Courses::all();
        $relation = CoPoRelation::all();
        // $relation = CoPoRelation::where('cid', $courseId)->get();
        // return view('co_po_relation', compact('relation', 'courses', 'cid', 'batch'));
        return view('co_po_relation', compact('relation', 'courses'));
    }
    // ajax requests
    public function getCoPoRelation($courseId)
    {
        $relation = CoPoRelation::where('cid', $courseId)->get();
        if($relation->isEmpty()){
            return response()->json('notfound');
        }else{
            return response()->json($relation);
        }
    }
    public function updateCoPoRelation(Request $r)
    {
        // add validation
        $COArrays = [
            'CO1' => $r->input('CO1'),
            'CO2' => $r->input('CO2'),
            'CO3' => $r->input('CO3'),
            'CO4' => $r->input('CO4'),
            'CO5' => $r->input('CO5'),
        ];

        $data = [];
        $flag = true;
        foreach ($COArrays as $key => $CO) {
            $data = [
                'cid' => $r->courseId,
                // 'batch' => $r->batch,
                'CO' => $key
            ];
            for ($i = 1; $i <= 12; $i++) {
                $data["PO$i"] = $CO["PO$i"] ?? null;
            }

            // $relation = CoPoRelation::where('cid', $r->courseId)->where('batch', 2021)->first();

            try{
                // $relation = CoPoRelation::where('cid', $r->courseId)->where('batch', $r->batch)->where('CO', $key)->first();
                $relation = CoPoRelation::where('cid', $r->courseId)->where('CO', $key)->first();
                if(is_null($relation)){
                    CoPoRelation::create($data);
                }else{
                    $relation->update($data);
                }
                $data = [];
                $flag = true;
            }
            catch(\Exception $e){
                dd($e);
                $flag = false;
                break;
            }
        }

        if($flag){
            return back()->with('success', 'CO-PO Relation Updated Suceessfully');
        }else{
            return back()->with('error', 'Some error occured in updating CO-PO Relation');
        }
    }

    public function searchCourses(Request $request){
        $query = $request->input('query');
        $courses = Courses::where('cid', 'like', "%$query%")
            ->orWhere('cname', 'like', "%$query%")
            ->get();

        return response()->json($courses);
    }
}
