<?php
$baglanti=mysqli_connect("localhost","u724691799_tuncayx","Tuncay23*","u724691799_dbname");
$sorgu="SELECT * FROM ogrenciler";
$komut=mysqli_query($baglanti,$sorgu);
if($komut) {
    $output= mysqli_fetch_all($komut,MYSQLI_ASSOC);
    echo json_encode($output);
 }
?>
