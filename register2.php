<?php
include 'dbconnect2.php';
if(isset($_POST["submit"]))
{
//  $a=$_POST["name"];
//  $b=$_POST["email"];
//  $c=$_POST["age"];
//  $qwery="insert into registerpage2(`name`,`email`,`age`) values('$a','$b','$c')";
//  $result=mysqli_query($conn,$qwery);
}
  $qwery2="select * from registerpage2";
  $result=mysqli_query($conn,$qwery2);

     if(mysqli_num_rows($result)>0)
 	{
    ?>

    <table width="54%" border="1" align="center">
   		<tr>
     		<th scope="col">COUSE ID</th>
     		<th scope="col">COUSE NAME</th>
     		<th scope="col">ACTIONS</th>

   		</tr>

   	<?php
    		while(($ce=mysqli_fetch_array($result)))
    		{
 	 		echo "<tr>
 	       		<td align='center'>$ce[0]</td>
 	       		<td align='center'>$ce[1]</td>
 		   		<td align='center'>
 		   			<a href='courses.php?cid=$ce[0]&cname=$ce[1]' id='lnkEdit$ce[0]'>EDIT</a>&nbsp;&nbsp;
 		   			<a href='deleteCourses.php?cid=$ce[0]' onclick='return confirmDelete();' id='lnkDel$ce[0]'>DELETE</a>
 		   		</td>
 		   		</tr> ";
    }

   ?>
   </table>
   <?php
 	}
 	else
 		echo "<h4 align='center'>No Courses Added Yet!</h4>";
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>register2</title>
  </head>
  <body>
    <form  action="#" method="POST">

      <input type="submit" name="submit" value="SUBMIT">
    </form>
  </body>
</html>
