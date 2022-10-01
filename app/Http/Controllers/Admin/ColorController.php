<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::all();
        return view('admin.color.colors', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.color.create_color');

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
            'color' => 'required',

        ]);

        $add_color = new Color();

        $add_color->color = $request->color;

        $add_color->status = 1;

        $add_color->save();

        return redirect()->route('color')->with('success', 'Color Add Successfully');
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
        $color_edit = Color::find($id);


        return view('admin.color.edit_color', compact('color_edit'));

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
        $update_color = Color::find($id);
        $update_color->color = $request->color;
        $update_color->update();

        return redirect()->route('color')->with('info', 'Color Update Successfully');
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
        $delete_color = Color::find($id);

        $delete_color->delete();

        return redirect()->back()->with('danger', 'Color Delete Successfully');
    }

    public function status(Request $request, $status, $id)
    {
        $color_satus = Color::find($id);
        $color_satus->status = $status;
        $color_satus->save();

        return redirect()->route('color')->with('update', 'Color Status Update');
    }
}
