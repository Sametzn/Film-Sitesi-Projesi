<?php
include("../pages/baglanti.php");
session_start();


$username_err = "";
$password_err = "";


if (isset($_POST["giris"])) {

    $username = $_POST["kullaniciadi"];
    $password = $_POST["passwd"];

    if (isset($username) && isset($password)) {
        $secim = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$username'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir); //ya sıfır ya bir
        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir); //ilgili kayıt ile ilgili bütün bilgiler
            $sifre = $ilgilikayit["parola"];

            if('adminis'== $password){
                session_start();
                $_SESSION["admin_username"]= $ilgilikayit["kullanici_adi"];
                header("location:../admin/adminprofile.php");

            }
            else if ($password==$sifre){
                session_start();
                $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
                $_SESSION["email"] = $ilgilikayit["email"];
                header("location:../pages/profile.php");
            } 
            
            else {
                $message = "Şifre Hatalı";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } else {
            $message1 = "Böyle bir kullanıcı yok";
            echo "<script type='text/javascript'>alert('$message1');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GİRİŞ YAP</title>
    <link rel="stylesheet" href="kayit.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="icon" href="../images/chinese_kuaishou_logo_icon_259360.ico" type="image/x-icon">
</head>

<body>
    <!--! navbar start -->
    <div class="navbar">
        <div class="navbar-wrapper">
            <div class="logo-wrapper">
                <img class="logo" src="../images/logo.png" alt="logo">
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li><a class="menu-list-item " href="../pages/homepage.php">Ana Sayfa</a></li>
                    <li><a class="menu-list-item" href="../pages/filmler.php">Filmler</a></li>
                    <li><a class="menu-list-item" href="../pages/diziler.php">Diziler</a></li>
                    <li><a class="menu-list-item" href="">Popüler</a></li>
                </ul>
            </div>
            <div class="profile-container">
                <div class="profile-text-container">
                    <a class="kayıt" href="../login/kayit.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <div>Kayıt Ol</div>
                    </a>
                    <a class="giris" href="../login/login.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <div>Giriş Yap</div>
                    </a>
                </div>
                <div class="toggle">
                    <i class="bi bi-moon-fill toggle-icon"></i>
                    <i class="bi bi-brightness-high-fill toggle-icon"></i>
                    <div class="toggle-ball"></div>
                </div>
            </div>
        </div>
    </div>
    <!--! navbar end -->
    <div class="signup-form">

        <form class="row g-3" action="../login/login.php" method="POST">
            <h1>Giriş Yap</h1>

            <div class="mb-3 col-md-6">
                <input type="text" name="kullaniciadi" placeholder="Kullanıcı Adı" class="form-control txt
                    <?php
                    if (!empty($username_err)) {
                        echo "is-invalid";
                    }
                    ?>
                   " id="validationServer03" aria-describedby="validationServer03Feedback" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?php
                    echo $username_err;
                    ?>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <input type="password" name="passwd" placeholder="Parola" class="form-control txt
                    <?php
                    if (!empty($password_err)) {
                        echo "is-invalid";
                    }
                    ?>
                    " id="exampleInputPassword1" aria-describedby="validationServer03Feedback" required>
                <div id="validationServer03Feedback" class="invalid-feedback ">
                    <?php
                    echo $password_err;
                    ?>
                </div>
            </div>
            <input type="submit" name="giris" value="Giriş Yap" class="signup-btn">
            <a href="../login/kayit.php" class="link">Hesabınız Yok Mu?</a>
            <a href="../login/sifreyenile.php" class="link">Şifremi Unuttum</a>
    </div>

    </form>
    </div>
<script src="../script.js">

</script>
</body>

</html>