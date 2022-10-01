@extends('layouts.master')
@section('title')
    Size-page
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Manage Sizes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_size')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Size</button>
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
                <th>Size</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td>{{$size->id}}</td>
                    <td>{{$size->size}}</td>
                    <td>
                        @if($size->status==1)
                            <a href="{{route('size_status',['status'=>0,'id'=>$size->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($size->status==0)
                            <a href="{{route('size_status',['status' => 1,'id'=>$size->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('size_edit',$size->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('size_edit',$size->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
