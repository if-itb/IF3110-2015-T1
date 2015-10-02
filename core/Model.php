<?php

namespace stackexchange\core;

class Model
{
    public function __construct()
    {

    }

    protected function getQueryResult($query)
    {
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);

        return $conn->query($query, MYSQLI_USE_RESULT);
    }
}