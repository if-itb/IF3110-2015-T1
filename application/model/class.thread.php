<?php 
	class Thread {
		public $id;
		public $author;
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
			$req = $db->query('SELECT * FROM sse_thread');

			foreach($req->fetchAll() as $thread) {
				$list[] = new Thread($thread['thread_id'], $thread['user_name'], $thread['thread_topic'], $thread['thread_content'], $thread['n_vote'], $thread['n_answer'], $thread['thread_date']);
			}

			return $list;
		}

		public static function threadById($threadId) {
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_thread WHERE thread_id=' . $threadId);

			$result;
			foreach($req->fetchAll() as $thread) {
				$result = new Thread($thread['thread_id'], $thread['user_name'], $thread['thread_topic'], $thread['thread_content'], $thread['n_vote'], $thread['n_answer'], $thread['thread_date']);
			}

			return $result;
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