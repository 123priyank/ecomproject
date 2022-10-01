@extends('layouts.master')
@section('title')
  Tax
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tax</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('create_tax')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Add Tax</button>
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
                <th>Tax Desc</th>
                <th>Tax Value</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($taxs_lists as $taxs_list )
                <tr>

                    <td>{{$taxs_list->id}}</td>
                    <td>{{$taxs_list->tax_desc}}</td>
                    <td>{{$taxs_list->tax_value}}</td>
                    <td>
                        @if($taxs_list->status==1)
                            <a href="{{route('tax_status',['status'=>0,'id'=>$taxs_list->id])}}" type="button" class="btn btn-success" style="padding-right:28px;text-align: center;">Active</a>
                        @elseif($taxs_list->status==0)
                            <a href="{{route('tax_status',['status'=>1,'id'=>$taxs_list->id])}}" type="button" class="btn btn-warning">Deactive</a>
                        @endif
                        <a href="{{route('tax_edit',$taxs_list->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="{{route('tax_delete',$taxs_list->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
