<?php
session_start();

if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = [];
}

$name  = $_POST['name'];
$price = $_POST['price'];
$img   = $_POST['img'];

$_SESSION['cart'][] = [
  'name'  => $name,
  'price' => $price,
  'img'   => $img
];

echo "added";
