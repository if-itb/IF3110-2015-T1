<?php

class AnswersModel extends Model{

	public function listAnswers($questionID) {

		$stmt = $this->mysqli->prepare("SELECT * FROM `Answer` WHERE `questionID` = ? ORDER BY voters DESC");
		$stmt->bind_param('d', $questionID);
		$stmt->execute();

		$resultArray = array();

		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc())
			$resultArray[] = $row;

		return $resultArray;

	}

	public function getAnswer($id) {

		$stmt = $this->mysqli->prepare("SELECT * FROM `Answer` WHERE id=?") or exit($this->mysqli->error);
		$stmt->bind_param('d', $id);
		$stmt->execute();

		$result = $stmt->get_result();
		return $result->fetch_assoc();

	}

	public function createAnswer($data){

		$stmt = $this->mysqli->prepare("INSERT INTO `Answer` (questionID, name, email, content) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('dsss', $data['questionID'], $data['name'], $data['email'], $data['content']);
		$stmt->execute();

		return $stmt->insert_id;

	}

	public function voteAnswer($id,$count) {
		$stmt = $this->mysqli->prepare("UPDATE `Answer` SET `voters`=`voters`+? WHERE `id`=?");
		$stmt->bind_param('dd', $count, $id);
		$stmt->execute();

		return $stmt->affected_rows;
	}

}