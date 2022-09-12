@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB" >
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Add Expense</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('daily.expense')}}" class="btn btn-primary btn-sm">Daily Expense</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body form_bg">
                        <form action="{{route('store.expense')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Details</label><span class="span_star_message"> *</span>
                                <textarea name="detail" id="" cols="30" rows="3" class="form-control" placeholder="Here Entry Details to expense the purchase.....">{{old('detail')}}</textarea>
                                @error('detail')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label><span class="span_star_message"> *</span>
                                <input type="number" class="form-control" name="amount" placeholder="Enter Amount" value="{{old('amount')}}">
                                @error('amount')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                                <input type="hidden" name="date" value="{{date('d/m/y')}}">
                                <input type="hidden" name="month" value="{{date('F')}}">
                                <input type="hidden" name="year" value="{{date('Y')}}">
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