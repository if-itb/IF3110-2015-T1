<?php 
	require('includes/config.php'); 
	include('includes/header.php');
	//include('js/javasript.js');
	$qid = $_GET['id'];
	$query = "SELECT * FROM question WHERE id = '".$qid."'";
	$data = mysql_query($query);
?>

<h1>Question...</h1>
<?php while($record = mysql_fetch_array($data)): ?>
	<p> <div class = clearfix>
		<vote>
			<a href="javascript:vote(<?php echo $record['id'] ?>, 'question', 'up')"><img src="css/up.png" width="20" height="20"></a> <br>
			<font size= 4 id="qvote"><?php echo $record['vote'] ?></font><br>
			<a href="javascript:vote(<?php echo $record['id'] ?>, 'question', 'down')"><img src="css/down.png" width="20" height="20"></a> <br>
		</vote>
		<question>
			<p> <?php echo $record['content'] ?> </p>
			<other>
				<p> asked by 
					<name> <?php echo $record['name'] ?> </name> |  <edit> <a href= "ask_question.php?id=<?php echo $record['id'] ?>">edit </a> </edit> | <delete> <a href= "delete.php?id=<?php echo $record['id']; ?>">delete </a> </delete>
				</p>
			</other>
		</question>
		</div>
	</p>
<?php endwhile; ?>

<?php
$count = 0;
$query = "SELECT * FROM answer WHERE q_id = '".$qid."'";
$data = mysql_query($query);
while($record = mysql_fetch_array($data)){ 
	if ($record['q_id'] == $qid){
		$count = $count+1;
	}
}
?>

<font size= 6 > <?php echo $count ?> Answer</font>
<svg height= 2  width= 800 > <line x1= 0  y1= 0  x2= 800 y2= 0 style= stroke:rgb(0,0,0);stroke-width:8 /> </svg> <br> <br>

<?php if($count > 0){ ?>
	<?php
	$query = "SELECT * FROM answer WHERE q_id = '".$qid."'";
	$data = mysql_query($query); ?>
	<?php while($record = mysql_fetch_array($data)): ?>
		<div class=clearfix>
		<nvote>
			<a href="javascript:vote(<?php echo $record['id'] ?>, 'answer', 'up')"><img src="css/up.png" width="20" height="20"></a> <br>
			<font size= 4 id=<?php echo $record['id']?> ><?php echo $record['vote'] ?></font><br>
			<a href="javascript:vote(<?php echo $record['id'] ?>, 'answer', 'down')"><img src="css/down.png" width="20" height="20"></a> <br>
		</nvote>
		<question>
			<font><?php echo $record['content'] ?></font>
			<other>
				<p> answered by <name> <?php echo $record['name'] ?> </name> </p>
			</other>
		</question>
		</div>		
		<svg height= 2  width= 800 > <line x1= 0  y1= 0  x2= 800 y2= 0 style= stroke:rgb(0,0,0);stroke-width:8 /> </svg> <br> <br>	
	<?php endwhile; ?>
<?php } ?>


	<font size="10">Your Answer</font>
	<form action="insert_answer.php?id=<?php echo $qid ?>" method="post">
		<input type="text" name="fname" placeholder="Name" ><br>
		<input type="text" name="femail" placeholder="Email" ><br>
		<input type="text" name="fcontent" ><br>
		<input type="submit" name="submit" value="Post">
	</form>	
<?php include ('includes/footer.php'); ?>