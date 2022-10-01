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

        <div class="card  " style="background-color:beige;">
            <div class="card-header">
                <b>Add Category</b>
            </div>
            <div class="card-body">
                <form action="{{route('category_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"
                                   placeholder="">
                            @error('category_name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_name">Category Name</label>
                            <select class="form-control" name="parents_category_id" id="parents_category_id">
                                <option>Select Category</option>
                                @foreach($cat as $c)
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_slug">Category Slug</label>
                            <input type="text" class="form-control" name="category_slug" id="category_slug"
                                   placeholder="">
                            @error('category_slug')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_image">Category Image</label>
                            <input type="file" class="form-control" name="category_image" id="category_image"
                                   placeholder="">
                            @error('category_slug')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
