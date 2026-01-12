<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// password ko secure banana
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// DB me insert
$sql = "INSERT INTO users (name,email,password)
        VALUES ('$name','$email','$hashedPassword')";

if(mysqli_query($conn, $sql)){
  header("Location: auth.php");
  exit;
}else{
  echo "Error: Email already exists";
}
?>
