@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Update Product</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.product')}}" class="btn btn-primary btn-sm">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body form_bg">
                        <form action="{{route('update.product',$editProduct->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{$editProduct->name}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Product Code</label>
                                    <input type="text" name="code" class="form-control" value="{{$editProduct->code}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Suppier Name</label>
                                    <select name="supplier_id" id="" class="form-control">
                                        @foreach ($supplier as $key=>$row)
                                        <option value="{{$key}}" {{$key ==  $editProduct->supplier_id ? "selected": ""}} >{{$row->sup_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Category Name</label>                        
                                    <select name="cat_id" id="" class="form-control">
                                        @foreach ($category as $key=>$name)
                                            <option value="{{$key}}" {{$key == $editProduct->cat_id ? "selected": ""}}>{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Buy Date</label>
                                    <input type="date" class="form-control" name="buyDate" value="{{$editProduct->buyDate}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Expire Date</label>
                                    <input type="date" class="form-control" name="expireDate" value="{{$editProduct->expireDate}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Buying Price</label>
                                    <input type="text" class="form-control" name="buyPrice" value="{{$editProduct->buyPrice}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Selling Price</label>
                                    <input type="text" class="form-control" name="selPrice" value="{{$editProduct->selPrice}}"">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editProduct->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$editProduct->description}}</textarea>
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