<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use Yajra\DataTables\DataTables;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::post('/post',function (Request $request){

    $request->validate([
        'title'=>'required',
        'content'=>'required',
    ],[
        'title.required' => 'Title alanı boş bırakılamaz!',
        'content.required' => 'Content alanı boş bırakılamaz!',
    ]);

    $product = new product;
    $product->title = $request->title;
    $product->content = $request->content;
    $product->save();
    return response()->json(['message'=>'Başarıyla eklendi']);

})->name('post');

Route::get('get',function (){

   return DataTables::of(product::get())
       ->editColumn('score',function ($data){
           if($data->score < 2){
               return "Başarısız";
           }
           return "Başarılı";
       })
       ->addColumn('rol',function($data){
           if($data->score < 2){
               return "ali";
           }
           return "ayşe";
       })
       ->editColumn('ahmet',function(){return"ahmet";})
       ->rawColumns(['score','rol'])
       ->make();

})->name('fetch');
