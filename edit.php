<?php
	include_once("header.php");
    include_once("functions.php");
	$error = "";
	
	if(empty($_GET["q"])){
		include_once("not_found.php");
	} else {
		$id = $_GET["q"];
	}
	if(isQuestionExist($id)){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = (!(empty($_POST["name"])))?$_POST["name"]:'';
			$email = (!(empty($_POST["email"])))?$_POST["email"]:'';
			$topic = (!(empty($_POST["topic"])))?$_POST["topic"]:'';
			$content = (!(empty($_POST["content"])))?$_POST["content"]:'';
			$error = postQuestion('update',$name,$email,$topic,$content,$id);
		}
		$row = getQuestionRow($id);
		?>
				<div class="container" id="ask-question">
				<span id="edit-question">Edit Your Question</span></br>
				<hr></br></br>
				<?php if (strlen($error)>0){echo '<span class="error">'.$error.'</span></br>';}?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?q='.$id;?>"onsubmit="return chkValidityQuestion();" id="form-ask">
					<input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name'];?>"></br><span class="error">
					<input type="text" name="email" id="email" placeholder="Email" value="<?php echo $row['email'];?>"></br><span class="error">
					<input type="text" name="topic" id="topic" placeholder="Question Topic" value="<?php echo $row['topic'];?>"></br><span class="error">
					<textarea rows=10 type="text" name="content" id="content" placeholder="Content"><?php echo $row['content'];?></textarea>
					<input required type="submit" name="researcher-submit" id="ask-submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
		
		<?php
	} else {
		include_once("not_found.php");
	}
?>
	</body>
</html>