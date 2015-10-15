<!DOCTYPE html>
<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/delete.js"></script>
	</head>

	<body>
		<a href="index.php"><h1>Simple StackExchange</h1></a>

		<?php

			include 'dbact.php';
			
			if(isset($_GET['search']) && $_GET['search']!='') {
				echo "<h4>Result for : ",$_GET['search'],"</h4>";
				$dislplay_question = searchQuestion($_GET['search']);
				$number = mysqli_num_rows($dislplay_question);
				echo "Find ",$number," Question";
			}
			else {
				echo "<h4>Please insert your keywords</h4>";
				$dislplay_question = NULL;
			}

			?>
			<div class="garis"></div>
			<?php

			if ($dislplay_question != NULL) {
				foreach ($dislplay_question as $q) {
					?>
					<table class="question">
						<tr>
							<td class="number">
								<?php
									echo $q['nvote'];
								?>
							</td>
							<td class="number">
								<?php
									echo $q['nAns'];
								?>
							</td>
							<td>
							</td>
							<td class="Topic">
								<a href="displayQuestion.php?id_q=+<?php echo $q['id_q'] ?>">
								<?php
									echo $q['Topic'];
								?>
								</a>
							</td>
							<td class="Date">
								<?php
									echo "Asked at ",$q['created_date'];
								?>
							</td>
						</tr>
						<tr>
							<td class="Text">
								<?php
									echo "Votes";
								?>
							</td>
							<td class="Text">
								<?php
									echo "Answers";
								?>
							</td>
							<td></td>
							<td class="Content">
								<?php
									echo $q['Content'];
								?>
							</td>
							<td class="Detail">
								<?php
									echo "Asked by ";
								?>
								<span class="name">
									<?php
									echo $q['Name'];
									?>
								</span>
								| 
								<a href="ask.php?id_q=+<?php echo $q['id_q'] ?>"><span class="edit">
								edit
								</span></a>
								|
								<a href="javascript:confirmDel(<?php echo $q['id_q'] ?>)"><span class="del">
								delete
								</span></a>
							</td>
						</tr>
					</table>
					<div class="garis"></div>
					<?php
				}
			}

		?>
	</body>

	<script type="text/javascript">
	function confirmDel(id) {
	    if (confirm("Are you sure to delete this post?") == true) {
	        location.href = "delQuestion.php?id_q="+id;
    	}
	}
	</script>
</html>
