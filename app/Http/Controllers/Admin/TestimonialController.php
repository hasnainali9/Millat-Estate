<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class TestimonialController extends Controller
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
        return view('admin.testimonial.list')->with('testimonials', Testimonial::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required|max:200',
            'review' => 'required|min:10|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/testimonials';
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

        $testimonial = new Testimonial;
        $testimonial->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $testimonial->name = $request->input('name');
        $testimonial->review = $request->input('review');
        $testimonial->rating = $request->input('rating');
        $testimonial->image = $imageNameToStore;
        $testimonial->is_active = true;

        if ($testimonial->save()) {
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Create Successful');
        } else {
            return redirect()->back()->with('error', 'Testimonial Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.testimonial.show')->with('testimonial', Testimonial::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.testimonial.edit')->with('testimonial', Testimonial::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:200',
            'review' => 'required|min:10',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/testimonials';
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

        $testimonial = Testimonial::where('slug', $slug)->first();
        $testimonial->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $testimonial->name = $request->input('name');
        $testimonial->review = $request->input('review');
        $testimonial->rating = $request->input('rating');
        if ($request->hasFile('image')) {
            if (\File::exists(public_path($testimonial->image))) {
                \File::delete(public_path($testimonial->image));
            }
            $testimonial->image = $imageNameToStore;
        }
        $testimonial->is_active = ($request->input('is_active') == true) ? true : false;

        if ($testimonial->save()) {
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Create Successful');
        } else {
            return redirect()->back()->with('error', 'Testimonial Create Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $testimonial = Testimonial::where('slug', $slug)->first();
        if ($testimonial->delete()) {
            if (\File::exists(public_path($testimonial->image))) {
                \File::delete(public_path($testimonial->image));
            }
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Testimonial Delete Failed');
        }
    }
}
