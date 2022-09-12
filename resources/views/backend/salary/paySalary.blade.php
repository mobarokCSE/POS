@extends('backend.layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pay Salary List</li>
    </ol>
</nav>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView cardB">
            <div class="row">
                <div class="col-md-6">
                    <span style="font-size: 22px;" class="heading_h4">Monthly Pay Salary</span>
                </div>
                @php
                    $date = date("F",strtotime('-1 month'));
                @endphp
                <div class="col-md-6 text-right">
                    <span style="font-size: 22px;" class="heading_h4">{{$date}}</span>
                </div>
            </div>
        </div> 
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216); ">
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Pay Month</th>
                        <th>Salary</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{{URL::to($row->photo)}}" class="pic" alt=" picture not Found">
                            </td>
                            <td>{{date("F", strtotime('-1 month'))}}</td>
                            <td>{{$row->salary}}</td>
                            <td>
                                <a href="#" data-href={{$row->id}} class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#paymodal"><i class="fa fa-money"></i> Pay now</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="paymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header card-header cardB">
            <h5 class="modal-title heading_h4" id="exampleModalLabel">
            <i class="fa fa-money"></i>
                Pay Salary
            </h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{route('pay.salarySuccess')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select name="payment_type" id="" class="form-control">
                        <option value="">Select type</option>
                        <option value="Hand Cash">Hand Cash</option>
                        <option value="bkash">bkash</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Month</label>
                    <select name="month" id="" class="form-control">
                        <option value="">Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <input type="hidden" id="input" name="id">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success" value="Pay Salary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection