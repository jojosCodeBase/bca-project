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

        $headings = $data[0];

        echo count($data);
        // echo count($data[0]);

        echo "<pre>";
        print_r($headings);
        echo "</pre>";

        // Initialize an empty associative array
        $associativeArray = [];



        // Iterate over the original array
        for ($i = 0; $i < count($headings); $i++) {
            // Check if the value is not empty
            if ($headings[$i]) {
                // Add the key-value pair to the associative array
                $associativeArray[$headings[$i]] = $i; // Set an empty string as the value
            }
        }
        echo "<pre>";
        print_r($associativeArray);
        echo "</pre>";

        // Print the resulting associative array
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $headers = ['Q1', 'S1'];

        // echo 'count(data[0]) ' . count($data[0]) . "<br>";
        // echo 'count(data) ' . count($data) . "<br>";
        $flag = False;
        for ($i = 0; $i < count($data); $i++) {
            // echo "i loop " . $i . '<br>';

            if($i == count($associativeArray)-1){
                $start = $associativeArray[$headers[$i]];
                $end = count($data[1]);
                $flag = True;
            }else{
                $start = $associativeArray[$headers[$i]];
                $end = $associativeArray[$headers[$i + 1]];
            }

            // echo $start;
            // echo $end;

            for ($j = $start; $j < $end; $j++) {
                echo $data[$i][$j] . 'j = ' . $j;
                // echo $data[1][0];
            }
            // counting columns
            // for($x = $i; $x < count($); $x++){
            //     echo $headers[$x];
            //     echo $headers[$x+1];

            //     // break;
            //     echo "<br>";
            // }

            // break;

            // foreach($associativeArray as $x){
            // }
            if($flag)
                break;

            echo '<br>';
        }


        die();
        $dataArray = [
            'regno' => 0,
            'q1' => 1,
            's1' => 2,
            'q2' => 4,
            's2' => 5,
            'assignment' => 7,
            'attendance' => 8,
            'total' => 9,
        ];

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
