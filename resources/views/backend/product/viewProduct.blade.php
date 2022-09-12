@extends('backend.layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB ">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Product Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.product')}}" class="btn btn-primary btn-sm">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <img src="{{URL::to($viewProduct->photo)}}" alt="" style="height: 200px; width:200px; border-radius:50%">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <th>Product Name</th> 
                                        <td>:</td>
                                        <td>{{$viewProduct->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier Name</th>
                                        <td>:</td>
                                        <td>{{optional($viewProduct->Supplier)->sup_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>:</td>
                                        <td>{{optional($viewProduct->category)->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->code}}</td>
                                    </tr>
                                    <tr>
                                        <th>Buy Date</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->buyDate}}</td>
                                    </tr>
                                    <tr>
                                        <th>Expire Date</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->expireDate}}</td>
                                    </tr>
                                    <tr>
                                        <th>Buying Price</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->buyPrice}}</td>
                                    </tr>
                                    <tr>
                                        <th>Selling Price</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->selPrice}}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>:</td>
                                        <td>{{$viewProduct->description}}</td>
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