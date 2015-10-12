<?php
	class Question {
		public $qid;
		public $authorname;
		public $authoremail;
		public $topic;
		public $content;
		public $datetime;
		public $countvotes;
		public $countanswers;
		
		public function __construct($qid, $authorname, $authoremail, $topic, $content, $datetime, $countvotes, $countanswers){
			this->id = $qid;
			this->authorname = $authorname;
			this->authoremail = $authoremail;
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
				$listquestion	= new Question($question['qid'], $question['authorname'],$question['authoremail'], $question['topic'], $question['content'], $question['datetime'], $question['countvotes'], $question['countanswers']);
				
				return $listquestion;
			}
		}
	}
?>