@extends('layouts.master')
@section('title')
    Product-Brand
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_brand')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Brand</button>
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
                <th>Brands</th>
                <th>Brand Image</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($product_brands as $product_brand )
                <tr>

                    <td>{{$product_brand->id}}</td>
                    <td>{{$product_brand->name}}</td>
                    <td><img src="{{asset('brand/'.$product_brand->image)}}" width="70px"></td>
                    <td>
                        @if($product_brand->status==1)
                            <a href="{{route('brand_status',['status'=>0,'id'=>$product_brand->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($product_brand->status==0)
                            <a href="{{route('brand_status',['status'=>1,'id'=>$product_brand->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('brand_edit',$product_brand->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('brand_delete',$product_brand->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

