<?php include_once("header.php");
	include_once("functions.php");
	
?>
			<div class="search-area">
				<center>
					<form method="get" action="search.php" id="search">
						<input type="text" id="search-box" name="s">
						<input type="submit" id="search-submit" value="Search">
					</form>
					<div id="search-desc">
						Cannot find what you are looking for. <a href="ask.php">Ask here</a>.
					</div>
				</center>
			</div>
			<div class="content">
			<div id="recent-title">Search Result</div>
			<hr>
			<?php
				if(empty($_GET["s"])){
					//don't show result
				} else {
					$keyword = $_GET["s"];
				
					$result = search($keyword);
					$result->bind_result($id, $name, $email, $topic, $content, $answers, $votes, $create_date, $update_date);
					while ($result->fetch()) {
						?>
						<div class="question-item" id="question-<?php echo $id;?>">
						<table>
							<tr>
								<td>
								<?php echo $votes;?></br>
								Votes
								</td>
								<td>
								<?php echo countAnswers($id);?></br>
								Answers
								</td>
								</td>
								<td>
								<?php echo "<a class=\"question-item-topic\" href=\"view.php?q=".$id."\"?><strong>".$topic."</strong></a></br>".$content;?>
								<div class="question-item-tag">
									<?php echo "Asked by <span class='question-item-name'>" . $name."</span>";
										echo " | ";
										echo "<a href='edit.php?q=" .$id. "'>edit</a>";
										echo " | ";
										echo "<a class=''><span onclick='delQuestion(".$id.")' class='question-item-delete'>delete</span></a>";
									?>
								</div>
								</td>
							</tr>
						</table>
						<hr>
						</div>
						<?php
					}
				?>
				<div class="question-list">
				<?php
					
				}
				?>	
				</div>
			</div>
		</div>
	</body>
</html>