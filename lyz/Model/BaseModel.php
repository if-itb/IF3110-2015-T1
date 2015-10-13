<?php namespace Lyz\Model;

use Lyz\Database\DB;

class BaseModel {
	protected static $query = [
		'table' => 'default',
		'where' => null
	];

	protected static $fillable = [];

	public function __construct($params = null) {
		if (isset($params)) {
			foreach ($params as $key => $value) {
				if (array_search($key, static::$fillable) !== false) {
					$this->$key = $value;
				}
			}
		}
	}

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
		if (is_array($results)) {
			$models = [];
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

	public function save() {
		try {
			$columns = '(';
			$values = '(';
			$first = true;
			foreach ($this as $key => $value) {
				if ($first === false) {
					$columns .= ',';
					$values .= ',';
				}
				if (is_string($value)) {
					$value = '\'' . $value . '\'';
				}
				$columns .= $key;
				$values .= $value;
				$first = false;
			}
			$columns .= ')';
			$values .= ')';
			$q = 'insert into ' . static::$table . $columns . ' values' . $values;
			DB::query($q);
		}
		catch (\Exception $e) {
			DB::update();
		}
	}

	private function resetQuery() {
		static::$query = [ 'table' => static::$table, 'where' => null ];
	}
}
