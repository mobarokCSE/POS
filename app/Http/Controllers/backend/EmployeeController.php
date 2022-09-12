<?php

namespace App\Http\Controllers\backend;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('backend.employee.createEmployee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:suppliers,email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'nid'=>'required|numeric',
            'salary'=>'required|numeric',
            'address'=>'required',
        ],[
            'name.required'=>'Name field is empty.',
            'email.required'=>'Email field is empty',
            'phone.required'=>'Phone number field is empty.',
            'nid.required'=>'NID number field is empty.',
            'nid.numeric'=>'The NID field must be a number.',
            'salary.required'=>'Salary field is empty.',
            'address.required'=>'Address field is empty.',
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'nid'=>$request->nid,
            'salary'=>$request->salary,
            'address'=>$request->address
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
            $employee = Employee::create($data);
            try{
                if($employee){
                    $notification = array(
                        'message'=>'Employee Added Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }  
        }else{
            try{
                $employee = Employee::create($data);
                if($employee){
                    $notification = array(
                        'message'=>'Employee Added Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
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

    public function index()
    {
        $employee = Employee::all();
        return view('backend.employee.allemployee',compact('employee'));
    }

    public function view($id)
    {
        $viewEmployee = Employee::find($id);
        return view('backend.employee.viewEmployee', compact('viewEmployee'));
    }

    public function destroy(Request $request)
    {
        $deleteEmployee = Employee::find($request->id);
        $delete = $deleteEmployee->delete();
        if($delete){
            $notification = array(
                'message'=>'Delete Successful!',
                'alert-type'=>'success',
            );
            return Redirect()->route('index.employee')->with($notification);
        }
    }

    public function edit($id)
    {
        $editEmployee = Employee::find($id);
        return view('backend.employee.editEmployee', compact('editEmployee'));
    }

    public function update(Request $request, $id)
    {   
        $updateEmployee = Employee::find($id);
        $photo = $updateEmployee->photo;
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'nid'=>$request->nid,
            'salary'=>$request->salary,
            'address'=>$request->address
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($photo);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateEmployee->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.employee')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateEmployee->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successful!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.employee')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

}