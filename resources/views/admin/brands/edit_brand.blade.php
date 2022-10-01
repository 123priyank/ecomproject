@extends('layouts.master')
@section('title')
    Edit Brand
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Brand</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('brand_update',$brand_edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Brand</label>
                            <input type="text" class="form-control" name="name" id="brand_name"  value="{{$brand_edit->name}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Code</label>
                            <input type="file" class="form-control" name="image" id="image" >
                            <img src="{{asset('brand/'.$brand_edit->image)}}" width="70px">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Update</button>
                    <a  href="{{route('brands')}}" type="submit" class="btn btn-danger" >Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
