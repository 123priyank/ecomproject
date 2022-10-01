@extends('layouts.master')
@section('title')
    Show-Customers
@endsection


@section('content')

    <div class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('customer')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Back</button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card  " style="background-color:beige;">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table class="table" id="mytable">
                    <tbody>
                    <tr>
                        <td><strong>No</strong></td>
                        <td>{{$show_customers->id}}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{$show_customers->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{$show_customers->email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Mobile</strong></td>
                        <td>{{$show_customers->mobile}}</td>
                    </tr>
                    <tr>
                        <td><strong>Password</strong></td>
                        <td>{{$show_customers->password}}</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>{{$show_customers->address}}</td>
                    </tr>

                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{$show_customers->city}}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{$show_customers->state}}</td>
                    </tr>
                    <tr>
                        <td><strong>Zip code</strong></td>
                        <td>{{$show_customers->zip}}</td>
                    </tr>
                    <tr>
                        <td><strong>Company</strong></td>
                        <td>{{$show_customers->company}}</td>
                    </tr>

                    <tr>
                        <td><strong>Gst</strong></td>
                        <td>{{$show_customers->gstin}}</td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>{{$show_customers->status}}</td>
                    </tr>
                    <tr>
                        <td><strong>Created_At</strong></td>
                        <td>{{\Carbon\Carbon::parse($show_customers->created_at)->format('d-m-Y h:i:s')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated_At</strong></td>
                        <td>{{\Carbon\Carbon::parse($show_customers->updated_at)->format('d-m-Y h:i:s')}}</td>
                    </tr>
                    </tbody>



                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
