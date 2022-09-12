@extends('backend.layout.app')

@section('content')

<div class="container">
        <div class="row pt-3">
            <div class="col-md-6 offset-3">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Add Supplier</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.brand')}}" class="btn btn-primary btn-sm">Show</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body form_bg">
                        <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Brand Name</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="brand_name">
                                    @error('brand_name')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Brand Description</label><span class="span_star_message"> *</span>
                                    <textarea name="brand_description" id="" cols="30" rows="3" class="form-control"></textarea>
                                    @error('brand_description')
                                        <span class="span_star_message">{{$message}}</span>
                                    @enderror
                                </div>
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