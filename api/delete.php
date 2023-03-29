<?php
include("config.php");

$id = $_GET['id'];

$result = mysqli_query($baglan, "DELETE FROM ogrenciler WHERE id=$id");

header("Location:index.php");
?>

