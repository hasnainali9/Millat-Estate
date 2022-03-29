<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.list')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:200',
            'type' => 'required',
        ]);

        $category = new Category;
        $category->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $category->name = $request->input('name');
        $category->type = $request->input('type');
        $category->is_active = true;

        if ($category->save()) {
            return redirect()->route('admin.property.category.index')->with('success', 'Category Create Successful');
        } else {
            return redirect()->back()->with('error', 'Category Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.category.show')->with('category', Category::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.category.edit')->with('category', Category::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:200',
            'type' => 'required',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $category->name = $request->input('name');
        $category->type = $request->input('type');
        $category->is_active = ($request->input('is_active') == true) ? true : false;

        if ($category->save()) {
            return redirect()->route('admin.property.category.index')->with('success', 'Category Update Successful');
        } else {
            return redirect()->back()->with('error', 'Category Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (category::where('slug', $slug)->first()->delete()) {
            return redirect()->route('admin.property.category.index')->with('success', 'Category Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Category Delete Failed');
        }
    }
}
