<?php
	class Answer {
			public $aid;
			public $authorname;
			public $authoremail;
			public $qid;
			public $content;
			public $datetime;
			public $countvotes;

			public function __construct($aid, $authorname, $authoremail, $qid, $topic, $content, $datetime, $countvotes){
				$this->aid = $aid;
				$this->authorname = $authorname;
				$this->authoremail = $authoremail;
				$this->qid = $qid;
				$this->content = $content;
				$this->datetime = $datetime;
				$this->countvotes = $countvotes;
			}
		
		public static function all(){
			$listanswer = [];
			$db = Database::getInstance();
			$data = $db->query('SELECT * FROM answers');
			
			foreach($data->fetchAll() as $answer) {
				$listanswer= new Answer($Answer['aid'], $Answer['authorname'],$Answer['authoremail'], $Answer['qid'], $Answer['content'], $Answer['datetime'], $Answer['countvotes']);
				
				return $listanswer;
			}
		}
?>