@extends('layouts.master')
@section('title')
    Edit Coupon
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Coupon</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('coupon_update',$coupon_edit->id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   value="{{$coupon_edit->title}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code"
                                   value="{{$coupon_edit->code}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" name="value" id="value"
                                   value="{{$coupon_edit->value}}">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="min_order_amt">Min Order Amt</label>
                            <input type="text" class="form-control" name="min_order_amt" id="min_order_amt"
                                   placeholder="" value="{{$coupon_edit->min_order_amt}}">
                            @error('min_order_amt')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="type">type</label>
                            <select class="form-control" name="type" id="type">
                                @if($coupon_edit->type=='value')
                                    <option value="value" selected>value</option>
                                    <option value="per">per</option>
                                @else
                                    <option value="value">value</option>
                                    <option value="per" selected>per</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="is_one_time">One Time</label>
                            <select class="form-control" name="is_one_time" id="is_one_time">
                                @if($coupon_edit->is_one_time=='1')
                                    <option value="1" selected>yes</option>
                                    <option value="0">no</option>
                                @else
                                    <option value="1">yes</option>
                                    <option value="0" selected>no</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a href="{{route('coupon')}}" type="submit" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
