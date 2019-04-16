<?php

namespace App\Http\Controllers\Auth;

// Esto no estaba
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

// Original
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Nuevo
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{

    // Esto no estaba
    use RedirectsUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email',
            'password' => 'required|min:6'
        ]);



        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }



//        return redirect()->back()->withInput($request->only('email'));
        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username()
    {
        return 'email';
    }
}
