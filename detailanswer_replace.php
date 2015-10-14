<?php
    include ("viewdetail_question.php");
$no_question = $_GET["no_question"];
    include ("viewdetail_answer.php");
    
//$no_question = $_GET["no_question"];
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "WBD";

	//Create Connection
	$link = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($link->connect_error) {
	    die("Connection failed: " . $link->connect_error);
	}


    $query = "select * from answer where no_question=$no_question";


    $result = $link->query($query);
	if($result->num_rows > 0)
    {
        
?>

    <div class="board"><strong><?php echo $result->num_rows . " Answer";?></strong></div>
    
<?php
        while($row = $result->fetch_assoc())
        {
            $newquery = $queryString;
            $newquery = str_replace("{{name}}",$row["name"],$newquery);
            $newquery = str_replace("{{vote}}",$row["vote"],$newquery);
            $newquery = str_replace("{{content}}",$row["content"],$newquery);
            $newquery = str_replace("{{no_question}}",$row["no_question"],$newquery);
            $newquery = str_replace("{{no_answer}}",$row["no_answer"],$newquery);
            $newquery = str_replace("{{date}}",$row["date"],$newquery);

            echo $newquery;

        }
	}

mysqli_close($link);

?>