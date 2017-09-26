<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Course_student;
use App\Student;
use App\Http\Requests\Course_studentRequest;

class Course_studentController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$course_student= new Course_student();

		if($search){
			$course_student=Course_student::where($course_student->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.course_student.index',compact('course_student'));
		}else{
			$course_student=Course_student::paginate(10);
			return view('admin.course_student.index',compact('course_student'));
		}
	}

	public function create(){
		
		
		return view('admin.course_student.create');
	}

	public function store(Course_studentRequest $request){
		Course_student::create($request->all());
			$course_student=Course_student::paginate(10);
			return view('admin.course_student.index',compact('course_student'));
	}

	public function show(){

	}

	public function edit($id){
		$course_student=Course_student::find($id);
		
		return view('admin.course_student.edit',compact('course_student'));
	}

	public function update($id,Course_studentRequest $request){
		Course_student::find($id)->update($request->all());
			$course_student=Course_student::paginate(10);
			return view('admin.course_student.index',compact('course_student'));
	}

	public function destroy($id){
		Course_student::find($id)->delete();
		$course_student=Course_student::paginate(10);
		return view('admin.course_student.index',compact('course_student'));
	}

}
