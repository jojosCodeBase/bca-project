<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\CA2313;
use App\Models\Courses;
use App\Models\MaxMarksCO;
use App\Models\ExcelUpload;
use App\Models\CoAttainment;
use App\Models\SubjectMarks;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{

    public function view($id)
    {
        $data = ExcelUpload::where('cid', $id)->get();
        return view('excel.view', ['data' => $data]);
    }
    private $labels = ['REGNO', 'Q1', 'S1', 'Q2', 'S2', 'ASSIGNMENT', 'ATTENDANCE', 'TOTAL'];

    public function readDbData(Request $r)
    {
        if (Courses::count() > 0) {
            return view('show-data', ['subjectCode' => $r->subjectId, 'batch' => $r->batch]);
        } else {
            return back()->with('error', 'No subjects found, add subject in Manage Subjects');
        }
    }
    protected $updated = 0;
    public function saveData($dataArray, $regno, $batch, $cid)
    {
        // Convert Q1 and S1 arrays to JSON

        $jsonQ1 = json_encode($dataArray['Q1']);
        $jsonS1 = json_encode($dataArray['S1']);
        $jsonQ2 = json_encode($dataArray['Q2']);
        $jsonS2 = json_encode($dataArray['S2']);
        $jsonAssignment = json_encode($dataArray['Assignment']);
        $jsonEndSem = json_encode($dataArray['End Sem']);

        if ($regno == "Max Marks/CO") {
            // if already exists then update
            $existingRecord = MaxMarksCO::where('cid', $cid)
                ->where('batch', $batch)
                ->first();

            if ($existingRecord) {
                $existingRecord->Q1 = $jsonQ1;
                $existingRecord->S1 = $jsonS1;
                $existingRecord->Q2 = $jsonQ2;
                $existingRecord->S2 = $jsonS2;
                $existingRecord->assignment = $jsonAssignment;
                $existingRecord->end_sem = $jsonEndSem;
                $existingRecord->total = 0;

                if ($existingRecord->save()) {
                    // If the update operation is successful
                    $this->updated = 1;
                    return true;
                } else {
                    // If there's an error during the update operation
                    return false;
                }
            } else {
                $model = new MaxMarksCO();
                $model->cid = $cid;
                $model->batch = $batch;
                $model->Q1 = $jsonQ1;
                $model->S1 = $jsonS1;
                $model->Q2 = $jsonQ2;
                $model->S2 = $jsonS2;
                $model->assignment = $jsonAssignment;
                $model->end_sem = $jsonEndSem;
                $model->total = 0;

                if ($model->save()) {
                    // If the save operation is successful
                    return True;
                } else {
                    // If there's an error during the save operation
                    return False;
                }
            }
        } else {
            $model = SubjectMarks::where('cid', $cid)
                ->where('batch', $batch)
                ->where('regno', $regno)
                ->first();

            if ($model) {
                // If a record already exists, update it
                $model->Q1 = $jsonQ1;
                $model->S1 = $jsonS1;
                $model->Q2 = $jsonQ2;
                $model->S2 = $jsonS2;
                $model->assignment = $jsonAssignment;
                $model->end_sem = $jsonEndSem;
                $model->total = 0; // Assuming you want to update the 'total' field as well

                if ($model->save()) {
                    // If the update operation is successful
                    $this->updated = 1;
                    return true;
                } else {
                    // If there's an error during the update operation
                    return false;
                }
            } else {
                // If no record exists, create a new one
                $model = new SubjectMarks();
                $model->cid = $cid;
                $model->batch = $batch;
                $model->regno = $regno;
                $model->Q1 = $jsonQ1;
                $model->S1 = $jsonS1;
                $model->Q2 = $jsonQ2;
                $model->S2 = $jsonS2;
                $model->assignment = $jsonAssignment;
                $model->end_sem = $jsonEndSem;
                $model->total = 0;

                if ($model->save()) {
                    // If the save operation is successful
                    return true;
                } else {
                    // If there's an error during the save operation
                    return false;
                }
            }
        }
    }
    function getCOLevel($attainmentPercentage)
    {
        if ($attainmentPercentage < 38)
            return 0;
        elseif ($attainmentPercentage >= 38 && $attainmentPercentage <= 51)
            return 1;
        elseif ($attainmentPercentage >= 52 && $attainmentPercentage <= 72)
            return 2;
        elseif ($attainmentPercentage >= 73)
            return 3;
    }
    public function calculate($cid, $batch)
    {
        // Attempt to retrieve data from the specified model
        $data = SubjectMarks::where('cid', $cid)->where('batch', $batch)->get();

        // if ($data->isEmpty())
        //     return back()->with('error', 'No details found for the specified details');

        // Retrieve max marks
        $max_marks = MaxMarksCO::where('cid', $cid)->first();

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

                // store target marks count
                $copy_co_po[$key] = $target_marks_count;

                // calculate attainment percentage
                $attainmentPercentage_CO_PO[$key] = intval(($target_marks_count / count($data)) * 100);
                // break;

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

        }

        // dd($target_marks);

        // adding co attainment to co attainment table
        // $query = CoAttainment::create([
        //     'cid' => $cid,
        //     'batch' => $batch,
        //     'q1' => json_encode($co_attainment['q1'], true),
        //     's1' => json_encode($co_attainment['s1'], true),
        //     'q2' => json_encode($co_attainment['q2'], true),
        //     's2' => json_encode($co_attainment['s2'], true),
        //     'assignment' => json_encode($co_attainment['assignment'], true),
        //     'end_sem' => json_encode($co_attainment['end_sem'], true),
        //     'total' => 0,
        // ]);

        $query = CoAttainment::firstOrCreate(
            ['cid' => $cid, 'batch' => $batch],
            [
                'q1' => json_encode($co_attainment['q1'], true),
                's1' => json_encode($co_attainment['s1'], true),
                'q2' => json_encode($co_attainment['q2'], true),
                's2' => json_encode($co_attainment['s2'], true),
                'assignment' => json_encode($co_attainment['assignment'], true),
                'end_sem' => json_encode($co_attainment['end_sem'], true),
                'total' => 0,
            ]
        );

        if ($query->wasRecentlyCreated) {
            $this->updated = 1;
            return true;
        } else {
            return false;
        }
    }
    public function rowDataValidation()
    {

    }
    public function fileUpload(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'required',
        ]);

        $filePath = $request->file('file')->path();
        $courseId = $request->file('file')->getClientOriginalName();
        $courseId = strtoupper(str_replace(' ', '_', pathinfo($courseId, PATHINFO_FILENAME)));
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestDataRow();
        $highestColumn = $worksheet->getHighestDataColumn();

        $expectedHeaders = ['Reg No', 'Q1', 'S1', 'Q2', 'S2', 'Assignment', 'End Sem'];

        // Loop through each row and store the data
        $excelData = [];
        $errors = [];
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);

            $isValidRow = true;
            $errorMessages = [];

            // For the first row, validate column headers
            // if ($row === 1) {
            //     foreach ($expectedHeaders as $index => $expectedHeader) {
            //         // Check if the header in the current column matches the expected header
            //         if ($rowData[0][$index] !== $expectedHeader) {
            //             $isValidRow = false;
            //             $errorMessages[] = "Row $row: Expected header '{$expectedHeader}' not found in column " . ($index + 1);
            //         }
            //     }
            // }

            // If the row is valid (either it's the header row or it contains data), add its data to $excelData
            if ($isValidRow || $row > 1) {
                $excelData[] = $rowData[0];
            } else {
                $errors = array_merge($errors, $errorMessages);
            }

            // If there are errors, handle them accordingly
            if (!empty($errors)) {
                // return ['errors' => $errors];
                return back()->withErrors($errors);
            } else {
                continue;;
            }
        }

        // Initialize an empty associative array
        $associativeArray = [];

        // Iterate over the original array
        for ($i = 0; $i < count($excelData[0]); $i++) {
            // Check if the value is not empty
            if ($excelData[0][$i]) {
                // Add the key-value pair to the associative array
                $associativeArray[$excelData[0][$i]] = $i; // Set an empty string as the value
            }
        }

        $header = ['Regno', 'Q1', 'S1', 'Q2', 'S2', 'Assignment', 'End Sem'];

        $co_po = [
            'CO1' => null,
            'CO2' => null,
            'CO3' => null,
            'CO4' => null,
            'CO5' => null,
            'CO6' => null,
            'Total' => null,
        ];


        $dataArray = [
            'regno' => 0,
            'Q1' => 1,
            'S1' => 2,
            'Q2' => 3,
            'S2' => 4,
            'Assignment' => 5,
            'End Sem' => 5,
        ];


        $flag = True;
        for ($row = 2; $row < count($excelData); $row++) {
            $regno = $excelData[$row][0];
            // echo $regno . ' row = ' . $row . "<br>";
            for ($x = 1; $x < count($associativeArray); $x++) {
                $start = $associativeArray[$header[$x]];

                if ($x == count($associativeArray) - 1) {
                    $end = count($excelData[1]);
                } else {
                    $end = $associativeArray[$header[$x + 1]];
                }

                for ($j = $start; $j < $end; $j++) {
                    if (array_key_exists($excelData[1][$j], $co_po)) {
                        $co_po[$excelData[1][$j]] = $excelData[$row][$j];
                    }
                }

                if (array_key_exists($header[$x], $dataArray)) {
                    $dataArray[$header[$x]] = $co_po;
                }

                // reset co_po after storing
                $co_po = [
                    'CO1' => null,
                    'CO2' => null,
                    'CO3' => null,
                    'CO4' => null,
                    'CO5' => null,
                    'CO6' => null,
                    'Total' => null,
                ];
                $dataArray['regno'] = $regno;
                $dataArray['cid'] = $request->subjectId;
                $dataArray['batch'] = $request->batch;
            }

            if ($this->saveData($dataArray, $regno, $request->batch, $request->subjectId) == False) {
                $flag = False;
                break;
            }
        }
        if ($flag == False)
            return back()->with('error', 'some error occured in uploading file');
        else {
            if ($this->calculate($request->subjectId, $request->batch)) {
                if ($this->updated == 1)
                    return back()->with('success', 'Marks Updated Successfully');
                else
                    return back()->with('success', 'Marks Uploaded Successfully');
            } else {
                return back()->with('error', 'some error occured in uploading file');
            }
        }
    }
}
