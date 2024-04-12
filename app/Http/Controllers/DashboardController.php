<?php

namespace App\Http\Controllers;

use App\Models\CoPoRelation;
use Exception;
use App\Models\User;
use App\Models\Courses;
use App\Models\MaxMarksCO;
use App\Models\ExcelUpload;
use App\Models\CoAttainment;
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

    public function manageFaculty()
    {
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
        $subject = "App\\Models\\" . $cid;

        // Attempt to retrieve data from the specified model
        $data = app($subject)->where('regno', 'like', '%' . $batch . '%')->get();

        if ($data->isEmpty())
            return back()->with('error', 'No details found for the specified details');

        // Retrieve max marks
        $max_marks = MaxMarksCO::where('cid', $cid)->get();

        return view('co_attainment', ['data' => $data, 'max_marks' => $max_marks, 'subjectCode' => $cid, 'batch' => $batch]);
    }

    function getCOLevel($attainmentPercentage){
        if($attainmentPercentage < 38)
            return 0;
        elseif ($attainmentPercentage >=38 && $attainmentPercentage <=51)
            return 1;
        elseif($attainmentPercentage >= 52 && $attainmentPercentage <= 72)
            return 2;
        elseif($attainmentPercentage >=73)
            return 3;
    }
    public function getFinalCOAttainment($cid, $batch)
    {
        $subject = "App\\Models\\" . $cid;

        // Attempt to retrieve data from the specified model
        $data = app($subject)->where('regno', 'like', '%' . $batch . '%')->get();

        if ($data->isEmpty())
            return back()->with('error', 'No details found for the specified details');

        // Retrieve max marks
        $max_marks = MaxMarksCO::where('cid', $cid)->first();

        // echo "<pre>";

        $examArray = ['q1', 's1', 'q2', 's2', 'assignment', 'end_sem'];
        $target_marks = [];

        for ($i = 0; $i < count($examArray); $i++) {
            $marks = json_decode($max_marks[$examArray[$i]], true);
            $copy_marks = $marks;

            foreach ($copy_marks as $key => $x) {
                if (!is_null($x)) {
                    $copy_marks[$key] = (60 / 100) * $x;
                }
            }
            $target_marks[$examArray[$i]] = $copy_marks;
        }

        // dd($target_marks);

        // dd($data);

        // print_r($target_marks);

        // finding students > 60%
        // foreach ($data as $d) {
        //     // print_r($d['q1']);
        //     break;
        // }
        // echo count($data);

        $co_po = [
            'CO1' => null,
            'CO2' => null,
            'CO3' => null,
            'CO4' => null,
            'CO5' => null,
            'CO6' => null,
            'Total' => null,
        ];
        $copy_co_po = [];
        $target_marks_count = 0;
        $marks_more_than_sixty_percent_array = [];
        $co_attainment = [];

        // print_r($target_marks);
        $attainmentPercentage = [];
        $attainmentPercentage_CO_PO = [];
        $co_attainment_CO_PO = [];
        $index = 0;
        for ($i = 0; $i < count($target_marks); $i++) {
            // here key is co1, co2, co3..
            foreach ($co_po as $key => $v) {
                // echo $key . '=>' . $v;
                foreach ($data as $d) {
                    $marks = json_decode($d[$examArray[$index]], true);

                    if (is_null($marks[$key]) || $marks[$key] == "AB")
                        continue;
                    else {
                        if ($marks[$key] >= $target_marks[$examArray[$index]][$key]) {
                            $target_marks_count++;
                        } else
                            continue;
                    }
                }
                // echo $target_marks_count . "<br>";
                // break;
                // store target marks count
                $copy_co_po[$key] = $target_marks_count;

                // calculate attainment percentage
                $attainmentPercentage_CO_PO[$key] = intval(($target_marks_count / count($data)) * 100);

                // calculate co attainment level
                $co_attainment_CO_PO[$key] = $this->getCOLevel($attainmentPercentage_CO_PO[$key]);

                // reset target_marks_count to 0 for counting next CO
                $target_marks_count = 0;
            }

            // store the copy array to q1, s1, q2, respectively
            $marks_more_than_sixty_percent_array[$examArray[$index]] = $copy_co_po;

            // store the attainment percentage
            $attainmentPercentage[$examArray[$index]] = $attainmentPercentage_CO_PO;

            // store co attainment level
            $co_attainment[$examArray[$index]] = $co_attainment_CO_PO;
            $index++;
            // break;
        }
        // echo "<pre>";
        // print_r($co_attainment);
        // echo "</pre>";

        // dd($target_marks);

        // adding co attainment to co attainment table
        $query = CoAttainment::create([
            'cid' => $cid,
            'batch' => $batch,
            'q1' => json_encode($target_marks['q1'], true),
            's1' => json_encode($target_marks['s1'], true),
            'q2' => json_encode($target_marks['q2'], true),
            's2' => json_encode($target_marks['s2'], true),
            'assignment' => json_encode($target_marks['assignment'], true),
            'end_sem' => json_encode($target_marks['end_sem'], true),
            'total' => 0,
        ]);

        // if($query){
        //     dd('success');
        // }else{
        //     dd('failed');
        // }

        $co_attainment = CoAttainment::where('cid', $cid)->where('batch', $batch)->first();
        // dd($co_attainment);

        // echo "<pre>";
        // print_r($co_attainment);
        // echo "</pre>";


        return view('final_co_attainment', ['co_attainment' => $co_attainment, 'subjectCode' => $cid, 'batch' => $batch]);
    }
    public function getPOAttainment($cid, $batch)
    {
        dd($cid, $batch);
    }

    public function coPoRelation(){
        $courses = Courses::all();
        $relation = CoPoRelation::where('cid', 'CA2313')->where('batch', 2021)->first();
        return view('co_po_relation', compact('relation', 'courses'));
    }
    // ajax requests
    public function getCoPoRelation($courseId){
        // $relation = CO_PO_Relation::where('cid', $courseId)->first();
        // return view('include.co_po_relation_table', compact('relation'));
        // $relation = CoPoRelation::where('cid', 'CA2313')->where('batch', 2021)->first();
        // return view('co_po_relation', compact('relation'));
    }
    public function updateCoPoRelation(Request $r){
        dd($r->all());
    }
}
