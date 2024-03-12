<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    public function index(){
        $bottles = Bottle::all();
        return view('index',compact('bottles'));
    }

    public function create(){
        return view('add');
    }
    public function createPost(Request $request){

        $request->validate([
            'marka'=>'required',
            'litre'=>'required|numeric',
            'renk'=>'required',
            'fiyat'=>'required|numeric',
        ],[
            'marka.required'=>'Marka alanı gereklidir.',
            'litre.required'=>'litre alanı gereklidir.',
            'renk.required'=>'renk alanı gereklidir.',
            'fiyat.required'=>'fiyat alanı gereklidir.',
            'fiyat.numeric'=>'fiyat alanı sayısal olmalıdır.',
            'litre.numeric'=>'litre alanı sayısal ollmalıdır.',
        ]);

        $bottle = new Bottle();
        $bottle->marka = $request->marka;
        $bottle->renk = $request->renk;
        $bottle->fiyat = $request->fiyat;
        $bottle->litre = $request->litre;
        $bottle->save();
        return redirect()->back()->with(['message'=>'İşlem başarılı']);
    }
}
