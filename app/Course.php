<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends AppModel
{
	protected $fillable = [
		'course_name',
		'course_code',
		'credit_hours',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

	public function students() {
		return $this->belongsToMany('App\Student' , 'course_student');
	}
}
