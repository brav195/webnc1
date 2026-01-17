<?php
$host = "localhost";
$dbname = "buoi2_php";
$username = "root";
$password = ""; // mặc định XAMPP để trống

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Hệ thống đang bảo trì, vui lòng quay lại sau";
    exit;
}
