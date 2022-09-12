<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;


class BrandController extends Controller
{
    public function create(){
        return view('backend.brand.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'brand_name'=>'required', 
            'brand_description'=>'required',
            
        ],[
            'brand_name.required'=>'Brand name field is empty.',
            'brand_description.required'=>'Description field is empty',
            
        ]);
        
        $data = [
            'brand_name'=>$request->brand_name,
            'brand_description'=>$request->brand_description,
        ];

        $Brand = Brand::create($data);
            try{
                if($Brand){
                    $notification = array(
                        'message'=>'Brand Added Successful!',
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

    public function index(){
        $Brand=Brand::all();
        return view('backend.brand.index', compact('Brand'));
    }
    
    public function destroy(Request $request)
    {
        $deleteBrand = Brand::find($request->id);
        $delete = $deleteBrand->delete();
        if($delete){
            $notification = array(
                'message'=>'Delete Successful!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }
}