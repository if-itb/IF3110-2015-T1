<?php
	$kind = $_GET["kind"];
	$isup = $_GET["isUp"];
	$id = $_GET["id"];
 

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


	if($kind == "question")
    {
		if($isUp == "true")
        {
			$value = "vote+1 ";
		}
        else
        {
			$value = "vote-1 ";
		}
		$query = "update question set vote=".$value." where no_question=".$id;
	} 
    else if($kind == "answer")
    {
		if($isup == "true")
        {
			$value = "vote+1 ";
		}else
        {
			$value = "vote-1 ";
		}
		$query = "update answer set vote=".$value." where no_answer=".$id;
	}

	if ($link->query($query) === TRUE) 
    {
	    echo "yes";
	} 
    else 
    {
	    echo "no";
	}
?>