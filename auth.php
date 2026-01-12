<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){
    $user = mysqli_fetch_assoc($result);
    if(password_verify($password, $user['password'])){
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];
      header("Location: index.html");
      exit;
    } else {
      $error = "Wrong password";
    }
  } else {
    $error = "Account not found";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login – SHOP</title>
<style>
body{
  font-family: system-ui, sans-serif;
  background: linear-gradient(135deg,#1a73e8,#0f172a);
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
  color:#333;
}

.box{
  background:#fff;
  width:400px;
  padding:40px;
  border-radius:15px;
  box-shadow:0 15px 40px rgba(0,0,0,0.2);
  text-align:center;
  position:relative;
}

h2{
  margin-bottom:15px;
  color:#0f172a;
  font-size:28px;
}

p{
  color:#555;
  font-size:14px;
}

input{
  width:100%;
  padding:12px;
  margin:10px 0;
  border-radius:8px;
  border:1px solid #ccc;
  font-size:15px;
  transition:0.3s;
}

input:focus{
  border-color:#1a73e8;
  box-shadow:0 0 8px rgba(26,115,232,0.3);
  outline:none;
}

button{
  width:100%;
  padding:12px;
  margin-top:20px;
  background:#1a73e8;
  color:#fff;
  border:none;
  border-radius:10px;
  cursor:pointer;
  font-size:16px;
  font-weight:bold;
  transition:0.3s;
}

button:hover{
  background:#0f5ac0;
}

.link{
  margin-top:15px;
  font-size:14px;
}

.link a{
  color:#1a73e8;
  text-decoration:none;
  font-weight:bold;
}

.error-msg{
  background:#fde2e2;
  color:#d8000c;
  padding:10px;
  margin-bottom:15px;
  border-radius:8px;
  font-size:14px;
  text-align:center;
  box-shadow:0 5px 10px rgba(0,0,0,0.1);
}
</style>
</head>

<body>
<div class="box">
  <h2>Sign in</h2>
  <p>to continue to checkout</p>

  <?php if($error != ""): ?>
    <div class="error-msg"><?php echo $error; ?></div>
  <?php endif; ?>

  <form action="" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <div class="link">
    <p>Don't have an account? <a href="register.php">Create one</a></p>
  </div>
</div>
</body>
</html>
