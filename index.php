<?php include_once("header.php");
		include_once("functions.php");
?>
			<div class="search-area">
				<center>
					<form action="/s.php" id="search">
						<input type="text" id="search-box">
						<input type="submit" id="search-submit" value="Search">
					</form>
					<div id="search-desc">
						Cannot find what you are looking for. <a href="#">Ask here</a>.
					</div>
				</center>
			</div>
			<div class="content">
			<div id="recent-title">Recently Asked Questions</div>
			<hr>
			<?php
				$con = connectDB();
				$sql = "SELECT * FROM $tbl_question";
				$result = $con->query($sql);
				?>
				<div class="question-list">
				<?php
					if ($result->num_rows > 0){
						while($row = $result->fetch_assoc()) {
						?>
							<div class="question-item">
							<table>
								<tr>
									<td>
									<?php echo $row["votes"];?></br>
									Votes
									</td>
									<td>
									<?php echo $row["answers"];?></br>
									Answers
									</td>
									</td>
									<td>
									<?php echo $row["topic"];?></br>
									<div class="question-item-tag">
										<?php echo "Asked by <span class='question-item-name'>" . $row["name"]."</span>";
											echo " | ";
											echo "<a href='edit.php?q=" .$row["id"]. "'>edit</a>";
											echo " | ";
											echo "<span class='question-item-delete'>delete</span>";
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
			<div class="footer">
		
			</div>
		</div>
	</body>
</html>