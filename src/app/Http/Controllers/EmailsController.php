<?php

namespace App\Http\Controllers;

use App\Email;
use Auth;
use Illuminate\Http\Request;

class EmailsController extends Controller
{

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

        $email = Email::make([
            'email' => request('email')
        ]);

        auth()->user()->emails()->save($email);

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
            return redirect()->back()->withErrors('On your account is just present one email, if you want to delete your current email insert another mail before ');
        }

        if($email && ($email && Auth::id() == $email->user_id)){
            $email->delete();
                return(back());
        }
        redirect('/');

    }
}
