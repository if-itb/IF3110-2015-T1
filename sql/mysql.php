<?php
DEFINE('USER','root');
DEFINE('PASSWORD','');
DEFINE('HOST','localhost');
DEFINE('NAME','StackExchange');

$conn = mysqli_connect(HOST, USER, PASSWORD, NAME);
if(!$conn){
    die("Connection unsuccessful".mysqli_connect_error());
}
$sql = NULL;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['type'] == 'question'){
        if ($_POST['id'] == '') {
            $sql = "INSERT INTO question (name, email, topic, content, date, vote, answer)
        VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]', NOW(),0, 0)";
        }
        else{
            $sql = "UPDATE question
			SET
				name='$_POST[name]',
				email='$_POST[email]',
				topic='$_POST[topic]',
				content='$_POST[content]'
			WHERE
				id = $_POST[id]";
        }
    }
    else if($_POST['type'] == 'answer'){
        $sql = "INSERT INTO answer (name, question_id, email, content, date, vote)
        VALUES ('$_POST[name]','$_POST[question_id]','$_POST[email]','$_POST[content]', NOW() ,0)";
    }
    if (mysqli_query($conn,$sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $sql = "DELETE from question WHERE id=$_GET[id]";
    }
}

$conn->close();

?>