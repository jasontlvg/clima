<?php

namespace App\Http\Controllers;

use App\DataClima;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {

        $clima= new DataClima;
//        $x= $clima->take(25)->select('date_time', 'temp_out', 'hi_temp', 'low_temp', 'out_hum', 'dew_pt')->paginate();
        $x= $clima->take(25)->select('date_time', 'temp_out', 'hi_temp', 'low_temp', 'out_hum', 'dew_pt')->get();
        $userType= true;
        return view('welcome', compact('x', 'userType'));
    }
}
