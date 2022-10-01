@extends('layouts.master')
@section('title')
    Create-Size
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Size</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('store_size')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="size">Size</label>
                            <input type="text" class="form-control" name="size" id="size" placeholder="">
                            @error('size')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a href="{{route('size')}}" type="submit" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
