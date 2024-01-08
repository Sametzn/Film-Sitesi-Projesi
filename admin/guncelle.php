<?php
include "../pages/baglan.php";

if (isset($_POST['guncelle'])) {
    $sql = "UPDATE `filmler1` 
    SET `tur`=?,
    `film_ftur` = ?, 
    `film_adi` = ?, 
    `film_aciklama` = ?,
    `film_cikis`=?,
    `film_yonetmen` = ?,
    `code`=?,
    `iframe` =?,
    `film_fragman`=?";


    $dizi = [
        $_POST['tur'],
        $_POST['ftur'],
        $_POST['fad'],
        $_POST['aciklama'],
        $_POST['cikis'],
        $_POST['yonetmen'],
        $_POST['code'],
        $_POST['iframe'],
        $_POST['fragman']
    ];

    // Eğer bir dosya seçilmişse, resim güncelleme işlemini yap
    if (!empty($_FILES["img"]["name"])) {
        $sql .= ", `film_resim` = ?";
        $dizi[] = $_FILES["img"]['name'];
    }
    if(!empty($_FILES["kapak"]["name"])){
        $sql.= ", `film_kapak` =?";
        $dizi[]=$_FILES["kapak"]['name'];
    }

    $sql .= " WHERE `film_id` = ?";

    $dizi[] = $_POST['filmid'];

    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);

    // Eğer bir dosya seçilmişse, resmi yükle
    if (!empty($_FILES["img"]["name"] || !empty($_FILES["kapak"]["name"]))) {
        $target = "../images/" . basename($_FILES["img"]['name']);
        $target1 = "../banner/" . basename($_FILES["kapak"]['name']);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target )) {
            echo "<script> alert('Film Başarıyla Güncellendi:)') ;window.location.href='admin.php';</script>";
        } else {
           
        }
        if ( move_uploaded_file($_FILES['kapak']['tmp_name'],$target1)) {        
                echo "<script> alert('Film Başarıyla Güncellendi:)') ;window.location.href='admin.php';</script>";
        } else {
           
        }
    } else {
        echo "<script> window.location.href='admin.php';</script>";
    }
}

$sql = "SELECT * FROM filmler1 WHERE film_id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([$_GET['film_id']]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

if (isset($_POST["vazgec"])) {
    header("location:admin.php");
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
                <input type="hidden" name="filmid" value="<?= $satir['film_id'] ?>">
                <div class="col-6">
                    <label for="tur" class="form-label">Türü</label>
                    <select name="tur" class="form-select" aria-label="Default select example">
                        <option>Türü Seçiniz</option>
                        <option value="FİLM">FİLM</option>
                        <option value="DİZİ">DİZİ</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="ftur" class="form-label">Film Türü</label>
                    <select class="form-select" aria-label="Default select example" name="ftur">
                        <option >Film Türünü Seçiniz</option>
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
                    <label for="fad" class="form-label">Film Adı</label>
                    <input type="text" class="form-control" name="fad" value="<?= $satir['film_adi'] ?>">
                </div>
                <div class="col-6">
                    <label for="aciklama" class="form-label">Film Açıklaması</label>
                    <textarea class="form-control" name="aciklama"><?= $satir['film_aciklama'] ?></textarea>
                </div>
                <div class="col-6">
                    <label for="cikis" class="form-label">Film Çıkış Tarihi</label>
                    <input type="date" class="form-control" name="cikis" value="<?= $satir['film_cikis'] ?>">
                </div>
                <div class="col-6">
                    <label for="yonetmen" class="form-label">Film Yönetmen</label>
                    <input type="text" class="form-control" name="yonetmen" value="<?= $satir['film_yonetmen'] ?>">
                </div>
                <div class="col-6">
                    <label for="code" class="form-label">Film Kodu</label>
                    <input type="text" class="form-control" name="code" value="<?= $satir['code'] ?>">
                </div>
                <div class="col-6">
                    <label for="iframe" class="form-label">Film Linki</label>
                    <input type="text" class="form-control" name="iframe" value="<?= $satir['iframe'] ?>">
                </div>
                <div class="col-6">
                    <label for="fragman" class="form-label">Film Fragman Linki</label>
                    <input type="text" class="form-control" name="fragman" value="<?= $satir['film_fragman'] ?>">
                </div>
                <div class="col-6">
                    <label for="kapak" class="form-label">Film Kapağı</label>
                    <input type="file" class="form-control" name="kapak">
                </div>
                <div class="col-6">
                    <label for="img" class="form-label">Film Görsel</label>
                    <input type="file" class="form-control" name="img" >
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