<?php namespace Lyz\Model;

use Lyz\Model\BaseModel;

class Question extends BaseModel {
	protected static $table = 'questions';

	public static $fillable = [ 'name', 'email', 'topic', 'content' ];
}
