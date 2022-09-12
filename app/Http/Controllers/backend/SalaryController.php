<?php

namespace App\Http\Controllers\backend;

use App\Models\Employee;
use App\Models\PaySalary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class SalaryController extends Controller
{
    public function paySalary()
    {
        $employee = Employee::all();
        return view('backend.salary.paySalary', compact('employee'));
    }

    
    public function paySalarySuccess(Request $request)
    {
        $request->validate([
            'payment_type'=>'required',
        ]);
        $employee = Employee::find($request->id);
        
        $data = [
            'employee_id'=>$employee->id,
            'month'=>$request->month,
            'payment_type'=>$request->payment_type,
            'status'=>"Paid",
        ];
        
        $data['net_salary'] = $employee->salary;
        

        $check = PaySalary::where('employee_id', $request->id)->first();
        if($check){
            $notification = array(
                'message'=>'Already Pay !',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }else{
            $success = PaySalary::insert($data);
            try{
                if($success){
                    $notification = array(
                        'message'=>'Payment Successful!',
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

    public function lastmonthSalary()
    {
        $month = date("F",strtotime('-1 month'));
        $lastMonthSalary = PaySalary::with('employee')->where('month',$month)->get();
        return view('backend.salary.lastmonthSalary', compact('lastMonthSalary'));
    }
}