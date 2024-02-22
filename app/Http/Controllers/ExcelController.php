<?php

namespace App\Http\Controllers;

use App\Models\CA1603;
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

    public function readDbData()
    {
        // $data = CA1603::where('regno', 202116033)->first();
        $data = CA1603::all();

        $data = $data->toArray();
        // dd($data);

        return view('show-data', ['data' => $data]);
        // var_dump($data);
        // echo "<br><br>";
        // var_dump($data['q1']);




        // if ($data) {
        //     // If data is found
        //     $Q1 = json_decode($data->q1, true); // Access q1 property of the model instance
        //     // $Q2 = json_decode($data->q2, true);

        //     dd($Q1);

        //     foreach ($Q1 as $x) {
        //         if (!is_null($x))
        //             echo $x . "<br>";
        //     }
        // } else {
        //     // If data is not found
        //     echo "Data not found.";
        // }
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

        $header = ['Regno', 'Q1', 'S1'];

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
        ];

        for ($row = 2; $row < count($excelData); $row++) {
            $regno = $excelData[$row][0];
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
            }

            // Convert Q1 and S1 arrays to JSON

            $jsonQ1 = json_encode($dataArray['Q1']);
            $jsonS1 = json_encode($dataArray['S1']);

            // echo $regno;
            // echo "Q1 JSON: $jsonQ1<br>";
            // echo "S1 JSON: $jsonS1<br>";


            $model = new CA1603();

            // Assign values to model properties
            $model->regno = $regno;
            $model->Q1 = $jsonQ1;
            $model->S1 = $jsonS1;
            $model->Q2 = 0;
            $model->S2 = 0;
            $model->assignment = 0;
            $model->attendance = 0;
            $model->total = 0;

            // Save the model instance
            if ($model->save()) {
                // If the save operation is successful
                echo "Data inserted successfully!";
            } else {
                // If there's an error during the save operation
                echo "Error inserting data.";
            }
        }
    }
}
