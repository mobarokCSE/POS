@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Update Supplier Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-primary btn-sm">All Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.supplier',$editSupplier->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Name</label>
                                    <input type="text" class="form-control" name="sup_name" value="{{$editSupplier->sup_name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$editSupplier->email}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Type</label>
                                    <select name="type" class="form-control">
                                        <option value="Distributor" {{($editSupplier->type) == 'Distributor' ? 'selected': '' }}>Distributor</option>
                                        <option value="Whole Sailer" {{($editSupplier->type) == 'Whole Sailer' ? 'selected': '' }}>Whole Sailer</option>
                                        <option value="Brochure" {{($editSupplier->type) == 'Brochure' ? 'selected': '' }}>Brochure</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Supplier Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$editSupplier->phone}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Company Name</label>
                                    <input type="text" name="shopName" class="form-control" value="{{$editSupplier->shopName}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$editSupplier->city}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editSupplier->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control"> {{$editSupplier->address}}</textarea>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection