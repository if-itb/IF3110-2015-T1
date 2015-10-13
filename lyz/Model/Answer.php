<?php namespace Lyz\Model;

use Lyz\Model\BaseModel;

class Answer extends BaseModel {
	protected static $table = 'answers';

	protected static $fillable = [ 'name', 'content' ];
}

