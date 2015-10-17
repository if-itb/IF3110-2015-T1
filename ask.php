<?php
	include_once("header.php");
    include_once("functions.php");
	
	$error = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = (!(empty($_POST["name"])))?$_POST["name"]:'';
		$email = (!(empty($_POST["email"])))?$_POST["email"]:'';
		$topic = (!(empty($_POST["topic"])))?$_POST["topic"]:'';
		$content = (!(empty($_POST["content"])))?$_POST["content"]:'';
		$error = postQuestion('insert',$name,$email,$topic,$content);
	}
?>
			<div class="container" id="ask-question">
				<span id="whats-question">What's Your Question?</span></br>
				<hr></br></br>
				<?php if (strlen($error)>0){echo '<span class="error">'.$error.'</span></br>';}?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return chkValidityQuestion();" id="form-ask">
					<input type="text" name="name" id="name" placeholder="Name"></br><span class="error">
					<input type="text" name="email" id="email" placeholder="Email"></br><span class="error">
					<input type="text" name="topic" id="topic" placeholder="Question Topic"></br><span class="error">
					<textarea rows=10 type="text" name="content" id="content" placeholder="Content"></textarea>
					<input type="submit" id="ask-submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</body>
</html>