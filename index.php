<!DOCTYPE html>

<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="StackExchange">
		<center>
			<h1>Simple StackExchange</h1><br><br>
		</center>
		<div class="Search">
			<form>
				<center>
					<input type="text" name="search-box" value="">&nbsp;&nbsp;
					<button type="submit" value="Submit">Search</button>
				</center>
			</form>
				<center>
					<p>Cannot find what you are looking for?<a href="question.html"><span style="color : #ffcb55">Ask here</span></a></p><br>
				</center>
		</div>

		<div class="Question">
			<h3>Recently Asked Questions</h3><hr>
			<div class="question-description">
				<div class="votes">
					<div class="count">
						<p>0</p>
					</div>
					<p>votes</p>
				</div>
				<div class="answer">
					<div class="count">
						<p>0</p>
					</div>
					<p>answer</p>
				</div>
				<div class="question-list">
					<p>The question topic goes here</p>
					<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "stackexchange";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);

						// Check connection
						if ($conn->connect_error) {
	  	  			die("Connection failed: " . $conn->connect_error);
						} 
	
						$conn->close();
					?>
					<div class="asked-description">
						<p>Asked by <span style="color : #502fc8">name</span> |
							<span style="color : #ffcb55">edit</span> |
							<span style="color : #fd294a">delete</p>
					</div>
				</div>
			</div>
			<hr>
		</div>

	</div>
</body>

</html>