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
			$this->qid = $qid;
			$this->authorname = $authorname;
			$this->authoremail = $authoremail;
			$this->topic = $topic;
			$this->content = $content;
			$this->datetime = $datetime;
			$this->countvotes = $countvotes;
			$this->countanswers = $countanswers;
		}
		
		public static function all(){
			$db = Database::getInstance();
			$stmt = $db->query('SELECT * FROM questions');
			while($question = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$listquestion[]	= new Question($question['qid'], $question['authorname'],$question['authoremail'], $question['topic'], $question['content'], $question['datetime'], $question['countvotes'], $question['countanswers']);
			}
			return $listquestion;
		}
		
		public static function get($qid){
			$db = Database::getInstance();			
			$qid = intval($qid);
			$stmt = $db->prepare('SELECT * FROM questions WHERE qid = :qid LIMIT 1');
			
			$stmt->execute(array('qid' => $qid));
			$question = $stmt->fetch();
			
			return new Question($question['qid'], $question['authorname'],$question['authoremail'], $question['topic'], $question['content'], $question['datetime'], $question['countvotes'], $question['countanswers']);
			
		}
		
		public function post(){
			$db = Database::getInstance();
			$stmt = $db->prepare('INSERT INTO questions(authorname, authoremail, topic, content, datetime) VALUES (:authorname, :authoremail, :topic, :content, :datetime)');
			if($stmt->execute(array('authorname'=>$this->authorname, 'authoremail'=>$this->authoremail, 'topic'=>$this->topic, 'content'=>$this->content, 'datetime'=>$this->datetime)))
				echo 'ok';
		}
	}
?>