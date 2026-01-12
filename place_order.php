<?php
session_start();

// Login check
if(!isset($_SESSION['user_email'])){
    header("Location: auth.php");
    exit;
}

// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";  // tumhare DB ka naam

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Get cart items
$cart = $_SESSION['cart'] ?? [];
$user_email = $_SESSION['user_email'];

// Agar cart empty hai
if(empty($cart)){
    echo "<h2>Your cart is empty!</h2>";
    exit;
}

// Loop through cart items & insert into orders table
foreach($cart as $item){
    $name = $conn->real_escape_string($item['name']);
    $price = $item['price'];
    $img = $conn->real_escape_string($item['img']);

    $sql = "INSERT INTO orders (user_email, product_name, price, image) 
            VALUES ('$user_email', '$name', '$price', '$img')";
    $conn->query($sql);
}

// Clear cart
unset($_SESSION['cart']);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Placed – Shop</title>
<style>
body{
    font-family:system-ui, sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    background:#f4f4f8;
}
.box{
    background:#fff;
    padding:40px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    text-align:center;
}
button{
    margin-top:20px;
    padding:12px 20px;
    border:none;
    background:#1a73e8;
    color:#fff;
    border-radius:6px;
    cursor:pointer;
}
</style>
</head>
<body>

<div class="box">
    <h2>✅ Your order has been placed!</h2>
    <p>Thank you for shopping with us.</p>
    <a href="index.html"><button>Back to Shop</button></a>
</div>

</body>
</html>
