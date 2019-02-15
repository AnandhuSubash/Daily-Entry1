@extends('layouts.app')
  @section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
 <form  action="{{route('shares.update', $value1->id)}}" method="post">
   @method('PATCH')
   @csrf
   <table>
     <tr>
       <td>Name</td>
       <td><input type="text" name="name"  value="{{$value1->name}}"></td>
     </tr>
     <tr>
       <td>Email</td>
       <td><input type="email" name="email" value="{{$value1->email}}"></td>
     </tr>
     <tr>
       <td>Password</td>
       <td><input type="password" name="password" value="{{$value1->password}}"></td>
     </tr>
     <tr>
       <td><input type="submit" name="edit" value="Update"></td>
     </tr>
   </table>
 </form>
  </body>
</html>
