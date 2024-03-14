<?php

namespace App\Http\Controllers;

// use App\Models\CA1603;
use Exception;
use App\Models\MaxMarksCO;
use App\Models\ExcelUpload;
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

    public function verify($i, $string)
    {
        if (strcasecmp($this->labels[$i], $string) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function readDbData(Request $r)
    {
        dd($r->all());
        try {
            $subjectCode = $r->subject;
            $subject = "App\\Models\\" . $subjectCode;

            // Attempt to retrieve data from the specified model
            $data = app($subject)->where('regno', 'like', '%' . $r->batch . '%')->get();

            // dd($data);
            if($data->isEmpty())
                return back()->with('error', 'No details found for the specified details');

            // Retrieve max marks
            $max_marks = MaxMarksCO::where('cid', $subjectCode)->get();

            return view('show-data', ['data' => $data, 'max_marks' => $max_marks]);
        } catch (Exception $e) {
            // Handle the case where the model is not found
            $errorMessage = "Table $subjectCode not found.";
            return back()->with('error', $errorMessage);
        }
    }

    public function saveData($dataArray, $regno)
    {
        // Convert Q1 and S1 arrays to JSON

        $jsonQ1 = json_encode($dataArray['Q1']);
        $jsonS1 = json_encode($dataArray['S1']);
        $jsonQ2 = json_encode($dataArray['Q2']);
        $jsonS2 = json_encode($dataArray['S2']);
        $jsonAssignment = json_encode($dataArray['Assignment']);

        if ($regno == "Max Marks/CO") {
            $model = new MaxMarksCO();

            $model->cid = 'CA1603';
            $model->Q1 = $jsonQ1;
            $model->S1 = $jsonS1;
            $model->Q2 = $jsonQ2;
            $model->S2 = $jsonS2;
            $model->assignment = $jsonAssignment;
            $model->total = 0;

            if ($model->save()) {
                // If the save operation is successful
                return True;
            } else {
                // If there's an error during the save operation
                return False;
            }
            // echo "<pre>";
            // print_r($dataArray);
            // echo "</pre>";
        } else {
            $model = new CA1603();

            // Assign values to model properties
            $model->regno = $regno;
            $model->Q1 = $jsonQ1;
            $model->S1 = $jsonS1;
            $model->Q2 = $jsonQ2;
            $model->S2 = $jsonS2;
            $model->assignment = $jsonAssignment;
            $model->attendance = 0;
            $model->total = 0;

            // Save the model instance
            if ($model->save()) {
                // If the save operation is successful
                return True;
            } else {
                // If there's an error during the save operation
                return False;
            }
        }
    }

    public function calculate()
    {
        $q1_max_marks = MaxMarksCO::where('cid', 'CA1603')->get();

        $q1_max_marks = $q1_max_marks->toArray();

        $data = CA1603::all();
        $data = $data->toArray();

        $q1 = [
            'CO1' => 0,
            'CO2' => 0,
            'CO3' => 0,
            'CO4' => 0,
            'CO5' => 0,
            'CO6' => 0,
            'Total' => 0,
        ];

        $values = [];
        $count = 0;
        foreach ($data as $d) {
            // echo "<br>regno : " . $d['regno'] . "<br>";
            foreach ($d as $key => $x) {
                if ($key == 'id' || $key == 'regno' || $key == 'updated_at' || $key == 'created_at' || $key == 'attendance' || $key == 'total') {
                    continue;
                } else {
                    // echo $key . " => <br>";
                    if ($key == 'q1') {
                        // echo $key . " => ";
                        $jsonData = json_decode($x, true);

                        foreach ($jsonData as $key => $value) {
                            // echo "Value: $value<br>";

                            if ($key == 'CO1') {
                                if (!is_null($value)) {
                                    // echo $key . " => ";
                                    if (is_numeric($value)) {
                                        $values[$count++] = $value;
                                    } else {
                                        $values[$count++] = 0;
                                    }
                                } else {
                                    echo "NULL" . "<br>";
                                }
                            }
                        }
                    }
                }
            }
        }

        // print_r($q1_max_marks[0]['q1']);

        $q1 = json_decode($q1_max_marks[0]['q1'], true);

        $target_marks = $q1['CO1'] * 60 / 100;
        $count = 0;

        echo "Target marks: " . $target_marks . "<br>";

        // echo "<br>";

        // print_r($values);

        foreach ($values as $v) {
            if ($v >= $target_marks) {
                $count++;
            }
        }

        echo "Student >= 60% => " . $count;
        // echo "<pre>";
        // print_r($data[0]);
        // echo "</pre>";
        die();
    }
    public function fileUpload(Request $request)
    {
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

        // Loop through each row and store the data
        $excelData = [];
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
            $excelData[] = $rowData[0];
        }

        // echo "excel data";
        // echo "<pre>";
        // print_r($excelData);
        // echo "</pre>";



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

        // echo "excel data";
        // echo "<pre>";
        // print_r($associativeArray);
        // echo "</pre>";


        $header = ['Regno', 'Q1', 'S1', 'Q2', 'S2', 'Assignment'];

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
        ];

        $flag = True;
        for ($row = 2; $row < count($excelData); $row++) {
            $regno = $excelData[$row][0];
            echo $regno . ' row = ' . $row . "<br>";
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

                // echo "<pre>";
                // print_r($co_po);
                // echo "</pre>";

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
            }



            if ($this->saveData($dataArray, $regno) == False) {
                $flag = False;
                break;
            }

        }
        if ($flag == False)
            return back()->with('error', 'some error occured in uploading file');
        else
            return back()->with('success', 'file uploaded successfully');
        // $this->calculate();
    }
}
