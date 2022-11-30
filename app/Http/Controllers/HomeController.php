<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index()
    {
        $role_name=Auth::user()->role_name;

        if($role_name=='Admin')
        {
            return view('admin');
        }

        if($role_name=='Lecturer')
        {
            return view('lecturer');
        }

        if($role_name=='Lab Assistant')
        {
            return view('labassistant');
        }

        if($role_name=='Student')
        {
            return view('student');
        }

        else
        {
            return view('dashboard');
        } 
    }

    //view all list user
    public function user()
    {
        return view('user.index');
    }
}
