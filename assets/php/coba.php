<?php
$servername = "localhost";
$username = "herifauzan";
$password = "HFR_78itb";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, topik, konten FROM question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>id: " . $row["id"]. " topik: " . $row["topik"]. "konten:" . $row["konten"]. "</p><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 