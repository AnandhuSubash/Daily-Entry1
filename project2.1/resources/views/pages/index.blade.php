@extends('layouts.app')
  @section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>index</title>

  </head>
  <body>

    <h1>index</h1>
    <h2>{{$name}}</h2><!--return the $name value from page controller-->
    <hr>
    <p>page1</p>
    <p>page2</p>
    <p>page3</p>
    <p>page4</p>
  </body>
</html>
