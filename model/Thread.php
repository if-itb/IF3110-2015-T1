<?php

namespace stackexchange\model;

use stackexchange\core\Model;

class Thread extends Model
{
    private $table = "thread";

    public function getAll()
    {
        $query = "SELECT t.*, COUNT(a.thread_id) answer"
                    . " FROM thread t LEFT JOIN answer a ON t.id=a.thread_id";

        return $this->getQueryResult($query);
    }
}