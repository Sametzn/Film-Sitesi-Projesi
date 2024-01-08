<?php
include "../pages/baglan.php";
if (isset($_POST['guncelle'])) {
    $sql = "UPDATE `kullanicilar`
    SET 
        `isim` = ?, 
        `soyisim` = ?, 
        `email` = ?, 
        `parola` = ? 
    WHERE 
        `kullanicilar`.`kullanici_id` = ?";
    $dizi = [
        $_POST['ad'],
        $_POST['sad'],
        $_POST['email'],
        $_POST['passwd'],
        $_POST['kullanici_id']

    ];

    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);
    header("location:kullanicilar.php");
}
$sql = "SELECT * FROM kullanicilar WHERE kullanici_id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['kullanici_id']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
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
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <form action="" method="post" class="row mt-4 g-3">
                <input type="hidden" name="kullanici_id" value="<?= $satir['kullanici_id'] ?>">
                <div class="col-6">
                    <label for="kullanici_adi" class="form-label">KULLANICI ADI </label>
                    <input type="text" class="form-control" name="kullanici_adi" value="<?= $satir['kullanici_adi'] ?>">
                </div>
                <div class="col-6">
                    <label for="fad" class="form-label">ADI</label>
                    <input type="text" class="form-control" name="ad" value="<?= $satir['isim'] ?>">
                </div>
                <div class="col-6">
                    <label for="aciklama" class="form-label">SOYADI</label>
                    <input type="text" class="form-control" name="sad" value="<?= $satir['soyisim'] ?>">
                </div>
                <div class="col-6">
                    <label for="image" class="form-label">E-MAİL</label>
                    <input type="text" class="form-control" name="email" value="<?= $satir['email'] ?>">
                </div>
                <div class="col-6">
                    <label for="passwd" class="form-label">YENİ PAROLA</label>
                    <input type="password" class="form-control" name="passwd">
                </div>
                <div class="col-6">
                    <label class="form-label">PAROLA TEKRAR</label>
                    <input type="password" class="form-control">
                </div>

                <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
            </form>
        </div>
    </main>
</body>

</html>