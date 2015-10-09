<?php
DEFINE('USER','root');
DEFINE('PASSWORD','');
DEFINE('HOST','localhost');
DEFINE('NAME','StackExchange');

$conn = mysqli_connect(HOST, USER, PASSWORD, NAME);
if(!$conn){
    die("Connection unsuccessful".mysqli_connect_error());
}

$sql = "INSERT INTO question (name, email, topic, content, vote)
VALUES ('John','john@example.com')";

if (mysqli_query($conn,$sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>