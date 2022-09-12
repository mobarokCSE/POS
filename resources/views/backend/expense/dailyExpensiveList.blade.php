@extends('backend.layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daily Expenses</li>
    </ol>
</nav>
@php
    $date = date('d/m/y');
    $total = DB::table('expenses')->where('date', $date)->sum('amount');
@endphp
<div class="page-content fade-in-up">
    <div class="card pt-2">
        <div class="card-header cardB">
            <div class="row">
                <h4 class="col-md-4 heading_h4">Daily Expense</h4>
                <h4 class="col-md-4 text-center heading_h4">Total: {{$total}}</h4>
                <div class="col-md-4 text-right">Date: {{date('d/m/y')}}</div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216)">
                    <tr>
                        <th>Sr</th>
                        <th>Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dailyEx as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->detail}}</td>
                            <td>{{$row->amount}}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection