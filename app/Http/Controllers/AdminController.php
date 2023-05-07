<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{

    //todo Cambiar estas funciones a su propio controlador
    function iniciarSesionView()
    {
        return view('panel.auth.login');
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

    //* Vista inicial al ingresar al panel
    public function dashboardAdmin(): View {
        return view('panel.dashboard');
    }

    //todo Funciones de modulo de usuarios
    public function index(): View {
        return view('panel.users.index', [
            "title" => "Administrar usuarios",
            "breadcrumb" => [
                [
                    'title' => 'Usuarios',
                    'active' => true,
                ]
            ],
            'user' => Admin::all()
        ]);
    }

    public function create(): View {
        return view('panel.users.create', [
            "title" => "Administrar usuarios",
            "breadcrumb" => [
                [
                    'title' => 'Usuarios',
                    'route' => 'panel.usuarios.index',
                    'active' => false,
                ],
                [
                    'title' => 'Nuevo usuario',
                    'active' => true
                ]
            ]
        ]);
    }

    public function store(Request $request) : RedirectResponse {
        //Sí las constraseñas no son iguales regresamos al paso anterior
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('panel.usuarios.index');
    }
}
