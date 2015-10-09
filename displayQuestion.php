<!DOCTYPE html>
<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Simple StackExcahange | Question</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/validate.js"></script>
	</head>

	<?php

		include 'dbact.php';
		$id_q = isset($_GET['id_q']) ? $_GET['id_q'] : '';

		$cur = $id_q != '' ? getQuestion($id_q) : array();
	?>

	<body>
		<a href="index.php"><h1>Simple StackExchange</h1></a>
		<h2><?php echo $cur['Topic']; ?></h2>
		<div class="garis"></div>
		
		<table >
			<tr>
				<td class="vote">
					<dt>up</dt>
					<dt><h3>
						<?php
							echo $cur['nvote'];
						?>
					</h3></dt>
					<dt>down</dt>
					
				</td>
				<td class="dContent">
					<?php
						echo $cur['Content'];
					?>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td class="Detail">
								<?php
									echo "Asked by ";
								?>
								<span class="name">
									<?php
									echo $cur['Name'];
									?>
								</span>
								at
								<?php echo $cur['created_date'];
								?>
								
								| 
								<a href="ask.php?id_q=+<?php echo $cur['id_q'] ?>"><span class="edit">
								edit
								</span></a>
								|
								<a href="javascript:confirmDel(<?php echo $cur['id_q'] ?>)"><span class="del">
								delete
								</span></a>
							</td>
			</tr>
		</table>

		<h2><?php echo $cur['nAns'];?> Answer</h2>
		<div class="garis"></div>

		<?php
			$ans = getAnsFor($id_q);
			if (is_array($ans) || is_object($ans)) {
				foreach ($ans as $a) {?>
				<table >
					<tr>
						<td class="vote">
							<dt>up</dt>
							<dt><h3><?php
								echo $a['nvote'];
							?></h3></dt>
							<dt>down</dt>
							
						</td>
						<td class="dContent">
							<?php
								echo $a['Content'];
							?>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td class="Detail">
							<?php
								echo "Asked by ";
							?>
							<span class="name">
								<?php
								echo $a['Name'];
								?>
							</span>
							at
							<?php echo $a['created_date'];
							?>
						</td>
					</tr>
				</table>
			<div class="garis"></div>
		<?php }}?>
		
		<h2 style="color:#A0A0A0">Your Answer</h2>
		<form action="addAnswer.php" method="post" name="ask-ans">
			<input type="text" name="Name" class="form-field" placeholder="Name"></input>
			<br>
			<input type="text" name="Email" class="form-field" id="Email" placeholder="Email"></input>
			<br>
			<textarea name="Content" placeholder="Content" class="form-textarea" ></textarea>
			<br>
			<div align="right">
				<input type="submit" value="Post" onclick="return validateAns()" action="addAnswer.php">
			</div>
			<input type="hidden" name="id_q" value="<?php echo $id_q ?>" />
		</form>

	</body>

	<script type="text/javascript">
	function confirmDel(id) {
	    if (confirm("Are you sure to delete this post?") == true) {
	        location.href = "delQuestion.php?id_q="+id;
    	}
	}
	</script>
</html>
