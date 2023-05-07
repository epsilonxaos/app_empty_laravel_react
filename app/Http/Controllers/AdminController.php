<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    function iniciarSesionView()
    {
        return view('panel.auth.login');
    }

    function dashboardAdmin() {
        return view('panel.dashboard');
    }

    public function login(Request $request){
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)){
            return redirect()->route('panel.dashboard');
        }else{
            return redirect()->back()->withInput()->withErrors(['message' => 'Correo o contraseña invalida']);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
