<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Categorie extends Model
{
    use HasFactory,NestableTrait;
    protected $guarded = [];


    public function category(){
        return $this->belongsTo(self::class, 'parent_id','id');
    }

    
    public function categories(){
        return $this->hasMany(self::class, 'parent_id','id');
    }
}