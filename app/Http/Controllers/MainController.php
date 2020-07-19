<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller {

    function login() {
        return view('login');
    }

    function validateLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('main');
        } else {
            return back()->with('error', 'Credencials incorrectes');
        }
    }

    function successlogin() {
        return view('successlogin');
    }

    function logout() {
        Auth::logout();
        return redirect('/');
    }

}
