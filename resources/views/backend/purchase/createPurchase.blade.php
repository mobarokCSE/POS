@extends('backend.layout.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Purchase</li>
    </ol>
</nav>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <h4 class="col-md-6 heading_h4">Product Purchase</h4>
                            <div class="col-md-6">
                                <a href="{{route('detail.purchase')}}" class="btn btn-primary btn-sm float-right">Purchase List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    {{-- Datatables --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-success text-center cardB">
                                    <span style="font-weight:bold; font-size:20px;color:#fff">Cart Added Product</span>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Price</th>
                                                    <th>Aciton</th>
                                                </tr>
                                            </thead>
                                            
                                            @php
                                                $prod = Cart::content();
                                            @endphp
                                        
                                            @foreach ($prod as $row)
                                                <tr>
                                                    <td>{{$row->name}}</td>
                                                    <td>
                                                    <form action="{{route('cart.update2',$row->rowId)}}" method="POST">
                                                        @csrf
                                                        <div class="" style="display: flex">
                                                            <input type="number" style="width:65px" value="{{$row->qty}}" name="qty">
                                                            <button class="btn btn-success" style="padding: 0.1rem; margin-left:5px;"> <i class="fa fa-check"></i> </button>
                                                        </div>
                                                    </form>
                                                    </td>
                                                    <td>{{$row->price}}</td>
                                                    <td>{{$row->price*$row->qty}}</td>
                                                    <td>
                                                        <a href="{{route('cart.delete', $row->rowId)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card" style="width: 100%;">
                                        <div class="card-header text-center" style="background-color: #130f40;color:#fff">
                                        <p class="hr2 pb-2" style="font-size: 20px;">Total Quantity: {{Cart::count()}}</p>
                                            <p class="hr2 pb-2" style="font-size: 20px;">Sub-Total: {{Cart::subtotal()}}</p>
                                            <p class="hr2 pb-2" style="font-size: 20px;">Vat: {{Cart::tax()}}</p>
                                            <p style="font-size: 25px; font-weight:bold">Total Price:</p>
                                            <h2 style="font-size: 35px; font-weight:bold; padding: 0px">{{Cart::total()}}</h2>
                                        </div>
                                    </div>
                                    <div class=" pt-3">
                                        <form action="{{route('invoice.purchase')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" style="font-size: 20px;">Select Supplier</label>
                                                <a class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal-primary" href=""><i class="fa fa-plus" ></i>Add</a>
                                                <select name="sup_id" id="" class="form-control">
                                                    <option value="">Select Supplier</option>
                                                    @foreach ($supplier as $row)
                                                        <option value="{{$row->id}}">{{$row->sup_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="text-center">
                                            <input type="submit" value="Create Invoice" class="btn btn-primary btn-lg">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-info text-center cardB">
                                    <span style="font-weight:bold; font-size:20px;color:#fff">Select Product</span> 
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $row)
                                            <tr>
                                                <td>{{$row->code}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->category->name}}</td>
                                                <td>
                                                <img src="{{URL::to($row->photo)}}" alt="" style="height: 50px; width:50px">
                                                </td>
                                                <td>
                                                    <form action="{{route('addCart/purchase')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$row->id}}">
                                                        <input type="hidden" name="name" value="{{$row->name}}">
                                                        <input type="hidden" name="unit" value="{{$row->buyPrice}}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="description" value="{{$row->description}}">
                                                        <button class="badge badge-pill badge-success" style="padding: .rem; margin-left:5px;">Add Cart </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header card-header heading_h4 cardB">
                <h4 class="modal-title ">Add Supplier</h4>
                <button type="button" class="close heading_h4" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form_bg">
            <form action="{{route('store.supplier')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Name</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="sup_name">
                                    @error('sup_name')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Email</label><span class="span_star_message"> *</span>
                                    <input type="email" class="form-control" name="email">
                                    @error('email')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Type</label><span class="span_star_message"> *</span>
                                    <select name="type" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="Distributor">Distributor</option>
                                        <option value="Whole Sailer">Whole Sailer</option>
                                        <option value="Brochure">Brochure</option>
                                    </select>
                                    @error('type')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Phone</label><span class="span_star_message"> *</span>
                                    <input type="text" name="phone" class="form-control">
                                    @error('phone')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Company Name</label><span class="span_star_message"> *</span>
                                    <input type="text" name="shopName" class="form-control">
                                    @error('shopName')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="city">
                                    @error('city')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Photo</label><span class="span_star_message"> *</span>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label><span class="span_star_message"> *</span>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                                @error('address')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="text-right pt-3">
                                <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
            </div>
            
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
@endsection