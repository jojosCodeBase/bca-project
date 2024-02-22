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
        $data = CA1603::where('regno', 202116033)->first(); // Retrieve a single model instance

        if ($data) {
            // If data is found
            $Q1 = json_decode($data->q1, true); // Access q1 property of the model instance
            $Q2 = json_decode($data->q2, true);

            foreach($Q1 as $x){
                if(!is_null($x))
                    echo $x . "<br>";
            }
        } else {
            // If data is not found
            echo "Data not found.";
        }
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

        // echo "<pre>";
        // print_r($excelData);
        // echo "</pre>";

        $data = $excelData;

        // Create an associative array to map the column indices to their respective headings

        $array = $data;

        // echo count($data);
        // echo count($data[0]);

        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";

        // Initialize an empty associative array
        $associativeArray = [];



        // Iterate over the original array
        for ($i = 1; $i < count($array[0]); $i++) {
            // Check if the value is not empty
            if ($array[0][$i]) {
                // Add the key-value pair to the associative array
                $associativeArray[$array[0][$i]] = $i; // Set an empty string as the value
            }
        }
        // echo "<pre>";
        // print_r($associativeArray);
        // echo "</pre>";


        // Print the resulting associative array
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $header = ['Q1', 'S1'];

        // echo 'count(data[0]) ' . count($data[0]) . "<br>";
        // echo 'count(data) ' . count($data) . "<br>";


        // dd(count($associativeArray));

        $co_po = [
            'CO1' => null,
            'CO2' => null,
            'CO3' => null,
            'CO4' => null,
            'CO5' => null,
            'CO6' => null,
            'Total' => null,
        ];

        // var_dump($co_po);

        // $dataArray = [
        //     'regno' => 0,
        //     'Q1' => 1,
        //     'S1' => 2,
        //     'Q2' => 4,
        //     'S2' => 5,
        //     'assignment' => 7,
        //     'attendance' => 8,
        //     'total' => 9,
        // ];
        $dataArray = [
            'regno' => 0,
            'Q1' => 1,
            'S1' => 2,
        ];

        for ($x = 0; $x < count($associativeArray); $x++) {
            echo $header[$x] . "<br>";
            for ($i = 1; $i < count($array) - 1; $i++) {

                $start = $associativeArray[$header[$x]];

                if ($x == count($associativeArray) - 1) {
                    $end = count($array[1]);
                } else {
                    $end = $associativeArray[$header[$x + 1]];
                }

                for ($j = $start; $j < $end; $j++) {

                    if (array_key_exists($array[$i][$j], $co_po))
                        $co_po[$array[$i][$j]] = $array[$i + 1][$j];
                    // echo $array[$i][$j] . " ";
                    // echo $array[$i+1][$j] . " ";
                }

                if (array_key_exists($header[$x], $dataArray)) {
                    $dataArray[$header[$x]] = $co_po;
                }

                echo "<pre>";
                print_r($co_po);
                echo "</pre>";
                echo "<br>";
            }
        }
        $dataArray['regno'] = 202116033;
        echo "<pre>";
        print_r($dataArray);
        echo "</pre>";

        die();

        for ($i = 0; $i < count($excelData[0]); $i++) {
            if ($this->verify($i, $excelData[0][$i])) {
                continue;
            } else {
                $error = "Excel sheet not in correct format, at " . $excelData[0][$i];
                return back()->with('error', $error);
            }
        }

        // for outer array of headings
        for ($i = 1; $i < count($excelData); $i++) {
            // for inner array of values
            for ($j = 0; $j < count($excelData[0]); $j++) {
                $key = array_keys($dataArray)[$j];
                $dataArray[$key] = $excelData[$i][$j];
            }

            try {
                // Attempt to create a new record using create() method
                CA1603::create($dataArray);
                // If successful, continue to next iteration
            } catch (QueryException $exception) {
                // If an exception occurs during database insertion, handle it here
                return back()->with('error', 'Failed to upload file to database: ' . $exception->getMessage());
            }
        }

        return back()->with('success', 'File uploaded to database successfully!');
    }
}
