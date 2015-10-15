<?php namespace Lyz\Model;

use Lyz\Database\DB;
use Lyz\Database\QueryBuilder;

class BaseModel {
	protected static $table = 'default';

	public static $fillable = [];

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
		$query = new QueryBuilder(static::$table, [ get_called_class(), 'makeModel' ]);
		$query->where($column, $operator, $value);
		return $query;
	}

	public static function makeModel($results) {
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
			$columns = [];
			$values = [];
			foreach ($this as $key => $value) {
				if (is_string($value)) {
					$value = '\'' . $value . '\'';
				}
				array_push($columns, $key);
				array_push($values, $value);
			}
			$columns = '(' . implode(',', $columns) . ')';
			$values = '(' . implode(',', $values) . ')';
			$q = 'insert into ' . static::$table . $columns . ' values' . $values;
			DB::query($q);
		}
		catch (\Exception $e) {
		}
	}

	public function update($condition) {
		try {
			$set = [];
			foreach ($this as $key => $value) {
				if (isset($value)) {
					$tvalue = $value;
					if (is_string($tvalue)) {
						$tvalue = '\'' . $tvalue . '\'';
					}
					array_push($set, $key . '=' . $tvalue);
				}
			}
			$set = implode(',', $set);
			$q = 'update ' . static::$table . ' set ' . $set . ' where ' . $condition;

			DB::query($q);
		}
		catch (\Exception $e) {
		}
	}
}
