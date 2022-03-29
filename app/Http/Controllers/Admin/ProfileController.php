<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.profile')->with('admin', Admin::find($id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
        ]);

        $admin = Admin::find($id)->first();

        if ($request->input('password') != null) {
            $request->validate([
                'old_password' => 'required|string|min:8',
                'password' => 'required|string|min:8|confirmed'
            ]);

            if (!Hash::check($request->input('old_password'), $admin->password)) {
                return back()->with('error', 'Old Password Not Matched');
            }

            $admin->password = Hash::make($request->input('password'));
        }

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($admin->save()) {
            return redirect()->route('admin.home')->with('success', 'Profile Successfully');
        } else {
            return back()->with('error', 'Failed To Change Password');
        }
    }
}
