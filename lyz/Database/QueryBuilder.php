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
		if (!isset($query['where'])) {
			$this->query['where'] = ' where (';
		}
		else {
			$this->query['where'] .= ' and ';
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
			return $this->makeModel($results);
		}
		else return $results;
	}
}
