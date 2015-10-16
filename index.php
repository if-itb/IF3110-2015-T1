<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="homestyles.css">
    <title>Simple Stack Exchange</title>
</head>
<body>

<h1>Simple StackExchange</h1>
<br/>
<form>
    <input type="search" name="searchquestion" id="searchbox">
    <input type="submit" value="Search" id="searchq">
    <p>Cannot find what you are looking for?<a href="createquestion.php" id="createq">Ask here</a></p>
</form>

<div class="qlist">
    <h3>Recently Asked Questions</h3>
    <hr>
    <table>
    <?php
        $servername = "localhost";
        $username = "root";
        $password="";
        $db = "stackexchange";

        $mysqli = new mysqli($servername, $username, $password, $db);

        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $query = "SELECT * FROM question";
        $result = $mysqli->query($query);
        $numrow = $result->num_rows;
        $i = 0;
        while ($i < $numrow) {
            $row = $result->fetch_assoc();
            $votes = $row["votes"];
            $name = $row["name"];
            $email = $row["email"];
            $topic = $row["topic"];
            $content = $row["content"];
            ?>
        <tr>
            <td><?php echo $votes ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $topic ?></td>
            <td><?php echo $content ?></td>
        </tr>
        <?php $i++;} ?>
        </table>
        <?php $mysqli->close(); ?>

</div>


</body>
</html>