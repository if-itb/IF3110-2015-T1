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
			$stmt = $db->query('SELECT * FROM questions ORDER BY datetime DESC');
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
				echo 'Your question has been posted!';
		}
		
		public static function vote($vote, $qid){
			$db = Database::getInstance();

			$stmt = $db->prepare("SELECT countvotes FROM questions WHERE qid=:qid LIMIT 1");
			$stmt->execute(array('qid'=>$qid));
			$row = $stmt->fetch();
			$newcountvotes = intval($row['countvotes']) + $vote;
			
			$stmt = $db->prepare("UPDATE questions SET countvotes=:countvotes WHERE qid=:qid");
			$stmt->execute(array('countvotes'=>$newcountvotes, 'qid'=>$qid));
			return $newcountvotes;
		}
		
		public static function edit($qid){
			$db = Database::getInstance();			
			$qid = intval($qid);
			$stmt = $db->prepare('SELECT * FROM questions WHERE qid = :qid LIMIT 1');
			
			$stmt->execute(array('qid' => $qid));
			$question = $stmt->fetch();
			
			return new Question($question['qid'], $question['authorname'],$question['authoremail'], $question['topic'], $question['content'], $question['datetime'], $question['countvotes'], $question['countanswers']);
			
		}
		
		public function update(){
			$db = Database::getInstance();
			$stmt = $db->prepare('UPDATE questions SET authorname=:authorname, authoremail=:authoremail, topic=:topic, content=:content, datetime=:datetime WHERE qid=:qid');
			
			$stmt->execute(array('authorname'=>$this->authorname, 'authoremail'=>$this->authoremail, 'topic'=>$this->topic, 'content'=>$this->content, 'datetime'=>$this->datetime, 'qid'=>$this->qid));
		}
		
		public static function delete($qid){
			$db = Database::getInstance();
			$stmt = $db->prepare('DELETE FROM anwers WHERE qid=:qid');
			$stmt->execute(array('qid'=>$qid));
			
			$stmt = $db->prepare('DELETE FROM questions WHERE qid=:qid');
			$stmt->execute(array('qid'=>$qid));
			
		}
	}
?>