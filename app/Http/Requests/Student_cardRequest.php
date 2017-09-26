<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Student_cardRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'color'=>'required',
			'dept'=>'required',
			'student_id'=>'required',
		];
	}
}
