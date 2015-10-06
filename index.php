<?php include("header.php"); ?>

		<?php include("indexCheck.php"); ?>

		<div id="search">
			<form>
				<input class="textForm" type="text" name="search" />
				<input class="submitButton" type="submit" value="Search" />
			</form>
		</div>
		<p class="midText">Cannot find what you are looking for? <a class="submitButton" href="askhere.php" >Ask Here</a></p>
		<div id="recentAsk">
			<h1 class="tag">Recently Asked Question</h1>
			<?php include("indexRequest.php"); ?>
		</div>

<?php include("footer.php"); ?>


<!--
//Home - laman utama
	//brand
	-//#searchBar
	//askHere
	//questionTag
	-//#question * NQuestion


	//#searchBar
	//textForm - query
	//submitForm


	//#questionDiv
	//Votes
	//Answers
	//Topic
	//asked by
	//edit
	//delete
-->