<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// access to user and auth
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {

        // check if there is an auth id

        if (Auth::id()) {

            // get the available auth instance and authenticated user then fetch the user type
            $user_type = Auth()->user()->user_type; //get the user type from db


            // dump($user_type);

            // send appropriate user to their page
            if ($user_type == "user") {
                return view("dashboard");
            } else if ($user_type == "admin") {
                return view("admin.index");
            } else {
                // if a different user redirect back
                return redirect()->back();
            }
        }
    }
    public function post()
    {
        return view("post");
    }
}
