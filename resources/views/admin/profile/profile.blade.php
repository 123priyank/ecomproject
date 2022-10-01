@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users Profile</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @if ($message = Session::get('update'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" id="datatable">
            <thead style="background-color: #1d6fa5">
            <tr>

                <th>User Name</th>
                <th>User Email</th>
                <th>User Role</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>


                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->usertype}}</td>
                    <td>
                        <a href="{{route('edit_profile',$user->id)}}" type="button" class="btn btn-primary"><i
                                class="fas fa-pen-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

