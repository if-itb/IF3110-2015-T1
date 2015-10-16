<!DOCTYPE html>
<html>

<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href='style.css'/>
  	<script type="text/javascript" src="script.js"></script>
  	<title>Simple StackExchange</title>
</head>

<body>

<div class="title">Simple StackExchange</div>

<br><br><br><br>

<form name='searchForm' action='search.php' method='post'>
  <input class='form-search' type="text" name="search_key" size='120%'>
  <button class='button-search' type='submit'> Search </button>
</form>



<div class="smalltitle-center">Cannot find what you are looking for? <a id = "color-orange" href="ask.php" >Ask here</a></div>
<br>

<div class="smalltitle-left"> Recently Asked Questions </div>

<hr class='line'>



<?php include 'connect.php';?>

<?php
	if (isset($_GET['search_key'])){
		$search_key = $_GET['search_key'];
		$sql =  "SELECT * FROM Question WHERE  topic LIKE '%".$search_key."%' OR content LIKE '%".$search_key ."%'";
		$result = mysqli_query($conn, $sql);
	}
	else{
		$sql = "SELECT question_id, vote, topic, content, name FROM Question";
		$result = mysqli_query($conn, $sql);
	}
	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	if ($row['vote'] > 1){
					$vote = "Votes";
				}
				else{
					$vote = "Vote";
				}
			//for the answer count
			$sql = "SELECT count(*) AS answer_count FROM Answer
			WHERE question_id = $row[question_id]";
			$result2 = mysqli_query($conn, $sql);
				$row2 = mysqli_fetch_assoc($result2);
			if ($row2['answer_count'] > 1){
				$answer = "Answers";
			}
			else{
				$answer = "Answer";
			}
			echo
	    		"<div class='block-question'>"
	    			."<div class='bquestion-vote'>" 
	    				.$row['vote']
	    				."<br>"
	    				.$vote
	    			."</div>"
		    		."<div class='bquestion-answer'>" 
		    			.$row2['answer_count']
		    			."<br>"
		    			.$answer
		    		."</div>"
		    		."<div class='bquestion-content'>" 
	    				."<a id='color-black' href=# onclick='goToQuestion(".$row['question_id'].")' "."'>"
	    					.$row['topic']
	    				."</a>"
	    				."<br>"
	    				.$row['content']
	    				."<br><br>"
	    			."</div>"
	    			."<div class='bquestion-identity'>" 
				    	."asked by "
				    	."<a id='color-blue'>"
				    		.$row['name']
				    	."</a>"
				    	." | "
				    	."<a id='color-orange' href=# onclick='editconfirm(".$row['question_id'].")'"."'>"
				    		."edit"
				    	."</a>"
				    	." | "
				    	."<a id='color-red' href=# onclick='deleteconfirm(".$row['question_id'].")' "."'>"
				    		."delete"
				    	."</a>"
			    	."</div>"
			    ."</div>"
			   	."<hr class='line'>"
			;		    	
	    }
	} else {
	    echo 
	    	"<div class = 'result-zero'>"
	    		."Sorry, nothing matches your search"
	    	."</div>";
	}
?>



</body>
</html>





