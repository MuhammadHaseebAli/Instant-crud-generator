<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends AppModel
{
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

}
