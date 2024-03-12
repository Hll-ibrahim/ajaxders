<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","marka","fiyat","litre","renk"];

    public function getUser(){
        return $this->belongsTo("App\Models\User","user_id","id");
    }

}
