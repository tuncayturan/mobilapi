<?php
$baglanti=mysqli_connect("localhost","u724691799_tuncayx","Tuncay23*","u724691799_dbname");
$id=$_POST["id"];
$sorgu="delete FROM ogrenciler where id='{$id}'";
$komut=mysqli_query($baglanti,$sorgu);
if($komut)
 {
   echo "silme işlemi tamam";
 }
 else
 echo "silme işleminde hata";
?>