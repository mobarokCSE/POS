@extends('backend.layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Supplier Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-primary btn-sm">All Suppliers</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <img src="{{URL::to($viewSupplier->photo)}}" alt="" style="height: 200px; width:200px; border-radius:4px">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->sup_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>:</td> 
                                        <td>{{$viewSupplier->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier Type</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shop Name</th>
                                        <td>:</td>
                                        <td>{{$viewSupplier->shopName}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection