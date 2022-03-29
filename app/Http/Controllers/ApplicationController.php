<?php

namespace App\Http\Controllers;

use App\Models\LocationCity;
use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Category;

class ApplicationController extends Controller
{
    public function index ()
    {
        return view('frontend.home');
    }

    public function about ()
    {
        return view('frontend.about');
    }

    public function contact ()
    {
        return view('frontend.contact');
    }

    public function search(Request $request)
    {
        $type = $request->input('type');
        $category_id = $request->input('category_id');
        $bedrooms = $request->input('bedrooms');
        $bathrooms = $request->input('bathrooms');

        if ($type == 'buy')  $type = 'sell';

        return view('frontend.properties')->with(
            'properties', Property::where('purpose', $type)
                ->orWhere('category_id', $category_id)
                ->orWhere('bedrooms', $bedrooms)
                ->orWhere('bathrooms', $bathrooms)
                ->where('is_active', 1)
                ->get());
    }

    public function search_by_city ($slug)
    {
        $city_id = LocationCity::where('slug', $slug)->pluck('id')->first();
        return view('frontend.properties')->with('properties', Property::where('city_id', $city_id)->get());
    }



    public function ShowCategory($cat){
        if(!Category::where('slug',$cat)->first()){
            abort(404);
        }
        $category_id=Category::where('slug',$cat)->first()->id;
        return view('frontend.properties')->with('properties', Property::where('category_id', $category_id)->get());
    }

    public function property ($type)
    {
        if ($type == 'buy')  $type = 'sell';

        return view('frontend.properties')->with('properties', Property::where('purpose', $type)->where('is_active', 1)->get());
    }

    public function property_detail ($slug)
    {
        return view('frontend.property_detail')->with('property', Property::where('slug', $slug)->first());
    }

    public function invest ()
    {
        return view('frontend.projects')->with('projects', Project::all());
    }

    public function invest_detail ($slug)
    {
        return view('frontend.invest_detail')->with('project', Project::where('slug', $slug)->first());
    }

    public function blog ()
    {
        return view('frontend.blog')->with([
            'categories' => \App\Models\BlogCategory::where('is_active', 1)->get(),
            'posts' => \App\Models\BlogPost::where('is_active', 1)->get()
        ]);
    }

    public function post ($slug)
    {
        return view('frontend.post_detail')->with('post', \App\Models\BlogPost::where('slug', $slug)->first());
    }

    public function page ($slug)
    {
        return view('frontend.page_detail')->with('page', \App\Models\Page::where('slug', $slug)->first());
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newsletters|email',
        ]);

        $newsletter = new \App\Models\Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->is_active = true;

        if ($newsletter->save()) {
            return redirect()->back()->with('success', 'Email Saved Successful!');
        } else {
            return redirect()->back()->with('error', 'Email Saved Failed!');
        }
    }

    public function contact_store (Request $request)
    {
        $request->validate([
            'name' => 'required|max:200|string',
            'email' => 'required|max:255|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $contact = new \App\Models\Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');

        if ($contact->save()) {
            return redirect()->back()->with('success', 'Message Send Successful!');
        } else {
            return redirect()->back()->with('error', 'Message Send Failed!');
        }
    }
}
