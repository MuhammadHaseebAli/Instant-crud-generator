<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\CourseRequest;

class CoursesController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$course= new Course();

		if($search){
			$courses=Course::where($course->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.courses.index',compact('courses'));
		}else{
			$courses=Course::paginate(10);
			return view('admin.courses.index',compact('courses'));
		}
	}

	public function create(){
		return view('admin.courses.create')->with('students',\App\Student::pluck('name','id'));
	}

	public function store(CourseRequest $request){
		Course::create($request->all())->students()->attach($request->input('students'));
			$courses=Course::paginate(10);
			return view('admin.courses.index',compact('courses'));
	}

	public function show(){

	}

	public function edit($id){
		$course=Course::find($id);
		
		return view('admin.courses.edit',compact('course'))->with('students',\App\Student::pluck('name','id'));
	}

	public function update($id,CourseRequest $request){
		Course::find($id)->update($request->all());
		Course::find($id)->students()->sync($request->input('students'));
			$courses=Course::paginate(10);
			return view('admin.courses.index',compact('courses'));
	}

	public function destroy($id){
		Course::find($id)->delete();
		$courses=Course::paginate(10);
		return view('admin.courses.index',compact('courses'));
	}

}
