<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function postlogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return redirect('/');
            // if (auth()->user()->type == 'IT') {
            //     return redirect()->route('admin.home');
            // }else if (auth()->user()->type == 'manager') {
            //     return redirect()->route('manager.home');
            // }else{
            //     return redirect()->route('home');
            // }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
