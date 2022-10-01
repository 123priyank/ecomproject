@extends('layouts.master')
@section('title')
    create-Banner
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Banner</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('store_banner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="btn_txt">Btn Text</label>
                            <input type="text" class="form-control" name="btn_txt" id="btn_txt" placeholder="">
                            @error('btn_txt')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="btn_link">Btn Link</label>
                            <input type="text" class="form-control" name="btn_link" id="btn_link" placeholder="">
                            @error('btn_link')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Banner Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                               placeholder="">
                        @error('image')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a  href="{{route('banner')}}" type="submit" class="btn btn-danger" >Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
