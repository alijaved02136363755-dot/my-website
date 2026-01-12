<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Account – Shop</title>

<style>
body{
  margin:0;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background:linear-gradient(135deg,#0f172a,#2563eb);
  font-family:system-ui;
}

.container{
  width:420px;
  background:#fff;
  padding:35px;
  border-radius:14px;
  box-shadow:0 30px 60px rgba(0,0,0,0.3);
  animation:fade 0.6s ease;
}

@keyframes fade{
  from{transform:translateY(20px);opacity:0}
  to{transform:translateY(0);opacity:1}
}

h2{
  margin-bottom:5px;
}

p{
  color:#555;
  font-size:14px;
}

input{
  width:100%;
  padding:12px;
  margin-top:15px;
  border-radius:8px;
  border:1px solid #ccc;
  outline:none;
}

input:focus{
  border-color:#2563eb;
}

button{
  width:100%;
  margin-top:20px;
  padding:12px;
  border:none;
  border-radius:8px;
  background:#2563eb;
  color:#fff;
  font-size:16px;
  cursor:pointer;
  transition:0.3s;
}

button:hover{
  background:#1e40af;
}

.link{
  margin-top:18px;
  text-align:center;
  font-size:14px;
}

.link a{
  color:#2563eb;
  text-decoration:none;
  font-weight:600;
}
</style>
</head>

<body>

<div class="container">
  <h2>Create your account</h2>
  <p>Join to continue shopping</p>

  <form action="register_save.php" method="post">
    <input name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Create Account</button>
  </form>

  <div class="link">
    Already have an account? <a href="auth.php">Sign in</a>
  </div>
</div>

</body>
</html>
