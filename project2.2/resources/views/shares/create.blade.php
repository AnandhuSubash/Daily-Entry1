<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
 <form  action="{{route('shares.store')}}" method="post">
   @csrf
   <table>
     <tr>
       <td>Name</td>
       <td><input type="text" name="name" ></td>
     </tr>
     <tr>
       <td>Email</td>
       <td><input type="email" name="email"></td>
     </tr>
     <tr>
       <td>Password</td>
       <td><input type="password" name="password"></td>
     </tr>
     <tr>
       <td><input type="submit" name="create" value="Create"></td>
     </tr>
   </table>
 </form>
  </body>
</html>
