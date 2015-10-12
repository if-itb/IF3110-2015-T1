<?php
$servername = "localhost";
$username = "stckxchg";
$password = "";
$dbname = "stackExchange";

$questionID = $_GET['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

$delete_q = "DELETE FROM `stackexchange`.`questions` WHERE `questions`.`question_id` = $questionID";

if ($conn->query($delete_q) === TRUE) {
?>
    <script type="text/javascript">
        alert('Question successfully deleted, you will be automatically redirected to home.');
        window.location = "../index.php";
    </script>
<?php
} else {
    echo "Error deleting question: " . $conn->error . "<br>";
}

$conn->close();
?>
