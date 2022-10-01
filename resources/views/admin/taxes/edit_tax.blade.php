@extends('layouts.master')
@section('title')
    Edit Tax
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Tax</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('tax_update',$tax_edit->id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tax_value">Tax Value</label>
                            <input type="text" class="form-control" name="tax_value" id="tax_value"
                                   value="{{$tax_edit->tax_value}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tax_desc">Tax Desc</label>
                            <input type="text" class="form-control" name="tax_desc" id="tax_desc"
                                   value="{{$tax_edit->tax_desc}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-" style="background-color:#c56b1f">Save</button>
                    <a href="{{route('taxs')}}" type="submit" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
