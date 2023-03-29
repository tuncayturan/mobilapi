<?php

include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($baglan, $_POST['id']);
	
	$isim = mysqli_real_escape_string($baglan, $_POST['name']);
	$numara = mysqli_real_escape_string($baglan, $_POST['no']);
	
	// checking empty fields
	if(empty($isim) || empty($numara)) {	
			
		if(empty($isim)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($numara)) {
			echo "<font color='red'>numara field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($baglan, "UPDATE ogrenciler SET isim='$isim',numara='$numara' WHERE id=$id");
		
		//redirectig to the display pnumara. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($baglan, "SELECT * FROM ogrenciler WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['isim'];
	$numara = $res['numara'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Php Mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
	<a href="index.php">Ana sayfa</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td><label for="name" class="form-label">Ad Soyad</label></td>
				<td><input type="text" name="name" class="form-control" placeholder="Adınız" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td><label for="no" class="form-label">Numara</label></td>
				<td><input type="text" name="no" class="form-control" placeholder="Numara" value="<?php echo $numara;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn btn-warning" name="update" value="Güncelle"></td>
			</tr>
		</table>
	</form>
</body>
</html>
