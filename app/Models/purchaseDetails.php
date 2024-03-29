<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'purchase_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function Stock()
    {
        return $this->hasMany(Stock::class); 
    }
}