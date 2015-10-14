<?php
    include ("viewlist.php");
    $term = $_POST['search'];
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

    $query = "select * from question where content like '%$term%' or topic like '%$term%' order by no_question desc;";
    $result = $link->query($query);

	if($result->num_rows > 0)
    {
		while($row = $result->fetch_assoc())
        {
            if (strlen($row["content"]) > 100)
            {
                $row["content"] = substr($row["content"],0,100) . "...";
            }
			$newquery = $queryString;
            $newquery = str_replace("{{name}}",$row["name"],$newquery);
            $newquery = str_replace("{{vote}}",$row["vote"],$newquery);
            $newquery = str_replace("{{answer}}",$row["answer"],$newquery);
            $newquery = str_replace("{{topic}}",$row["topic"],$newquery);
            $newquery = str_replace("{{content}}",$row["content"],$newquery);
            $newquery = str_replace("{{no_question}}",$row["no_question"],$newquery);

        
            echo $newquery;            
		}
	}
    else
    {
		echo "<div>No Question</div>";
	}
    mysqli_close($link);
?>