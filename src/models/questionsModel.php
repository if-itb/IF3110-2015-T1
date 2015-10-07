<?php

class QuestionsModel extends Model{

	public function listQuestions() {

		$query = $this->mysqli->query("SELECT * FROM `QuestionView` ORDER BY timestamp DESC") or exit($this->mysqli->error);
		$result = array();

		while ($row = $query->fetch_assoc())
			$result[] = $row;

		return $result;

	}

	public function getQuestion($id) {

		$stmt = $this->mysqli->prepare("SELECT * FROM `QuestionView` WHERE id=?") or exit($this->mysqli->error);
		$stmt->bind_param('d', $id);
		$stmt->execute();

		$result = $stmt->get_result();
		return $result->fetch_assoc();

	}

	public function createQuestion($data){

		$stmt = $this->mysqli->prepare("INSERT INTO `Question` (name, email, topic, content) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('ssss', $data['name'], $data['email'], $data['topic'], $data['content']);
		$stmt->execute();

		return $stmt->insert_id;

	}

	public function updateQuestion($id, $data){
		$stmt = $this->mysqli->prepare("UPDATE `Question` SET `name`=?, `email`=?, `topic`=?, `content`=? WHERE `id`=?");
		$stmt->bind_param('ssssd', $data['name'], $data['email'], $data['topic'], $data['content'], $id);
		$stmt->execute();

		return $stmt->affected_rows;
	}

	public function deleteQuestion($id) {
		$stmt = $this->mysqli->prepare("DELETE FROM `Question` WHERE `id`=?");
		$stmt->bind_param('d', $id);
		$stmt->execute();

		return $stmt->affected_rows;
	}

	public function voteQuestion($id,$count) {
		$stmt = $this->mysqli->prepare("UPDATE `Question` SET `voters`=`voters`+? WHERE `id`=?");
		$stmt->bind_param('dd', $count, $id);
		$stmt->execute();

		return $stmt->affected_rows;
	}

	public function searchQuestions($keyword) {
		$stmt = $this->mysqli->prepare("SELECT `Question`.*, (SELECT COUNT(*) FROM `Answer` WHERE `Answer`.`questionID` = `Question`.`id`) as answers FROM `Question` WHERE MATCH (`name`,`topic`,`content`) AGAINST (? IN NATURAL LANGUAGE MODE)");
		$stmt->bind_param('s', $keyword);
		$stmt->execute();

		$resultArray = array();

		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc())
			$resultArray[] = $row;

		return $resultArray;
	}

}