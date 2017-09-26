<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$employee= new Employee();

		if($search){
			$employees=Employee::where($employee->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.employees.index',compact('employees'));
		}else{
			$employees=Employee::paginate(10);
			return view('admin.employees.index',compact('employees'));
		}
	}

	public function create(){
		return view('admin.employees.create');
	}

	public function store(EmployeeRequest $request){
		Employee::create($request->all());
			$employees=Employee::paginate(10);
			return view('admin.employees.index',compact('employees'));
	}

	public function show(){

	}

	public function edit($id){
		$employee=Employee::find($id);
		
		return view('admin.employees.edit',compact('employee'));
	}

	public function update($id,EmployeeRequest $request){
		Employee::find($id)->update($request->all());;
			$employees=Employee::paginate(10);
			return view('admin.employees.index',compact('employees'));
	}

	public function destroy($id){
		Employee::find($id)->delete();
		$employees=Employee::paginate(10);
		return view('admin.employees.index',compact('employees'));
	}

}
