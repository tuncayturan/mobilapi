<?php
include('config.php');
if(isset($_POST['btnkaydet']))
{
$isim=$_POST["gelenisim"];
$numara=$_POST["gelenno"];
$sorgu="insert into ogrenciler(isim,numara) values('$isim','$numara')";
$komut=mysqli_query($baglan,$sorgu);
if($komut)
{
  //echo "kayıt başarılı";
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Tebrikler!</strong>Kayıt başarılı<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
else
 echo "hata!!!";

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
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    function myFunction(gelenid) {
        var txt;
        if (confirm("Silmek istediğinize emin misiniz! " + gelenid)) {
            // txt = "You pressed OK!";
            window.location = 'delete.php?id=' + gelenid;
            alert("İşlem tamamlandı");
        } else {
            txt = "Silme işlemi iptal edildi..";
        }
    }
    </script>

    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Listele</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="adsoyad" class="form-label">Ad Soyad</label>
                        <input type="text" name="gelenisim" class="form-control" placeholder="Adınız">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Numara</label>
                        <input type="text" name="gelenno" class="form-control" placeholder="221">
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-success" name="btnkaydet">Kaydet</button>
                    </div>

                </form>
            </div>

            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Üye Id</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Numara</th>
                            <th scope="col">Düzenle</th>
                            <th scope="col">Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu="select * from ogrenciler";
                        $komut=mysqli_query($baglan,$sorgu);
                       while($row=mysqli_fetch_assoc($komut))
                       {
                        echo "<tr>";
                          echo  "<th scope='row'>".$row['id']."</th>";                  
                          echo "<td>".$row['isim']."</td>";
                          echo "<td>".$row['numara']."</td>";
                          echo "<td scope='col'><a href='edit.php?id=$row[id]' class='link-danger'><i class='fa-solid fa-pen-to-square'></i></a> </td>";
                          echo "<td scope='col'><a href='#' onclick='myFunction($row[id])' class='link-warning'><i class='fa-solid fa-trash'></i></a> </td>";
                          //echo "<td scope='col'><a href='delete.php?id=$row[id]' class='link-warning'><i class='fa-solid fa-trash'></i></a> </td>";
                        echo "</tr>";
                       }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>




</html>
