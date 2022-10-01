<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category()
    {
        //
        $cat=DB::table('categories')->where(['status'=>1])->get();
        return view('admin.category.manage_category',compact('cat'));

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
            'category_name' => 'required',
            'category_slug' => 'unique:categories'
        ]);

        $cat = new Category;

        $cat->category_name = $request->category_name;
        $cat->parents_category_id = $request->parents_category_id;

        if ($request->hasFile("category_image")) {
            $file = $request->file("category_image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('category'), $filename);
            $cat['category_image'] = $filename;
        }

        $cat->category_slug = Str::Slug($cat->category_name, '-');
        $cat->status =1;

        $cat->save();

        return redirect()->route('category')->with('success', 'Category Add Successfully');
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


        $cat_edit = Category::find($id);

        $edit_category = Category::all();

        return view('admin.category.edit_category', compact('cat_edit','edit_category'));

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
        $update_category = Category::find($id);
        $update_category->category_name = $request->category_name;
        $update_category->parents_category_id = $request->parents_category_id;

        if ($request->hasFile("category_image")) {
            $file = $request->file("category_image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('category'), $filename);
            $update_category['category_image'] = $filename;
        }

        $update_category->category_slug = $request->category_slug;
        $update_category->update();

        return redirect()->route('category')->with('info', 'Category Update Successfully');
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
        $delete_category = Category::find($id);

        $delete_category->delete();

        return redirect()->back()->with('danger', 'Category Delete Successfully');
    }

    public function status(Request $request, $status,$id)
    {
        $change_satus=Category::find($id);
        $change_satus->status=$status;
        $change_satus->save();

        return redirect()->route('category')->with('update','Category Status Update');
    }
}
