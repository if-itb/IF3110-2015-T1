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
			<div id="recent-title">Recently Asked Questions</div>
			<hr>
			<?php
				$con = connectDB();
				$result = getAllQuestions();
				?>
				<div class="question-list">
				<?php
					if ($result->num_rows > 0){
						while($row = $result->fetch_assoc()) {
						$id = $row["id"];
						?>
							<div class="question-item" id="question-<?php echo $id;?>">
							<table>
								<tr>
									<td>
									<?php echo $row["votes"];?></br>
									Votes
									</td>
									<td>
									<?php echo countAnswers($id);?></br>
									Answers
									</td>
									</td>
									<td>
									<?php echo "<a class=\"question-item-topic\" href=\"view.php?q=".$row["id"]."\"?><strong>".$row["topic"]."</strong></a></br>".$row["content"];?>
									<div class="question-item-tag">
										<?php echo "Asked by <span class='question-item-name'>" . $row["name"]."</span>";
											echo " | ";
											echo "<a href='edit.php?q=" .$id. "'>edit</a>";
											echo " | ";
											echo "<a class=''><span onclick='delQuestion(".$id.",true)' class='question-item-delete'>delete</span></a>";
										?>
									</div>
									</td>
								</tr>
							</table>
							<hr>
							<?php
							?>
							</div>
						<?php
						}
					} else {
						echo "No results";
					}
				?>	
				</div>
			</div>
		</div>
	</body>
</html>