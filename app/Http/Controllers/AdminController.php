<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

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

    /**
     * Display the user's profile form.
     */
    public function editProfile(Request $request): View
    {
        return view('panel.profileAdmin.edit', [
            'title' => 'Perfil',
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('panel.profile.edit')->with('status', 'profile-updated');
    }

    public function updateProfilePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroyProfile(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::guard('admin') -> logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/admin');
    }
}
