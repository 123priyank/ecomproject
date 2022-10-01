@extends('layouts.master')
@section('title')
    Color-page
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Manage Colors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_color')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Color</button>
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
                <th>Color</th>

                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($colors as $color)
                <tr>
                    <td>{{$color->id}}</td>
                    <td>{{$color->color}}</td>
                    <td>
                        @if($color->status==1)
                            <a href="{{route('color_status',['status'=>0,'id'=>$color->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($color->status==0)
                            <a href="{{route('color_status',['status' => 1,'id'=>$color->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('color_edit',$color->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('color_edit',$color->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
