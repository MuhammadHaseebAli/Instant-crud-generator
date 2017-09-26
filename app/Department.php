<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends AppModel
{
	protected $fillable = [
		'name',
		'description',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

	public function students() {
		return $this->hasMany('App\Student' , 'department_id');
	}
}
