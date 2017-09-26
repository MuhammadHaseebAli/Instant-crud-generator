<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_card extends AppModel
{
	protected $fillable = [
		'color',
		'dept',
		'student_id',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

	public function student() {
		return $this->belongsTo('App\Student' , 'student_id');
	}
}
