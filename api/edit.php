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
<html>
<head>	
	<title>Veri düzenle</title>
		<meta charset="utf-8"/>
</head>

<body>
	<a href="index.php">Ana sayfa</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Ad Soyad</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>numara</td>
				<td><input type="text" name="no" value="<?php echo $numara;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
