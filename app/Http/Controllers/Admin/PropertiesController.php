<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PropertiesController extends Controller
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
        return view('admin.property.list')->with('properties', Property::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create')->with([
            'cities' => \App\Models\LocationCity::pluck('name', 'id'),
            'states' => \App\Models\LocationState::pluck('name', 'id'),
            'categories' => \App\Models\Category::pluck('name', 'id'),
        ]);
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
            'address' => 'required|max:255',
            'price' => 'required|numeric',
            'details' => 'required|min:10',
            'map_location' => 'required',
        ]);

        $imagesNameArray = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imageExt = $image->getClientOriginalExtension();
                $directoryPath = '/uploads/properties';
                $destinationPath = public_path($directoryPath); // Set File Destination
                // Create Directory If Not Exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 755, true);
                }
                $imageName = 'image-'.$key.(date("Ymd").time()).'.'.$imageExt;
                $imagesNameArray[] = $directoryPath.'/'.$imageName;
                // Resize And Save Image
                Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);
            }
            $imagesNameToStore = implode(",", $imagesNameArray);
        }

        $property = new Property;
        $property->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $property->title = $request->input('title');
        $property->city_id = $request->input('city_id');
        $property->state_id = $request->input('state_id');
        $property->address = $request->input('address');
        $property->area = $request->input('area');
        $property->area_type = $request->input('area_type');
        $property->price = $request->input('price');
        $property->details = $request->input('details');
        $property->map_location = $request->input('map_location');
        $property->purpose = $request->input('purpose');
        $property->category_id = $request->input('category_id');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->kitchens = $request->input('kitchens');
        $property->images = $imagesNameToStore;
        $property->electricity = ($request->input('electricity') == true) ? true : false;
        $property->water_supply = ($request->input('water_supply') == true) ? true : false;
        $property->sui_gas = ($request->input('sui_gas') == true) ? true : false;
        $property->is_active = true;

        if ($property->save()) {
            return redirect()->route('admin.properties.index')->with('success', 'Property Create Successful');
        } else {
            return redirect()->back()->with('error', 'Property Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.property.show')->with('property', Property::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.property.edit')->with([
            'property' => Property::where('slug', $slug)->first(),
            'cities' => \App\Models\LocationCity::pluck('name', 'id'),
            'states' => \App\Models\LocationState::pluck('name', 'id'),
            'categories' => \App\Models\Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|unique:blog_posts|max:200',
            'address' => 'required|max:255',
            'price' => 'required|numeric',
            'details' => 'required|min:10',
            'map_location' => 'required',
        ]);

        $imagesNameToStore = null;
        if ($request->hasFile('images')) {
            $imagesNameArray = [];
            foreach ($request->file('images') as $key => $image) {
                $imageExt = $image->getClientOriginalExtension();
                $directoryPath = '/uploads/properties';
                $destinationPath = public_path($directoryPath); // Set File Destination
                $imageName = 'property-'.$key.(date("Ymd").time()).'.'.$imageExt;
                if ($key == 0) {
                    $imagesNameArray[$key] = $directoryPath.'/'.$imageName;
                } else {
                    $imagesNameArray[$key] = ', '.$directoryPath.'/'.$imageName;
                }
                // Create Directory If Not Exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 755, true);
                }
                // Resize And Save Image
                Image::make($image->getRealPath())->resize(640, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);
            }
            $imagesNameToStore = implode(",", $imagesNameArray);
        }

        $property = Property::where('slug', $slug)->first();
        $property->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $property->title = $request->input('title');
        $property->city_id = $request->input('city_id');
        $property->state_id = $request->input('state_id');
        $property->address = $request->input('address');
        $property->area = $request->input('area');
        $property->area_type = $request->input('area_type');
        $property->price = $request->input('price');
        $property->details = $request->input('details');
        $property->map_location = $request->input('map_location');
        $property->purpose = $request->input('purpose');
        $property->category_id = $request->input('category_id');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->kitchens = $request->input('kitchens');
        if ($request->hasFile('images'))
            $property->images = $imagesNameToStore;
        $property->electricity = ($request->input('electricity') == true) ? true : false;
        $property->water_supply = ($request->input('water_supply') == true) ? true : false;
        $property->sui_gas = ($request->input('sui_gas') == true) ? true : false;
        $property->is_active = ($request->input('is_active') == true) ? true : false;

        if ($property->save()) {
            return redirect()->route('admin.properties.index')->with('success', 'Property Update Successful');
        } else {
            return redirect()->back()->with('error', 'Property Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
