<html>
<head>
	<title>Simple StackExchange</title>
	<?php include('backend/all_questions.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>
	<form method="post">
		<input type="text" name="keyword">
		<button>Search</button>
	</form><br>
	Cannot find what you are looking for? <a href="new.php">Ask here</a><br>
	
	<div class="title">Recently Asked Questions</div><br>
	<?php while($row = mysqli_fetch_array($result)) { ?>
		<div class="divider"></div>
		<div class="">
			<?php echo $row['votes'];?> Votes <?php echo $row['count'];?> Answers <?php echo '<a href="question.php?id='.$row['id'].'">'.$row['topic'].'</a><br>';?>
			asked by <?php echo $row['name'];?> | <?php echo '<a href="edit.php?id='.$row['id'].'">edit</a> | <a href="javascript:confirmDelete('.$row['id'].')">delete</a>';?>
	<?php 
	};?>
</body>

<script type="text/javascript">
	function confirmDelete(id) {
	    var x;
	    if (confirm("Are you sure to delete this post?") == true) {
	        location.href = "delete.php?id="+id;
    	}
	}
</script>