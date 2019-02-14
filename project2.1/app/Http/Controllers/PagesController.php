<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public  function index(){
      $name = 'Nandhumaan';
      return view('pages.index',compact('name'));//calling PagesController from view and return the controller function value
    }

    public function about(){
      $name = 'sam';
      return view('pages.about')->with('title',$name);
    }

    public function service(){
      return view('pages.service');
    }
    public function click(){
      return view('pages.click');
    }
}
