// /xml_operations/import_students.php
<?php
require '../common/db.php';

// Load XML file
$xml = simplexml_load_file('students.xml');
foreach ($xml->student as $student) {
    $usersCollection->insertOne([
        'name' => (string)$student->name,
        'age' => (int)$student->age,
        'course' => (string)$student->course
    ]);
}
echo "Data imported successfully!";
?>
