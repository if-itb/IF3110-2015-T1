<?php namespace Lyz\Database;

class QueryBuilder {
	private $query = [];

	private $table = '';

	private $makeModel = null;

	public function __construct($table = '', $makeModel = null) {
		$this->table = $table;
		$this->makeModel = $makeModel;
	}

	public function where($column, $operator, $value) {
		if (!isset($this->query['where'])) {
			$this->query['where'] = ' where (';
		}
		else {
			$this->query['where'] .= ' and (';
		}

		if (is_string($value)) {
			$value = '\'' . $value . '\'';
		}
		$this->query['where'] .= $column . ' ' . $operator . ' ' . $value . ')';
		return $this;
	}

	public function whereOr($column, $operator, $value) {
		if (!isset($this->query['where'])) {
			$this->query['where'] = ' where (';
		}
		else {
			$this->query['where'] .= ' or (';
		}
		if (is_string($value)) {
			$value = '\'' . $value . '\'';
		}
		$this->query['where'] .= $column . ' ' . $operator . ' ' . $value . ')';
		return $this;

	}

	public function destroy() {
		$this->query = 'delete from ' . $this->table . $this->query['where'];
		$results = DB::query($this->query);
		return $results;
	}

	/* TODO: Automatically make model */
	public function get() {
		$this->query = 'select * from ' . $this->table . $this->query['where'];
		$results = DB::query($this->query);
		if (isset($this->makeModel)) {
			return call_user_func($this->makeModel, $results);
		}
		else return $results;
	}

	public function first() {
		return $this->get()[0];
	}
}
