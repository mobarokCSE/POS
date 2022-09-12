@extends('backend.layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <Daily class="breadcrumb-item active" aria-current="page">Daily Expense</li>
    </ol>
</nav>
@php
    $date = date('d/m/y');
    $total = DB::table('expenses')->where('date', $date)->sum('amount');
@endphp
<div class="text-center">
    <span style="font-weight:bold; font-size:40px; color:red">Total: {{$total}}</span>
</div>
<span style="font-weight:bold; font-size:25px; color:blue">Daily Expense: {{date('d/m/y')}}</span>
<div class="page-content fade-in-up">
    <div class="card pt-2">
        <div class="card-header bgView cardB">
            <div class="row">
                <h4 class="col-md-6 heading_h4">Daily Expense</h4>
                <div class="col-md-6 text-right">
                    <a href="{{route('daily.expense')}}" class="btn btn-light">Daily</a>
                    <a href="{{route('monthly.expense')}}" class="btn btn-danger">Monthly</a>
                    <a href="{{route('yearly.expense')}}" class="btn btn-warning">Yearly</a>
                    <a href="{{route('create.expense')}}" class="btn btn-dark"><i class="fa fa-plus"></i>Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216)">
                    <tr>
                        <th>Sr</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dailyEx as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->detail}}</td>
                            <td>{{$row->amount}}</td>
                            <td>{{$row->date}}</td>
                            <td>
                                <a href="{{route('dailyEdit.expense',$row->id)}}" class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-href="{{$row->id}}" class="badge badge-pill badge-danger"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "DELETE" below if you are delete this Data.
            <form action="{{route('delete.dailyEx')}}" method="POST">
                @csrf
                <input type="hidden" id="input" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection