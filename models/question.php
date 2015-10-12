<?php
	class Question {
		public $qid;
		public $author;
		public $topic;
		public $content;
		public $datetime;
		public $countvotes;
		public $countanswers;
		
		public function __construct($qid, $author, $topic, $content, $datetime, $countvotes, $countanswers){
			this->id = $qid;
			this->author = $author;
			this->topic = $topic;
			this->content = $content;
			this->datetime = $datetime;
			this->countvotes = $countvotes;
			this->countanswers = $countanswers;
		}
		
		public static function all(){
			$listquestion = [];
			$db = Database::getInstance();
			$data = $db->query('SELECT * FROM questions');
			
			foreach($data->fetchAll() as $question) {
				$listquestion	= new Question($question['qid'], $question['authoid'], $question['topic'], $question['content'], $question['datetime'], $question['countvotes'], $question['countanswers']);
				
				return $listquestion;
			}
		}
	}
?>