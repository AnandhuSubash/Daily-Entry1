<?php
include 'dbconnect.php';
if(isset($_POST["login"]))
{
  $a=$_POST["email"];
  $b=$_POST["password"];
  $query="select name from registration where email='$a' and password='$b'";
  $result=mysqli_query($connect,$query);
  $abc=mysqli_fetch_array($result);
  function session(){
      global $a;
      session_start();
  echo $_SESSION["email"]=$a;

  }
  if($abc!=0){
    session();
  }
  else {
    echo "not valid";
  }
//  if(!$a){
//    echo "incorrect";
//     }
//  echo $a[0];
 }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <form  action="#" method="POST">
      <table>
        <tr>
          <td><label for="email">Email</td>
            <td><input type="email" name="email" placeholder="Enter email"></td>
        </tr>
        <tr>
          <td><label for="password">Password</label></td>
          <td><input type="password" name="password"  placeholder="Enter password"></td>
        </tr>
        <tr>
          <td><input type="submit" name="login" value="Login"</td>
        </tr>
      </table>

    </form>
  </body>
</html>
