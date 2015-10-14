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
			$stmt = $db->prepare('SELECT * FROM answers WHERE qid=:qid');
			$stmt->execute(array('qid'=>$qid));
			while($answer = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$listanswer[]	= new Answer($answer['aid'], $answer['authorname'],$answer['authoremail'], $answer['qid'], $answer['content'], $answer['datetime'], $answer['countvotes']);
			}
			if(!isset($listanswer)){
				$listanswer = [];
			}
			return $listanswer;
		}
		
		public function post(){
			$db = Database::getInstance();
			$stmt = $db->prepare('INSERT INTO answers(authorname, authoremail, qid, content, datetime) VALUES (:authorname, :authoremail, :qid, :content, :datetime)');
			if($stmt->execute(array('authorname'=>$this->authorname, 'authoremail'=>$this->authoremail, 'qid'=>$this->qid, 'content'=>$this->content, 'datetime'=>$this->datetime)))
				echo 'ok';
		}
	}
?>