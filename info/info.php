<?php
include "../pages/baglan.php";

// Film ID'sini kontrol et
if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];

    $sql = "SELECT * FROM filmler1 WHERE film_id = ?";
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute([$film_id]);
    $satir = $sorgu->fetch(PDO::FETCH_ASSOC);

    // Geri kalan kod...
} else {
    // Eğer film ID'si yoksa, hata mesajı veya başka bir işlem yapabilirsiniz.
    echo "Film ID bulunamadı!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $satir['film_adi'] ?> İZLE</title>
    <link rel="stylesheet" href="info.css">
    <link rel="icon" href="../images/chinese_kuaishou_logo_icon_259360.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(../images/arkaplan.jpg);
            background-repeat: no-repeat;
            background-position: right top;
            background-size: 100% 100%;
            background-attachment: fixed;
        }

        /*! navbar start  */
        .navbar {
            background-color: #000;
            height: 70px;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .navbar-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 50px;
        }

        .menu-list {
            list-style: none;
            display: flex;
            column-gap: 20px;
            padding: 0;
            margin-left: 50px;
        }

        .menu-list-item {
            font-size: 20px;
            text-decoration: none;
            color: red;
        }

        .menu-list-item.active {
            font-weight: bold;
        }

        .menu-list-item:hover {
            font-weight: bold;
        }

        .logo {
            width: 200px;
            color: white;
            padding-top: 40px;
        }

        .profile-picture {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-container {
            display: flex;
            align-items: center;
            position: sticky;
            column-gap: 20px;
        }

        .profile-text-container i {
            padding-right: 7px;
        }

        .giris {
            border: 2px solid;
            color: #c22139;
            border-radius: 30px;
            font-weight: 300px;
        }

        .giris:hover {
            background-color: #c22139;
            font-weight: bold;
            border-color: #c22139;
        }

        .kayıt {
            color: #adbac7;
        }

        .kayıt:hover {
            font-weight: bold;
        }

        .profile-text-container a {
            cursor: pointer;
            text-decoration: none;
            padding: 5px;
            padding: 10px;
            display: flex;
            float: right;
        }

        .profile-text-container a:hover {
            color: pink;
        }

        .profile-text-container {
            display: flex;
            align-items: center;
            column-gap: 5px;
            line-height: 1;
        }

        .toggle-icon {
            color: goldenrod;
        }

        .toggle {
            width: 40px;
            height: 20px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-around;
            border-radius: 50px;
            position: relative;
        }

        .toggle-ball {
            width: 18px;
            height: 18px;
            background-color: black;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            right: 1px;
            transition: 0.5s ease all;
        }

        /*! navbar end */
        /*! sidebar start */
        .sidebar {
            background-color: #000;
            height: 100%;
            color: white;
            width: 50px;
            display: flex;
            flex-direction: column;
            padding-top: 60px;
            row-gap: 40px;
            align-items: center;
            position: fixed;
        }

        .sidebar i {
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        .sidebar a {
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        /*! sidebar end */
        .alan {
            max-width: 1050px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            line-height: 1;
            position: relative;
            margin-top: 200px;
            margin-bottom: 200px;
        }

        .alan.main {
            background: #f3f8f9 !important;
            border-radius: 5px;
        }

        .single {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
        }

        .single header .izle-titles h1,
        .single header .izle-titles h2 {
            font: 500 28px roboto !important;
        }

        .single header .izle-titles {
            font: 600 30px ProximaNova !important;
            max-width: 565px;
            min-height: 36.5px;
        }

        .single header .izle-titles h1 {
            display: inline;
        }

        .single header .izle-titles h2 {
            display: inline;
            margin: 0;
            color: #516a7d !important;
            font: 600 30px ProximaNova;
            padding-left: 1px;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .header-sag {
            display: flex;
            justify-content: flex-start;
            margin-top: 5px;
            margin-right: 2px;
        }

        .single .imdb-ic {
            float: left;
        }

        .single .imdb-ic {
            margin-top: 3px;
            padding-left: 15px;
            padding-right: 15px;
            white-space: nowrap;
            float: left;
            font: 500 15px roboto !important;
            height: 33px;
            border-radius: 4px;
            line-height: 35px !important;
            text-align: center;
            box-shadow: none !important;
            color: #fff;
            margin-right: 0;
            text-shadow: none !important;
            box-shadow: none !important;
            background: #c89e1d !important;
        }

        .single .imdb-ic span {
            color: #534b35 !important;
            margin-left: 4px;
        }

        .puanx-ic {
            display: flex;
            margin-right: 0;
            margin-left: 15px;
        }

        .puanx-ic .puanx-btn:focus {
            outline: none !important;
        }

        .puanx-ic .puanx-btn {
            background: #4a7185;
            background: #bd6219;
            background: #3088b4;
            background: #32819e;
            background: #336980;
            background: #c24a1e;
            cursor: pointer;
            height: 33px;
            padding: 0;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 4px;
            font: 500 16px roboto !important;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            line-height: 31px !important;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            margin-top: 3px;
            text-shadow: none !important;
            border: 1px solid transparent !important;
            box-shadow: none !important;
            color: #fff !important;
        }

        .puanx-ic .puanx-btn:hover {
            background: #ac5916;
            background: #2c7da5;
            background: #b9461c;
        }

        .puanx-ic .puanx-btn:active {
            background: #9c5013;
            background: #276e90;
            background: #b1431b;
        }

        .puanx-puan {
            background: #63889b;
            background: #de741f;
            background: #329cd1;
            background: #427890;
            background: #e35926;
            color: #fff;
            border-radius: 4px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            margin-right: -1px;
            border: 1px solid transparent;
            height: 33px;
            padding: 0;
            padding-left: 15px;
            padding-right: 15px;
            font: 400 15px roboto !important;
            line-height: 33px !important;
            margin-top: 3px;
            box-shadow: 0 0 2px #cdd7dc;
        }

        .puanx-puan .puanx-tt {
            margin-right: 4px;
            color: #fff;
            font-weight: 700;
        }

        .single header {
            width: 100%;
            padding: 20px;
            padding-top: 18px !important;
            padding-bottom: 13px !important;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .single header h1 {
            color: #3f5261 !important;
            color: #516a7d !important;
            font: 700 30px ProximaNova !important;
            padding-left: 5px;
            margin: 0;
            padding: 0;
        }

        .izle-content {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .izle-content .hd {
            position: absolute;
            right: 0;
            background: rgba(33, 52, 62, 0.95);
            background: rgba(33, 52, 62, 0.95) !important;
            height: 22px;
            line-height: 23px !important;
            padding-left: 8px;
            padding-right: 8px;
            margin-right: 8px;
            margin-top: 9px;
            font-weight: 400;
            border-radius: 3px;
            padding-top: 0;
            padding-bottom: 0;
            background: rgba(0, 0, 0, 0.65) !important;
        }

        .izle-content .hd {
            padding: 0 !important;
            width: 51px;
            text-align: center;
            margin-right: 9px;
            margin-top: 13px;
            font-size: 13px !important;
            height: 28px;
            font: 500 13px Roboto !important;
            line-height: 30px !important;
        }

        .izle-content .hd {
            background: rgba(0, 0, 0, 0.65) !important;
            color: #fff;
            font-weight: 400 !important;
        }

        .izle-content .hd-2 {
            margin-top: 53px;
        }

        .single .detay-sol .ic-afis {
            border-radius: 5px;
            box-shadow: 0 0 3px #ddd;
            border: 1px solid #ddd;
        }

        .single .detay-sol {
            position: relative;
            display: flex;
            padding: 0;
            margin-left: 20px;
            margin-right: -3px;
            flex-direction: column;
            flex-wrap: wrap;
            box-sizing: border-box;
        }

        @media only screen and (max-width: 800px) {
            .single .header-sag {
                width: 100%;
                margin-top: 10px !important;
                margin-bottom: 3px !important;
            }

            .single .detay-sol {
                display: none;
            }

            .single .detay-sag {
                width: 100%;
            }
        }

        .afis-frg-btn {
            width: 100%;
            text-align: center;
            background: #5c7a8a;
            background: #526975;
            border-radius: 4px;
            margin-top: 19px;
            border: 1px solid transparent;
            color: #fff;
            font-size: 15px;
            height: 34px;
            line-height: 32px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .single .detay-sag {
            padding: 20px;
            padding-top: 0;
            padding-left: 0 !important;
            text-shadow: 0 0 1px #e4eaef;
            opacity: 0.96;
            width: 700px;
            flex-grow: 1;
            margin-left: 18px;
        }

        .single .detay-sag .film-ozeti {
            margin: 0;
            padding-left: 7px;
            color: #465967 !important;
            padding-right: 20px;
            box-sizing: border-box;
            border-radius: 5px;
            height: 218px;
            line-height: 22px;
            background: #eaf0f1;
            padding-bottom: 5px;
            padding-top: 10px;
            padding-right: 9px;
            padding-left: 14px;
        }

        .single .detay-sag .ozet-ic {
            overflow-y: auto;
            color: #4b616d !important;
            margin: 0;
            padding: 0;
            padding-right: 10px;
            padding-top: 0;
            padding-bottom: 12px;
            width: 100%;
            height: 100% !important;
        }

        .single .detay-sag .film-info {
            margin-top: 4px;
            display: flex;
            flex-flow: row wrap;
            margin-top: 0.5px;
            margin-left: 2px;
            border-left: 0;
            border-radius: 5px;
        }

        .single .detay-sag .film-info ul {
            width: 100%;
            float: left;
            border-radius: 5px;
        }

        .single .detay-sag .film-info li {
            color: #4c585f;
            color: #4d5f6d;
            border-radius: 4px;
            line-height: 19px !important;
            box-sizing: border-box;
            border: none !important;
            padding: 8px !important;
        }

        .single .detay-sag .film-info li:nth-child(even) {
            background: #e3f0f6;
        }

        .single .detay-sag .film-info li:first-child {
            padding-top: 8px !important;
            padding-bottom: 8px !important;
        }

        .single .detay-sag .film-info span .dt {
            white-space: nowrap;
            min-width: 130px;
            margin-right: 5px;
            font-weight: 500;
            line-height: 19px !important;
            text-indent: 14px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAGCAYAAAAL+1RLAAAAH0lEQVR42mPwiYj/D8IM6IB4CZgAEPSAMKYADKALAABoEClLhHnpQQAAAABJRU5ErkJggg==);
            background-repeat: no-repeat;
            background-position: 0 center;
            padding-left: 0;
        }

        .single .detay-sag .film-info span.dt:after {
            float: right;
            margin-right: -5px;
            content: ": ";
            padding-right: 10px;
            font: 14px arial !important;
        }

        .single .detay-sag .film-info ul li {
            display: inline-flex;
            width: 100%;
            align-items: center;
        }

        .single .detay-sag .film-info ul li a {
            color: #586b79;
            color: #2a698a;
            color: #2d7196;
            font-weight: 500;
        }

        .single .detay-sag .film-info a.category {
            margin-right: 8px;
        }

        .single .detay-sag .film-info .flag {
            margin-top: 1px;
            margin-right: 5px !important;
            margin-left: 7px !important;
        }

        .single .detay-sag .film-info .etiket a {
            font-weight: 500 !important;
            font-size: 13px !important;
            color: #1a85bf;
            color: #32779c;
        }

        .orta .alan.main {
            background: #f3f8f9 !important;
            border-radius: 5px;
        }

        .orta .alan {
            clear: both !important;
            position: relative;
        }

        .player-alan {
            width: 100%;
            max-height: 640px;
            padding: 20px;
            padding-top: 0;
        }

        .player-alan #plx {
            background: #000;
            width: 100%;
            height: 100%;
        }

        @media only screen and (max-width: 800px) {
            .player-alan {
                min-height: auto;
                margin-top: 3px;
                height: 240px !important;
                order: -1;
            }
        }

        @media only screen and (min-width: 1024px) {
            .player-alan {
                height: 606px;
            }
        }

        @media (max-width: 768px) {
            .player-alan {
                order: -3;
            }
        }

        /*! Dark mode start  */
        .container.active {
            background-color: white;
        }

        .navbar.active {
            background-color: white;
            color: black;
        }

        .sidebar.active {
            background-color: white;
        }

        .sidebar i.active {
            color: black;
        }

        .sidebar a.active {
            color: black;
        }

        .movie-list-title.active {
            color: black;
        }

        .toggle.active {
            background-color: black;
        }

        .toggle-ball.active {
            background-color: white;
            transform: translateX(-20px);
        }

        .movie-list-filter select.active {
            background-color: white;
            color: black;
        }

        /*! Dark mode end  */
    </style>
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
                    <li><a class="menu-list-item " href="../login/loginindex.php">Ana Sayfa</a></li>
                    <li><a class="menu-list-item" href="../login/loginfilmler.php">Filmler</a></li>
                    <li><a class="menu-list-item" href="../login/logindiziler.php">Diziler</a></li>
                    <li><a class="menu-list-item" href="">Hesabım</a></li>
                </ul>
            </div>
            <div class="profile-container">
                <div class="profile-text-container">
                    <a onclick="myFunction()" class="giris" href="../login/login.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <div>Çıkış Yap</div>
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
    <!--! sidebar start -->
    <div class="sidebar">
        <i class="bi bi-search"></i>
        <a class="bi bi-house-door-fill" href="homepage.php"></a>
        <i class="bi bi-people-fill"></i>
        <i class="bi bi-bookmarks-fill"></i>
        <i class="bi bi-hourglass-top"></i>
        <i class="bi bi-cart-fill"></i>
        <i class="bi bi-gear-fill"></i>
    </div>
    <!--! sidebar end -->

    <div class="alan main">
        <article class="single">
            <header class="single-bas">
                <div class="header-sol">
                    <div class="izle-titles">
                        <h1><?= $satir['film_adi'] ?></h1>
                    </div>
                </div>
                <div class="header-sag">
                    <div class="imdb-ic">
                        IMDB
                        <span>7.0</span>
                    </div>
                    <div class="puanx-ic">
                        <div class="puanx-puan">
                            <span class="puanx-tt">FHD</span> 9.3
                        </div>
                        <button class="puanx-btn">★</button>
                    </div>
                </div>
            </header>
            <div class="izle-content">
                <section class="detay-sol">
                    <span class="hd">HD</span>
                    <picture>
                        <img src='../banner/<?= $satir['film_kapak'] ?>' width='275' height='410' class='ic-afis lazyloaded' alt='<?= $satir['film_adi'] ?>'>
                    </picture>
                    <button onclick="myFunction('<?= $satir['film_fragman'] ?>')" class="afis-frg-btn">Fragmanı izle</button>
                </section>
                <section class="detay-sag">
                    <div class="film-ozeti">
                        <div class="ozet-ic">
                            <p><?= $satir['film_aciklama'] ?></p>
                        </div>
                    </div>
                    <div class="film-info">
                        <ul>
                            <li>
                                <span class="dt">Yönetmen-Yapımcılar</span>
                                <div class="dd">
                                    <span><?= $satir['film_yonetmen'] ?></span>
                                </div>
                            </li>
                            <li>
                                <span class="dt">Çıkış Tarihi</span>
                                <div class="dd">
                                    <span><?= $satir['film_cikis'] ?> </span>
                                </div>
                            </li>
                            <li>
                                <span class="dt">Tür</span>
                                <div class="dd">
                                    <span><?= $satir['film_ftur'] ?></span>
                                </div>
                            </li>
                            <li>
                                <span class="dt">Kategori</span>
                                <div class="dd">
                                    <span><?= $satir['tur'] ?></span>
                                </div>
                            </li>
                            <li>
                                <span class="dt">Dil</span>
                                <div class="dd">
                                    <span>Türkçe Dublaj</span> //
                                    <span>Türkçe Altyazılı</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <section class="player-alan">
                <div class="frg" data-code="<?= $satir['code'] ?> "></div>
                <iframe src="<?= $satir['iframe'] ?>" width="100%" height="100%" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" loading="lazy" allowfullscreen="" allow="autoplay; fullscreen"></iframe>
            </section>
        </article>
    </div>

    <script>
        function myFunction() {
            window.location.href = "<?= $satir['film_fragman'] ?>";
        }
    </script>
    <script>
        const ball = document.querySelector(".toggle-ball");
        const items = document.querySelectorAll(".container,.navbar,.sidebar,.toggle,.sidebar i,.sidebar a,.toggle-ball,.movie-list-filter select,.movie-list-title");

        ball.addEventListener("click", function() {
            items.forEach((item) => item.classList.toggle("active"));
        });
    </script>
</body>

</html>