<?php

// App\Http\Controllers\ExcelController.php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class ExcelController extends Controller
{

    public function test(){
        return view('test');
    }
    public function fileUpload(Request $request){
        // dd("hello");
        $request->validate([
            'file' => 'required',
        ]);

        $path = $request->file('file')->storeAs('excel', $request->file('file')->getClientOriginalName(), 'uploads');
        return "File uploaded successfully!";
    }

    public function iterate($track, $worksheet){
        // $range = $track['q1'].':'.$track['s1'];
        $range = 'A2:E2';
        dd($worksheet->rangeToArray($range));
        dd($range);
    }

    public function importExcel()
    {
        // Use the Excel facade to import data using the modified ExcelImport class
        // $filePath = str_replace('\\', '/', "storage\\uploads\\excel\\test-data.xlsx");
        $filePath = Storage::disk('uploads')->path("excel\\er-test.xlsx");
        // dd($filePath);
        $spreadsheet = IOFactory::load($filePath);

        // Get the active sheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest column and row indices
        $highestColumnIndex = Coordinate::columnIndexFromString($worksheet->getHighestColumn());
        $highestRow = $worksheet->getHighestRow();

        $track = [
            'q1' => 0,
            'q2' => 0,
            's1' => 0,
            's2' => 0,
        ];
        // Loop through each cell
        for ($row = 1; $row <= $highestRow; ++$row) {
            for ($colIndex = 1; $colIndex <= $highestColumnIndex; ++$colIndex) {
                // Get the cell coordinate (e.g., "A1")
                $col = Coordinate::stringFromColumnIndex($colIndex);
                $cellCoordinate = $col . $row;

                // Get the cell
                $cell = $worksheet->getCell($cellCoordinate);
                // dd($cell);
                // if(stripos($cell, 'Quiz 1')){
                //     echo $cell . '<br>';
                // }
                echo $cell;
                if (stripos($cell, 'Quiz 1') !== false) {
                    $track['q1'] = $cellCoordinate;
                    echo 'The cell contains "Quiz 1".' . $cellCoordinate . '<br>';
                }
                if (stripos($cell, 'Sessional 1') !== false) {
                    $track['s1'] = $cellCoordinate;
                    echo 'The cell contains "Sessional 1".' . $cellCoordinate . '<br>';
                }


                // Check if the cell contains a formula
                if ($cell->getDataType() === DataType::TYPE_FORMULA) {
                    // Manually calculate the formula
                    $calculatedValue = $spreadsheet->getActiveSheet()->getCell($cellCoordinate)->getCalculatedValue();

                    // Set the calculated value back to the cell
                    $worksheet->getCell($cellCoordinate)->setValue($calculatedValue);
                }
            }
            $this->iterate($track, $worksheet);
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePath);

        $rows = Excel::toCollection(new ExcelImport, $filePath);
        return view('excel.index', ['rows' => $rows[0]]);
    }
}

