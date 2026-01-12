<?php
session_start();

// Login check
if(!isset($_SESSION['user_email'])){
    header("Location: auth.php");
    exit;
}

// Get cart items
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout – Shop</title>
<style>
body{
    font-family:system-ui, sans-serif;
    background:#f4f4f8;
    padding:40px;
}
h2{ margin-bottom:20px; }
.cart-item{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:12px;
    background:#fff;
    padding:10px;
    border-radius:8px;
    box-shadow:0 4px 10px rgba(0,0,0,0.08);
}
.cart-item img{ width:60px; height:60px; object-fit:cover; border-radius:6px; }
.total{ font-weight:700; font-size:18px; margin-top:20px; }
button{
    margin-top:20px;
    padding:12px 20px;
    border:none;
    background:#16a34a;
    color:#fff;
    border-radius:6px;
    cursor:pointer;
    font-size:16px;
}
</style>
</head>
<body>

<h2>Checkout</h2>

<?php if(empty($cart)){ ?>
    <p>Your cart is empty!</p>
<?php } else { ?>

    <?php foreach($cart as $item){ 
        $total += $item['price'];
    ?>
        <div class="cart-item">
            <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
            <div>
                <p><?= $item['name'] ?></p>
                <small>Rs <?= $item['price'] ?></small>
            </div>
        </div>
    <?php } ?>

    <div class="total">Total: Rs <?= $total ?></div>

    <!-- Place Order Button -->
    <form action="place_order.php" method="post">
        <button type="submit">Place Order</button>
    </form>

<?php } ?>

</body>
</html>
