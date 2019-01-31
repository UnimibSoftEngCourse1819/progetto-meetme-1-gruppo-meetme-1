<?php

namespace App\Http\Controllers;

use App\Email;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()//non uso la edit?
    {
        $user_id = Auth::id();

        $emails = Email::all()->where('user_id', $user_id);
        return view('settings', compact('emails'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    	$data = $this->validate(request(), [
    		'first_name' => 'required',
    		'last_name' => 'required',
            'oldPassword' => 'required_with:password',
            'password' => 'nullable|required_with:oldPassword|confirmed|min:6',
    	]);

        if (request()->has('oldPassword')) {
            if (Hash::check(request('oldPassword'), $request->user()->password)) {
                request()->user()->password = bcrypt(request('password'));
            }
        }

        request()->user()->update(request()->only('first_name', 'last_name'));
        return back();
    }

}
