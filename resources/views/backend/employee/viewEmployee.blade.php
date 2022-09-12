@extends('backend.layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Employee Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.employee')}}" class="btn btn-primary btn-sm">All Employee</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <img src="{{URL::to($viewEmployee->photo)}}" alt="" style="height: 200px; width:200px; border-radius:4px">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->name}}</td>
                                    </tr>   
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>NID No</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->nid}}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <td>:</td>
                                        <td>{{$viewEmployee->salary}}</td>
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