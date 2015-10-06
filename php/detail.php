<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 11:49
 */
$id = $_POST['idClicked'];
$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM questions WHERE q_id=$id";
$result = mysqli_query($link, $query) ;
$row =mysqli_fetch_assoc($result);
mysqli_close($link);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<div class="container">
    <h1>Simple StackExchange</h1>
    <h2><?php echo $row['qtopic']?></h2>
    <div class="row rowQuestion clearfix">
        <div class="colVote">
            <div class="arrow-up"></div>
            <span class="vote"><?php echo $row['vote'] ?></span>
            <div class="arrow-down"></div>
        </div>
        <div class="colQuestion">
            <p><?php echo $row['qcontent'] ?></p>
            <span>Asked By <?php echo $row['email']." at ". $row['date'] ?></span>
        </div>
    </div>
    <p id="idClicked" style="display:none"><?php echo $id?></p>
</div>

<script>
    (function() {
        document.getElementsByClassName("arrow-up")[0].onclick = function(event) {
            //event.preventDefault();
            var http = new XMLHttpRequest();
            var url = "getVote.php";
            var qID = document.getElementById("idClicked").innerHTML;
            var params = "qID="+qID+"&operation=plus";
            http.open("POST", url, true);

            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.setRequestHeader("Content-length", params.length);
            http.setRequestHeader("Connection", "close");

            http.onreadystatechange = function() {
                if(http.readyState == 4 && http.status == 200) {
                  document.getElementsByClassName("vote")[0].innerHTML = http.responseText;
                }
            }
            http.send(params);
        }

        document.getElementsByClassName("arrow-down")[0].onclick = function(event) {
            //event.preventDefault();
            var http = new XMLHttpRequest();
            var url = "getVote.php";
            var qID = document.getElementById("idClicked").innerHTML;
            var params = "qID="+qID+"&operation=minus";
            http.open("POST", url, true);

            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.setRequestHeader("Content-length", params.length);
            http.setRequestHeader("Connection", "close");

            http.onreadystatechange = function() {
                if(http.readyState == 4 && http.status == 200) {
                    document.getElementsByClassName("vote")[0].innerHTML = http.responseText;
                }
            }
            http.send(params);
        }
    })();
</script>

</body>
</html>
