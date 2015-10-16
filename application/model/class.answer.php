<?php 
	class Answer {
		public $id;
		public $author;
		public $email;
		public $content;
		public $n_vote;
		public $date;

		public function __construct($id, $author, $email, $content, $n_vote, $date) {
			$this->id = $id;
			$this->author = $author;
			$this->email = $email;
			$this->content = $content;
			$this->n_vote = $n_vote;
			$this->date = $date;
		}

		public static function answerFor($threadId) {
			$list = [];
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_answer WHERE thread_id=' . $threadId . ' ORDER BY n_vote DESC');

			foreach($req->fetchAll() as $answer) {
				$list[] = new Answer($answer['answer_id'], $answer['user_name'], $answer['user_email'], $answer['answer_content'], $answer['n_vote'], $answer['answer_date']);
			}

			return $list;
		}

		public static function upvote($id) {
			$db = Connection::getInstance();
			$sql = "UPDATE sse_answer
							SET n_vote = n_vote + 1
							WHERE answer_id=?";

			$statement = $db->prepare($sql);
			$statement->execute(array($id));
		}

		public static function downvote($id) {
			$db = Connection::getInstance();
			$sql = "UPDATE sse_answer
							SET n_vote = n_vote - 1
							WHERE answer_id=?";

			$statement = $db->prepare($sql);
			$statement->execute(array($id));
		}
	}
?>