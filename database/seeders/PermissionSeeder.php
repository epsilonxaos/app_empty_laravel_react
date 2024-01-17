<?php

namespace Database\Seeders;

use App\Providers\PermissionKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		//Truncamos la tabla
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
		DB::table('model_has_roles')->truncate();
		DB::table('roles')->truncate();
		DB::table('role_has_permissions')->truncate();
		DB::table('permissions')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

		foreach (PermissionKey::getConstants() as $key => $modulo) {
			foreach ($modulo['permissions'] as $permiso) {
				if (!DB::table('permissions')->where('name', $permiso['name'])->first()) {
					DB::table('permissions')->insert([
						'name' => $permiso['name'],
						'guard_name' => 'admin',
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					]);
				}
			}
		}
	}
}
