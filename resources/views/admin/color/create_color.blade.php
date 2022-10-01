@extends('layouts.master')
@section('title')
    create-Color
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Color</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('store_color')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" name="color" id="color" placeholder="">
                            @error('color')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a  href="{{route('color')}}" type="submit" class="btn btn-danger" >Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
