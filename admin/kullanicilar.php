<?php
include "../pages/baglan.php";


if (isset($_GET['sil'])) {
    $sqlsil = " DELETE FROM kullanicilar WHERE `kullanicilar`.`kullanici_id` = ?";
    $sorgusil = $baglan->prepare($sqlsil);
    $sorgusil->execute([$_GET['sil']]);

    header('location:kullanicilar.php');
}
$sql = "SELECT * FROM kullanicilar";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" href="../images/Hopstarter-Soft-Scraps-User-Administrator-Red.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-left: 730px;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;

    }
</style>

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
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" style="margin-left: 330px;" type="search" placeholder="Search" aria-label="Arama">
                            <button class="btn btn-outline-primary" type="submit">Arama</button>
                        </form>
                        <div>
                            <div class="dropdown">
                                <a href="kullanicilar.php" style="margin-left: 5px;" class="btn btn-outline-primary">Tüm Kullanıcılar</a>
                            </div>
                        </div>
                        <a href="../login/login.php" style="margin-left: 5px;" class="btn btn-outline-primary">Çıkış Yap</a>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kullanıcı Adı</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>E-mail</th>
                                <th>Parola</th>
                                <th>Ekleme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?= $satir['kullanici_id'] ?></td>
                                    <td><?= $satir['kullanici_adi'] ?></td>
                                    <td><?= $satir['isim'] ?></td>
                                    <td><?= $satir['soyisim'] ?></td>
                                    <td><?= $satir['email'] ?></td>
                                    <td><?= $satir['parola'] ?></td>
                                    <td><?= $satir['kayıt_tarihi'] ?></td>
                                    <td>
                                        <div class="btn-group">

                                            <a href="kullaniciguncel.php?kullanici_id=<?= $satir['kullanici_id'] ?>" class="btn btn-secondary">Güncelle</a>
                                            <a href="?sil=<?= $satir['kullanici_id'] ?>" onclick="return confirm('Silinsin Mi?')" class="btn btn-danger">Sil</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</body>

</html>