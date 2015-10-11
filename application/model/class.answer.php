<?php 
	class Answer {
		public $id;
		public $author;
		public $content;
		public $n_vote;
		public $date;

		public function __construct($id, $author, $content, $n_vote, $date) {
			$this->id = $id;
			$this->author = $author;
			$this->content = $content;
			$this->n_vote = $n_vote;
			$this->date = $date;
		}

		public static function answerFor($threadId) {
			$list = [];
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_answer WHERE thread_id=' . $threadId);

			foreach($req->fetchAll() as $answer) {
				$list[] = new Answer($answer['answer_id'], $answer['user_name'], $answer['answer_content'], $answer['n_vote'], $answer['answer_date']);
			}

			return $list;
		}
	}
?>