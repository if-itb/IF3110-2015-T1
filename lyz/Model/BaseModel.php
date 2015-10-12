<?php namespace Lyz\Model;

use Lyz\Database\DB;

class BaseModel {
	protected static $query = [
		'table' => 'default',
		'where' => null
	];

	public static function all() {
		$results = DB::query('select * from ' . static::$table);
		return static::makeModel($results);
	}
	public static function where($column, $operator, $value) {
		if (!$isset(static::$query['where'])) {
			static::$query['where'] = ' where (';
		}
		else {
			static::$query['where'] .= ' and ';
		}
		static::$query['where'] .= $column . ' ' . $operator . ' ' . $value . ')';
		return $this;
	}

	public static function get() {
		$results = DB::query(static::$query);
		static::resetQuery();
		return static::makeModel($results);
	}

	private static function makeModel($results) {
		$models = [];
		if (is_array($results)) {
			foreach ($results as $result) {
				$class_name = get_called_class();
				$model = new $class_name();
				foreach ($result as $key => $value) {
					$model->$key = $value;
				}
				array_push($models, $model);
			}
			return $models;
		}
		else {
			return $results;
		}
	}

	private function resetQuery() {
		static::$query = [ 'table' => static::$table, 'where' => null ];
	}
}
