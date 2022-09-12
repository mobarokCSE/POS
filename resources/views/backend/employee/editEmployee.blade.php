@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12 ">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Employee Update Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.employee')}}" class="btn btn-primary btn-sm">All Employee</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.employee',$editEmployee->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Employee Name</label>
                                <input type="text" class="form-control" value="{{$editEmployee->name}}" name="name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Employee Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$editEmployee->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Employee Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$editEmployee->phone}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">NID No</label>
                                    <input type="text" class="form-control" name="nid" value="{{$editEmployee->nid}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control" name="salary" value="{{$editEmployee->salary}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editEmployee->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control"> {{$editEmployee->address}}</textarea>
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