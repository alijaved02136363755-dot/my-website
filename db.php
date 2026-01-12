<?php
$host = "sql305.epizy.com";
$user = "epiz_345678";
$pass = "Abc@12345";
$db   = "epiz_345678_shop";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
