<html>
<head type="text/css" media="print">
    <title>Liste des QR Codes</title>
    <style type="text/css">
       @media print
        {
            .noprint {display:none;}
        }
    </style>
</head>

<body>

<?php
include('phpqrcode/qrlib.php');

if(isset($_POST['generate_text']))
{
    $fulltext=$_POST['qr_text'];
    $numbers = explode(",", $fulltext);
    $folder="qrcodes/";
    $size=40;
    echo "<div class='noprint'>";
    echo count($numbers) . " fiches traitées : " . $fulltext;
    echo "<button onClick=\"window.print()\">Print this page</button>";
    echo "</div>";
    for ($i = 0; $i < count($numbers); $i=$i+1) {
        $number = $numbers[$i];
        $file_name="qr". $number .".png";
        $file_name=$folder.$file_name;
        QRcode::png($number,$file_name, QR_ECLEVEL_H, 15);
        echo "<center><img src=\" $file_name \"> . <br> . <span style='font-size: 25px;'><b>Numéro :</b> $number</span></center> . <br> </center>";
    }




}
?>

</body></html>
