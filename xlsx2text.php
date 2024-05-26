<?php
require './xlsx2text/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// ระบุเส้นทางไปยังไฟล์ XLSX
$xlsxPath = 'กรอบคนครองทุกประเภท 1 เม.ย. 67.xlsx';

// โหลดไฟล์ XLSX
$spreadsheet = IOFactory::load($xlsxPath);

// ดึงข้อมูลจากแผ่นงานแรก
$worksheet = $spreadsheet->getActiveSheet();
$rows = $worksheet->toArray();

// แปลงข้อมูลเป็นข้อความ
$text = '';
foreach ($rows as $row) {
    $text .= implode("\t", $row) . "\n";
}

// แสดงข้อความที่ดึงมาได้
echo nl2br($text);
?>
