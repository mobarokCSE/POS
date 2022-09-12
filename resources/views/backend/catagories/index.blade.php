@extends('backend.layout.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category List</li>
    </ol>
</nav>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView cardB">
            <div class="row">
                <h4 class="col-md-6 heading_h4">All Categorey List</h4>
                <div class="col-md-6">
                    <a href="{{route('create.category')}}" class="btn btn-light btn-sm float-right"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216)">
                    <tr>
                        <th>Sr</th>
                        <th>category_id</th>
                        <th>cat_name</th>
                        <th>image</th>
                        <th>is_menu</th>
                        <th>is_active</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{optional($row->category)->name}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{{URL::to($row->image)}}" class="pic" alt="">
                            </td>
                            <td>{{$row->is_menu}}</td>
                            <td>{{$row->is_active}}</td>
                            
                            <td>
                                <a href="#" data-href="{{$row->id}}" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "DELETE" below if you are delete this Data.
            <form action="{{route('delete.category')}}" method="POST">
                @csrf
                <input type="hidden" id="input" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection