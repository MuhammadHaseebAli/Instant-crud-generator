<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends AppModel
{
	protected $fillable = [
		'name',
		'father_name',
		'department_id',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

	public function courses() {
		return $this->belongsToMany('App\Course' , 'course_student');
	}
	public function department() {
		return $this->belongsTo('App\Department' , 'department_id');
	}
	public function student_card() {
		return $this->hasOne('App\Student_card' , 'student_id');
	}
}
