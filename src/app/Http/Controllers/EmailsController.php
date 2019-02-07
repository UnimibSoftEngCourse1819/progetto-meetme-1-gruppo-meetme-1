<?php

namespace App\Http\Controllers;

use App\Email;
use Auth;
use Illuminate\Http\Request;

class EmailsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email|unique:emails,email',
        ]);

        auth()->user()->emails()->create([
            'email' => request('email')
        ]);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $this->validate(request(), [
            'email' => 'required|email|unique:emails,email',
        ]);

        $email->update($request->only('email'));

        return back()->with('message', 'Email updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        if (request()->user()->emails()->count() == 1) {
            return redirect()->back()->withErrors('You need at least an email address in your account. Please insert a new one before deleting');
        }

        $this->authorize('own', $email);
        $email->delete();

        return back();
    }
}
