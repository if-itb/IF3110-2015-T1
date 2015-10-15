<?php
	$kind = $_GET["kind"];
	$isUp = $_GET["isUp"];
	$id = $_GET["id"];

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "WBD";

	//Create Connection
	$link = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($link->connect_error) 
	{
	    die("Connection failed: " . $link->connect_error);
	}
echo $kind;
echo $id;
	if($kind == "question ")
    {
    	$query1 = "select vote from question where no_question=".$id;    	
    	$row = $link->query($query1) -> fetch_assoc();
		if($isUp === "true")
        {
			$value = $row["vote"]+1;
		}
        else
        {
			$value = $row["vote"]-1;
		}
		$query2 = "update question set vote=".$value." where no_question=".$id;
	}
    else if($kind == "answer ")
    {
    	$query1 = "select vote from answer where no_answer=".$id;    	
    	$row = $link->query($query1) -> fetch_assoc();
    	//echo "ioni = ".$row["no_answer"];
		if($isUp === "true")
        {
			$value = $row["vote"]+1;
		}
        else
        {
			$value = $row["vote"]-1;
		}
		$query2 = "update answer set vote=".$value." where no_answer=".$id;
	}

	if ($link->query($query2) === TRUE) 
    {
	    echo "yes";
	} 
    else 
    {
	    echo "no";
	}
?>