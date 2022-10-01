@extends('layouts.master')
@section('title')
    Add Coupon
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Coupon</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('store_coupon')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="">
                            @error('title')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="">
                            @error('code')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" name="value" id="value" placeholder="">
                            @error('value')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="min_order_amt">Min Order Amt</label>
                            <input type="text" class="form-control" name="min_order_amt" id="min_order_amt"
                                   placeholder="">
                            @error('value')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="type">type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="1">value</option>
                                <option value="0">per</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="is_one_time">One Time</label>
                            <select class="form-control" name="is_one_time" id="is_one_time">
                                <option value="1">yes</option>
                                <option value="0">no</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-  " style="background-color:#c56b1f">Save</button>
                        <a href="{{route('coupon')}}" type="submit" class="btn btn-danger">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
