<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$filePath = 'test\test.xlsx';
echo "Attempting to load file: $filePath\n";
$spreadsheet = IOFactory::load($filePath);
// $spreadsheet = new Spreadsheet();
// $spreadsheet = IOFactory::load("test.xlsx");
// $activeWorksheet = $spreadsheet->getActiveSheet();
// $activeWorksheet->setCellValue('A1', 'Hello World !');
// var_dump($activeWorksheet);
// $cellValue = $spreadsheet->getActiveSheet()->getCell('E1')->getCalculatedValue();
$cellValue = $spreadsheet->getActiveSheet()->getCell('E1')->getValue();

var_dump($cellValue);

if(strstr($cellValue, '=')){
    $output = $spreadsheet->getActiveSheet()->getCell('E1')->getCalculatedValue();
    echo $output;
}else{
    echo "not a formula";
}

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');

