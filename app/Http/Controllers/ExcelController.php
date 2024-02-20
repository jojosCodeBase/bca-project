<?php

namespace App\Http\Controllers;

use App\Models\ExcelUpload;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{

    public function view($id){
        $data = ExcelUpload::where('cid', $id)->get();
        return view('excel.view', ['data' => $data]);
    }
    private $labels = ['REGNO', 'NAME', 'Q1', 'S1-50', 'S1-15', 'Q2', 'S2-50', 'S2-15', 'ASSIGNMENT', 'ATTENDANCE', 'TOTAL'];

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

        $dataArray = [
            'regno' => 0,
            'name' => 1,
            'q1' => 2,
            's1_50' => 3,
            's1_15' => 4,
            'q2' => 5,
            's2_50' => 6,
            's2_15' => 7,
            'assignment' => 9,
            'attendance' => 8,
            'total' => 10,
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
                ExcelUpload::create($dataArray);
                // If successful, continue to next iteration
            } catch (QueryException $exception) {
                // If an exception occurs during database insertion, handle it here
                return back()->with('error', 'Failed to upload file to database: ' . $exception->getMessage());
            }
        }

        return back()->with('success', 'File uploaded to database successfully!');
    }
}

