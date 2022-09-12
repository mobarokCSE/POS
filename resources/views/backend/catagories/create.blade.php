@extends('backend.layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h4">Add Category</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.category')}}" class="btn btn-primary btn-sm">All Category</a>
                            </div>
                        </div>                     
                    </div>
                    <div class="card-body form_bg">
                        <form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Parent Category</label><span class="span_star_message"> *</span>
                                <select name="category_id" class="form-control">
                                    <option value="">No parent category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach 
                                        
                                    </select>
                                @error('type')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Name</label><span class="span_star_message"> *</span>
                                <input type="text" class="form-control" name="cat_name">
                                @error('cat_name')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Photo</label><span class="span_star_message"> *</span>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Menu</label><span class="span_star_message"> *</span><br>
                                <label>
                                <input type="radio" name="is_menu" value="true" /> True
                                </label> 
                                <label>
                                <input type="radio" name="is_menu" value="false" /> False
                                </label>
                                @error('menu')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Active stuts</label><span class="span_star_message"> *</span><br>
                                <label>
                                <input type="radio" name="is_active" value="true" /> True
                                </label> 
                                <label>
                                <input type="radio" name="is_active" value="false" /> False
                                </label>
                                @error('active')
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