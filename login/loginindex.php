<!DOCTYPE html>
<html lang="en">

<head>
    <title>PandaHDİzle</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
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
            margin-top: 2px;
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
        /*! featured start */
        .content-wrapper {
            margin-left: 50px;
        }

        .featured-content {
            background: url(images/d611ec500a3c282377031f6e87663186.jpg);
            padding: 50px;
            height: calc(100vh - 170px);
            background-size: 100% 100%;
        }

        .featured-title {
            width: 400px;
        }

        .featured-desc {
            width: 500px;
            background-color: rgba(225, 255, 255, 0.5);
            padding: 10px;
            margin: 30px 0;
            color: black;
        }

        .featured-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .featured-buttons button {
            padding: 10px 25px;
            border-radius: 2px;
            border: none;
            outline: none;
            cursor: pointer;
            display: flex;
            column-gap: 10px;
            font-size: 16px;
            font-weight: bold;

        }

        .featured-buttons .info-button {
            background-color: rgb(145, 142, 142, 0.5);
            color: white;
        }

        /*! featured  end */
        /*! Filter start */
        .movie-list-filter {
            margin: 20px 0 20px 55px;
            padding: 20px;
        }

        .movie-list-filter select {
            background-color: black;
            color: white;
            padding: 7px 0;
            width: 125px;
        }

        /*!  Filter end */
        /*! Movie list start */
        .movie-list-container {
            margin-left: 65px;
        }

        .movie-list {
            list-style: none;
            height: 300px;
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
            width: 270px;
            height: 200px;
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
                    <li><a class="menu-list-item " href="#">Ana Sayfa</a></li>
                    <li><a class="menu-list-item" href="loginfilmler.php">Filmler</a></li>
                    <li><a class="menu-list-item" href="logindiziler.php">Diziler</a></li>
                    <li><a class="menu-list-item" href="">Hesabım</a></li>
                </ul>
            </div>
            <div class="profile-container">
                <div class="profile-text-container">
                    <a onclick="myFunction()" class="giris" href="../pages/homepage.php">
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
        <a class="bi bi-house-door-fill" href="#"></a>
        <i class="bi bi-people-fill"></i>
        <i class="bi bi-bookmarks-fill"></i>
        <i class="bi bi-hourglass-top"></i>
        <i class="bi bi-cart-fill"></i>
        <i class="bi bi-gear-fill"></i>
    </div>
    <!--! sidebar end -->
    <!--! content start  -->

    <div class="container">
        <!--? featured content start -->
        <div class="content-wrapper">
            <div class="featured-content" style="background-image: url(../images/d611ec500a3c282377031f6e87663186.jpg);">
                <img class="featured-title" src="../images/kindpng_1324265.png">
                <p class="featured-desc">Avengers: Sonsuzluk Savaşı, dünyanın gördüğü en büyük tehdite karşı güçlerini birleştirmek
                    zorunda olan kahramanların verdikleri mücadeleyi konu ediyor. Kaptan Amerika ve Iron Man'in arasında yaşanan
                    olayların ardından bölünen kahramanlarımız, birbirlerinden uzaklara savrulurlar. Hepsi kendi yandaşlarıyla dünyayı
                    korumaya çalışmaktadır. Ancak dünyanın kaderi bir kez daha tehlikeye girer. Sınırsız bir güç kaynağı olan sonsuzluk
                    taşlarının peşine düşen Thanos, dünyanın gördüğü en büyük tehdittir. İnsanlığın kaderi bir kez daha, insanlık için
                    savaşmaya ant içmiş kahramanlarımız elindedir. Hiçbir süper kahramanın tek başına yenemeyeceği büyüklükteki bu
                    tehdit için ekipler birleşmeli ve tehdide tüm güçleriyle karşı koymalıdır...</p>
                <div class="featured-buttons">
                    <button class="play-button">
                        OYNAT
                        <i class="bi bi-play-circle"></i>
                    </button>
                    <button class="info-button">
                        DAHA FAZLA BİLGİ
                        <i class="bi bi-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        <!--? featured content end -->
        <!--! Filter start -->
        <div class="movie-list-filter">
            <select>
                <option>Aksiyon</option>
                <option>Animasyon</option>
                <option>Belgesel</option>
                <option>Komedi</option>
                <option>Bilim Kurgu</option>
            </select>
        </div>
        <!--! Filter end -->
        <!--! Movie list start -->
        <div class="movie-list-container">
            <h1 class="movie-list-title">Popüler</h1>
            <div class="movie-list-wrapper">
                <ul class="movie-list ">
                    <li class="movie-item"><a href="../info/spidermaninfo.php">
                            <img class="movie-item-img" src="../images/spider.jpg" alt="spider.jpg">
                        </a>
                        <div class="movie-item-info">
                            <span class="movie-item-title">SPIDER MAN</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item"><a href="hulkinfo.php">
                            <img class="movie-item-img" src="../images/hulk.jpg" alt="hulk.jpg">
                        </a>
                        <div class="movie-item-info">
                            <span class="movie-item-title">HULK</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/gora.jpg" alt="gora.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">GORA</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/daredevil.jpg" alt="daredevil.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">DAREDEVIL</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/yenilmezler.jpg" alt="avangers.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">AVANGERS</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/avatar.jpeg" alt="avatar.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">AVATAR</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/DOCTOR WHO.webp" alt="DOCTOR WHO.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">DOCTOR WHO</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/sahilgüvenlik.jpg" alt="SAHİL GÜVENLİK.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">SAHİL GÜVENLİK</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/starwars.webp" alt="STAR WARS.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">STAR WARS</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/vforvendetta.jpg" alt="V FOR VENDETTA.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">V FOR VENDETTA</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/thewitcher.jpg" alt="THE WITCHER.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">THE WITCHER</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="bi bi-chevron-right arrow"></i>

            </div>
        </div>
        <div class="movie-list-container">
            <h1 class="movie-list-title">Gündemdekiler</h1>
            <div class="movie-list-wrapper">
                <ul class="movie-list">
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/arog.jpg" alt="arog.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">AROG</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/asteriks ve oburiks.webp" alt="AO.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">ASTERİKS VE OBURİKS </span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/dağ 2.jpg" alt="DAĞ2.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">DAĞ 2</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/esaretin bedeli.jpg" alt="ESARETİN BEDELİ.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">ESARETİN BEDELİ</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/galksi koruyucuları.jpg" alt="GALAKSİ KORUYUCULARI.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">GALAKSİ KORUYUCULARI</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/gökdelen.jpg" alt="GÖKDELEN.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">GÖKDELEN</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/dark.jpg" alt="dark.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">DARK</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/batman.jpg" alt="batman.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">KARAŞOVALYE YÜKSELİYOR</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/hobbit.jpg" alt="hobbit.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">HOBBİT</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/blackwidow.jpg" alt="blackwidow.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">BLACKWİDOW</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/GAME OF THRONES.webp" alt="GAME OF THRONES.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">GAME OF THRONES</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="bi bi-chevron-right arrow"></i>

            </div>
        </div>
        <div class="movie-list-container">
            <h1 class="movie-list-title">Yeni Çıkanlar</h1>
            <div class="movie-list-wrapper">
                <ul class="movie-list">
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/dabbe.jpg" alt="dabbe.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">DABBE</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/karayip korsanları.jpg" alt="karayip.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">KARAYİP KORSANLARI</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/O it es.jpg" alt="O.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">O </span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/madmax.jpg" alt="MAD MAX.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">MAD MAX</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/marslı.jpg" alt="MARSLI.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">MARSLI</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/matrix.jpg" alt="MATRİX.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">MATRİX</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/pinin yaşamı.jpg" alt="Pİ'NİN YAŞAMI.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">Pİ'NİN YAŞAMI</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/thor.webp" alt="thor.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">THOR</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/yüzüklerin efendisi.jpg" alt="yüzüklerin efendisi.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">YÜZÜKLERİN EFENDİSİ</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/hızlı ve öfkeli.jpg" alt="hızlı ve öfkeli.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">HIZLI VE ÖFKELİ</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                    <li class="movie-item">
                        <img class="movie-item-img" src="../images/lacasadepapel.jpg" alt="lacasadepapel.jpg">
                        <div class="movie-item-info">
                            <span class="movie-item-title">LA CASA DE PAPEL</span>
                            <div class="movie-item-buttons">
                                <i class="bi bi-play-circle-fill"></i>
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <i class="bi bi-hand-thumbs-down-fill"></i>
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="bi bi-chevron-right arrow"></i>
            </div>
        </div>
        <!--! Movie list end-->
    </div>
    <!--! content end -->
    <script src="../script.js"></script>
    <script>
        function myFunction() {
            alert("Çıkış başarılı bir şekilde gerçekleşti");
        }
    </script>
</body>

</html>