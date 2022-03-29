<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
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
        return view('admin.blog.category.list')->with(
            'categories',  BlogCategory::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.category.create');
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
            'name' => 'required|unique:blog_categories|max:200',
        ]);

        $category = new BlogCategory;
        $category->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $category->name = $request->input('name');
        $category->is_active = true;

        if ($category->save()) {
            return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category Create Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Category Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.blog.category.show')->with('category', BlogCategory::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.blog.category.edit')->with('category', BlogCategory::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);

        $category = BlogCategory::where('slug', $slug)->first();
        $category->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $category->name = $request->input('name');
        $category->is_active = ($request->input('is_active') == true) ? true : false;

        if ($category->save()) {
            return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category Update Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Category Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (BlogCategory::where('slug', $slug)->first()->delete()) {
            return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Category Delete Failed');
        }
    }
}
