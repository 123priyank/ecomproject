<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sizes = Size::all();
        return view('admin.size.sizes', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.size.create_size');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'size' => 'required',

        ]);

        $add_size = new Size();

        $add_size->size = $request->size;
        $add_size->status =1;

        $add_size->save();

        return redirect()->route('size')->with('success', 'Size Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $size_edit = Size::find($id);


        return view('admin.size.edit_size', compact('size_edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update_size = Size::find($id);
        $update_size->size = $request->size;

        $update_size->update();

        return redirect()->route('size')->with('info', 'Size Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete_size = Size::find($id);

        $delete_size->delete();

        return redirect()->back()->with('danger', 'Size Delete Successfully');
    }

    public function status(Request $request, $status,$id)
    {
        $size_satus=Size::find($id);
        $size_satus->status=$status;
        $size_satus->save();

        return redirect()->route('size')->with('update','Size Status Update');
    }
}
