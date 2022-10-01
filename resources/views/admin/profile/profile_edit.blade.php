@extends('layouts.master')
@section('title')
    Profile
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Edit User Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('profile')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Back</button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card " style="background-color:beige;">
            <div class="card-header">
                <b>Edit Category</b>
            </div>
            <div class="card-body">
                <form action="{{route('upadet_profile',$edit_users->id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_name">User Name</label>
                            <input type="text" class="form-control" name="name" id="category_name"
                                   value="{{$edit_users->name}}"
                                   placeholder="">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_name">User Role</label>
                            <select class="form-control" name="usertype" id="usertype" Selected>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>


                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
