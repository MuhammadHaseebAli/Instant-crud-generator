<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests\StudentRequest;

class StudentsController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$student= new Student();

		if($search){
			$students=Student::where($student->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.students.index',compact('students'));
		}else{
			$students=Student::paginate(10);
			return view('admin.students.index',compact('students'));
		}
	}

	public function create(){
		return view('admin.students.create')->with('courses',\App\Course::pluck('course_name','id'))->with('departments',\App\Department::pluck('name','id'));
	}

	public function store(StudentRequest $request){
		Student::create($request->all())->courses()->attach($request->input('courses'));
			$students=Student::paginate(10);
			return view('admin.students.index',compact('students'));
	}

	public function show(){

	}

	public function edit($id){
		$student=Student::find($id);
		
		return view('admin.students.edit',compact('student'))->with('courses',\App\Course::pluck('course_name','id'))->with('departments',\App\Department::pluck('name','id'));
	}

	public function update($id,StudentRequest $request){
		Student::find($id)->update($request->all());
		Student::find($id)->courses()->sync($request->input('courses'));
			$students=Student::paginate(10);
			return view('admin.students.index',compact('students'));
	}

	public function destroy($id){
		Student::find($id)->delete();
		$students=Student::paginate(10);
		return view('admin.students.index',compact('students'));
	}

}
