<?php 
require_once "../../config/connection.php";
require_once '../../vendor/autoload.php';

$file = fopen("../../data/log.txt", "r");

if($file){
    $file_array = file("../../data/log.txt");

    $file_data = [];
    foreach($file_array as $el){
        array_push($file_data, explode("\t", $el));
    }
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->getColumnDimension('A')->setWidth(100);
$sheet->getColumnDimension('B')->setWidth(50);
$sheet->getColumnDimension('C')->setWidth(70);

$sheet->setCellValue("A1", "Page");
$sheet->setCellValue("B1", "Time");
$sheet->setCellValue("C1", "IP Address");

$row = 2;
foreach($file_data as $el){
    $sheet->setCellValue("A$row", $el[0]);
    $sheet->setCellValue("B$row", $el[1]);
    $sheet->setCellValue("C$row", $el[2]);
    $row++;
}

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=posts.xls");

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');