<?php
session_start();
if(isset($_SESSION["kullanici_adi"])){
    header("location:../login/loginindex.php");
}
else{
    echo "Bu sayfayı görüntüleme yetkiniz yoktur";
}
?>