<?php namespace Lyz\Model;

use Lyz\Model\BaseModel;

class Question extends BaseModel {
	protected static $table = 'questions';

	protected static $fillable = [ 'name', 'topic', 'content' ];
}
