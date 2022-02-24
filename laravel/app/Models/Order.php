<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{

    protected $fillable=["id","student_id","amount","date","is_completed","payment_info"];
    public $timestamps = false;

    public function student() :HasOne {

        return $this->hasOne(Student::class);

    }

    public function product()  {
        return $this->belongsToMany(Product::class);
    }

    use HasFactory;
}
