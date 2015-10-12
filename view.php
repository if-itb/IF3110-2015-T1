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
			$content = (!(empty($_POST["content"])))?$_POST["content"]:'';
			$error = postAnswer($id,$name,$email,$content);
		}
		$row = getQuestionRow($id);
		?>
		<div class="container" id="view-question">
						<span id="question-topic"><?php echo $row['topic'];?></span>
						<hr>
						<div class="question-details">
							<table>
							<tr>
							<td width="50px">
								<center>
									<a onclick="vote('up','q',<?php echo $row['id'];?>)" class="vote vote-up"><img src="images/vote-up.png" width="30px"></a></br>
									<div class="vote-number" id="q-<?php echo $row['id'];?>">
									<?php
										echo getVoteNumber('q',$id);
									?>
									</div>
									</br><a onclick="vote('down','q',<?php echo $row['id'];?>)" class="vote vote-down"><img src="images/vote-down.png" width="30px"></a>
								</center>
							</td>
							<td>
							<span class="question-content"><?php echo $row['content'];?></span></br></br>
							<div class="question-asked">Asked by <?php echo $row['name'];?> on <?php echo $row['create_date'];?></div></br>
							</td>
							</table>
						</div>
						<div class="answers">
						<?php
							$answers = countAnswers($id);
							if ($answers > 0){
								if($answers == 1){
									echo "<span id='answers-number'>".$answers." Answer</span><hr>";
								} else {
									echo "<span id='answers-number'>".$answers." Answers</span><hr>";
								}
								echo "<div class='answers-list'>";
								$result = getAnswers($id);
								while($row = $result->fetch_assoc()) {
								$q_id = $row['id'];
								?>
									<div class="answer-details">
									<table width=100%>
									<tr>
										<td width="50px">
											<center>
											<a onclick="vote('up','a',<?php echo $q_id;?>)" class="vote vote-up"><img src="images/vote-up.png" width="30px"></a></br>
											<div class="vote-number" id="a-<?php echo $q_id;?>">
											<?php
												include_once ('functions.php');
												echo getVoteNumber('a',$q_id);
											?>
											</div>
											</br><a onclick="vote('down','a',<?php echo $q_id;?>)" class="vote vote-down"><img src="images/vote-down.png" width="30px"></a>
											</center>
										</td>
										<td>
											<span class="answer-content"><?php echo $row['content'];?></span></br></br>
											<div class="answer-answered">Answered by <?php echo $row['name'];?> on <?php echo $row['create_date'];?></div></br>
										</td>
									</tr>
									</table>
									<hr>
									</div>
								<?php
								}
								echo "</div>";
							} else {
								echo "<span class='answers-number'>0 Answer</span><hr>";
							}
						?>
						
						<h2>Your Answer</h2>
						<?php if (strlen($error)>0){echo '<span class="error">'.$error.'</span></br>';}?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?q='.$id;?>"onsubmit="return chkValidityAnswer();" id="form-ask">
							<input type="text" name="name" id="name" placeholder="Name"></br><span class="error">
							<input type="text" name="email" id="email" placeholder="Email"></br><span class="error">
							<textarea rows=10 type="text" name="content" id="content" placeholder="Content"></textarea>
							<input required type="submit" name="researcher-submit" id="ask-submit" name="submit" value="Submit">
						</form>
					</div>
				</div>
			</body>
		</html>
		<?php
	} else {
		include_once("not_found.php");
	}
	?>