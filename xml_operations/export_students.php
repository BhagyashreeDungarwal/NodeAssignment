// /xml_operations/export_students.php
<?php
require '../common/db.php';

$students = $usersCollection->find();
$xml = new SimpleXMLElement('<students/>');

foreach ($students as $student) {
    $stu = $xml->addChild('student');
    $stu->addChild('name', $student['name']);
    $stu->addChild('age', $student['age']);
    $stu->addChild('course', $student['course']);
}

// Output the XML
Header('Content-type: text/xml');
echo $xml->asXML();
?>
