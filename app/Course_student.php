<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_student extends AppModel
{
	protected $fillable = [
		'student_id',
		'course_id',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

}
