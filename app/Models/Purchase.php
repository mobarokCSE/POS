<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    
    public function purchaseDetails() 
    {
        return $this->hasMany(purchaseDetails::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

}