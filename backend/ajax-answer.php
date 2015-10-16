<html>
<head>
<?php
	include('connect-mysql.php');

	$id = $_GET['id'];
	$query = "SELECT * FROM answers WHERE question_id = '$id' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	$answer = mysqli_fetch_array($result);
?>
</head>
<body>
	<div class="item">
        <table class="vote">
        	<tr> <td align="center" valign="middle"> <a href="javascript:upvoteAnswer(<?php echo $answer['id'];?>)"><span class="big">&#708;</span></a></td> </tr>
        	<tr> <td align="center" valign="middle"> <span id="vote<?php echo $answer['id'] ?>"><?php echo $answer['votes']; ?></span></td> </tr>
        	<tr> <td align="center" valign="middle"> <a href="javascript:downvoteAnswer(<?php echo $answer['id'];?>)"><span class="big">&#709;</span></a></td> </tr>
        </table>
        <p class="content"><?php echo $answer['content']; ?></p>
        <p class="pull-right"><b>asked by <?php echo $answer['name']; ?> at <?php echo $answer['created_at']; ?></b></p>
    </div>
    <hr>
</body>
</html>
	