<?php
	require('includes/config.php'); 
	include('includes/function.php');
	include('includes/header.php');
	$post_id = $_GET["id"];
	$query = "select * from question where id = '".$post_id."'";
	$data = mysql_query($query);
	$row = mysql_fetch_array($data);
	$q_id = $row['id'];
	if ($row['id'] == NULL) {
		header('Location: index.php');
	}
	$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
	$data2 = mysql_query($query2);
	$row2 = mysql_fetch_array($data2);
?>

<div id="view-qeustion-page">
<!-- pertanyaan-->
	<div class="section">	
		<h2><?php echo $row['topic']; ?></h2>
		<div class="row">
			<div class="col vote">
				<div class = "vote-btn">
				<button type="button" onclick="getVote('q',<?php echo $row['id'] ?>,1)"><i class="fa fa-chevron-up"></i></button>
				<p class = "number-vote" id="voteq<?php echo $row['id'];?>"><?php echo $row['vote'];?></p>
				<button type="button" onclick="getVote('q',<?php echo $row['id'] ?>,-1)"><i class="fa fa-chevron-down"></i></button>
				</div>
			</div>
			<div class="col content">
				<p><?php echo htmlspecialchars($row['content']); ?></p>
				<br>
			</div>
		</div>
		<div class = "row info" align = "right">
			Ditanyakan oleh <span class="name"><?php echo $row['email']; ?></span> |
			<span class="link edit"> <a href= "question.php?id=<?php echo $row['id']; ?>">Edit</a> </span> | 
			<span class="link delete"> <a href= "javascript:delete_question(<?php echo $row['id'];?>)" >Delete</a></span>
		</div>
		<br>
	</div>
<!-- Jawaban --> 
	<div class="section" id="answers">
		<h2><?php echo $row2['numAns']; ?> Jawaban</h2> <hr>
		<?php
			$query = "select * from answer where q_id = '".$q_id."' order by id";
			$data = mysql_query($query);
		?>
		<?php while($row3 = mysql_fetch_array($data)): ?> 
			<div class = "row">
				<div class = "col vote">
					<button type="button" id = "vote-btn" onclick="getVote('a',<?php echo $row3['id']; ?>,1)"><i class="fa fa-chevron-up"></i></button>
					<p class = "number-vote" id="votea<?php echo $row3['id'];?>"><?php echo $row3['vote'];?></p>
					<button type="button" id = "vote-btn" onclick="getVote('a',<?php echo $row3['id']; ?>,-1)"><i class="fa fa-chevron-down"></i></button>
				</div>
				<div class = "col content">
					<p> <?php echo htmlspecialchars($row3['content']); ?></p>
					<br>
				</div>
				<div class = "row info" align = "right">

					<p>Dijawab oleh <span class = "name"><?php echo $row3['email']; ?></span> </p>

				</div>
				<hr>
			</div>
		<?php endwhile; ?>
	</div>

<!-- Form untuk menjawab-->
	<div class="section" id="form-answer">
		<h2>Beri jawaban :</h2>
		<form class = "block" action = 'actions/post-answer.php?id=<?php echo $q_id;?>' name = "myForm" method = 'POST' onsubmit = "return(validateAnswer());">
			<ul>
				<input type = 'text' name = 'Nama' placeholder="Nama" maxlength = '60'></input>
				<input type = 'text' name = 'Email' placeholder="Email"  maxlength = '60'></input>
				<textarea rows = '100' cols = '100' placeholder="Jawaban" name = 'Jawaban'></textarea>
				<input type = 'submit' value = "Kirim"></input>
			</ul>
		</form>
	</div>
	<?php mysql_close($link); ?>
	</div>
</div>
<?php include('includes/footer.php');?>