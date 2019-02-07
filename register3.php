<?php
include 'dbconnect2.php';
if(isset($_POST["submit"]))
{

$qwery2="select * from registerpage2";
$result=mysqli_query($conn,$qwery2);

if(mysqli_num_rows($result)>0)

{
  ?>
  <table width="50%" border=1 align="center">
    <tr>
      <th>Name</th>
      <th>Email</th>
    </tr>
  </table>
    <?php

}
$value = mysqli_fetch_array($result);
echo $value[1];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>register3</title>
  </head>
  <body>
    <form action="#" method="POST">
      <input type="submit" name="submit" value="click">

    </form>
  </body>
</html>
