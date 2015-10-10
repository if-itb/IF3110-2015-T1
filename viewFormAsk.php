<?php
	$viewFormAsk = '<form onsubmit="return validasi(this);" class="form makeQuestion" method="post" action="index.php{{isEdit}}">
			<div class="innerForm">
				<input class="textForm" type="text" placeholder="Name" name="name" {{valName}}>
			</div>
			<div class="innerForm">
				<input class="textForm" type="text" placeholder="Email" name="email" {{valEmail}}>
			</div>
			<div class="innerForm">
				<input class="textForm" type="text" placeholder="Question Topic" name="topic" {{valTopic}}>
			</div>
			<div class="innerForm">
				<textarea rows="10" class="textArea" name="content" placeholder="Content" >{{valContent}}</textarea>
			</div>
			<div class="innerForm">
				<input class="submitButton" type="submit" placeholder="Post">
			</div>
		</form>';
?>