@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Add Supplier</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-primary btn-sm">Show</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body form_bg">
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
            </div>
        </div>
    </div>
@endsection