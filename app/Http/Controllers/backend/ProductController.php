<?php

namespace App\Http\Controllers\backend;


use App\Models\Product;
use App\Models\Supplier;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller 
{
    public function create(){
        
        $category = Categorie::with('categories')->orderByRaw('-name ASC')->get()->nest()->listsFlattened('name');

        $supplier = Supplier::all();
        return view('backend.product.createProduct',compact('category','supplier'));
        
        
    }

    public function store(Request $request){
        
        $request->validate([
            'name'=>'required',
            'cat_id'=>'nullable',
            'code'=>'required|numeric',
            'buyPrice'=>'required|numeric',
            'selPrice'=>'required|numeric',
            'supplier_id'=>'nullable',
        ],[
            'name.required'=>'Product name is empty.',
            'cat_id.required'=>'Category name not selected.',
            'code.required'=>'Product code is empty.',
            'buyPrice.required'=>'Buying price is empty.',
            'selPrice.required'=>'Selling price is empty.',
            'supplier_id.required'=>'Supplier name not selected.',
        ]);
            
        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'code'=>$request->code,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
            'supplier_id'=>$request->supplier_id,
            'description'=>$request->description,
        ];
        
        
        $img =$request-> file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;
            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }

    }


    public function index()
    { 
        $product = Product::with('category')->get();
        // dd(Product::with(['category'])->get());
        return view('backend.product.allProduct', compact('product'));
    }

    public function view($id)

    {
        $viewProduct = Product::with('category')->with('supplier')->first();    
        return view('backend.product.viewProduct', compact('viewProduct'));
    }

    public function destroy(Request $request)
    {
        $deleteProduct = Product::find($request->id);
        $delete = $deleteProduct->delete();
        
        if($delete){
            $notification = array(
                'message'=>'Data Deleted Successfull !',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editProduct = Product::find($id);
        // $category = Categorie::all();
        $category = Categorie::with('categories')->orderByRaw('-name ASC')->get()->nest()->listsFlattened('name');
        // dd($category);
        $supplier = Supplier::all();
        return view('backend.product.editProduct', compact('editProduct','category','supplier'));
    }
    
    public function update(Request $request, $id)
    {
        $updateProduct = Product::find($id);
        $oldphoto = $updateProduct->photo;

        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'supplier_id'=>$request->supplier_id,
            'code'=>$request->code,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
            'description'=>$request->description,
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
        
    }

}