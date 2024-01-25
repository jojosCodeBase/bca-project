<?php

// App\Http\Controllers\ExcelController.php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExcel()
    {
        // Use the Excel facade to import data using the modified ExcelImport class
        // return Excel::toCollection(new ExcelImport, public_path('assets/excel/CA2103A.xlsx'));
        $rows = Excel::toCollection(new ExcelImport, public_path('assets/excel/CA2103A.xlsx'));
        // dd($rows[0]);
        return view('excel.index', ['rows' => $rows[0]]);
    }
}

