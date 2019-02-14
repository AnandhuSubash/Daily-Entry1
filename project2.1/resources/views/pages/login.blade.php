@extends('layouts.registerstyle')
 @section('style')
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <div class="header">
    <a href="#" class="logo">Project2</a>
    <div class="header-right">
      <a class="active" href="#">Home</a>
      <a href="#">Contact</a>
      <a href="#">About</a>
    </div>
  </div>

<form action="" method="POST">
  <div class="container">
   <h1>Login...</h1>
   <form method="POST" action="">

   <label for="email"><b>Email</b></label><br><br>
   <input type="email" placeholder="Enter Email" name="email" required><br><br>
   <label for="password"><b>Password</b></label><br><br>
   <input type="password" placeholder="Enter Password" name="password" required><br><br>
   <button type="submit" name="login" value="login">Login</button>
  </div>
</form>
</body>
</html>
