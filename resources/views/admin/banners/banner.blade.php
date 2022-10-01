@extends('layouts.master')
@section('title')
    Banner-page
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Manage Banners</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_banner')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Banner</button>
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
                <th>Image</th>
                <th>Btn Text</th>
                <th>Btn Link</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{$banner->id}}</td>
                    <td><img src="{{asset('banner/'.$banner->image)}}" width="60" height="60"></td>
                    <td>{{$banner->btn_txt}}</td>
                    <td>{{$banner->btn_link}}</td>
                    <td>
                        @if($banner->status==1)
                            <a href="{{route('banner_status',['status'=>0,'id'=>$banner->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($banner->status==0)
                            <a href="{{route('banner_status',['status' => 1,'id'=>$banner->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('banner_edit',$banner->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('banner_delete',$banner->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
