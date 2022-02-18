<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable=["id","cafeteria_id","name","price","descripcion","image","category"];

    public function cafe(){

        return $this->belongsTo(Cafe::class);

    }
    public function order(){
        return $this->hasMany(Order::class);
    }


    use HasFactory;
}