<?php
$baglanti=mysqli_connect("sql448.main-hosting.eu","u724691799_tuncayx","Tuncay23*","u724691799_dbname");

$name=$_POST["gelenisim"];
$no=$_POST["gelenno"];

$sorgu="INSERT INTO ogrenciler(isim,numara) values('{$name}','{$no}')";
$komut=mysqli_query($baglanti,$sorgu);
if($komut)
{
    echo "veri eklendi";
} 
else{
    echo "veri ekleme sırasında hata oluştu!";
}
msqli_close($baglanti);

?>

