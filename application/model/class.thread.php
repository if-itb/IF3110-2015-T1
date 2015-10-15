<?php 
	class Thread {
		public $id;
		public $author;
		public $email;
		public $topic;
		public $content;
		public $n_vote;
		public $n_answer;
		public $date;

		public function __construct($id, $author, $topic, $content, $n_vote, $n_answer, $date) {
			$this->id = $id;
			$this->author = $author;
			$this->topic = $topic;
			$this->content = $content;
			$this->n_vote = $n_vote;
			$this->n_answer = $n_answer;
			$this->date = $date;
		}

		public static function all() {
			$list = [];
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_thread ORDER BY thread_id DESC');
			$threadObj = NULL;

			foreach($req->fetchAll() as $thread) {
				$threadObj = new Thread($thread['thread_id'], $thread['user_name'], $thread['thread_topic'], $thread['thread_content'], $thread['n_vote'], $thread['n_answer'], $thread['thread_date']);				
				$threadObj->email = $thread['user_email'];
				$list[] = $threadObj;
			}

			return $list;
		}

		public static function threadById($threadId) {
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_thread WHERE thread_id=' . $threadId);

			$result;
			foreach($req->fetchAll() as $thread) {
				$result = new Thread($thread['thread_id'], $thread['user_name'], $thread['thread_topic'], $thread['thread_content'], $thread['n_vote'], $thread['n_answer'], $thread['thread_date']);
				$result->email = $thread['user_email'];
			}

			return $result;
		}

		public static function post($username, $email, $topic, $content) {
			$dates = date("Y-m-d H:i:s");
			$db = Connection::getInstance();
			$sql = "INSERT INTO sse_thread (user_name,user_email,thread_topic,thread_content,thread_date) 
							VALUES (:username,:email,:topic,:content,:dates)";

			$statement = $db->prepare($sql);
			$statement->execute(array(':username' => $username,
                  			':email' => $email,
                  			':topic' => $topic,
                  			':content' => $content,
                  			':dates' => $dates));
		}

		public static function update($id, $username, $email, $topic, $content) {
			$db = Connection::getInstance();
			$sql = "UPDATE sse_thread
							SET user_name=?, user_email=?, thread_topic=?, thread_content=?
							WHERE thread_id=?";

			$statement = $db->prepare($sql);
			$statement->execute(array($username, $email, $topic, $content, $id));
		}

		public static function delete($id) {
			$db = Connection::getInstance();
			$sql = "DELETE FROM sse_thread WHERE thread_id = :id";
			$statement = $db->prepare($sql);
			$statement->execute(array(':id' => $id));
		}

		public function getShrinkContent($string, $limit, $break = ".", $pad = "...") {
			// Original PHP code by Chirp Internet: www.chirp.com.au
			// Get from http://www.the-art-of-web.com/php/truncate/

			// return with no change if string is shorter than $limit
			if(strlen($string) <= $limit) return $string; 

			// is $break present between $limit and the end of the string? 
			if(false !== ($breakpoint = strpos($string, $break, $limit))) { 
				if($breakpoint < strlen($string) - 1) { 
					$string = substr($string, 0, $breakpoint) . $pad; 
				} 
			} 
			return $string;
		}

	}
?>