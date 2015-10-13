<?php
	class Answer {
			public $aid;
			public $authorname;
			public $authoremail;
			public $qid;
			public $content;
			public $datetime;
			public $countvotes;

			public function __construct($aid, $authorname, $authoremail, $qid, $content, $datetime, $countvotes){
				$this->aid = $aid;
				$this->authorname = $authorname;
				$this->authoremail = $authoremail;
				$this->qid = $qid;
				$this->content = $content;
				$this->datetime = $datetime;
				$this->countvotes = $countvotes;
			}
		
		public static function all($qid){
			$db = Database::getInstance();
			$stmt = $db->query('SELECT * FROM answers');
			while($answer = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$listanswer[]	= new Answer($answer['qid'], $answer['authorname'],$answer['authoremail'], $answer['topic'], $answer['content'], $answer['datetime'], $answer['countvotes'], $answer['countanswers']);
			}
			return $listanswer;
			}
	}
?>