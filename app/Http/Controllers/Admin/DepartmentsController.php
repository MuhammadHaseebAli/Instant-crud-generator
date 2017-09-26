<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentsController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$department= new Department();

		if($search){
			$departments=Department::where($department->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.departments.index',compact('departments'));
		}else{
			$departments=Department::paginate(10);
			return view('admin.departments.index',compact('departments'));
		}
	}

	public function create(){
		return view('admin.departments.create');
	}

	public function store(DepartmentRequest $request){
		Department::create($request->all());
			$departments=Department::paginate(10);
			return view('admin.departments.index',compact('departments'));
	}

	public function show(){

	}

	public function edit($id){
		$department=Department::find($id);
		
		return view('admin.departments.edit',compact('department'));
	}

	public function update($id,DepartmentRequest $request){
		Department::find($id)->update($request->all());;
			$departments=Department::paginate(10);
			return view('admin.departments.index',compact('departments'));
	}

	public function destroy($id){
		Department::find($id)->delete();
		$departments=Department::paginate(10);
		return view('admin.departments.index',compact('departments'));
	}

}
