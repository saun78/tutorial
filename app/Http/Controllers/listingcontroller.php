<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class listingcontroller extends Controller
{
    //
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function create(Request $request){

        $formfeilds = $request->validate([
            'name'=>'required',
            'email'=>['required',Rule::unique('users','email')],
            'password'=>['required'],
        ]);
        $random = rand(999999,000000);
        $formfeilds['password'] =bcrypt($request->password);
        $formfeilds['OTP'] = $random;

        User::create($formfeilds);

        return redirect('/');
    }

    public function store(Request $request){
        $formfeilds=$request->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(auth()->attempt($formfeilds)){
            $request->session()->regenerate();

            return redirect("/listing")->with('message','Login succesful');
        }

        return back()->withErrors(['email'=>'invalid Credentials'])->onlyInput('email');
    }
}
