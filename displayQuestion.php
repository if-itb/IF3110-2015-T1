<html>
	<head>
		<title>Display Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php
			$qid=$_GET["qid"];
			if (!isset($qid) || !is_numeric($qid)){
				echo '<p>Goblok lu</p>'; //TODO ganti error message yang serius
				exit();
			}
			if ($qid<1){
				echo '<p>Goblok lu</p>';//TODO ganti error message yang serius
				exit();
			}
			
			include "dbmgr.php";
			$row=getQuestion($qid);
		?>

		<h1>Simple StackExchange</h1>
		<div class="questionpart">
		<h2><?php echo $row["QuestionTopic"];?></h2>
		<div class="votediv">VOTECELL NOT IMPLEMENTED</div><!--//TODO buat vote cell-->
		<div class="postdiv">
		<p><?php echo $row["Content"]?></p>
		<div class = "footer qfooter"> asked by <?php echo $row["Email"];?> at <?php echo $row["created_at"] ?> </div>";
		</div>
		</div>
		<h2> ANSWER PART NOT IMPLEMENTED</h2>
	</body>
</html>

