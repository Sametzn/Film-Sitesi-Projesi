<?php
$dsn = 'mysql:dbname=uyelik1;host=localhost';
$user = 'root';
$password = '';

try {
    $baglan = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Bağlantı kurulamadı: ';
}

?>