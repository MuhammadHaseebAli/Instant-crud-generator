<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends AppModel
{
	protected $fillable = [
		'name',
		'department_id',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

}
