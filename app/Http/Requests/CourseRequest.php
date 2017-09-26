<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'course_name'=>'required',
			'course_code'=>'required',
			'credit_hours'=>'required',
		];
	}
}
