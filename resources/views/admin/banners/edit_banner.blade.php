@extends('layouts.master')
@section('title')
    Edit Banner
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Banner</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('banner_update',$banner_edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="btn_txt">Btn Text</label>
                            <input type="text" class="form-control" name="btn_txt" id="btn_txt"
                                   value="{{$banner_edit->btn_txt}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="btn_link">Btn Link</label>
                            <input type="text" class="form-control" name="btn_link" id="btn_link"
                                   value="{{$banner_edit->btn_link}}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                               >
                        <img src="{{asset('banner/'.$banner_edit->image)}}" width="60" height="60">
                    </div>
                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a href="{{route('banner')}}" type="submit" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
