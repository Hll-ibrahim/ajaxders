<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(){
        $melih = ["telefon" => "iphone","kas"=>"100","yakışıklılık"=>"99"];
        return view('index',compact('melih'));
    }
}
