@extends('layouts.master')
@section('title')
  Customers-list
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Manage Customer</h1>
                </div><!-- /.col -->
{{--                <div class="col-sm-6">--}}
{{--                    <a href="{{route('create_size')}}">--}}
{{--                        <button type="button" class="btn  btn-outline-success float-right">Add Size</button>--}}
{{--                    </a>--}}
{{--                </div><!-- /.col -->--}}
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
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($customer_lists as $customer_list)
                <tr>
                    <td>{{$customer_list->id}}</td>
                    <td>{{$customer_list->name}}</td>
                    <td>{{$customer_list->email}}</td>
                    <td>{{$customer_list->mobile}}</td>
                    <td>{{$customer_list->city}}</td>
                    <td>
                        @if($customer_list->status==1)
                            <a href="{{route('customer_status',['status'=>0,'id'=>$customer_list->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($customer_list->status==0)
                            <a href="{{route('customer_status',['status' => 1,'id'=>$customer_list->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('show_customer',$customer_list->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-eye"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
