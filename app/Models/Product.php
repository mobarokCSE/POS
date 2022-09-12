<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
 


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id');
    }

    public function category(){

        return $this->belongsTo(Categorie::class,'cat_id','id');
    }
}
 