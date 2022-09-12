<?php

namespace App\Http\Controllers\backend;

use App\Models\purchaseDetails;
use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function view(){
        $stock = Stock::with('product')->get();
        
        return view('stock.viewStock', compact('stock'));
    } 
    public function show(){
        $inputStock = purchaseDetails::with('purchase')->orderBy('id', 'desc')->get();
        return view('stock.purchaseStock', compact('inputStock'));
    } 
    // public function saleStock()
    // {
    //     $outStock = OrderDetails::with('order')->orderBy('id', 'desc')->get();
    //     return view('stock.saleStock', compact('outStock'));
    // }
}