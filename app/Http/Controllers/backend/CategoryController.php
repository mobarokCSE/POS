<?php

namespace App\Http\Controllers\backend;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use CreateCategoriesTable;
use Illuminate\Http\Request;
use Throwable;


class CategoryController extends Controller
{
    public function create(){


        $categories = Categorie::where('category_id','=',null)->select('name','id')->get();

        return view('backend.catagories.create',compact('categories'));
    }

    public function store(Request $request){

    
        $request->validate([
            'category_id'=>'nullable', 
            'cat_name'=>'required', 
            'is_menu'=>'required', 
            'is_active'=>'required', 
            
        ],[
            'category_id.required'=>'Parent category field is empty.',
            'cat_name.required'=>'Name field is empty',
            'is_menu.required'=>'Menu field is empty.',
            'is_active.required'=>'Active field is empty',
        ]);

        $data = [
            'parent_id'=>$request->category_id,
            'name'=>$request->cat_name,
            'is_menu'=>$request->is_menu ? true : false,
            'is_active'=>$request->is_active ? true : false,
            
        ];
        
        
        $image =$request->file('image');
        if($image){
            $image_name = uniqid();
            $ext = $image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$ext;
            $image_path = 'upload/';
            $image_url = $image_path.$image_full_name;
            $image->move($image_path,$image_full_name);
            
            $data['image']=$image_url;
            $category = Categorie::create($data);
            try{
                if($category){
                    $notification = array(
                        'message'=>'category Added Successful!',
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
            $category = Categorie::create($data);
            try{
                if($category){
                    $notification = array(
                        'message'=>'category Added Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function index(){
        $category = Categorie::all();
        return view('backend.catagories.index', compact('category'));
    }

    public function destroy(Request $request){
        $deletecategory = Categorie::find($request->id);
        $delete = $deletecategory->delete();
        if($delete){
            $notification= array(
                'message'=>'Delete Successful!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }


}