<?php
$servername = "localhost";
$username = "root";

// Create connection
$conn = new mysqli($servername, $username);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
}

echo "Connected successfully<br>";

// Create database
$create_db = "CREATE DATABASE stackExchange";
if ($conn->query($create_db) === TRUE) {
    echo "Database created<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Connect to DB
$dbname = "stackExchange";
if (!mysqli_select_db($conn,$dbname)) {
    die("Uh oh, couldn't select database $dbname");
}

// Create table
$create_table = "CREATE TABLE questions (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        topic VARCHAR(30) NOT NULL,
        content VARCHAR(1000) NOT NULL,
        time TIMESTAMP
        )";
if ($conn->query($create_table) === TRUE) {
    echo "Table created<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
?>
