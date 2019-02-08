<?php
include 'dbconnect.php';
if(isset($_POST["submit"])){
$a=$_POST["name"];
$b=$_POST["email"];
$c=$_POST["password"];

echo $qwery="insert into registration(name,email,password) values('$a','$b','$c')";
$result=mysqli_query($connect,$qwery);

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registration</title>
  </head>
  <body>
    <form  action="login.php" method="POST">
      <table align="center">
        <tr>
          <td><label for="name">Name</td>
            <td><input type="text" name="name" placeholder="Enter name"></input></td>
        </tr>
        <tr>
          <td><label for="email" >Email</td>
            <td><input type="email" name="email" placeholder="Enter email"></input></td>
        </tr>
        <tr>
          <td><label for="password">Password</td>
            <td><input type="password" name="password" placeholder="Enter password"></input></td>
        </tr>
        <tr>
        <td><input type="submit" name="submit" value="Register"></input></td>
        </tr>
      </table>

    </form>
  </body>
</html>
