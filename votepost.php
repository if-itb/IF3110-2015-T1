
<head>
<?php

	include("A_config.php");
	$id = $_GET['post_id'];
	$votes = $_GET['votes'];
	$result = mysql_query("select votes from post where post_id = '$id'");
	$row = mysql_fetch_array($result);
	if($votes==1){
		$votes+=$row['votes'];
		if(!mysql_query("update post set votes = '$votes' where post_id = 'id'")){
			die();
		}
	} else if($votes==-1 && $row['votes']>0){
		$votes+=$row['votes'];
		if(!mysql_query("update post set votes = '$votes' where post_id = 'id'")){
			die();
		}
	}
	else $votes = $row['votes'];
	mysql_close();
?>
</head>
<body>
	<?php echo $votes; ?>
</body>
</html>


	
