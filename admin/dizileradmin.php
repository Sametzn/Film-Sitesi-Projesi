<?php
include "../pages/baglan.php";

if (isset($_GET['sil'])) {
    $sqlsil = " DELETE FROM diziler WHERE `diziler`.`dizi_id` = ?";
    $sorgusil = $baglan->prepare($sqlsil);
    $sorgusil->execute([$_GET['sil']]);

    header('location:dizileradmin.php');
}
$sql = "SELECT * FROM diziler";
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
        margin-left: 852px;
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
                        <form class="d-flex" role="search" action="diziarama.php" method="post">
                            <input class="form-control me-2" name="arama" style="margin-left: 330px;" type="search" placeholder="Dizi Türü veya Dizi Adı">
                            <button class="btn btn-outline-primary" name="gonder" type="submit">Arama</button>
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
                                <th>Dizi Id</th>
                                <th>Türü</th>
                                <th>Dizi Türü</th>
                                <th>Dizi Adı</th>
                                <th>Ekleme tarihi</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?= $satir['dizi_id'] ?></td>
                                    <td><?= $satir['tur'] ?></td>
                                    <td><?= $satir['dizi_tur'] ?></td>
                                    <td><?= $satir['dizi_adi'] ?></td>
                                    <td><?= $satir['kayit_tarihi'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="dizidetay.php?dizi_id=<?= $satir['dizi_id'] ?>" class="btn btn-success">Detay</a>
                                            <a href="diziguncel.php?dizi_id=<?= $satir['dizi_id'] ?>" class="btn btn-secondary">Güncelle</a>
                                            <a href="?sil=<?= $satir['dizi_id'] ?>" onclick="return confirm('Silinsin Mi?')" class="btn btn-danger">Kaldır</a>
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