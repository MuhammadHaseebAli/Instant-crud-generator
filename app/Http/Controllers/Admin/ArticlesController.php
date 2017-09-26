<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends BaseController
{
	public function index(){
		$search=\Request::get('find');
		$article= new Article();

		if($search){
			$articles=Article::where($article->display_field,'LIKE','%'.$search.'%')->paginate(5);
			return view('admin.articles.index',compact('articles'));
		}else{
			$articles=Article::paginate(10);
			return view('admin.articles.index',compact('articles'));
		}
	}

	public function create(){
		return view('admin.articles.create');
	}

	public function store(ArticleRequest $request){
		Article::create($request->all());
			$articles=Article::paginate(10);
			return view('admin.articles.index',compact('articles'));
	}

	public function show(){

	}

	public function edit($id){
		$article=Article::find($id);
		
		return view('admin.articles.edit',compact('article'));
	}

	public function update($id,ArticleRequest $request){
		Article::find($id)->update($request->all());;
			$articles=Article::paginate(10);
			return view('admin.articles.index',compact('articles'));
	}

	public function destroy($id,Request $request){
		Article::find($id)->delete();
		$articles=Article::paginate(10);
		   if($request->ajax())
			return json_encode(['msg'=>"successfuly deleted",'status'=>'success']);
	}

}
