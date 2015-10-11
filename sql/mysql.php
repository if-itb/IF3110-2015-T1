<?php
$db = mysqli_connect('localhost', 'root', '', 'StackExchange');
if(!$db){
    die("Connection unsuccessful".mysqli_connect_error());
}
$sql = NULL;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['type'] == 'question_input'){
		if ($_POST['ask_id'] == '') {
            $sql = "INSERT INTO question (name, email, topic, content, date, vote)
        VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]', NOW(),0)";
        }
        else{
            $sql = "UPDATE question
			SET
				name='$_POST[name]',
				email='$_POST[email]',
				topic='$_POST[topic]',
				content='$_POST[content]'
			WHERE
				id = $_POST[ask_id]";
        }
    }
    else if($_POST['type'] == 'answer_input'){
        $sql = "INSERT INTO answer (name, question_id, email, content, date, vote)
        VALUES ('$_POST[name]','$_POST[question_id]','$_POST[email]','$_POST[content]', NOW() ,0)";
    }
	$rq = mysqli_query($db,$sql);
}

    
$db->close();

?>