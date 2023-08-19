<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
	use HasRoles;
	use Notifiable;
	// use HasRoles //todo Implementacion de Roles
	protected $fillable = [
		'name',
		'email',
		'password'
	];

	protected $hidden = [
		'password',
		'remember_token',
	];
}
