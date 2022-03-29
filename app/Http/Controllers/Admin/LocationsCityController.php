<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationCity;
use App\Models\LocationState;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class LocationsCityController extends Controller
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
        return view('admin.location.city.list')->with('cities', LocationCity::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.city.create')->with('states', LocationState::pluck('name', 'id'));
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
            'name' => 'required|unique:location_cities|max:200',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/locations/cities';
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

        $city = new LocationCity;
        $city->state_id = $request->input('state_id');
        $city->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $city->name = $request->input('name');
        $city->image = $imageNameToStore;
        $city->is_active = true;

        if ($city->save()) {
            return redirect()->route('admin.locations.city.index')->with('success', 'City Create Successful');
        } else {
            return redirect()->back()->with('error', 'City Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationCity  $LocationCity
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.location.city.show')->with('city', LocationCity::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationCity  $LocationCity
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.location.city.edit')->with([
            'city' => LocationCity::where('slug', $slug)->first(),
            'states' => LocationState::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationCity  $LocationCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/locations/cities';
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

        $city = LocationCity::where('slug', $slug)->first();
        $city->state_id = $request->input('state_id');
        $city->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $city->name = $request->input('name');
        if ($request->hasFile('image')) {
            if (\File::exists(public_path($city->image))) {
                \File::delete(public_path($city->image));
            }
            $city->image = $imageNameToStore;
        }
        $city->is_active = ($request->input('is_active') == true) ? true : false;

        if ($city->save()) {
            return redirect()->route('admin.locations.city.index')->with('success', 'State Update Successful');
        } else {
            return redirect()->back()->with('error', 'State Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationCity  $LocationCity
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $city = LocationCity::where('slug', $slug)->first();
        if ($city->delete()) {
            if (\File::exists(public_path($city->image))) {
                \File::delete(public_path($city->image));
            }
            return redirect()->route('admin.locations.city.index')->with('success', 'State Delete Successful');
        } else {
            return redirect()->back()->with('error', 'State Delete Failed');
        }
    }
}
