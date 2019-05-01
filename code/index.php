<?php
require __DIR__ . "/vendor/autoload.php";

$qrcode = new Zxing\QrReader('qrcodes/qr55.png');
$text = $qrcode->text(); //return decoded text from QR Code
echo $text;
?>