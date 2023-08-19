<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DB::table('admins')->truncate();

		$admin = Admin::create([
			"name" => "Jesus Glez",
			"email" => "jesus@soporte.com",
			'email_verified_at' => now(),
			'password' => Hash::make('password'),
			'remember_token' => Str::random(10)
		]);

		$rol = Role::create(['name' => 'Administrador', 'guard_name' => 'admin']);

		$permisos = DB::table('permissions')->select('id')->get();
		foreach ($permisos as $key => $value) {
			$rol->givePermissionTo($value->id);
		}

		$admin->assignRole($rol);
	}
}
