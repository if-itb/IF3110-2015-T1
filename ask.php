<?php
	include("header.php");
?>
	<div class="content">
		<h2>What's your question?</h2>
		<div class="bottom-line"> </div>
		<form action="questionAskReq.php" method="post">
			<div class="form">
				<input class="formContent" type="text" name="name" placeholder="Name" size="159px">
			</div>
			<div class="form">  
		    	<input class="formContent" type="text" name="email" placeholder="Email" size="159px">
		    </div>
		    <div class="form">
		    	<input class="formContent" type="text" name="topic" placeholder="Question Topic" size="159px">
		    </div>
		    <div class="textArea">
				<textarea class="formContent" name="content" placeholder="Contents" rows="10" cols="161"></textarea>
		    </div>
		    	<input class="button" type="submit" value="Post" > 
		</form>
	</div>

<?php
	include("footer.php");
?>