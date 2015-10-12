<?php

class Questions {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;    
    }

    public function get() {

    }

    public function getAll() {
        $query = "SELECT * FROM questions";
        
        if($questions = $this->db->query($query)) {
            return $questions->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function add() {

    }

    public function edit() {

    }

    public function delete() {

    }
}