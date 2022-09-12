@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Add Employee</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.employee')}}" class="btn btn-primary btn-sm">Show</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body form_bg">
                        <form action="{{route('store.employee')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label><span class="span_star_message"> *</span>
                                <input type="text" class="form-control" name="name" placeholder="Enter Full name" value="{{old('name')}}">
                            @error('name')
                                <span class="span_star_message">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label><span class="span_star_message"> *</span>
                                    <input type="email" class="form-control" name="email" placeholder="example12@gmail.com" value="{{old('email')}}">
                                @error('email')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label><span class="span_star_message"> *</span>
                                    <input type="text" name="phone" class="form-control" placeholder="017*********" value="{{old('phone')}}">
                                @error('phone')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">NID No</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="nid" placeholder="Enter NID number" value="{{old('nid')}}">
                                @error('nid')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Salary</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="salary" placeholder="Enter Salary" value="{{old('salary')}}">
                                @error('salary')
                                <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label><span class="span_star_message"> *</span>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control" placeholder="Enter Your Parmanent Address">{{old('address')}}</textarea>
                            @error('address')
                                <span class="span_star_message">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection