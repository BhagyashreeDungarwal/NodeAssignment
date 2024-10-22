// /common/captcha.php
<?php
session_start();
$code = rand(1000, 9999);
$_SESSION['captcha_code'] = $code;

$image = imagecreatetruecolor(70, 30);
$bg = imagecolorallocate($image, 22, 86, 165);
$fg = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bg);
imagestring($image, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
