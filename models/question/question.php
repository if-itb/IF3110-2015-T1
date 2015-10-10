<?php

    namespace models\question;

    class QuestionModel {
        public $id;
        public $by;
        public $topic;
        public $content;
        public $votes;
        public $answers;
        public $create_time;

        public function __construct($obj) {
            $this->id = $obj["id"];
            $this->by = $obj["name"];
            $this->email = $obj["email"];
            $this->topic = $obj["topic"];
            $this->content = $obj["content"];
            $this->votes = $obj["votes"];
            $this->answers = isset($obj["answers"]) ? $obj["answers"] : "0";

            $arr = explode("-", $obj["create_time"]);

            switch ($arr[1]) {
                case "01":
                    $month = "January";
                    break;
                case "02":
                    $month = "February";
                    break;
                case "03":
                    $month = "March";
                    break;
                case "04":
                    $month = "April";
                    break;
                case "05":
                    $month = "May";
                    break;
                case "06":
                    $month = "June";
                    break;
                case "07":
                    $month = "July";
                    break;
                case "08":
                    $month = "August";
                    break;
                case "09":
                    $month = "September";
                    break;
                case "10":
                    $month = "October";
                    break;
                case "11":
                    $month = "November";
                    break;
                case "12":
                    $month = "Desember";
                    break;
            }

            $this->create_time = $arr[2] . ' ' . $month . ' ' . $arr[0];
        }
    }

?>