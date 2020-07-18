<?php
require_once "../../config/connection.php";
require_once '../../vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

$query = "SELECT * FROM author";
$data = executeQuery($query);

$string = "";
foreach($data as $el){
    $section->addText($el->desc);
}

$section->addText($string);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=author.doc");

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');