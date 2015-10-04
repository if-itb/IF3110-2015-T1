<html>
	<head>
		<title>Display Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php
			if (!isset($_GET["qid"]) || !is_numeric($_GET["qid"])){
				echo '<p>Goblok lu</p>';
				exit();
			}
			if ($_GET["qid"]<1){
				echo '<p>Goblok lu</p>';
				exit();
			}
			
			include "dbmgr.php";
			$row=getQuestion($_GET["qid"]);

			echo '<h1>Simple StackExchange</h1>';
			echo '<div class="questionpart">';
			echo '<h2>'.$row["QuestionTopic"].'</h2>';
			echo '<div class="votediv">VOTECELL NOT IMPLEMENTED</div>';//TODO buat vote cell
			echo '<div class="postdiv">';
			echo '<p>'.$row["Content"].'</p>';
			echo '<div class = "footer qfooter"> asked by '.$row["Email"]." at ".$row["created_at"] . "</div>";
			echo '</div>';
			echo '</div>';
			echo '<h1> The answer part is not implemented</h1>';
		?>
	</body>
</html>

