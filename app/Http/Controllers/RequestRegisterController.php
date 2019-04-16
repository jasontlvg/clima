<?php
// Este es el Controller del apartado "Solicitar Registro"
namespace App\Http\Controllers;

use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RequestRegisterController extends Controller
{
    public function showRequestRegistrationForm(Request $request){
        return view('requestRegister');
    }


    public function store(Request $request){

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_requests', 'unique:users'],
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

            Mail::to('uabclima@gmail.com')->send(new \App\Mail\exiaMail());

            return view('confirmationRegistrion');
        }
    }

    public function registerInRegisterUsers(Request $request) // Aqui estaba el codigo de guardar
    {
        // ur= user request, cb_ids= checkbox ids
        $cb_ids = $request->input('au');
        if($cb_ids != null){
            foreach ($cb_ids as $id_ur){
                $ur_fromTable= UserRequest::where('id', $id_ur)->first();
                if($ur_fromTable !=null ){
                    $newUser= new User;
                    $newUser->name= $ur_fromTable->name;
                    $newUser->email= $ur_fromTable->email;
                    $newUser->password= $ur_fromTable->password;
                    if($newUser->save()){
                        $ur_fromTable->delete();
                    }else{
                        return 'El usuario no ha sido agregado'; // No funciona aun
                    }
                }else{
                    return 'El usuario no existe, llamar a administrador';
                }
            }
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->intended(route('admin.dashboard'));
        }
    }
}
