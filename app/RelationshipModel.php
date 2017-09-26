<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipModel extends Model
{
 public $relationships=[
				[
					'table1'=>'students',
					'relation'=>'many-to-many',
					'table2'=>'courses',
					'middleTable'=>'course_student',
				],
				[
					'table1'=>'departments',
					'relation'=>'one-to-many',
					'table2'=>'students',
					'foreignKey'=>'department_id',
				],
				[
					'table1'=>'students',
					'relation'=>'one-to-one',
					'table2'=>'student_cards',
					'foreignKey'=>'student_id',
				],
];
}
