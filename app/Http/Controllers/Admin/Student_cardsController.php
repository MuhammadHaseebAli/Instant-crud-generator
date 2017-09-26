<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Student_card;
use App\Http\Requests\Student_cardRequest;

class Student_cardsController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$student_card= new Student_card();

		if($search){
			$student_cards=Student_card::where($student_card->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.student_cards.index',compact('student_cards'));
		}else{
			$student_cards=Student_card::paginate(10);
			return view('admin.student_cards.index',compact('student_cards'));
		}
	}

	public function create(){
		return view('admin.student_cards.create')->with('students',\App\Student::pluck('name','id'));
	}

	public function store(Student_cardRequest $request){
		Student_card::create($request->all());
			$student_cards=Student_card::paginate(10);
			return view('admin.student_cards.index',compact('student_cards'));
	}

	public function show(){

	}

	public function edit($id){
		$student_card=Student_card::find($id);
		
		return view('admin.student_cards.edit',compact('student_card'))->with('students',\App\Student::pluck('name','id'));
	}

	public function update($id,Student_cardRequest $request){
		Student_card::find($id)->update($request->all());;
			$student_cards=Student_card::paginate(10);
			return view('admin.student_cards.index',compact('student_cards'));
	}

	public function destroy($id){
		Student_card::find($id)->delete();
		$student_cards=Student_card::paginate(10);
		return view('admin.student_cards.index',compact('student_cards'));
	}

}
