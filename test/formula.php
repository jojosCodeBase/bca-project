<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

$filePath = 'public\assets\excel\test.xlsx';
echo "Attempting to load file: $filePath\n";
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

// Save the modified spreadsheet
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('test\modified_test.xlsx');
echo "Modified spreadsheet saved successfully.\n";
