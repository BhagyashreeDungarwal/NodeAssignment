// /user/list_files.php
<?php
$dir = '../uploads';
$files = scandir($dir);
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        echo $file . '<br>';
    }
}
?>
