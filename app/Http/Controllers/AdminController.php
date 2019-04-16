<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function seeUsers()
    {

//        $users= User::select('id', 'name', 'email')->get();
        $users= new User();
        $users= $users->select('id', 'name', 'email', 'created_at')->get();

        return view('registerUsers', compact('users'));
    }

    public function deleteUsers(Request $request)
    {
        $cb_ids = $request->input('du');

        if( $cb_ids != null){
            foreach ($cb_ids as $id_ud){
                $ud_fromTable= User::where('id', $id_ud)->first();
                if($ud_fromTable !=null ){
                    if( $ud_fromTable->delete()) {
                        // El Usuario se Elimino
                    }else{
                        return 'El usuario no ha sido agregado'; // No funciona aun
                    }
                }else{
//                    return 'El usuario no existe, llamar a administrador';
                    return redirect()->intended(route('admin.register.users'));
                }
            }
            return redirect()->intended(route('admin.register.users'));
        }else{
            return "nada";
        }

    }
}
