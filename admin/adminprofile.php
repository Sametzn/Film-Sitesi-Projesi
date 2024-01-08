<?php
session_start();
if(isset($_SESSION["admin_username"])){
    header("location:admin.php");
}
else{
    echo "Bu sayfayı görüntüleme yetkiniz yoktur";
}
?>