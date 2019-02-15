@extends('layouts.registerstyle')
  @section('style')
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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
    <h1>Register Customer</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

      <label for="name"><b>Name</b></label>
    <input type="text" placeholder="EnterName" name="name" id="name" required>



  <label for="email"><b>Email</b></label><br><br>
    <input type="email" placeholder="Enter Email" name="email" required><br><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>


    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" value="submit">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="/login">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
