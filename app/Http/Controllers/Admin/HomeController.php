<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
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
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('admin.home')->with([
            'BlogCategoriesCount' => \App\Models\BlogCategory::count(),
            'BlogPostsCount' => \App\Models\BlogPost::count(),
            'NewsletterCount' => \App\Models\Newsletter::count(),
            'ContactCount' => \App\Models\Contact::count(),
            'TotalPropertiesCount' => \App\Models\Property::count(),
            'RentPropertiesCount' => \App\Models\Property::where('purpose', 'rent')->count(),
            'SellPropertiesCount' => \App\Models\Property::where('purpose', 'sell')->count(),
            'TotalProjectsCount' => \App\Models\Project::count(),
            'TotalCitiesCount' => \App\Models\LocationCity::count(),
        ]);
    }
}
