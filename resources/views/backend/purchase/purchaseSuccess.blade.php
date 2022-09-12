@extends('backend.layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Purchase List</li>
    </ol>
</nav>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header cardB">
                    <div class="row">
                    <div class="col-md-6">
                        <h4 class="heading_h4">Purchase List</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('create.purchase')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> New Purchase</a>
                    </div>
                </div> 
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead style="background-color: rgb(219, 216, 216)">
                            <tr>
                                <th>Sr</th>
                                <th>Purchase No</th>
                                <th>Purchase Date</th>
                                <th>Supplier Name</th>
                                <th>Grand Total</th>
                                <th>Aciton</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->purchase_no}}</td>
                                <td>{{$row->purchase_date}}</td>
                                <td>{{$row->supplier_name}}</td>
                                <td>{{$row->total}}</td>
                                <td>
                                <a href="{{route('purchase.history',$row->id)}}" class="badge badge-pill badge-success"><i class="fa fa-eye"></i> View Purchase History</a>
                                </td>
                            </tr> 
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection