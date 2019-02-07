<?php
include 'db.php';
if(isset($_POST["submit"]))
{
  $a=$_POST["name"];
  $b=$_POST["email"];
  $c=$_POST["address"];
$sql="insert into registerpage (`name`,`email`,`address`) values ('$a','$b','$c')";
$result=mysqli_query($db,$sql);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <form  action="#" method="POST">
      <table>
      <tr>
      <td><label for="name"><b>Name</b></label></td>
      <td><input type="text" placeholder="Enter name" name="name" required></td>
      </tr>
      <tr>
      <td><label for="email"><b> Email</b></label></td>
      <td><input type="email" placeholder="Enter email" name="email" required></td>
      </tr>
      <tr>
      <td><label for="address"><b> Address</b></label></td>
      <td><input type="text" placeholder="Enter address" name="address" required><br></td>
      </tr></table>
      <hr>
      <input type="submit" name="submit" value="submit">


    </form>
  </body>
</html>
