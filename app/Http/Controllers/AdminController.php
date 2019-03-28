<?php

namespace App\Http\Controllers;

use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $urs= UserRequest::all();
//        return $urs;


        return view('admin', compact('urs'));
//        $x= Auth::id();
//        dd($x);
    }
}
