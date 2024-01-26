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

    public function fileUpload(Request $request){
        // dd("hello");
        $request->validate([
            'file' => 'required',
        ]);

        $path = $request->file('file')->storeAs('excel', $request->file('file')->getClientOriginalName(), 'uploads');
        return "File uploaded successfully!";
    }

    public function importExcel()
    {
        // Use the Excel facade to import data using the modified ExcelImport class
        // $filePath = str_replace('\\', '/', "storage\\uploads\\excel\\test-data.xlsx");
        $filePath = Storage::disk('uploads')->path("excel\\test-data.xlsx");
        // dd($filePath);
        $spreadsheet = IOFactory::load($filePath);

        // Get the active sheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest column and row indices
        $highestColumnIndex = Coordinate::columnIndexFromString($worksheet->getHighestColumn());
        $highestRow = $worksheet->getHighestRow();

        // Loop through each cell
        for ($row = 1; $row <= $highestRow; ++$row) {
            for ($colIndex = 1; $colIndex <= $highestColumnIndex; ++$colIndex) {
                // Get the cell coordinate (e.g., "A1")
                $col = Coordinate::stringFromColumnIndex($colIndex);
                $cellCoordinate = $col . $row;

                // Get the cell
                $cell = $worksheet->getCell($cellCoordinate);

                // Check if the cell contains a formula
                if ($cell->getDataType() === DataType::TYPE_FORMULA) {
                    // Manually calculate the formula
                    $calculatedValue = $spreadsheet->getActiveSheet()->getCell($cellCoordinate)->getCalculatedValue();

                    // Set the calculated value back to the cell
                    $worksheet->getCell($cellCoordinate)->setValue($calculatedValue);
                }
            }
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePath);

        $rows = Excel::toCollection(new ExcelImport, $filePath);
        return view('excel.index', ['rows' => $rows[0]]);
    }
}

