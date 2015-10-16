<?php 
	require('includes/config.php'); 
	include('includes/header.php');
	$pid = $_GET['id'];
?>
<div>
	<font size="6"> What's your question? </font>  <br>
	<svg height="2" width="800">
	  	<line x1="0" y1="0" x2="800" y2="0" style="stroke:rgb(0,0,0);stroke-width:8" />
	</svg> <br> <br>
 
	<form action="insert_question.php?id=<?php echo $pid ?>" method="post">
		<input type="text" name="fname" placeholder="Name" ><br>
		<input type="text" name="femail" placeholder="Email" ><br>
		<input type="text" name="fquestiontopic" placeholder="Question Topic" ><br>
		<input type="text" name="fcontent" ><br>
		<input type="submit" name="submit" value="Post">
	</form>
</div>
<?php include('includes/footer.php');?>