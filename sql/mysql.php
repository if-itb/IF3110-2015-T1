<?php
$db = mysqli_connect('localhost', 'root', '', 'StackExchange');
if(!$db){
    die("Connection unsuccessful".mysqli_connect_error());
}
$sql = NULL;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['type'] == 'question_input'){
		$topic = htmlspecialchars($_POST['topic'], ENT_QUOTES);
		$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
		if ($_POST['ask_id'] == '') {
            $sql = "INSERT INTO question (name, email, topic, content, date, vote)
        VALUES ('$_POST[name]','$_POST[email]','$topic','$content', NOW(),0)";
        }
        else{
            $sql = "UPDATE question
			SET
				name='$_POST[name]',
				email='$_POST[email]',
				topic='$topic',
				content='$content'
			WHERE
				id = $_POST[ask_id]";
        }
    }
    else if($_POST['type'] == 'answer_input'){
		$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        $sql = "INSERT INTO answer (name, question_id, email, content, date, vote)
        VALUES ('$_POST[name]','$_POST[question_id]','$_POST[email]','$content', NOW() ,0)";
    }
	$rq = mysqli_query($db,$sql);
}

    
$db->close();

?>