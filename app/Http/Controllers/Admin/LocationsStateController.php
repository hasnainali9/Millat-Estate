<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationState;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class LocationsStateController extends Controller
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
        return view('admin.location.state.list')->with('states', LocationState::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.state.create');
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
            'name' => 'required|unique:location_states|max:200',
        ]);

        $imageNameToStore = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,bmp,png,gif|max:2000',
            ]);
            $image = $request->file('image'); // Get File Name
            $imageExt = $image->getClientOriginalExtension();
            $directoryPath = '/uploads/locations/states';
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

        $state = new LocationState;
        $state->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $state->name = $request->input('name');
        $state->image = $imageNameToStore;
        $state->is_active = true;

        if ($state->save()) {
            return redirect()->route('admin.locations.state.index')->with('success', 'State Create Successful');
        } else {
            return redirect()->back()->with('error', 'State Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationState  $locationState
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.location.state.show')->with('state', LocationState::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationState  $locationState
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.location.state.edit')->with('state', LocationState::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationState  $locationState
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
            $directoryPath = '/uploads/locations/states';
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

        $state = LocationState::where('slug', $slug)->first();
        $state->slug = Str::slug($request->input('name'), '-').'-'.(date("Ymd").time());;
        $state->name = $request->input('name');
        if ($request->hasFile('image')) {
            if (\File::exists(public_path($state->image))) {
                \File::delete(public_path($state->image));
            }
            $state->image = $imageNameToStore;
        }
        $state->is_active = ($request->input('is_active') == true) ? true : false;

        if ($state->save()) {
            return redirect()->route('admin.locations.state.index')->with('success', 'State Update Successful');
        } else {
            return redirect()->back()->with('error', 'State Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationState  $locationState
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $state = LocationState::where('slug', $slug)->first();
        if ($state->delete()) {
            if (\File::exists(public_path($state->image))) {
                \File::delete(public_path($state->image));
            }
            return redirect()->route('admin.locations.state.index')->with('success', 'State Delete Successful');
        } else {
            return redirect()->back()->with('error', 'State Delete Failed');
        }
    }
}
