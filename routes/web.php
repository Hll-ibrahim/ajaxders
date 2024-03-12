<?php

use App\Http\Controllers\BottleController;
use App\Http\Controllers\RouteController;
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

Route::get('/',[BottleController::class, 'index']);
Route::get('/create',[BottleController::class, 'create']);
Route::post('/create',[BottleController::class, 'createPost'])->name('createPost');

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
