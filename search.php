<?php 
	require('includes/config.php'); 
	include('includes/function.php');
	include('includes/header.php');
	
	if(! isset( $_GET["key"] )) {
		header('Location: index.php');
	}
	$cari = trim($_GET["key"]);
	$query = "select * from question where topic LIKE  '%".$cari."%' or content LIKE  '%".$cari."%'";
	$data = mysql_query($query);
?>
<span class="page-title"><h2>Hasil untuk  '<?php echo $cari; ?>' : </h2></span><hr>
<?php while($row = mysql_fetch_array($data)) : ?>
	<div class="row">
		<h2> <a href = view-question.php?id=<?php echo $row['id'];?>><?php echo $row['topic']; ?></a></h2>
		<p><?php echo htmlspecialchars(shorten_string($row['content'], 50));?></p>
		<br>
		<div class="col vote in-numbers">
			<div class = "flag">Vote</div>
			<div class = "number"> <?php echo $row['vote']; ?></div>
		</div>
		<?php
			$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
			$data2 = mysql_query($query2);
			$row2 = mysql_fetch_array($data2);
		?>
		<div class = "col answers in-numbers">
		<div class = "flag">Jawaban</div> <div class = "number"><?php echo $row2['numAns'];?></div>
		</div>
		<div class = "controls" align = "right">
			ditanyakan oleh <span class="name"><?php echo $row['email']; ?></span> |
			<span class="link edit"> <a href= "question.php?id=<?php echo $row['id']; ?>">Edit</a> </span>
			<span class="link delete"> <a href= "javascript:delete_question(<?php echo $row['id'];?>)" >Delete</a></span>
		</div>
	</div>
	<br><hr>
<?php endwhile; ?>
<?php mysql_close($link); ?>
<?php include('includes/footer.php');?>