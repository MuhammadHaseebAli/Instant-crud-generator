<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$user= new User();

		if($search){
			$users=User::where($user->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.users.index',compact('users'));
		}else{
			$users=User::paginate(10);
			return view('admin.users.index',compact('users'));
		}
	}

	public function create(){
		return view('admin.users.create');
	}

	public function store(UserRequest $request){
		User::create($request->all());
			$users=User::paginate(10);
			return view('admin.users.index',compact('users'));
	}

	public function show(){

	}

	public function edit($id){
		$user=User::find($id);
		
		return view('admin.users.edit',compact('user'));
	}

	public function update($id,UserRequest $request){
		User::find($id)->update($request->all());;
			$users=User::paginate(10);
			return view('admin.users.index',compact('users'));
	}

	public function destroy($id,Request $request){
		User::find($id)->delete();
		$users=User::paginate(10);
		   if($request->ajax())
			return json_encode(['msg'=>"successfuly deleted",'status'=>'success']);
	}

}
