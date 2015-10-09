<?php
DEFINE('USER','root');
DEFINE('PASSWORD','');
DEFINE('HOST','localhost');
DEFINE('NAME','StackExchange');

$conn = mysqli_connect(HOST, USER, PASSWORD, NAME);
if(!$conn){
    die("Connection unsuccessful".mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = NULL;
    if ($_POST['id'] == '') {
            $sql = "INSERT INTO question (name, email, topic, content, date, vote)
        VALUES ('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]', NOW() ,0)";
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
    if (mysqli_query($conn,$sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>