<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
		<?php
		$qid = $_GET['id'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sse";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Post failed, please resubmit your question.");
		}
		//Fetch Question
		$sql =  "select * from question where qid=".$qid;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$topic = $row['topic'];
		$name = $row['askname'];
		$vote = $row['vote'];
		$mail = $row['email'];
		$con = $row['content'];
		?>		
		<H4><?php echo $topic;?></H4>		
		<p> <?php echo $con;?></p>
		<p>vote =<?php echo "<H6 id =q>".$vote."</H6>";?> | asked by <?php echo $name;?> | edit | delete </p>
		<?php
		echo "<button onclick='vote(".$row['qid'].",1)'>Vote Up</button>";
		echo "<button onclick='vote(".$row['qid'].",2)'>Vote Down</button>";
		
			
		$sql = "select * from answer where qid=".$qid;
		$result = mysqli_query($conn, $sql);
		echo "<H4>".mysqli_num_rows($result)." Answers</H4>";
		while ($row = mysqli_fetch_assoc($result)) {
			$name = $row['ansname'];
			$vote = $row['vote'];
			$mail = $row['email'];
			$con = $row['content'];
			echo "-------------------------<br><p>$con</p>";
			echo "vote = <H6 id='a".$row['aid']."'>".$vote."</H6> | answered by ".$name."<br><br>";	
			echo "<button onclick='vote(".$row['aid'].",3)'>Vote Up</button>";
			echo "<button onclick='vote(".$row['aid'].",4)'>Vote Down</button>";
		}
		
		
		
		?>
		<H4>Your Answer</H4>
		
		<form action="answered.php?id=<?php echo $qid;?>" method="post">
		<input type="text" name="name"><br>
		<input type="text" name="mail"><br>		
		<textarea name="acontent" cols=50 rows=5></textarea><br>
		<input type="submit" value="Post">
		</form> 
		
		<?php mysqli_close($conn); ?>
		
		<script>
		function vote(id,mode) {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (mode==1 || mode==2) 
					document.getElementById("q").innerHTML = xmlhttp.responseText;
				else
					document.getElementById("a"+id).innerHTML = xmlhttp.responseText;
			    }
			}	
			//alert("vote.php?id="+id+"&mode="+mode);
			xmlhttp.open("GET","vote.php?id="+id+"&mode="+mode,true);
			xmlhttp.send();	
			alert("Vote Success!");
		
		}
		
		</script>
		
		
	</body>
</html>
