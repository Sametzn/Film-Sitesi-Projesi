<?php
include "../pages/baglan.php";

if (isset($_POST['guncelle'])) {
    $sql = "UPDATE `diziler` 
    SET `tur`=?,
    `dizi_tur` = ?, 
    `dizi_adi` = ?, 
    `dizi_aciklama` = ?,
    `dizi_cikis`=?,
    `dizi_yonetmen` = ?";

    $dizi = [
        $_POST['tur'],
        $_POST['dtur'],
        $_POST['dad'],
        $_POST['aciklama'],
        $_POST['cikis'],
        $_POST['yonetmen']
    ];

    // Eğer bir dosya seçilmişse, resim güncelleme işlemini yap
    if (!empty($_FILES["img"]["name"])) {
        $sql .= ", `dizi_resim` = ?";
        $dizi[] = $_FILES["img"]['name'];
    }

    $sql .= " WHERE `dizi_id` = ?";

    $dizi[] = $_POST['diziid'];

    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);

    // Eğer bir dosya seçilmişse, resmi yükle
    if (!empty($_FILES["img"]["name"])) {
        $target = "../images/" . basename($_FILES["img"]['name']);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            echo "<script> alert('Dizi Başarıyla Güncellendi:)') ;window.location.href='dizileradmin.php';</script>";
        } else {
            echo "<script> alert('Güncellemede bir sorun oluştu :(');window.location.href='dizileradmin.php';</script>";
        }
    } else {
        echo "<script> window.location.href='dizileradmin.php';</script>";
    }
}

$sql = "SELECT * FROM diziler WHERE dizi_id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([$_GET['dizi_id']]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

if (isset($_POST["vazgec"])) {
    header("location:dizileradmin.php");
}
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
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="" method="post" class="row mt-4 g-3" enctype="multipart/form-data">
                <input type="hidden" name="diziid" value="<?= $satir['dizi_id'] ?>">
                <div class="col-6">
                    <label for="tur" class="form-label">Türü</label>
                    <select name="tur" class="form-select" aria-label="Default select example">
                        <option>Türü Seçiniz</option>
                        <option value="FİLM">FİLM</option>
                        <option value="DİZİ">DİZİ</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="dtur" class="form-label">Dizi Türü</label>
                    <select class="form-select" aria-label="Default select example" name="dtur">
                        <option >Dizi Türünü Seçiniz</option>
                        <option value="Korku">Korku</option>
                        <option value="Gizem">Gizem</option>
                        <option value="Suç">Suç</option>
                        <option value="Dram">Dram</option>
                        <option value="Gerilim">Gerilim</option>
                        <option value="Aksiyon">Aksiyon</option>
                        <option value="Macera">Macera</option>
                        <option value="Bilim Kurgu">Bilim Kurku</option>
                        <option value="Komedi">Komedi</option>
                        <option value="Aşk">Aşk</option>
                        <option value="Romantik">Romantik</option>
                        <option value="Çizgi Dizi">Çizgi Dizi</option>
                        <option value="Suç/Dram">Suç/Dram</option>
                        <option value="Aksiyon/Macera">Aksiyon/Macera</option>
                        <option value="Aksiyon/Bilim Kurgu">Aksiyon/Bilim Kurgu</option>
                        <option value="Korku/Gerilim">Korku/Gerilim</option>
                        <option value="Gizem/Gerilim">Gizem/Gerilim</option>
                        <option value="Aksiyon/Gerilim">Aksiyon/Gerilim</option>
                        <option value="Macera/Bilim Kurgu">Macera/Bilim Kurgu</option>
                        <option value="Komedi/Romantik">Komedi/Romantik</option>
                        <option value="Bilim Kurgu/Dram">Bilim Kurgu/Dram</option>
                        <option value="Fantastik/Dram">Fantastik/Dram</option>
                        <option value="Fantastik/Macera">Fantastik/Macera</option>

                    </select>
                </div>
                <div class="col-6">
                    <label for="dad" class="form-label">dizi Adı</label>
                    <input type="text" class="form-control" name="dad" value="<?= $satir['dizi_adi'] ?>">
                </div>
                <div class="col-6">
                    <label for="aciklama" class="form-label">dizi Açıklaması</label>
                    <textarea class="form-control" name="aciklama"><?= $satir['dizi_aciklama'] ?></textarea>
                </div>
                <div class="col-6">
                    <label for="cikis" class="form-label">dizi Çıkış Tarihi</label>
                    <input type="date" class="form-control" name="cikis" value="<?= $satir['dizi_cikis'] ?>">
                </div>
                <div class="col-6">
                    <label for="yonetmen" class="form-label">dizi Yönetmen</label>
                    <input type="text" class="form-control" name="yonetmen" value="<?= $satir['dizi_yonetmen'] ?>">
                </div>
                <div class="col-6">
                    <label for="img" class="form-label">dizi Kapağı</label>
                    <input type="file" class="form-control" name="img">
                </div>
                <div>
                    <button type="submit" name="guncelle" style="display: block; width: 1300px;" class="btn btn-primary">Güncelle</button>
                    <button type="submit" name="vazgec" style="background-color: red; width: 1300px; margin-top: 15px;" class="btn btn-primary">Vazgeç</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>