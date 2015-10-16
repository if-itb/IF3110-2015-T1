<!DOCTYPE html>
<html>
<head>
	<title>StackExchange</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">

	<h1>Simple StackExchange</h1>
		<form class="search-box" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" >
			<input  type="text" name="searchbox">
			<input  type="submit" name="submit" value="Search">
		</form>
		<div class="center" >
		Canot find what you are looking for? <a id="y" href="AskHere.php">Ask here</a>
		</div>
		<br>
		<br>
		<h2><div class="sub-title">Recently Asked Questions</div></h2>
		<?php
		include('AskedQuestion.php');
		if(isset($_POST['submit'])){
			$key = $_POST['searchbox'];
		}
		else{
			$key = "empty"; 
		}
		listQuestion($key);
		?>
		
</div>
</body>		
</html>