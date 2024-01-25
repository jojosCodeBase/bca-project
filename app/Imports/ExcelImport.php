<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;

class ExcelImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $modifiedRows = new Collection();

        // Loop through each row
        foreach ($rows as $row) {
            // Create a new row to store modified cells
            $modifiedRow = [];

            // Loop through each cell in the row
            foreach ($row as $key => $value) {
                // Check if the cell contains a formula
                if (is_string($value) && strpos($value, '=') === 0) {
                    $modifiedRow[$key] = "boka";
                    // Assuming $row is an array containing cell objects
                    // $cell = $row[$key];

                    // Check if $cell is an instance of PhpOffice\PhpSpreadsheet\Cell\Cell
                    // if ($cell instanceof Cell) {
                    //     // Evaluate the formula
                    //     // $calculatedValue = Calculation::getInstance()->calculate($cell);

                    //     // Update the cell value in-memory (this doesn't persist to the file)
                    //     // $cell->setValue($calculatedValue);
                    //     $cell->setValue("boka");

                    //     // Add the modified cell to the new row
                    //     $modifiedRow[$key] = $cell;
                    // }
                } else {
                    // Add non-formula cell as is
                    // $modifiedRow[$key] = $value;
                    $modifiedRow[$key] ="no-boka";
                }
            }

            // Add the modified row to the new collection
            $modifiedRows->push($modifiedRow);
        }

        // Return the modified rows to be used in the view
        return view('excel.index', ['rows' => $modifiedRows]);
    }
}
