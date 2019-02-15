@extends('layouts.app')
  @section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

  </head>
  <body>
    <table border="2">
      <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>edit</td>
        <td>delete</td>
      </tr>
      @foreach($share as $value)
      <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td><a href="{{route('shares.edit',$value->id)}}">edit</td>
          <td><form action="{{route('shares.destroy',$value->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="button">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
