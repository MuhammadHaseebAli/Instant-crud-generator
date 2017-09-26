<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends AppModel
{
	protected $fillable = [
		'title',
		'body',
		'published_at',
	];

	public $timestamps=false;

	protected $hidden = [
	//
	];

}
