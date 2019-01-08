<?php
session_start();
//echo $_SESSION['fio'];
header('Content-Type: image/png');

ini_set ("display_errors", "1");
  error_reporting(E_ALL);
$image = imagecreatetruecolor(700, 350)
  or die('не создается ...');
$backColor = imagecolorallocate($image, 150, 240, 190);
$textColor = imagecolorallocate($image, 120, 120, 120);
imagefill($image, 0, 0, $backColor);

$fonts = 'c:/windows/fonts/arial.ttf';

imagettftext($image, 30, 0, 150, 100, $textColor, $fonts, 'СЕРТИФИКАТ');
imagettftext($image, 15, 0, 150, 150, $textColor, $fonts, 'Удостоверяет, что');
imagettftext($image, 20, 0, 150, 200, $textColor, $fonts, $_SESSION['fio']);
imagettftext($image, 15, 0, 150, 250, $textColor, $fonts, 'успешно прошел(а) тестирование на ');
imagettftext($image, 15, 0, 500, 250, $textColor, $fonts, $_SESSION['rating']);

imagepng($image);
imagedestroy($image);

 ?>
