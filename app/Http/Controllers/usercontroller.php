<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\welcomemail;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class usercontroller extends Controller
{
    public function store(Request $request){
        $formfeilds = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('submit_form','email')],
            'password'=>'required|comfirmed|min:6',
        ]);

        //hash password
        $formfeilds['password']=bcrypt($formfeilds['password']);


        
        $user=User::create($formfeilds);
        Mail::to($user->email)->send(new welcomemail($user));
        // auth()->Login($user);
        return redirect('/')->with('message','user created and Logged in');
    }
}
