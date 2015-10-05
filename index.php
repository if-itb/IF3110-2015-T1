<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel="stylesheet" type="text/css" href="indexStyle.css">
		<title>Simple Stack Exchange</title>
	</head>

	<body>
		<h1>Simple Stack Exchange</h1>
		<form>
			<input type="text" name="search" style="width:94%;font-size:16px;">
			<input type="submit" value="Search" style="font-size:16px;">
		</form>
		<h2>
			Cannot find what you are looking for? <a href="ask-question.html" style="text-decoration:none;"><font color="orange">Ask here</font></a>
		</h2>
		<h3>
			Recently Asked Question
		</h3>

		<?php
			// Connect to database
			$con=mysqli_connect("localhost","root","","stackexchange");
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$query = "SELECT username,topic,num_vote FROM question ORDER BY created_date DESC";
			$result = $con->query($query);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<hr>";
        			echo "<table>";
        			echo "<tr>";
        			echo '<td class="number">'. "<b>". $row["num_vote"]. "</b>". "</td>";
        			echo '<td class="number">'. "<b>". "0". "</b>". "</td>";
        			echo '<td class="topic">'. $row["topic"]. "</td>";
        			echo '<td class="empty">'. "</td>";
        			echo '<td class="attribute">'. "</td>";
        			echo '<td class="attribute">'. "</td>";
        			echo "</tr>";
        			echo "<tr>";
        			echo '<td class="text">'. "<b>". "Votes". "</b>". "</td>";
        			echo '<td class="text">'. "<b>". "Answers". "</b>". "</td>";
        			echo '<td class="text">'. "". "</td>";
        			echo '<td class="username">'. "<b>". "asked by ". "<font color='purple'>".$row["username"]."</font>". "</td>";
        			echo '<td class="edit">'.  "<b>". "<a href='edit-question.html' style='text-decoration:none;'>". "<font color='orange'>"."edit"."</font>". "</a>". "</b>". "</td>";
        			echo '<td class="delete">'.  "<b>". "<font color='red'>"."delete"."</font>". "</b>". "</td>";
        			echo "</tr>";
        			echo "</table>";

        		}
			} else {
				echo "<hr>";
			    echo "<p>". "0 results". "</p>";
			}
			$con->close();

		?>
		
	</body>

</html>