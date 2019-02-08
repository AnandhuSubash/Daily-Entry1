<?php
include 'dbconnect.php';
if(isset($_POST["logout"])){
  if(session()){
    session_destroy();
    echo "logged out";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>home</title>
    <style>
    h1{
      color: white;
    }
    </style>
  </head>
  <body background="tree.jpg">
    <form method="POST" action="">
    <h1>Welcome</h1>
    <input type="submit" name="logout" value="logout">
    </form>
  </body>
</html>
