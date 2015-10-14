<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Question</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<a href="index.php"><H1>SIMPLE STACK EXCHANGE</H1></a>	<br><br>
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
		<HR width = 80% height=10%>		
		<br>	
		<?php
		echo "<div class='qcon'>$con</div>";
		echo "<p id =qv>".$vote."</p><br>";
		echo "<div class='qvote'>";
		echo "<img src='img/thumbsup.png' onclick='vote(".$row['qid'].",1)'>&nbsp";
		echo "<img src='img/thumbsdown.png' onclick='vote(".$row['qid'].",2)'></div>";
		echo "
			
		
			<div class='usinfo'>
			asked by <p id='blue'>" . $row["askname"]. " [" . $row["email"]."]</p> <b>&nbsp&nbsp|&nbsp&nbsp</b>
			<form action='ask.php?mode=1' method='post'>
 				<input type='hidden' name='name' value='".$row["askname"]."'>
 				<input type='hidden' name='qid' value='".$row["qid"]."'>
 				<input type='hidden' name='mail' value='".$row["email"]."'>
 				<input type='hidden' name='topic' value='".$row["topic"]."'>
 				<input type='hidden' name='qcontent' value='".$row["content"]."'>				
				<button id='edit'>Edit</button>
			</form> <b>&nbsp&nbsp|&nbsp&nbsp</b>
			<button id='del' onclick='del(".$row['qid'].",\"".$row['topic']."\",\"".$row['askname']."\")'>Delete</button>		
			</div>
			<br><br><br><br><br>
			";
			
		$sql = "select * from answer where qid=".$qid;
		$result = mysqli_query($conn, $sql);
		echo "<H4>".mysqli_num_rows($result)." Answers</H4><hr width=80%>";
		while ($row = mysqli_fetch_assoc($result)) {			
			$name = $row['ansname'];
			$vote = $row['vote'];
			$mail = $row['email'];
			$con = $row['content'];
			
			echo "<br><br><div class='qcon'>$con</div>";
			echo "<p id =av".$row['aid'].">".$vote."</p><br>";						
			echo "<div class='usinfo'>answered by <p id='blue'>".$name."</p><br><br></div>";	
			echo "<div class='qvote'>";
			echo "<img src='img/thumbsup.png' onclick='vote(".$row['aid'].",3)'>&nbsp";
			echo "<img src='img/thumbsdown.png' onclick='vote(".$row['aid'].",4)'></div>";
			echo "<hr width=80%>";
		}
		
		
		
		?>
		<H3>Your Answer</H3>

		<form name="qForm" action="answered.php?id=<?php echo $qid;?>" method="post" onsubmit="return validateForm()">
		<textarea id='name' name="name" onfocus="if (this.value == 'Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name';}">Name</textarea><br>
		<br><textarea id='mail' name="mail" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}">Email</textarea><br>
		<br><textarea id='content' name="acontent" onfocus="if (this.value == 'Content') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Content';}">Content</textarea><br>	
		<br><div class='post'><input type="submit" value="Post"></div>
		</form> 
		
		<?php mysqli_close($conn); ?>
		
		<script>
		function vote(id,mode) {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (mode==1 || mode==2) 
					document.getElementById("qv").innerHTML = xmlhttp.responseText;
				else
					document.getElementById("av"+id).innerHTML = xmlhttp.responseText;
			    }
			}	
			//alert("vote.php?id="+id+"&mode="+mode);
			xmlhttp.open("GET","vote.php?id="+id+"&mode="+mode,true);
			xmlhttp.send();	
			alert("Vote Success!");
		
		}
		function validateForm() {
			
			var name = document.getElementById("name").value;
			var mail = document.getElementById("mail").value;
			var cont = document.getElementById("content").value;
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			
	
			if (name == null || name == "" || name == "Name") {
				alert("Name must be filled out");
				return false;
			}
			if (mail == null || mail == "" || mail == "Email") {
				alert("Email must be filled out");
				return false;
			}
			if (!validateEmail(mail)) {
				alert("Incorrect email address");
				return false;
			}

			if (cont == null || cont == "" || cont == "Content") {
				alert("Content must be filled out");
				return false;
			}
			
			    
		}
		function validateEmail(email) {
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			return re.test(email);
		}		
		function del(id, topic, asker) {
			var r = confirm("Are you sure to delete question '" + topic + "' asked by [" + asker + "]? "+ window.location.pathname);
		    
			if (r == true) {
				xhttp = new XMLHttpRequest();	
				xhttp.open("GET", "del.php?id="+id, true);
				xhttp.send();		
				alert("Delete Success!");							
				window.location.assign("/WBD/index.php");
			}
			

			
		}		
		</script>
		
		
	</body>
</html>
