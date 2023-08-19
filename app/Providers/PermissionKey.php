<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * ConstantExport Trait implementa el método getConstants() el cual nos permite
 * regresar las constantes de la clase como un array asociativo
 */
trait ConstantExport
{
	/**
	 * @return [const_name => 'value', ...]
	 */
	static function getConstants()
	{
		$refl = new \ReflectionClass(__CLASS__);
		return $refl->getConstants();
	}
}

class PermissionKey extends ServiceProvider
{
	use ConstantExport;

	const Admin = [
		'name' => 'Módulo administradores',
		'permissions' => [
			'index' => [
				'display_name' => 'Ver módulo',
				'name' => 'admins.index'
			],
			'create' => [
				'display_name' => 'Creación',
				'name' => 'admins.create'
			],
			'edit' => [
				'display_name' => 'Ver detalles',
				'name' => 'admins.edit'
			],
			'update' => [
				'display_name' => 'Modificar',
				'name' => 'admins.update'
			],
			'destroy' => [
				'display_name' => 'Eliminar',
				'name' => 'admins.destroy'
			],
		]
	];

	const Role = [
		'name' => 'Módulo Roles',
		'permissions' => [
			'index' => [
				'display_name' => 'Ver módulo',
				'name' => 'roles.index'
			],
			'create' => [
				'display_name' => 'Creación',
				'name' => 'roles.create'
			],
			'edit' => [
				'display_name' => 'Ver detalles',
				'name' => 'roles.edit'
			],
			'update' => [
				'display_name' => 'Modificar',
				'name' => 'roles.update'
			],
			'destroy' => [
				'display_name' => 'Eliminar',
				'name' => 'roles.destroy'
			],
		]
	];
}
