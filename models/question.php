<?php
	class Question {
		public $qid;
		public $authorid;
		public $topic;
		public $content;
		public $datetime;
		public $countvotes;
		public $countanswers;
		
		public function __construct($qid, $authorid, $topic, $content, $datetime, $countvotes, $countanswers){
			this->id = $qid;
			this->authorid = $authorid;
			this->topic = $topic;
			this->content = $content;
			this->datetime = $datetime;
			this->countvotes = $countvotes;
			this->countanswers = $countanswers;
		}
	}
?>