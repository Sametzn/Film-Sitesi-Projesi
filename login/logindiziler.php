<?php
include "../pages/baglanti.php";

$sql = "SELECT * FROM diziler ";
$all_diziler = $baglanti->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PandaHDİzle</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="filmler.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="icon" href="../images/chinese_kuaishou_logo_icon_259360.ico" type="image/x-icon" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Vina+Sans&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Electrolize&family=Roboto:wght@100&display=swap');

        /*! base css start  */
        * {
            margin: 0;
            padding: 0;
        }

        /*! base css end  */
        body {
            font-family: 'Electrolize', sans-serif;
        }

        .container {
            background-color: black;
            color: white;
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
        /*! Movie list start */
        .movie-list-container {
            margin-left: 80px;
        }

        .movie-list {
            list-style: none;
            height: 240px;
            display: flex;
            align-items: center;
            column-gap: 30px;
            transform: translateX(0);
            transition: 1s ease-in-out;

        }

        .movie-item {
            position: relative;
        }

        .movie-item:hover .movie-item-title,
        .movie-item:hover .movie-item-buttons {
            opacity: 1;
        }

        .movie-item:hover .movie-item-img {
            transform: scale(1.2);
            margin: 0 30px;
            opacity: 0.5;
        }

        .movie-item-img {
            width: 260px;
            height: 190px;
            object-fit: cover;
            transition: 1s all ease-in-out;
            cursor: pointer;
        }

        .movie-item-title {
            background-color: rgb(40, 40, 40, 0.4);
            padding: 10px;
            font-size: 30px;
            font-weight: bold;
            position: absolute;
            top: 10%;
            left: 50px;
            opacity: 0;
            transition: 1s all ease-in-out;
            cursor: pointer;

        }

        .movie-item-buttons {
            background-color: rgb(40, 40, 40, 0.4);
            padding: 0 10px;
            font-weight: bold;
            position: absolute;
            bottom: 10%;
            left: 50px;
            display: flex;
            column-gap: 20px;
            opacity: 0;
            transition: 1s all ease-in-out;
        }

        .movie-item-buttons i {
            cursor: pointer;
            opacity: .5;
            font-size: 20px;
            transition: 0.5s all ease;
        }

        .movie-item-buttons i:hover {
            opacity: 1;
        }

        .movie-list-wrapper {
            overflow: hidden;
            position: relative;
        }

        .arrow {
            width: 100px;
            display: flex;
            font-size: 120px;
            position: absolute;
            right: 0;
            top: 100px;
            opacity: .5;
            transition: .5s ease all;
            cursor: pointer;
        }

        .arrow:hover {
            opacity: 1;
        }

        /*! Movie list end */
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
        /*! responsive start */
        @media only screen and (max-width:800px) {
            .menu-container {
                display: none;
            }

            .featured-content {
                height: 50vh;
            }

            .featured-title {
                width: 200px;
            }

            .featured-desc {
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 5;
                -webkit-box-orient: vertical;
                max-width: 200px;
                padding: 0;
            }
        }

        /*! responsive end */
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
        <a class="bi bi-house-door-fill" href="loginindex.php"></a>
        <i class="bi bi-people-fill"></i>
        <i class="bi bi-bookmarks-fill"></i>
        <i class="bi bi-hourglass-top"></i>
        <i class="bi bi-cart-fill"></i>
        <i class="bi bi-gear-fill"></i>
    </div>
    <!--! sidebar end -->
    <!--! content start  -->

    <main>
        <div class="container">
            <?php
            $counter = 0; // Film sayısını saymak için bir sayaç
            while ($satir = mysqli_fetch_assoc($all_diziler)) {
                if ($counter % 6 == 0) {
                    // Her 6 filmde bir yeni bir satır oluştur
                    echo '<div class="movie-list-container">';
                    echo '<div class="movie-list-wrapper">';
                    echo '<ul class="movie-list">';
                }
            ?>
                <li class="movie-item">
                    <img class="movie-item-img" src="../images/<?php echo $satir["dizi_resim"] ?>" alt="<?php echo $satir["dizi_adi"] ?>">
                    <div class="movie-item-info">
                        <span class="movie-item-title"><?php echo $satir["dizi_adi"] ?></span>
                        <div class="movie-item-buttons">
                            <i class="bi bi-play-circle-fill"></i>
                            <i class="bi bi-hand-thumbs-up-fill"></i>
                            <i class="bi bi-hand-thumbs-down-fill"></i>
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                    </div>
                </li>
            <?php
                $counter++;
                if ($counter % 6 == 0) {
                    // Her 6 filmde bir satırı kapat
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            // Eğer döngü bittiğinde tam bir satır dolmuşsa kapatma işlemini yap
            if ($counter % 6 != 0) {
                echo '</ul>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    <!--! content end -->
    <script src="../script.js"></script>
    <script>
        function myFunction() {
            alert("Çıkış başarılı bir şekilde gerçekleşti");
        }
    </script>
</body>

</html>