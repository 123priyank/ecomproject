@extends('layouts.master')
@section('title')
    PRODUCT
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product-List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_product')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Product</button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('update'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" id="mytable">
            <thead style="background-color: #1d6fa5">
            <tr>
                <th>No</th>
                <th>Cate_id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($product_stores as $product_store)
                <tr>
                    <td>{{$product_store->id}}</td>
                    <td>{{$product_store->category->category_name}}</td>
                    <td>{{$product_store->name}}</td>
                    <td>{{$product_store->slug}}</td>
                    <td><img class="img-circle" src="{{asset('main_image/'.$product_store->image)}}"
                             style="height: 60px; width: 60px;"></td>

                    <td>

                        <a href="{{route('edit_product',$product_store->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('delete_product',$product_store->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection

