<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('panel.roles.index', [
			'title' => 'Roles y permisos',
			'breadcrumb' => [
				[
					'title' => 'Roles y permisos',
					'active' => true
				]
			],
			'data' => Role::all()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$info = [
			'title' => 'Roles',
			'breadcrumb' => [
				[
					'title' => 'Roles y permisos',
					'route' => 'panel.roles.index',
				],
				[
					'title' => 'Nuevo rol',
					'route' => 'panel.roles.create',
					'active' => true
				]
			],
		];
		return view('panel.roles.create', $info);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//Sí ya existe un rol con ese nombre redireccionamos a la pantalla anterior
		if (Role::where('name', $request->name)->where('guard_name', 'admin')->get()->count() > 0) {
			return redirect()->back()->withInput($request->input())->with('invalid', 'Un rol con ese nombre ya existe');
		}
		$role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
		if ((isset($request->permission)) && (count($request->permission) > 0)) {
			//Asignamos los nuevos permisos
			foreach ($request->permission as $key => $value) {
				$role->givePermissionTo($key);
			}
		}
		return redirect()->route('panel.roles.edit', ['id' => $role->id])->with('success', 'El rol se ha creado correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Int $id)
	{
		$info = [
			'title' => 'Roles',
			'breadcrumb' => [
				[
					'title' => 'Todos',
					'route' => 'panel.roles.index',
				],
				[
					'title' => 'Editar',
					'route' => 'panel.roles.edit',
					'params' => ['id' => $id],
					'active' => true
				]
			],
		];
		$info['role'] = Role::find($id);
		return view('panel.roles.edit', $info);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$arr = $request->toArray();
		$role = Role::find($id);
		//Acutalizamos el nombre
		$role->update(['name' => $request->name]);
		//Eliminamos todos los permisos asignados
		$role->revokePermissionTo($role->permissions);
		//Asignamos los nuevos permisos
		foreach ($request->permission as $key => $value) {
			$role->givePermissionTo($key);
		}
		return redirect()->route('panel.roles.edit', ['id' => $role->id])->with('success', 'Los datos se han actualizado correctamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $id)
	{
		if (Role::find($id)) {
			Role::destroy($id);
			return redirect()->back()->with('success', 'Los datos se han actualizado correctamente');
		} else {
			return redirect()->back()->with('success', 'Los datos se han actualizado correctamente');
		}
	}
}
