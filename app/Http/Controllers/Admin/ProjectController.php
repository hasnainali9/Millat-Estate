<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ProjectController extends Controller
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
        return view('admin.project.list')->with('projects', Project::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create')->with([
            'cities' => \App\Models\LocationCity::pluck('name', 'id'),
            'states' => \App\Models\LocationState::pluck('name', 'id'),
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
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'details' => 'required|min:10',
            'map_location' => 'required',
        ]);

        $imagesNameArray = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imageExt = $image->getClientOriginalExtension();
                $directoryPath = '/uploads/projects';
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


        $project = new Project;
        $project->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $project->title = $request->input('title');
        $project->city_id = $request->input('city_id');
        $project->state_id = $request->input('state_id');
        $project->address = $request->input('address');
        $project->price_from = $request->input('price_from');
        $project->price_to = $request->input('price_to');
        $project->details = $request->input('details');
        $project->map_location = $request->input('map_location');
        $project->images = $imagesNameToStore;
        $project->parking = ($request->input('parking') == true) ? true : false;
        $project->electricity = ($request->input('electricity') == true) ? true : false;
        $project->water_supply = ($request->input('water_supply') == true) ? true : false;
        $project->sui_gas = ($request->input('sui_gas') == true) ? true : false;
        $project->mosque = ($request->input('mosque') == true) ? true : false;
        $project->swimming_pool = ($request->input('swimming_pool') == true) ? true : false;
        $project->school = ($request->input('school') == true) ? true : false;
        $project->hospital = ($request->input('hospital') == true) ? true : false;
        $project->shopping_mall = ($request->input('shopping_mall') == true) ? true : false;
        $project->restaurant = ($request->input('restaurant') == true) ? true : false;
        $project->public_transport = ($request->input('public_transport') == true) ? true : false;
        $project->security = ($request->input('security') == true) ? true : false;
        $project->is_active = true;

        if ($project->save()) {
            return redirect()->route('admin.property.project.index')->with('success', 'Project Create Successful');
        } else {
            return redirect()->back()->with('error', 'Project Create Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.project.show')->with('project', Project::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.project.edit')->with([
            'project' => Project::where('slug', $slug)->first(),
            'cities' => \App\Models\LocationCity::pluck('name', 'id'),
            'states' => \App\Models\LocationState::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|unique:blog_posts|max:200',
            'address' => 'required|max:255',
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'details' => 'required|min:10',
            'map_location' => 'required',
        ]);

        $imagesNameArray = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imageExt = $image->getClientOriginalExtension();
                $directoryPath = '/uploads/projects';
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
            implode(",", $imagesNameArray);
        }

        $project = Project::where('slug', $slug)->first();
        $project->slug = Str::slug($request->input('title'), '-').'-'.(date("Ymd").time());;
        $project->title = $request->input('title');
        $project->city_id = $request->input('city_id');
        $project->state_id = $request->input('state_id');
        $project->address = $request->input('address');
        $project->price_from = $request->input('price_from');
        $project->price_to = $request->input('price_to');
        $project->details = $request->input('details');
        $project->map_location = $request->input('map_location');
        if ($request->hasFile('images'))
            $project->images = $imagesNameArray;
        $project->parking = ($request->input('parking') == true) ? true : false;
        $project->electricity = ($request->input('electricity') == true) ? true : false;
        $project->water_supply = ($request->input('water_supply') == true) ? true : false;
        $project->sui_gas = ($request->input('sui_gas') == true) ? true : false;
        $project->mosque = ($request->input('mosque') == true) ? true : false;
        $project->swimming_pool = ($request->input('swimming_pool') == true) ? true : false;
        $project->school = ($request->input('school') == true) ? true : false;
        $project->hospital = ($request->input('hospital') == true) ? true : false;
        $project->shopping_mall = ($request->input('shopping_mall') == true) ? true : false;
        $project->restaurant = ($request->input('restaurant') == true) ? true : false;
        $project->public_transport = ($request->input('public_transport') == true) ? true : false;
        $project->security = ($request->input('security') == true) ? true : false;
        $project->is_active = ($request->input('is_active') == true) ? true : false;

        if ($project->save()) {
            return redirect()->route('admin.property.project.index')->with('success', 'Project Update Successful');
        } else {
            return redirect()->back()->with('error', 'Project Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
