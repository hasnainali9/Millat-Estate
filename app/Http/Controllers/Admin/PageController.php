<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PageController extends Controller
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
        return view('admin.page.list')->with('pages', Page::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'title' => 'required|unique:pages|max:200',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/pages';
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

        $page = new Page;
        $page->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->image = $imageNameToStore;
        $page->is_active = true;

        if ($page->save()) {
            return redirect()->route('admin.page.index')->with('success', 'Page Create Successful');
        } else {
            return redirect()->back()->with('error', 'Page Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.page.show')->with('page', Page::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.page.edit')->with('page', Page::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
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
            $directoryPath = '/uploads/pages';
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

        $page = Page::where('slug', $slug)->first();
        $page->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        if ($request->hasFile('image')) {
            if (\File::exists(public_path($page->image))) {
                \File::delete(public_path($page->image));
            }
            $page->image = $imageNameToStore;
        }
        $page->is_active = ($request->input('is_active') == true) ? true : false;

        if ($page->save()) {
            return redirect()->route('admin.page.index')->with('success', 'Page Create Successful');
        } else {
            return redirect()->back()->with('error', 'Page Create Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page->delete()) {
            if (\File::exists(public_path($page->image))) {
                \File::delete(public_path($page->image));
            }
            return redirect()->route('admin.page.index')->with('success', 'Page Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Page Delete Failed');
        }
    }
}
