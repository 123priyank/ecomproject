<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $users = User::all();
        return view('admin.profile.profile', compact('users'));

    }

    public function edit_profile($id)
    {
        $edit_users = User::find($id);

        return view('admin.profile.profile_edit', compact('edit_users'));
    }

    public function update_profile(Request $request , $id)
    {
        $update_users = User::find($id);
        $update_users->name=$request->name;
        $update_users->usertype=$request->usertype;
        $update_users->update();

        return redirect()->route('profile')->with('update','User Role Update Successfully');
    }

}
