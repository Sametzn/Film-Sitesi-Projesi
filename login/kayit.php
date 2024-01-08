<?php
include("../pages/baglanti.php");

$name_err = "";
$lastname_err = "";
$username_err = "";
$email_err = "";
$password_err = "";
$repeatpasswd_err = "";

if (isset($_POST["kaydet"])) {

    //İsim Doğrulama
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["isim"])) {
        $name_err = "Türkçe karakter kullanınız.";
    } else {
        $name = $_POST["isim"];
    }
    //Soyisim Doğrulama
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["soyisim"])) {
        $lastname_err = "Türkçe karakter kullanınız.";
    } else {
        $lastname = $_POST["soyisim"];
    }
    //Kullancı Adı Doğrulama
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["kullaniciadi"])) {
        $username_err = "Türkçe karakter kullanınız.";
    } else if (strlen($_POST["kullaniciadi"]) < 6) {
        $username_err = "Kullanıcı adı en az 6 karakterden oluşmalıdır";
    } else {
        $username = $_POST["kullaniciadi"];
    }
    //E-posta doğrulama
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Geçersiz e-posta formatı";
    } else {
        $email = $_POST["email"];
    }
    //Parola doğrulama 
    if (empty($_POST["passwd"])) {
        $password_err = "Parola boş geçilemez";
    } else if (strlen($_POST["kullaniciadi"]) < 6) {
        $password_err = "Parola en az 6 karakterden oluşmalıdır";
    } else {
        $password = $_POST["passwd"];
    }
    //Parola Tekrar Doğrulama
    if (empty($_POST["repeatpasswd"])) {
        $repeatpasswd_err = "Parola tekrar kısmı boş geçilemez";
    } else if ($_POST["passwd"] != $_POST["repeatpasswd"]) {
        $repeatpasswd_err = "Parolalar eşleşmiyor";
    } else {
        $repeatpasswd = $_POST["repeatpasswd"];
    }

    if (isset($name) && isset($lastname) && isset($username) && isset($email) && isset($password)) {

        $sorgu = "INSERT INTO kullanicilar(kullanici_adi,isim,soyisim,email,parola)
     VALUES ('$username','$name','$lastname','$email','$password')";
        $calistirekle = mysqli_query($baglanti, $sorgu);


        mysqli_close($baglanti);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAYIT OL</title>
    <link rel="stylesheet" href="kayit.css">
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
                    <a class="kayıt" href="kayit.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <div>Kayıt Ol</div>
                    </a>
                    <a class="giris" href="login.php">
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
        <form class="row g-3" action="kayit.php" method="POST">
            <div class="form">
                <h1>Kayıt Ol</h1>
                <div class="mb-3 col-md-6">
                    <input type="text" name="isim" placeholder="İsminiz" class="form-control txt
                    <?php
                    if (!empty($name_err)) {
                        echo "is-invalid";
                    }
                    ?>
                    " id="validationServer03" aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                        echo $name_err;
                        ?>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <input type="text" name="soyisim" placeholder="Soyisminiz" class="form-control txt
                    <?php
                    if (!empty($lastname_err)) {
                        echo "is-invalid";
                    }
                    ?>
                    " id="validationServer03" aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                        echo $lastname_err;
                        ?>
                    </div>
                </div>
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
                    <input type="email" name="email" placeholder="E-Postanız" class="form-control txt
                    <?php
                    if (!empty($email_err)) {
                        echo "is-invalid";
                    }
                    ?>
                    " id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                        echo $email_err;
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
                <div class="mb-3 col-md-6">
                    <input type="password" name="repeatpasswd" placeholder="Parola Tekrar" class="form-control txt
                    <?php
                    if (!empty($repeatpasswd_err)) {
                        echo "is-invalid";
                    }
                    ?>
                    " id="exampleInputPassword1" aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback ">
                        <?php
                        echo $repeatpasswd_err;
                        ?>
                    </div>
                </div>
                <input onclick="myFunction()" type="submit" name="kaydet" value="Hesap Oluştur" class="signup-btn">
                <a href="login.php" class="link">Zaten hesabınız var mı?</a>
            </div>

        </form>
    </div>
    <script src="script.js">
    </script>
    <script>
    function myFunction() {
        alert("Kayıt başarılı Giriş Yapabilirsiniz :)!");
    }
    </script>

</body>

</html>