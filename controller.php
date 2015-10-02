<?php
	require_once('../config.php');

	/* Redirector */
	function redirectTo($page) {
		header("Location: $page");
		die();
	}

	/* Question Related */
	function getListOfQuestionLimited($start) {
		global $conn;
		
		$start *= 5;

		$query = "SELECT id, name, topic, vote, is_delete FROM question ORDER BY id DESC LIMIT ". $start .", 5";
		$result = mysqli_query($conn, $query);

		$ret = array();		

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
				$question = array();
        		$question["id"] = $row['id'];
        		$question["name"] = $row['name'];
				$question["topic"] = $row["topic"];
				$question["vote"] = $row["vote"];
				$question["is_delete"] = $row["is_delete"];
		    	array_push($ret, $question);
		    }
		}

		return $ret;				
	}

	function getAnswerCount($id_q) {
		global $conn;
		
		$query = "SELECT COUNT(*) as total FROM answer WHERE id_q = ". $id_q;
		$result = mysqli_query($conn, $query);

		$ret = "";
		$row = mysqli_fetch_assoc($result);
		
		$ret = $row["total"];

		return $ret;			
	}

	/* Answers Related */

	/* SEO Optimization Functions */
	function replace_dashes($string) {
	    $string = str_replace(" ", "-", $string);
	    return $string;
	}

	function delete_punctuation($string) {
		$punctuation = array(",", ".", "/", "?", "!", "-", "+", "=", "_", "%", "$", "#", "@", "*", "&", "(", ")", "<", ">", "\\", "[", "]", "{", "}", ";", ":", "\'", "\"");
		$string = str_replace($punctuation, "", $string);
	    return $string;		
	}

	function get_clean_string($string) {
		return replace_dashes(delete_punctuation($string));
	}

?>