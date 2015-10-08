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
			$query = "SELECT id_question, username,topic,content,num_vote FROM question ORDER BY created_date DESC";
			$result = $con->query($query);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<hr>";
        			echo "<table>";
        			echo "<tr>";
        			echo '<td class="number" rowspan="2">'. "<b>". $row["num_vote"]. "<br>". "Votes". "</b>". "</td>";
        			$sql = "SELECT count(*) AS total FROM answer where id_question = ". $row["id_question"];
					$result2 = $con->query($sql);
					$values = $result2->fetch_assoc();
					$num_rows = $values['total']; 
        			echo '<td class="number" rowspan="2">'. "<b>". $num_rows. "<br>". "Answers". "</b>". "</td>";
        			echo '<td class="topic">'. '<a href="show-answer.php?id='. $row["id_question"].'" style="text-decoration:none;">'. "<font color='black'>". $row["topic"]. "</font>". "</a>". "</td>";
        			echo "</tr>";

        			echo "<tr>";
        			echo '<td class="content">'. $row["content"]. "</td>";
        			echo "</tr>";

        			echo "<tr>";
        			echo "<td colspan='3' class='attribute' style=text-align:right;>". "<b>". "asked by ". "<font color='purple'>".$row["username"]."</font>". " | ".
        			"<a href='edit-question.html' style='text-decoration:none;'>". "<font color='orange'>"."edit"."</font>". "</a>". " | ".
        			"<font color='red'>"."delete"."</font>". "</b>". "</td>";
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