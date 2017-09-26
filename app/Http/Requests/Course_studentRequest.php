<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Course_studentRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'student_id'=>'required',
			'course_id'=>'required',
		];
	}
}
