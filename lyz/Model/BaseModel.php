<?php namespace Lyz\Model;

use Lyz\Database\DB;

class BaseModel {
	protected static $table = 'default';

	protected static $query = [
		'table' => null,
		'where' => null
	];

	public static function where($column, $operator, $value) {
		if (!$isset($query['where'])) {
			$query['where'] = ' where ';
		}
		else {
			$query['where'] .= ' and ';
		}
		$query['where'] .= $column . ' ' . $operator . ' ' . $value;
		return $this;
	}

	public static function get() {
		$q_results = DB::query($this->query);
		$results = [];
		if (is_array($results)) {
			foreach ($results as $result) {
				$model = new BaseModel();
				foreach ($result as $key => $value) {
					$model->$key = $value;
				}
			}
			array_push($results, $model);
		}
		else {
			$results = $q_results;
		}
		$query = [ 'table' => null, 'where' => null ];
		return $results;
	}
}
