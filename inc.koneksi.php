<?php 
$host = "localhost:3308";
$user = "root";
$pass = "";
$db = "dbkamera";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>