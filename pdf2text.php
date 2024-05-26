<?php
require './pdf2text/vendor/autoload.php';

use Smalot\PdfParser\Parser;

// สร้างอินสแตนซ์ของ Parser
$parser = new Parser();

// ระบุเส้นทางไปยังไฟล์ PDF
$pdfPath = 'BMA004-book-44785.pdf';

// ดึงข้อมูลจากไฟล์ PDF
$pdf = $parser->parseFile($pdfPath);

// ดึงข้อความทั้งหมดจาก PDF
$text = $pdf->getText();

// แสดงข้อความที่ดึงมาได้
echo "Extracted Text: " . $text;
?>
