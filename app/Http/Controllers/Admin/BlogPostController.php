<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BlogPostController extends Controller
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
        return view('admin.blog.post.list')->with('posts', BlogPost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.post.create')->with('categories', \App\Models\BlogCategory::pluck('name', 'id'));
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
            'title' => 'required|unique:blog_posts|max:200',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/blog_posts';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'image-'.(date("Ymd").time()).'.'.$imageExt;
            $imageNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
        }

        $post = new BlogPost;
        $post->category_id = $request->input('category_id');
        $post->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = $imageNameToStore;
        $post->tags = $request->input('tags');
        $post->is_active = true;

        if ($post->save()) {
            return redirect()->route('admin.blog.post.index')->with('success', 'Blog Post Create Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Post Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.blog.post.show')->with('post', BlogPost::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.blog.post.edit')->with([
            'categories' => \App\Models\BlogCategory::pluck('name', 'id'),
            'post' => BlogPost::where('slug', $slug)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required|min:10',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/blog_posts';
            $destinationPath = public_path($directoryPath); // Set File Destination
            // Create Directory If Not Exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 755, true);
            }
            $imageName = 'image-'.(date("Ymd").time()).'.'.$imageExt;
            $imageNameToStore = $directoryPath.'/'.$imageName;
            // Resize And Save Image
            Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
        }


        $post = BlogPost::where('slug', $slug)->first();
        $post->category_id = $request->input('category_id');
        $post->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        if ($request->hasFile('image')) {
            if (\File::exists(public_path($post->image))) {
                \File::delete(public_path($post->image));
            }
            $post->image = $imageNameToStore;
        }
        $post->tags = $request->input('tags');
        $post->is_active = ($request->input('is_active') == true) ? true : false;

        if ($post->save()) {
            return redirect()->route('admin.blog.post.index')->with('success', 'Blog Post Create Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Post Create Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        if ($post->delete()) {
            if (\File::exists(public_path($post->image))) {
                \File::delete(public_path($post->image));
            }
            return redirect()->route('admin.blog.post.index')->with('success', 'Blog Post Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Blog Post Delete Failed');
        }
    }
}
