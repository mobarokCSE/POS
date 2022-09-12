<?php

namespace App\Http\Controllers\backend;

use Throwable;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Categorie;
use App\Models\purchaseDetails;
use App\Models\Stock;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function create(){
        $category = Categorie::all();
        $supplier = Supplier::all();
        $product = Product::all();
        return view('backend.purchase.createPurchase',compact('category','supplier','product'));
        
    }

    public function detail(){
        $purchase = Purchase::with('supplier')->orderBy('id', 'desc')->get();
        return view('backend.purchase.purchaseSuccess',compact('purchase'));
    }

    public function addCart(Request $request){

        $data = [
            'id'=>$request->id,
            'name'=>$request->name,
            'qty'=>$request->qty,
            'price'=>$request->unit,
            'weight'=>'0',
            'options'=>[
                'description'=>$request->description,
            ]
        ];
        $add = Cart::add($data);
        if($add){
            $notification = array(
                'message'=>'Product Add Successful!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Error',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    
    }

    public function cartUpdate2(Request $request, $rowId ){
        $cartUpdate = $request->qty;
        $update = Cart::update($rowId, $cartUpdate);
        if($update){
            $notification = array(
                'message'=>'Cart Update Successful!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Error',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy($rowId ){
        $delete = Cart::remove($rowId);
        if($delete){
            $notification = array(
                'message'=>'Cart Delete Successful',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Cart Remove Successful',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function invoicePurchase(Request $request)
    {
        $request->validate([
            'sup_id'=>'required',
        ],[
            'sup_id.required'=>'Select A Supplier First',
        ]);
        $id = $request->sup_id;
        $supplier = Supplier::where('id',$id)->first();
        $content = Cart::content();
        // $shopdetails = Setting::first();
        return view('backend.purchase.invoicePurchase',compact('content','supplier'));
    }

    public function storePurchase(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        $data = [
            'supplier_name'=>$supplier->sup_name,
            'supplier_shopName'=>$supplier->shopName,
            'supplier_address'=>$supplier->address,
            'supplier_email'=>$supplier->email,
            'supplier_phone'=>$supplier->phone,
            'purchase_no'=>$request->purchase_no,
            'purchase_date'=>$request->purchase_date,
            'total_product'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $purchase_id = Purchase::insertGetId($data);
        $contents = Cart::content();
        $pdata = array();
        foreach($contents as $content)
        {
            $product = Product::find($content->id);
            
            $pdata['purchase_id']=$purchase_id;
            $pdata['product_name']=$product->name;
            $pdata['product_description']=$product->description;
            $pdata['quantity']=$content->qty;
            $pdata['unit_cost']=$content->price;
            $pdata['total']=$content->total;
            $pdata['purchase_date']=$request->purchase_date;
            $pdata['description']=$content->options->description;
            $purchasedetail_id = purchaseDetails::insertGetId($pdata);
        }
        
        foreach($contents as $content){
            $qdata = [
                'purchase_id'=>$purchase_id,
                'purchasedetail_id'=>$purchasedetail_id,
                'product_id'=>$content->id,
                'quantity'=>$content->qty,
            ];
            $check = Stock::where('product_id', $content->id)->first();
            if($check){
                $increment = Stock::find($check->id)->increment('quantity', $content->qty);
            }else{
                $success = Stock::insert($qdata);
            }
        }
        Cart::destroy();
        $notification = array(
            'message'=>'Product Purchase Successful',
            'alert-type'=>'success',
        );
        return redirect()->route('create.purchase')->with($notification);
    }

    public function purchaseHistory($id)
    {
        $purchase = Purchase::where('id', $id)->first();
        
        $purchaseDetails =purchaseDetails::where('purchase_id',$id)->get();
        
        return view('backend.purchase.purchaseHistory', compact('purchase','purchaseDetails'));
        
    }

    public function dailyPurchases()
    {
        $date = date("d/m/y");
        $purchase = Purchase::with('supplier')->where('purchase_date', $date)->orderBy('id', 'desc')->get();
        return view('backend.purchase.dailyPurchases',compact('purchase'));
    }


}