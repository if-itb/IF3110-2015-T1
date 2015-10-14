<?php namespace Lyz\Model;

use Lyz\Model\BaseModel;

class Answer extends BaseModel {
	protected static $table = 'answers';

	public static $fillable = [ 'name', 'email', 'content', 'question_id' ];
}

