<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Yenile</title>
    <link rel="stylesheet" href="sifreyenile.css">
    <link rel="stylesheet" href="kayit.css">
    <link rel="stylesheet" href="style.css">
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
        <form action="login.php">
            <div class="form">
                <h1>Şifre Yenile</h1>
                <input type="email" placeholder="E-Postanız veya Kullanıcı Adı" class="txt">
                <input onclick="myFunction()" type="submit" value="Yenileme E-Postası Gönder" class="yenile">
            </div>
        </form>
    </div>
    <script src="../script.js"></script>
    <script>
        function myFunction() {
         alert("Yenileme e-postası gönderildi");
        }
    </script>
</body>

</html>