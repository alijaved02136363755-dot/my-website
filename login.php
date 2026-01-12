<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];

  // DB se user uthao
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){

    $user = mysqli_fetch_assoc($result);

    // password verify
    if(password_verify($password, $user['password'])){
      
      // login success
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
