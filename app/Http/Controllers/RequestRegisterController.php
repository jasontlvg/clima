<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RequestRegisterController extends Controller
{
    public function showRequestRegistrationForm(Request $request){
        return view('requestRegister');
    }


    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_requests'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Si ya existe el email
        $u= User::where('email', $request->get('email'))->get(); // Checamos si actualmente el usuario ya se encuentra registrado
        if($u->isNotEmpty()) {
            return 'El usuario ya esta registrado con ese correo';
        }else{
            $ur= new UserRequest;
            $pass= Hash::make($request->get('password'));
            $ur= new UserRequest;
            $ur->name= $request->get('name');
            $ur->email= $request->get('email');
            $ur->password= $pass;
            $ur->save();
            return 'Se agrega a la tabla';
        }
    }

    public function guardar()
    {
        // Obtener Datos
        $ur= UserRequest::where('id', '2')->get();
//        $ur[0]->name;
//        return $ur[0]->email;
        // Registrar Usuario
        $u= new User;
        $u->name= $ur[0]->name;
        $u->email= $ur[0]->email;
        $u->password= $ur[0]->password;
        $u->save();
        return 'salvado';
    }
}
