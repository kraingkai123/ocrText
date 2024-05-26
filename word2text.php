<?php
require './docx2text/vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;

// ระบุเส้นทางไปยังไฟล์ DOCX
$docxPath = 'BMA004-book-44855.docx';

// โหลดไฟล์ DOCX
$phpWord = IOFactory::load($docxPath);

// ดึงข้อความทั้งหมดจาก DOCX
$text = '';

// วนลูปผ่านทุกส่วนของเอกสาร
foreach ($phpWord->getSections() as $section) {
    foreach ($section->getElements() as $element) {
        if (method_exists($element, 'getElements')) {
            foreach ($element->getElements() as $childElement) {
                if (method_exists($childElement, 'getText')) {
                    $text .= $childElement->getText() . "\n";
                }
            }
        } elseif (method_exists($element, 'getText')) {
            $text .= $element->getText() . "\n";
        }
    }
}

// แสดงข้อความที่ดึงมาได้
echo "Extracted Text: " . nl2br($text);
?>
