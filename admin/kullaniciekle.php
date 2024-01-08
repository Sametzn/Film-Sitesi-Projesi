<?php
include "../pages/baglan.php";
if (isset($_POST["ekle"])) {
    $sql = "INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adi`, `isim`, `soyisim`, `email`, `parola`, `kayıt_tarihi`) VALUES (NULL, ?, ?, ?, ?, ?, current_timestamp())";
    $dizi = [
        $_POST["kullanici_adi"],
        $_POST["ad"],
        $_POST["sad"],
        $_POST["email"],
        $_POST["password"],
    ];

    $sth = $baglan->prepare($sql);
    $sonuc = $sth->execute($dizi);
    header("location:kullanicilar.php");
}

if (isset($_POST["vazgec"])) {
    header("location:kullanicilar.php");
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
        </div>

    </header>
    <main>
        <div class="container">
            <form action="" method="post" class="row mt-4 g-3">
                <div class="col-6">
                    <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="kullanici_adi">
                </div>
                <div class="col-6">
                    <label for="ad" class="form-label">İsim</label>
                    <input type="text" class="form-control" name="ad">
                </div>
                <div class="col-6">
                    <label for="sad" class="form-label">Soyisim</label>
                    <input type="text" class="form-control" name="sad">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-6">
                    <label for="password" class="form-label">Parola</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div>
                    <button type="submit" name="ekle" style="background-color: green; display: block; width: 1300px;" class="btn btn-primary">Ekle</button>
                    <button type="submit" name="vazgec" style="background-color: red; width: 1300px; margin-top: 15px;" class="btn btn-primary">Vazgeç</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>S