<?php 
	require('includes/config.php'); 
	include('includes/header.php');
?>
<center>
	<form action="question_list.php" method="get">
		<input type="text" name="search" > 
		<input type="submit" value="Search"> <br>
	</form>
	if you can't find what you are looking for
	<a href="ask_question.php?id=-1">
		<askhere> Ask Here </askhere>
	</a>
</center>
	<br   />
	<font size="5"> Recently Asked Questions </font> <br>

	<?php
	$sql = "SELECT * FROM question";
	$data = mysql_query($sql);
	?>

	<?php while($record = mysql_fetch_array($data)):?> 
	<svg height= 2  width= 800 > <line x1= 0  y1= 0  x2= 800 y2= 0 style= stroke:rgb(0,0,0);stroke-width:8 /> </svg> <br> <br>
		<div class=clearfix>
			<nvote>
				<center>
					<p> <?php echo $record['vote'] ?> </p>
					<p>Votes</p>
				</center>
			</nvote>

			<nanswers>
				<center>
					<?php
						$nanswers = 8;
					?>
					<?php
						$count = 0;
						$qcount = "SELECT * FROM answer WHERE q_id = '".$record['id']."'";
						$dcount = mysql_query($qcount);
						while($rcount = mysql_fetch_array($dcount)){ 
							if ($rcount['q_id'] == $record['id']){
								$count = $count+1;
							}
						}
						?>
					<p><?php echo $count ?> </p>
					<p>Answer</p>
				</center>
			</nanswers>

			<questionm3>
				<a href = answer.php?id=<?php echo $record['id'];?> >
					<font> <?php echo $record['topic'] ?> </font>
				</a>
				<other>
					<p> asked by 
						<name> <?php echo $record['name'] ?> </name> |  <edit> <a href= "ask_question.php?id=<?php echo $record['id'] ?>">edit </a> </edit> | <delete> <a href= "delete.php?id=<?php echo $record['id']; ?>">delete </a> </delete>
					</p>
				</other>
			</questionm3>
		</div> <br>
	<?php endwhile; ?>
	<?php mysql_close(); ?>

<?php include ('includes/footer.php'); ?>