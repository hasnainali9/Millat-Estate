<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewslettersController extends Controller
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
        return view('admin.newsletter.list')->with('newsletters', Newsletter::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create');
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
            'email' => 'required|unique:newsletters|email',
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->is_active = true;

        if ($newsletter->save()) {
            return redirect()->route('admin.newsletter.index')->with('success', 'Newsletter Create Successful');
        } else {
            return redirect()->back()->with('error', 'Newsletter Create Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Newsletter::where('id',$id)->first()->delete()) {
            return redirect()->route('admin.newsletter.index')->with('success', 'Newsletter Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Newsletter Delete Failed');
        }
    }
}
