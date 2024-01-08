<?php
include "../pages/baglan.php";

$sql = "SELECT * FROM filmler1 WHERE film_id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['film_id']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DÜZENLEME</title>
    <link rel="icon" href="../images/Hopstarter-Soft-Scraps-User-Administrator-Red.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">ADMİN PANEL</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="admin.php" class="btn btn-outline-primary">Tüm Filmler</a>
                        <a href="dizileradmin.php" style="margin-left: 5px;" class="btn btn-outline-primary">Tüm Diziler</a>
                        <a href="ekle.php" style="margin-left: 5px;" class="btn btn-outline-primary">Film Ekle</a>
                        <a href="diziekle.php" style="margin-left: 5px;" class="btn btn-outline-primary">Dizi Ekle</a>
                        <a href="kullanicilar.php" style="margin-left: 640px;" class="btn btn-outline-primary">Tüm Kullanıcılar</a>
                        <a href="../login/login.php" style="margin-left: 5px;" class="btn btn-outline-primary">Çıkış Yap</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <form action="detay.php" method="post" enctype="multipart/form-data">
            <div class="container ">
                <div class="row mt-4">
                    <div class="col">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card">
                                    <?php echo "<img src='../images/" . $satir["film_resim"] . "'>"; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $satir['film_adi'] ?></h5>
                                        <p class="card-text"><?= $satir['film_aciklama'] ?></p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Çıkış Tarihi: <?= $satir['film_cikis'] ?></li>
                                            <li class="list-group-item">Yönetmen:<?= $satir['film_yonetmen'] ?></li>
                                            <li class="list-group-item">Ekleme Zamanı: <br><?= $satir['kayit_tarihi'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </main>
</body>

</html>