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

    public function show(Request $request)
    {
//        $x= DataClima::whereBetween('date_time', ['2019-10-01', '2020-08-15'])->get();
        $x= new DataClima;
        $x= $x->select('date_time', 'temp_out', 'hi_temp', 'low_temp', 'out_hum', 'dew_pt')->whereBetween('date_time', [$request->get('from'), $request->get('to')])->get();
        // Permanente
        $userType= false;
        $linksActive= false;
        return view('welcomeUser', compact('x', 'userType', 'linksActive'));
    }
    
    public function index(Request $request)
    {
//        $x= DataClima::whereDate('date_time', '2020-08-15')->get();
//        $x= DataClima::whereTime('date_time', '=', '10:21:12')->get();
//        $x= DataClima::whereDate('date_time', '2019-10-01')->whereTime('date_time', '=', '03:11:45')->get();

        $clima= new DataClima;
        $x= $clima->select('date_time', 'temp_out', 'hi_temp', 'low_temp', 'out_hum', 'dew_pt')->paginate();
        $userType= false;
        $linksActive= true;
        return view('welcomeUser', compact('x', 'userType', 'linksActive'));
    }
}
