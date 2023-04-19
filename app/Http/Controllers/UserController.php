<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // Show login form

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required'

        ]);
        if(auth()->attempt(['name'=>$formFields['loginname'],'password'=>$formFields['loginpassword']])){
            //$request->session()->invalidate();
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        

        return redirect('/');
    }
    //
    public function  register(Request $request){
         $formFields = $request->validate([
            'name' => ['required','min:3','max:10', Rule::unique('users','name')],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => ['required', 'min:5', 'max:255']
        ]); 
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //create User account
       $user = User::create($formFields);
       // Login User
       auth()->login($user);
       return redirect('/');
    }
    
}
