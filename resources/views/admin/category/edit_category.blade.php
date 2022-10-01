@extends('layouts.master')
@section('title')
    Manage Category
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('category')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Back</button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card " style="background-color:beige;">
            <div class="card-header">
                <b>Edit Category</b>
            </div>
            <div class="card-body">
                <form action="{{route('category_update',$cat_edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"
                                   value="{{$cat_edit->category_name}}" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_slug">Category Slug</label>
                            <input type="text" class="form-control" name="category_slug" id="category_slug"
                                   value="{{$cat_edit->category_slug}}" placeholder="">

                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="parents_category_id" id="parents_category_id">
                                <option>Select Category</option>

                                @foreach($edit_category as $cat)
                                    <option value="{{$cat->id}}" {{$cat_edit->parents_category_id == $cat->id  ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_image">Category Image</label>
                            <input type="file" class="form-control" name="category_image" id="category_image"
                                   placeholder="">
                            <img src="{{asset('category/'.$cat_edit->category_image)}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
