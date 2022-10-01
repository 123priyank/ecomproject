@extends('layouts.master')
@section('title')
    Coupon
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Manage Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_coupon')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Coupon</button>
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
                <th>Title</th>
                <th>Code</th>
                <th>value</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($coupon_lists as $coupon_list)
                <tr>
                    <td>{{$coupon_list->id}}</td>
                    <td>{{$coupon_list->title}}</td>
                    <td>{{$coupon_list->code}}</td>
                    <td>{{$coupon_list->value}}</td>
                    <td>
                        @if($coupon_list->status==1)
                            <a href="{{route('coupon_status',['status'=>0,'id'=>$coupon_list->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($coupon_list->status==0)
                            <a href="{{route('coupon_status',['status' => 1,'id'=>$coupon_list->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('coupon_edit',$coupon_list->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('coupon_edit',$coupon_list->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
