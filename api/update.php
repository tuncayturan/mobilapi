<?php
$baglanti=mysqli_connect("localhost","u724691799_tuncayx","Tuncay23*","u724691799_dbname");
$id=$_GET["id"];
$name=$_POST["gelenisim"];
$no=$_POST["gelenno"];

$sorgu="update ogrenciler set isim='$name',numara='$no' where id='$id' ";
$komut=mysqli_query($baglanti,$sorgu);
if($komut)
{
    echo "Güncellendi";
} 
else{
    echo "Hata!";
}
msqli_close($baglanti);

?>