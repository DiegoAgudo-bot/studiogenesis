<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller {

    //Return login view
    function login() {
        return view('login');
    }

    //Check email and password to DB
    function validateLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        //If correct, go to menu
        if (Auth::attempt($user_data)) {
            return redirect('main');
        //If incorrect, go back to loginform with errors
        } else {
            return back()->with('error', 'Credencials incorrectes');
        }
    }
    //Return menu view
    function successlogin() {
        return view('successlogin');
    }
    //Function to logout
    function logout() {
        Auth::logout();
        return redirect('/');
    }

}
