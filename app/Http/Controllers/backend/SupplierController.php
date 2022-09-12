<?php

namespace App\Http\Controllers\backend;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class SupplierController extends Controller
{
    public function create()
    {
        return view('backend.supplier.createSupplier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sup_name'=>'required', 
            'email'=>'required|email|unique:suppliers,email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'city'=>'required',
            'shopName'=>'required',
            'address'=>'required',
            'type'=>'required',
        ],[
            'sup_name.required'=>'Supplier name field is empty.',
            'email.required'=>'Email field is empty',
            'phone.required'=>'Phone number field is empty.',
            'city.required'=>'City field is empty',
            'shopName.required'=>'Company Name field is empty',
            'type.required'=>'Supplier type field is empty.',
            'address.required'=>'Address field is empty',
        ]);

        $data = [
            'sup_name'=>$request->sup_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'shopName'=>$request->shopName,
            'city'=>$request->city,
            'type'=>$request->type,
            'address'=>$request->address,
        ];
        $img =$request->file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;
            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $supplier = Supplier::create($data);
            try{
                if($supplier){
                    $notification = array(
                        'message'=>'Supplier Added Successful!',
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
            $supplier = Supplier::create($data);
            try{
                if($supplier){
                    $notification = array(
                        'message'=>'Supplier Added Successful!',
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

    public function index()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.allSupplier', compact('suppliers'));
    }

    public function view($id)
    {
        $viewSupplier = Supplier::find($id);
        return view('backend.supplier.viewSupplier', compact('viewSupplier'));
    }

    public function destroy(Request $request)
    {
        $deleteSupplier = Supplier::find($request->id);
        $delete = $deleteSupplier->delete();
        if($delete){
            $notification = array(
                'message'=>'Delete Successful!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editSupplier = Supplier::find($id);
        return view('backend.supplier.editSupplier', compact('editSupplier'));
    }

    public function update(Request $request, $id)
    {
        $updateSupplier = Supplier::find($id);
        $oldphoto = $updateSupplier->photo;

        $data = [
            'sup_name'=>$request->sup_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'shopName'=>$request->shopName,
            'city'=>$request->city,
            'type'=>$request->type,
            'address'=>$request->address,
        ];
        $img =$request->file('photo');
        if($img){
            @unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateSupplier->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.supplier')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateSupplier->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.supplier')->with($notification);
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