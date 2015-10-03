<?php

namespace stackexchange\core;

use mysqli;

class Model
{
    public function __construct()
    {

    }

    protected function getQueryResult($query)
    {
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);

        $result = [];
        if ($row = $conn->query($query, MYSQLI_USE_RESULT)) {
            while ($record = $row->fetch_assoc()) {
                $result[] = $record;
            }

            $row->close();
        }

        return $result;
    }
}