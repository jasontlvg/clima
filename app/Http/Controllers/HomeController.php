<?php

namespace App\Http\Controllers;

use App\DataClima;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $x= DataClima::whereDate('date_time', '2020-08-15')->get();
//        $x= DataClima::whereTime('date_time', '=', '10:21:12')->get();
        $x= DataClima::whereDate('date_time', '2019-10-01')->whereTime('date_time', '=', '03:11:45')->get();

        return $x;
//        return view('home');
    }
}
