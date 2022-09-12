@extends('backend.layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Purchase Product </li>
    </ol>
</nav>
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow"> 
                <div class="card-header cardB">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-2 heading_h4">Purchase Product</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead style="background-color: rgb(223, 221, 221)">
                            <tr>
                                <th>Sr. No</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Purchase Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inputStock as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->purchase_date}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->quantity}}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 